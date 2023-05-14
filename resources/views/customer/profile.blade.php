@extends('frontlayout')
@section('content')

  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0"  width="450">
            <div class="row">
                <div class="col-lg-6 "  >             
                    <div class="p-5" >
                        <div class="profile-picture" >
                            @if(!empty($data->photo))
                                <img src="{{  $data->photo }}" >
                            @else
                                <img src="{{ asset('front/img/avatar.jpg') }}">
                            @endif
                            
                        </div>
                            <p class="profile-name">{{$data->full_name}}</p>
                            <hr>
                        <div class="profile-details">
                            <p><strong>Email : </strong>{{$data->email}}</p>
                            <p><strong>Phone : </strong>{{$data->mobile}}</p>
                        </div>
                    </div>               
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                        </div>
                        <form class="user" enctype="multipart/form-data" method="post" action="{{url('customer/'.session('data')[0]->id)}}">
                            @csrf 
                            <p>Name</p>                
                            <div class="form-group ">
                                <input value="{{$data->full_name}}" type="text" class="form-control form-control-user" name="full_name" >
                            </div>
                            <p>Email</p>  
                            <div class="form-group">
                                <input value="{{$data->email}}" type="email" class="form-control form-control-user" name="email" >
                            </div>
                            <p>Photo</p>  
                            <div class="form-group">
                                <input class="form-control form-control-user" name="photo" type="file" >
                                <input type="hidden" name="prev_photo" value="{{$data->photo}}" />
                            </div>
                            <p>Phone</p>  
                            <div class="form-group">
                                <input value="{{$data->mobile}}" type="text" class="form-control form-control-user" name="mobile" >
                            </div>
                           
                            <div class="form-group ">      
                                <input type="submit" class="btn btn-primary" value="Update" >
                            </div>               
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection