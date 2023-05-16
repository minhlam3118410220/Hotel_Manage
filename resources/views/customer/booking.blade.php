@extends('frontlayout')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section p-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Your Reservation</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    @if ($data->count() > 0)
    <div class="container" style="margin-top: 50px;">
        <div class="card o-hidden  shadow-lg my-5">
            <div class="card-body p-0"  width="450">
                <div class="row">
                    <div class="col-lg-12 ">
                        <table class="table "  >
                            <thead class="text-center">
                                <tr>
                                    <th>Booking Date</th>
                                    <th>Room No.</th>
                                    <th>Room Type</th>
                                    <th>CheckIn Date</th>
                                    <th>CheckOut Date</th>
                                    <th>Total Price</th>                            
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @foreach($data as $booking)
                                <tr>
                                    <td>{{ date('H:i d-m-Y', strtotime($booking->created_at))}}</td>
                                    <td>{{$booking->room->title}}</td>
                                    <td>{{$booking->room->Roomtype->title}}</td>
                                    <td>{{ date('d-m-Y', strtotime($booking->checkin_date))}}</td>
                                    <td>{{ date('d-m-Y', strtotime($booking->checkout_date))}}</td>
                                    <td>{{number_format($booking->total, 0, ',', '.')}}VND</td>
                                    @if ($booking->payment_type == 'cod')
                                     <td><a href="{{url('booking/customer/'.$booking->customer_id.'/delete/'.$booking->id)}}" class="text-danger" onclick="return confirm('Are you sure you want to delete this booking?')"><i class="fa fa-trash"></i></a></td>
                                    @else
                                    <td></td>
                                     @endif
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @else
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-6 offset-3">
                    <div class="card-body">
                        <p class="card-text text-center">No Reservation.</p>
                    </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    @endif

@endsection