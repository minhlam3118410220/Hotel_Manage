<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $bookings=Booking::all();
        return view('booking.index',['data'=>$bookings]);
    }

    public function create()
    {
        $customers=Customer::all();
        return view('booking.create',['data'=>$customers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=>'required',
            'room_id'=>'required',
            'checkin_date'=>'required',
            'checkout_date'=>'required',
            'total_adults'=>'required',
            'roomprice'=>'required',
        ]);
        

        // if($request->ref=='front'){
        //     $sessionData=[
        //         'customer_id'=>$request->customer_id,
        //         'room_id'=>$request->room_id,
        //         'checkin_date'=>$request->checkin_date,
        //         'checkout_date'=>$request->checkout_date,
        //         'total_adults'=>$request->total_adults,
        //         'total_children'=>$request->total_children,
        //         'roomprice'=>$request->roomprice,
        //         'ref'=>$request->ref
        //     ];
        //     session($sessionData);
        //     \Stripe\Stripe::setApiKey('sk_test_51JKcB7SFjUWoS3CIIaPlxPSREpJYoyPsn5KIhj2CBCM9z23dRUreOUwFq6eXmRYmgXNfxSozplocikiAFe3aX7sK008OH0sqy6');
        //     $session = \Stripe\Checkout\Session::create([
        //         'payment_method_types' => ['card'],
        //         'line_items' => [[
        //           'price_data' => [
        //             'currency' => 'inr',
        //             'product_data' => [
        //               'name' => 'T-shirt',
        //             ],
        //             'unit_amount' => $request->roomprice*100,
        //           ],
        //           'quantity' => 1,
        //         ]],
        //         'mode' => 'payment',
        //         'success_url' => 'http://localhost/laravel-apps/hotelManage/booking/success?session_id={CHECKOUT_SESSION_ID}',
        //         'cancel_url' => 'http://localhost/laravel-apps/hotelManage/booking/fail',
        //     ]);
        //     return redirect($session->url);
        // }else{
            $data=new Booking;
            $data->customer_id=$request->customer_id;
            $data->room_id=$request->room_id;
            $data->checkin_date=$request->checkin_date;
            $data->checkout_date=$request->checkout_date;
            $data->total_adults=$request->total_adults;
            $data->total_children=$request->total_children;
            if($request->ref=='front'){
                $data->ref='front';
            }else{
                $data->ref='admin';
            }
            $data->save();

            if($request->ref=='front'){
                return redirect('booking')->with('success','Successfully booking.');
                
            }
            
            return redirect('admin/booking/create')->with('success','Data has been added.');
        // }
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Booking::where('id',$id)->delete();
        return redirect('admin/booking')->with('success','Data has been deleted.');
    }


    // Check Avaiable rooms
    function available_rooms(Request $request,$checkin_date){
        $arooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");

        $data=[];
        foreach($arooms as $room){
            $roomTypes=RoomType::find($room->room_type_id);
            $data[]=['room'=>$room,'roomtype'=>$roomTypes];
        }

        return response()->json(['data'=>$data]);
    }

    public function front_booking()
    {
        $roomTypes=RoomType::all();
        return view('front-booking',['roomTypes'=>$roomTypes]);
    }

    // function booking_payment_success(Request $request){
    //     \Stripe\Stripe::setApiKey('sk_test_51JKcB7SFjUWoS3CIIaPlxPSREpJYoyPsn5KIhj2CBCM9z23dRUreOUwFq6eXmRYmgXNfxSozplocikiAFe3aX7sK008OH0sqy6');
    //     $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
    //     $customer = \Stripe\Customer::retrieve($session->customer);
    //     if($session->payment_status=='paid'){
    //         // dd(session('customer_id'));
    //         $data=new Booking;
    //         $data->customer_id=session('customer_id');
    //         $data->room_id=session('room_id');
    //         $data->checkin_date=session('checkin_date');
    //         $data->checkout_date=session('checkout_date');
    //         $data->total_adults=session('total_adults');
    //         $data->total_children=session('total_children');
    //         if(session('ref')=='front'){
    //             $data->ref='front';
    //         }else{
    //             $data->ref='admin';
    //         }
    //         $data->save();
    //         return view('booking.success');
    //     }
    // }

    // function booking_payment_fail(Request $request){
    //     return view('booking.failure');
    // }
}
