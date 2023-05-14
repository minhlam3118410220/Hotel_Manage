<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <title>Room Reservation | Sona Hotel</title>
</head>

<body
    style="background-color: #e7eff8; font-family: trebuchet,sans-serif; margin-top: 0; box-sizing: border-box; line-height: 1.5;">
<div class="container-fluid">
    <div class="container" style="background-color: #e7eff8; width: 600px; margin: auto;">
        <div class="col-12 mx-auto" style="width: 580px;  margin: 0 auto;">

            <div class="row">
                <div class="container-fluid">
                    <div class="row" style="background-color: #e7eff8; height: 10px;">

                    </div>
                </div>
            </div>

            <div class="row"
                 style="height: 100px; padding: 10px 20px; line-height: 90px; background-color: white; box-sizing: border-box;">
                <h1 class="pl-2"
                    style="color: orange; line-height: 30px; float: left; padding-left: 20px; font-size: 40px; font-weight: 500;">
                    Sona Hotel
                </h1>
            </div>

            <div class="row" style="background-color: #00509d; height: 200px; padding: 35px; color: white;">
                <div class="container-fluid">
                    <h3 class="m-0 p-0 mt-4" style="margin-top: 0; font-size: 28px; font-weight: 500;">
                        <strong style="font-size: 32px;">Room Reservation</strong>
                    </h3>
                    <div class="row mt-5" style="margin-top: 35px; display: flex;">
                        <div class="col-6"
                             style="margin-bottom: 25px; flex: 0 0 50%; width: 50%; box-sizing: border-box;">
                            <b>{{ $customer->full_name}}</b>
                            <br>
                            <span>
                                <a style="color: white !important;" href="mailto:{{ $customer->email }}" target="_blank">{{ $customer->email }}</a>
                            </span>
                            <br>
                            <span>{{ $customer->mobile }}</span>
                            <br>
                            <b>Booking date:</b> {{ date('d/m/yy H:i', strtotime($booking->created_at)) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 p-4" style="background-color: white; margin-top: 15px; padding: 20px;">
                <table>
                    <tr>
                        <td class="pl-3" style=" padding-left:15px;">
                            <span class="d-inline"
                                  style="color:#424853; font-family:trebuchet,sans-serif; font-size:16px; font-weight:normal; line-height:22px;">
                                  You have successfully paid online for your reservation.Please arrive on time to check in for the best experience
                            </span>
                        </td>

                        {{-- @if($order->payment_type == "pay_later")
                            <td class="pl-3" style=" padding-left:15px;">
                                <span class="d-inline"
                                      style="color:#424853; font-family:trebuchet,sans-serif; font-size:16px; font-weight:normal; line-height:22px;">
                                    You will pay on delivery. We have just handed over your order to a shipping partner.
                                </span>
                            </td>
                        @endif --}}

                    </tr>
                </table>
            </div>


            <div class="row mt-2" style="margin-top: 15px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b>Room Booking</b>
                    </div>
                    <div class="row pl-3 py-2"
                         style="background-color: #fff; font-size: 18px; padding: 2px 20px 10px 20px; color: black;">
                        <div class="col-12 p-0">
                            <hr style="border-top: 1px solid #0000001a;">
                            <table class="mt-2 w-100"
                                   style="font-size: 16px; width: 100%; text-align: left;  margin-bottom: 5px;">
                                <tr>
                                    <td class="">Checkin date</td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                       {{$booking->checkin_date}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">Checkout date</td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        {{$booking->checkout_date}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">Adults</td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        {{$booking->total_adults}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">Childrens</td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        {{$booking->total_children}}
                                    </td>
                                </tr>
                                <tr style="font-size: 18px;">
                                    <td><b>TOTAL</b></td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        <b>{{ number_format($roomtype->price, 0, '.', '.')  }} VND</b>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="row mt-2 mb-4" style="margin-top: 15px; margin-bottom: 25px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b style="color: #00509d; font-size: 18px;">More information</b>
                    </div>
                    <div class="row pl-3 py-2" style="background-color: #fff; padding: 10px 20px;color: black;">

                        <p>We would like to extend our heartfelt gratitude for choosing our hotel's booking services. We sincerely appreciate the opportunity to serve you during your recent stay.</p>

                        <p>At our hotel, we strive to provide exceptional experiences and personalized service to ensure your comfort and satisfaction. It is truly rewarding to know that we were able to meet your expectations and make your stay a memorable one.</p>
                        
                        <p>Your support and trust in our hotel are invaluable to us. We are committed to continuously improving our services and facilities to deliver even better experiences in the future.</p>
                        
                        <p>Once again, thank you for choosing our hotel for your accommodation needs..</p>
                        
                        {{-- <p>
                            You can track your
                            <a href="http://127.0.0.1:8000/order/{{$order->id}}"> order here.</a>
                        </p> --}}
                       

                        <b>Sona Hotel thank you.</b>
                    </div>
                </div>
            </div> 

            <div class="row"> 
                <div class="container-fluid">
                    <div class="row" style="background-color: #e7eff8; height: 10px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>


