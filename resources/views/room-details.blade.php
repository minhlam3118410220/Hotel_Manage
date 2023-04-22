@extends('frontlayout')
@section('content')


    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>{{$roomTypes->title}}</h2>
                        <div class="bt-option">
                            <a href="/">Home</a>
                            <a href="{{url('room')}}">Rooms</a>
                            <span>{{$roomTypes->title}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="testimonial-section spad">
  
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="testimonial-slider owl-carousel">
                        @foreach($roomTypes->roomtypeimgs as $key => $img)
                      
                            <div class="ts-item">
                                <img src="{{asset('storage/'.str_replace('public/', '',$img->img_src)) }}" alt="">
                            </div>          

                        @endforeach
                        
                      
                    </div>
                </div>
            </div>
      
    </section>

    <section class="room-details-section spad">
        <div class="container">
            <div class="row">             
                <div class="col-lg-7">
                    <div class="room-details-item">
                        <img src="" alt="">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>{{$roomTypes->title}}</h3>
                            </div>
                            
                            <h2>{{number_format($roomTypes->price, 0, ',', '.')}} VND<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">{!!$roomTypes->detail!!}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <div class="rd-title">       
                                @if (Session::has('customerlogin'))
                                <a href="{{url('booking')}}">Booking Now</a>
                                @else
                                <a href="{{url('login')}}">Booking Now</a>
                                @endif
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-5">
                    <div class="room-details-item">
                        <img src="" alt="">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>Amenities</h3>
                            </div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Complimentary WIFI, everywhere: For all devices</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Dreamy pillow-topped mattress</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Rain shower & Hand shower</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Air conditioning</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">42" flat screen TV</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bathrobe & Slippers</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Luxurious bathroom amenities</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Hairdryer 1600W</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Electronic safe</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Iron & Ironing board</td>
                                    </tr>
                                
                                       
                                     
                                    
                                </tbody>
                            </table>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @foreach ($related_roomtypes as $rtype)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item"> 
                    @foreach($rtype->roomtypeimgs as $key => $img)
                        @if($key == 0) 
                        <img src="{{asset('storage/'.str_replace('public/', '',$img->img_src)) }}" alt="">               
                        @endif
                    @endforeach
                        <div class="ri-text">
                            <h4>{{$rtype->title}}</h4>
                         
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">{!!$rtype->detail!!}</td>
                                        {{-- <td>30 ft</td> --}}
                                    </tr>
                                   
                                </tbody>
                            </table>
                            
                            <a href="{{url('room/'.$rtype->id)}}" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
               
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

@endsection
    