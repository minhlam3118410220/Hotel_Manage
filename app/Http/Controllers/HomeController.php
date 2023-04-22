<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\RoomType;
use App\Models\Service;
use App\Models\Testimmonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $roomTypes=RoomType::take(4)->get();
        $services=Service::all();
        $testimonials=Testimmonial::all();
        $banners=Banner::where('publish_status','on')->get();

        return view('home',['roomTypes'=>$roomTypes,'services'=>$services,'testimonials'=>$testimonials,'banners'=>$banners]);
    }

    // // Service Detail Page
    // function service_detail(Request $request, $id){
    //     $service=Service::find($id);
    //     return View('servicedetail',['service'=>$service]);
    // }

    // Add Testimonial
    function add_testimonial(){
        return view('add-testimonial');
    }

    // Save Testimonial
    function save_testimonial(Request $request){
        $customerId = session('data')[0]->id;
        $data = new Testimmonial();
        $data->customer_id=$customerId;
        $data->testi_cont=$request->testi_cont;
        $data->save();

        return redirect('customer/add-testimonial')->with('success','Add Testimonial Successful.');
    }


}
