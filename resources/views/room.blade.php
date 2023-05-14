@extends('frontlayout')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @foreach ($roomTypes as $rtype)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item"> 
                    @foreach($rtype->roomtypeimgs as $key => $img)
                        @if($key == 0) 
                        <img src="{{$img->img_src }}" alt="">               
                        @endif
                    @endforeach
                        <div class="ri-text">
                            <h4>{{$rtype->title}}</h4>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">{!!$rtype->detail!!}</td>
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


  