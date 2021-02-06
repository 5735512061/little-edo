<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\model\Menu;
use App\model\Reserve;
use App\model\Table;
use App\model\Image;
use App\model\ReserveTableDate;
use App\AdminAsst;

class AdminController extends Controller
{
    public function uploadMenuForm() {
        return view('backend/admin/menu/upload-menu');
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
        return view('backend/admin/menu/list-menu')->with('NUM_PAGE',$NUM_PAGE)
                                                   ->with('page',$page)
                                                   ->with('menus',$menus);
    }

    public function editMenu($id) {
        $menu = Menu::findOrFail($id);
        return view('backend/admin/menu/edit-menu')->with('menu',$menu);
    }

    public function updateMenu(Request $request) {
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
        return redirect()->action('Backend\AdminController@listMenu'); 
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
        return view('backend/admin/booking/info')->with('NUM_PAGE',$NUM_PAGE)
                                                 ->with('page',$page)
                                                 ->with('infos',$infos);
    }

    public function deleteBooking($id) {
        Reserve::findOrFail($id)->delete();
        return back();
    }

    public function listAdminAsst(Request $request) {
        $NUM_PAGE = 20;
        $accounts = AdminAsst::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/adminAsst/account')->with('NUM_PAGE',$NUM_PAGE)
                                                      ->with('page',$page)
                                                      ->with('accounts',$accounts);
    }

    public function adminAsstForm() {
        return view('backend/admin/adminAsst/create-account');
    }

    public function createAdminAsst(Request $request) {
        $adminAsst = $request->all();
        $adminAsst['password'] = bcrypt($adminAsst['password']);
        $adminAsst = AdminAsst::create($adminAsst);
        return redirect('/admin/list-adminAsst');
    }

    public function manageImage(Request $request) {
        $NUM_PAGE = 10;
        $images = Image::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/image/manage-image')->with('NUM_PAGE',$NUM_PAGE)
                                                       ->with('page',$page)
                                                       ->with('images',$images);
    }

    public function uploadImage(Request $request) {
        $imageUpload = $request->all();
        $imageUpload = Image::create($imageUpload);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
            $image->move('img_upload/img_website/', $filename);
            $path = 'img_upload/img_website/'.$filename;
            $imageUpload->image = $filename;
            $imageUpload->save();
        }
        return back();
    }

    public function deleteImage($id) {
        Image::findOrFail($id)->delete();
        return back();
    }

    public function editImage($id) {
        $image = Image::findOrFail($id);
        return view('backend/admin/image/edit-image')->with('image',$image);
    }

    public function updateImage(Request $request) {
        $id = $request->get('id');
        $imageUpload = Image::findOrFail($id);
        $imageUpload->update($request->all());
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('img_upload/img_website/', $filename);
                $path = 'img_upload/img_website/'.$filename;
                $imageUpload = Image::findOrFail($id);
                $imageUpload->image = $filename;
                $imageUpload->save();
            }
        return redirect()->action('Backend\AdminController@manageImage');   
    }

    public function manageBooking() {
        $date = Carbon::now()->format('d/m/Y');
        $tables = ReserveTableDate::where('date',$date)->orderBy('table_id','asc')->get();
        $selectTables = Table::get();
        return view('backend/admin/booking/manage-booking')->with('tables',$tables)
                                                           ->with('date',$date)
                                                           ->with('selectTables',$selectTables);
    }

    public function editBooking($id) {
        $booking = ReserveTableDate::findOrFail($id);
        return view('backend/admin/booking/edit-booking')->with('booking',$booking);
    }
    
    public function updateBooking(Request $request) {
        $id = $request->get('id');
        $booking = ReserveTableDate::findOrFail($id);
        $booking->update($request->all());
        $booking->save();
        return redirect()->action('Backend\AdminController@manageBooking');   
    }

    public function createBooking(Request $request) {
        $booking = $request->all();
        $booking = ReserveTableDate::create($booking);
        return redirect('/admin/manage-booking');
    }

    public function manageTable(Request $request) {
        $NUM_PAGE = 20;
        $tables = Table::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('backend/admin/table/create-table')->with('NUM_PAGE',$NUM_PAGE)
                                                       ->with('page',$page)
                                                       ->with('tables',$tables);
    }

    public function createTable(Request $request) {
        $table = $request->all();
        $table = Table::create($table);
        return back();
    }

    public function deleteTable($id) {
        Table::findOrFail($id)->delete();
        return back();
    }

    public function editTable($id) {
        $table = Table::findOrFail($id);
        return view('backend/admin/table/edit-table')->with('table',$table);
    }

    public function updateTable(Request $request) {
        $id = $request->get('id');
        $table = Table::findOrFail($id);
        $table->update($request->all());
        $table->save();
        return redirect()->action('Backend\AdminController@manageBooking');   
    }

    public function searchReserveTableDate(Request $request) {
        $date = $request->get('date');
        $tables = ReserveTableDate::where('date',$date)->orderBy('table_id','asc')->get();
        $selectTables = Table::get();
        return view('backend/admin/booking/manage-booking')->with('tables',$tables)
                                                           ->with('date',$date)
                                                           ->with('selectTables',$selectTables);
    }
}
