<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $key = Artisan::call('key:generate');
    return 'DONE';
});

Auth::routes();

Route::get('/','Frontend\\LittleEdosController@index');

// หน้าเว็บไซต์ little edo
Route::group(['prefix' => '/little-edo'], function(){ 
    // ลูกค้าติดต่อ
    Route::get('/contact-us','Frontend\\LittleEdosController@contactUs');
    Route::post('/contact-us','Frontend\\LittleEdosController@contactUsPost');
    // แกลอรี่
    Route::get('/gallery','Frontend\\LittleEdosController@gallery');
    // รุปภาพเมนู
    Route::get('/menu','Frontend\\LittleEdosController@menu');
    // ลูกค้าจองโต๊ะ
    Route::get('/reserve-seat','Frontend\\ReservesController@reserveSeat');
    Route::post('/reserve-seat','Frontend\\ReservesController@reserveSeatPost');
    // เมนูพิเศษ
    Route::get('/special-menu','Frontend\\LittleEdosController@specialMenu');
});

Route::group(['middleware' => ['auth']], function () {
	Route::group(['prefix' => 'admin'], function(){
        // อัพโหลดเมนูอาหาร
        Route::get('/upload-menu','Backend\\AdminController@uploadMenuForm');
        Route::post('/upload-menu','Backend\\AdminController@uploadMenuPost');
        // แสดง แก้ไข และลบเมนูอาหาร
        Route::get('/list-menu','Backend\\AdminController@listMenu');
        Route::get('/edit-menu/{id}','Backend\\AdminController@editMenu');
        Route::post('/edit-menu','Backend\\AdminController@updateMenu');
        Route::get('/delete-menu/{id}','Backend\\AdminController@deleteMenu');
        // ข้อมูลการจองของลูกค้า
        Route::get('/booking-info','Backend\\AdminController@booking');
        Route::get('/delete-booking/{id}','Backend\\AdminController@deleteBooking');
        // ลงทะเบียนผู้ดูแลระบบหลังบ้าน
        Route::get('/list-adminAsst','Backend\\AdminController@listAdminAsst');
        Route::get('/create-adminAsst','Backend\\AdminController@adminAsstForm');
        Route::post('/create-adminAsst','Backend\\AdminController@createAdminAsst');
        // จัดการรูปภาพหน้าเว็บไซต์
        Route::get('/manage-image','Backend\\AdminController@manageImage');
        Route::post('/upload-image','Backend\\AdminController@uploadImage');
        Route::get('/delete-image/{id}','Backend\\AdminController@deleteImage');
        Route::get('/edit-image/{id}','Backend\\AdminController@editImage');
        Route::post('/edit-image','Backend\\AdminController@updateImage');
        // จัดการบุ๊คกิ้งในแต่ละวัน และลงรายการจองโต๊ะ
        Route::get('/manage-booking','Backend\\AdminController@manageBooking');
        Route::get('/edit-booking/{id}','Backend\\AdminController@editBooking');
        Route::post('/edit-booking','Backend\\AdminController@updateBooking');
        Route::post('/create-booking','Backend\\AdminController@createBooking');
        Route::post('/search-reserveTableDate','Backend\\AdminController@searchReserveTableDate');
        // เพิ่มจำนวนโต๊ะ
        Route::get('/manage-table','Backend\\AdminController@manageTable');
        Route::post('/create-table','Backend\\AdminController@createTable');
        Route::get('/delete-table/{id}','Backend\\AdminController@deleteTable');
        Route::get('/edit-table/{id}','Backend\\AdminController@editTable');
        Route::post('/edit-table','Backend\\AdminController@updateTable');
        
    });
});

Route::group(['prefix' => 'adminAsst'], function(){
    // เข้าสู่ระบบผู้ดูแลระบบหลังบ้าน
    Route::get('/login','AuthAdminAsst\LoginController@ShowLoginForm')->name('adminAsst.login');
    Route::post('/login','AuthAdminAsst\LoginController@login')->name('adminAsst.login.submit');
    Route::post('/logout', 'AuthAdminAsst\LoginController@logout')->name('adminAsst.logout');
    // อัพโหลดเมนูอาหาร
    Route::get('/upload-menu','Backend\\AdminAsstController@uploadMenuForm');
    Route::post('/upload-menu','Backend\\AdminAsstController@uploadMenuPost');
    Route::get('/list-menu','Backend\\AdminAsstController@listMenu');
    Route::get('/edit-menu/{id}','Backend\\AdminAsstController@editMenu');
    Route::post('/edit-menu','Backend\\AdminAsstController@updateMenu');
    Route::get('/delete-menu/{id}','Backend\\AdminAsstController@deleteMenu');
    // ข้อมูลการจองของลูกค้า
    Route::get('/booking-info','Backend\\AdminAsstController@booking');
    Route::get('/delete-booking/{id}','Backend\\AdminAsstController@deleteBooking');
    // จัดการบุ๊คกิ้งในแต่ละวัน และลงรายการจองโต๊ะ
    Route::get('/manage-booking','Backend\\AdminAsstController@manageBooking')->name('adminAsst.home');
    Route::get('/edit-booking/{id}','Backend\\AdminAsstController@editBooking');
    Route::post('/edit-booking','Backend\\AdminAsstController@updateBooking');
    Route::post('/create-booking','Backend\\AdminAsstController@createBooking');
    Route::post('/search-reserveTableDate','Backend\\AdminAsstController@searchReserveTableDate');
    // ข้อมูลการติดต่อของลูกค้า
    Route::get('/contact','Backend\\AdminAsstController@contact');
});