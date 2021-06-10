<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\model\Menu;
use App\model\Contact;
use App\model\Image;
use App\model\CustomerPrivilege;
use App\model\StatusCustomerPrivilege;

use Carbon\Carbon;

class LittleEdosController extends Controller
{ 
    public function index() {
        $slide_main_images = Image::where('type','slide_main_image')->get();
        $menu_images = Image::where('type','menu_image')->get();
        $slide_menu_images = Image::where('type','slide_menu_image')->get();
        $slide_special_images = Image::where('type','slide_special_image')->get();
        return view('frontend/index')->with('slide_main_images',$slide_main_images)
                                     ->with('menu_images',$menu_images)
                                     ->with('slide_menu_images',$slide_menu_images)
                                     ->with('slide_special_images',$slide_special_images);
    }
    
    public function contactUs() {
        return view('frontend/contact/contact-us');
    }

    public function contactUsPost(Request $request) {
        $message = $request->all();
        $message = Contact::create($message);
        return redirect('/');
    }

    public function gallery() {
        $gallery_images = Image::where('type','gallery_image')->get();
        $gallery_menu_images = Image::where('type','gallery_menu_image')->orderBy('id','asc')->get();
        return view('frontend/littleEdo/gallery')->with('gallery_images',$gallery_images)
                                                 ->with('gallery_menu_images',$gallery_menu_images);
    }

    public function menu() {
        $menus = Menu::get();
        $gallery_menu_images = Image::where('type','gallery_menu_image')->orderBy('id','asc')->get();
        return view('frontend/littleEdo/menu')->with('menus',$menus)
                                             ->with('gallery_menu_images',$gallery_menu_images);
    }

    public function specialMenu(){
        $special_menus = Image::where('type','special_menu')->get();
        return view('frontend/littleEdo/special-menu')->with('special_menus',$special_menus);
    }

    // ปิดลงทะเบียนรับสิทธิ์
    public function registerPrivilegeClose() {
        return view('frontend/customer/register-privilege-close');
    }
    // ลงทะเบียนรับสิทธิ์
    public function registerPrivilege() {
        return view('frontend/customer/register-privilege');
    }

    public function registerPrivilegePost(Request $request){
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $privilege = $request->privilege;
        $card_id = $request->card_id;
        $date = Carbon::now()->format('d/m/Y'); //เหมือนกัน
        $code = str_random(8);
        
        $phone_unique = count(CustomerPrivilege::where('phone',$phone)->where('privilege',$privilege)->get());
        $card_id_unique = count(CustomerPrivilege::where('card_id',$card_id)->where('privilege',$privilege)->get());

        $customer_privilege_id = CustomerPrivilege::where('phone',$phone)->where('card_id',$card_id)->value('id');
        $status_privilege = count(StatusCustomerPrivilege::where('customer_privilege_id',$customer_privilege_id)->get());

        if($phone_unique == 0 && $card_id_unique == 0) {
            if($name == null || $phone == null || $privilege == null || $card_id == null) { // ไม่ได้กรอกข้อมูล
                $objData = new \stdClass();
                $objData->status = "NULL";
    
                return response()->json($objData);
            }
            elseif($status_privilege == 0 && $customer_privilege_id != NULL) { //คนที่ลงทะเบียนรับเนื้อวากิว แต่ไม่ได้มาใช้สิทธิ์ จะโดนตัดสิทธิ์
                $objData = new \stdClass();
                $objData->status = "not_receive";
                return response()->json($objData);
            }
            else {
                $customer_privilege = new CustomerPrivilege;
                $customer_privilege->card_id = $card_id;
                $customer_privilege->name = $name;
                $customer_privilege->phone = $phone;
                $customer_privilege->address = $address;
                $customer_privilege->privilege = $privilege;
                $customer_privilege->date = $date;
                $customer_privilege->code = $code;
                $customer_privilege->save();
    
                $objData = new \stdClass();
                $objData->name = $name;
                $objData->code = $code;
                $objData->privilege = $privilege;
                $objData->status = "Pass";
    
                return response()->json($objData);
            }
        }
        elseif($card_id_unique != 0) {
            $objData = new \stdClass();
            $objData->status = "card_id_unique";
            return response()->json($objData);
        }
        elseif($phone_unique != 0) {
            $objData = new \stdClass();
            $objData->status = "phone_unique";
            return response()->json($objData);
        }
        
    }

}
