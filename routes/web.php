<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffDepartment;
use Illuminate\Support\Facades\Route;



// Admin Login
Route::get('admin/login',[AdminController::class,'login']);
Route::post('admin/login',[AdminController::class,'check_login']);
Route::get('admin/logout',[AdminController::class,'logout']);

// Route::prefix('admin')->middleware('checkAdminLogin')->group(function (){
Route::prefix('admin')->group(function (){

    // Admin Dashboard
    Route::get('/',[AdminController::class,'dashboard']);

    //Banner
    Route::get('/banner/{id}/delete',[BannerController::class,'destroy']);
    Route::resource('/banner',BannerController::class);

    // RoomType Routes
    Route::get('/roomtype/{id}/delete',[RoomTypeController::class,'destroy']);
    Route::resource('/roomtype',RoomTypeController::class);

    // Delete Image
    Route::get('/roomtypeimage/delete/{id}',[RoomTypeController::class,'destroy_image']);

    // Room
    Route::get('/rooms/{id}/delete',[RoomController::class,'destroy']);
    Route::resource('/rooms',RoomController::class);

    // Customer
    Route::get('/customer/{id}/delete',[CustomerController::class,'destroy']);
    Route::resource('/customer',CustomerController::class);

    // Department
    Route::get('/department/{id}/delete',[StaffDepartment::class,'destroy']);
    Route::resource('/department',StaffDepartment::class);

    // Staff CRUD
    Route::get('/staff/{id}/delete',[StaffController::class,'destroy']);
    Route::resource('/staff',StaffController::class);

    // Staff Payment
    Route::get('/staff/payment/{id}/add',[StaffController::class,'add_payment']);
    Route::post('/staff/payment/{id}',[StaffController::class,'save_payment']);
    Route::get('/staff/payments/{id}',[StaffController::class,'all_payments']);
    Route::get('/staff/payment/{id}/{staff_id}/delete',[StaffController::class,'delete_payment']);

    // Booking
    Route::get('booking/{id}/delete',[BookingController::class,'destroy']);
    Route::resource('booking',BookingController::class);
    Route::get('booking/available-rooms/{checkin_date}',[BookingController::class,'available_rooms']);

    // Service CRUD
    Route::get('service/{id}/delete',[ServiceController::class,'destroy']);
    Route::resource('service',ServiceController::class);

    // Testimonial
    Route::get('testimonial/{id}/delete',[AdminController::class,'destroy_testimonial']);
    Route::get('testimonials',[AdminController::class,'testimonials']);
    
});



Route::get('/',[HomeController::class,'home']);
Route::get('about-us',[PageController::class,'about_us']);
Route::get('contact',[PageController::class,'contact']);
Route::get('blog',[PageController::class,'blog']);
Route::get('booking',[BookingController::class,'front_booking']);
Route::post('booking',[BookingController::class,'booking_payment']);
Route::get('booking/success',[BookingController::class,'booking_payment_success']);
Route::get('booking/fail',[BookingController::class,'booking_payment_fail']);

Route::get('room',[PageController::class,'room']);
Route::get('room/{id}',[PageController::class,'room_details']);

//Customer login
Route::get('login',[CustomerController::class,'login']);
Route::get('register',[CustomerController::class,'register']);
Route::post('customer/login',[CustomerController::class,'customer_login']);
Route::get('logout',[CustomerController::class,'logout']);

// Testimonial
Route::get('customer/add-testimonial',[HomeController::class,'add_testimonial']);
Route::post('customer/save-testimonial',[HomeController::class,'save_testimonial']);

//Profile 
Route::get('customer/{id}',[PageController::class,'customer']);
Route::post('customer/{id}',[PageController::class,'edit_customer']);




