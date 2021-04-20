<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\model\Menu;
use App\model\Reserve;
use App\model\Table;
use App\model\Image;
use App\model\Contact;
use App\model\ReserveTableDate;
use App\model\CustomerPrivilege;
use App\model\StatusCustomerPrivilege;
use App\AdminAsst;

class AdminAsstController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:adminAsst');
    }

    public function uploadMenuForm() {
        return view('backend/adminAsst/menu/upload-menu');
    }

    public function uploadMenuPost(Request $request) {
        $menu = $request->all();
        $menu = Menu::create($menu);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
            $image->move('img_upload/menu/', $filename);
            $path = 'img_upload/menu/'.$filename;
            $menu->image = $filename;
            $menu->save();
        }
        if($request->hasFile('flag')){
            $flag = $request->file('flag');
            $filename = md5(($flag->getClientOriginalName(). time()) . time()) . "_o." . $flag->getClientOriginalExtension();
            $flag->move('img_upload/flag/', $filename);
            $path = 'img_upload/flag/'.$filename;
            $menu->flag = $filename;
            $menu->save();
        }
        return back();
    }

    public function listMenu(Request $request) {
        $NUM_PAGE = 15;
        $menus = Menu::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/adminAsst/menu/list-menu')->with('NUM_PAGE',$NUM_PAGE)
                                                   ->with('page',$page)
                                                   ->with('menus',$menus);
    }

    public function editMenu($id) {
        $menu = Menu::findOrFail($id);
        return view('backend/adminAsst/menu/edit-menu')->with('menu',$menu);
    }

    public function updateMenu(Request $request) {
        $id = $request->get('id');
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        $id = $request->get('id');
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
            $image->move('img_upload/menu/', $filename);
            $path = 'img_upload/menu/'.$filename;
            $menu = Menu::findOrFail($id);
            $menu->image = $filename;
            $menu->save();
        }
        if($request->hasFile('flag')){
            $flag = $request->file('flag');
            $filename = md5(($flag->getClientOriginalName(). time()) . time()) . "_o." . $flag->getClientOriginalExtension();
            $flag->move('img_upload/flag/', $filename);
            $path = 'img_upload/flag/'.$filename;
            $menu = Menu::findOrFail($id);
            $menu->flag = $filename;
            $menu->save();
        }
        return redirect()->action('Backend\AdminAsstController@listMenu'); 
    }

    public function deleteMenu($id) {
        Menu::findOrFail($id)->delete();
        return back();
    }

    public function booking(Request $request) {
        $NUM_PAGE = 20;
        $infos = Reserve::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/adminAsst/booking/info')->with('NUM_PAGE',$NUM_PAGE)
                                                     ->with('page',$page)
                                                     ->with('infos',$infos);
    }

    public function deleteBooking($id) {
        Reserve::findOrFail($id)->delete();
        return back();
    }

    
    public function manageBooking() {
        $date = Carbon::now()->format('d/m/Y');
        $tables = ReserveTableDate::where('date',$date)->orderBy('table_id','asc')->get();
        $selectTables = Table::get();
        return view('backend/adminAsst/booking/manage-booking')->with('tables',$tables)
                                                               ->with('date',$date)
                                                               ->with('selectTables',$selectTables);
    }

    public function editBooking($id) {
        $booking = ReserveTableDate::findOrFail($id);
        return view('backend/adminAsst/booking/edit-booking')->with('booking',$booking);
    }
    
    public function updateBooking(Request $request) {
        $id = $request->get('id');
        $booking = ReserveTableDate::findOrFail($id);
        $booking->update($request->all());
        $booking->save();
        return redirect()->action('Backend\AdminAsstController@manageBooking');   
    }

    public function createBooking(Request $request) {
        $booking = $request->all();
        $booking = ReserveTableDate::create($booking);
        return redirect('/adminAsst/manage-booking');
    }

    public function searchReserveTableDate(Request $request) {
        $date = $request->get('date');
        $tables = ReserveTableDate::where('date',$date)->orderBy('table_id','asc')->get();
        $selectTables = Table::get();
        return view('backend/adminAsst/booking/manage-booking')->with('tables',$tables)
                                                               ->with('date',$date)
                                                               ->with('selectTables',$selectTables);
    }

    public function contact(Request $request) {
        $NUM_PAGE = 20;
        $contacts = Contact::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/adminAsst/contact/contact')->with('NUM_PAGE',$NUM_PAGE)
                                                        ->with('page',$page)
                                                        ->with('contacts',$contacts);
    }

    public function customerPrivilege(Request $request){
        $NUM_PAGE = 20;
        $privileges = CustomerPrivilege::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/adminAsst/privilege/customer-privilege')->with('NUM_PAGE',$NUM_PAGE)
                                                                     ->with('page',$page)
                                                                     ->with('privileges',$privileges);
    }

    public function updateStatusPrivilege(Request $request){
        $customer_privilege_id = $request->get('id');
        $status = $request->get('status');
        $date = Carbon::now()->format('d/m/Y');
        
        $status_privilege = new StatusCustomerPrivilege;
        $status_privilege->customer_privilege_id = $customer_privilege_id;
        $status_privilege->status = $status;
        $status_privilege->date = $date;
        $status_privilege->save();

        return back();
    }

    public function searchPrivilege(Request $request){
        $NUM_PAGE = 50;
        $card_id_search = $request->get('card_id_search');
        $code_search = $request->get('code_search');

        $privileges = CustomerPrivilege::where('card_id', $card_id_search) 
                                       ->orWhere('code', $code_search) 
                                       ->paginate($NUM_PAGE);

        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/adminAsst/privilege/customer-privilege')->with('NUM_PAGE',$NUM_PAGE)
                                                                     ->with('page',$page)
                                                                     ->with('privileges',$privileges);
    }
}
