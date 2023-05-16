<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
            'payment_type'=>'required',
        ]);
        
            $data=new Booking;
            $data->customer_id=$request->customer_id;
            $data->room_id=$request->room_id;
            $data->checkin_date=$request->checkin_date;
            $data->checkout_date=$request->checkout_date;
            $data->total_adults=$request->total_adults;
            $data->total_children=$request->total_children;

            $datein = Carbon::parse($request->checkin_date);
            $dateout = Carbon::parse($request->checkout_date);
            $dates = $datein->diffInDays($dateout);
            $roomprice = $request->roomprice;
          
            $data->total=$roomprice*$dates;

            if($request->ref=='front'){
                $data->ref='front';
                $data->payment_type=$request->payment_type;
            }else{
                $data->ref='admin';
            }
            $data->save();
            $booking = Booking::find($data->id);
            $customer = Customer::find($request->customer_id);
            $roomtype = RoomType::find($request->room_id);
          
            $this->sendEmail($booking,$customer, $roomtype);

            if($request->ref=='front'){
                return view('booking.success');
                
            }
            
            return redirect('admin/booking/create')->with('success','Data has been added.');
        
    }

    public function show($id)
    {
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

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
     
        $result = curl_exec($ch);
       
        curl_close($ch);
        return $result; 
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

    public function booking_payment(Request $request)
    {      
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = '100000';
        $orderId = time() ."";
        $redirectUrl = "http://localhost:8000/booking/success";
        $ipnUrl = "http://localhost:8000/booking";
        $extraData = "";
        $requestId = time() . "";
        $requestType = "payWithATM";

        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId 
        . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash,$secretKey);
        //  dd($signature);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        
        $result = $this->execPostRequest($endpoint, json_encode($data));
        
        $jsonResult = json_decode($result, true);  
         
        return redirect()->to($jsonResult['payUrl'])
                        ->with('booking_request', $request->all());
            
    
    }


    function booking_payment_success(Request $request){
        $bookingRequest = $request->session()->get('booking_request', $request->all());

      
        $data = new Booking;
        $data->customer_id = $bookingRequest['customer_id'];
        $data->room_id = $bookingRequest['room_id'];
        $data->checkin_date = $bookingRequest['checkin_date'];
        $data->checkout_date = $bookingRequest['checkout_date'];
        $data->total_adults = $bookingRequest['total_adults'];
        $data->total_children = $bookingRequest['total_children'];
        $data->ref = $bookingRequest['ref'] ;
        $data->payment_type=$bookingRequest['payment_type'];

        $datein = Carbon::parse($bookingRequest['checkin_date']);
        $dateout = Carbon::parse($bookingRequest['checkout_date']);
        $dates = $datein->diffInDays($dateout);
        $roomprice = $bookingRequest['roomprice'];
          
        $data->total=$roomprice*$dates;
        $data->save();
    
        $booking = Booking::find($data->id);
        $customer = Customer::find($bookingRequest['customer_id']);
        $roomtype = RoomType::find($bookingRequest['room_id']);
    
        $this->sendEmail($booking, $customer, $roomtype);
    
        $request->session()->forget('booking_request');
    
        return view('booking.success');
    }

    function booking_payment_fail(Request $request){
        return view('booking.failure');
    }

    private function sendEmail($booking,$customer,$roomtype)
    {
        // $email_to = $customer->email;
        $email_to_name =$customer->full_name;

        Mail::send('email',compact('booking','customer','roomtype'),function ($message) use(  $email_to_name ){
            $message->from('blackwise1399@gmail.com' , 'Sona Hotel');
            $message->to('minhlam3118410220@gmail.com' , $email_to_name);
            $message->subject('Room Reservation');
        });
    }


}
