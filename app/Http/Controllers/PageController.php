<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    //About Us
    public function about_us()
    {
        return view('about-us');
    }

    //Contact
    public function contact()
    {
        return view('contact');
    }

     //About Us
     public function blog()
     {
         return view('blog');
     }

    // Save Contact Us Form
    // function save_contactus(Request $request){
    //     $request->validate([
    //         'full_name'=>'required',
    //         'email'=>'required',
    //         'subject'=>'required',
    //         'msg'=>'required',
    //     ]);

    //     $data = array(
    //         'name'=>$request->full_name,
    //         'email'=>$request->email,
    //         'subject'=>$request->subject,
    //         'msg'=>$request->msg,
    //     );

    //     Mail::send('mail', $data, function($message){
    //         $message->to('blackwise1399@gmail.com', 'Lam Pham')->subject('Contact Us Query');
    //         $message->from('info.Sona@gmail.com','Admin');
    //     });

    //     return redirect('contact-us')->with('success','Mail has been sent.');
    // }

    public function room()
    {
        $roomTypes=RoomType::all();

        return view('room',['roomTypes'=>$roomTypes]);
    }

    public function room_details($id)
    {
        $roomTypes=RoomType::find($id);
        $related_roomtypes=RoomType::all();
        

        return view('room-details',['roomTypes'=>$roomTypes,'related_roomtypes'=>$related_roomtypes]);
    }

    public function customer($id)
    {
        $data=Customer::find($id);
   
        return view('customer.profile',['data'=>$data]);
        
    }

    public function edit_customer(Request $request, $id)
    {
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
        ]);

        if($request->hasFile('photo')){
            $fileName = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('img'), $fileName);
            $imgPath = 'img/' . basename($fileName);
        }else{
            $imgPath=$request->prev_photo;
        }
        
        $data=Customer::find($id);
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->photo=$imgPath;
        $data->save();

        return redirect()->back();
    }
}
