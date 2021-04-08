<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\model\Menu;
use App\model\Contact;
use App\model\Image;

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
        return view('frontend/littleEdo/menu')->with('menus',$menus);
    }

    public function specialMenu(){
        $special_menus = Image::where('type','special_menu')->get();
        return view('frontend/littleEdo/special-menu')->with('special_menus',$special_menus);
    }

}
