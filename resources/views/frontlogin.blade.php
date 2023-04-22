@extends('frontlayout')
@section('content')

    
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0"  width="450">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block" style="background: url(https://media.cntraveler.com/photos/56799015c2ebbef23e7d927b/master/w_1200,c_limit/Hotelroom-Alamy.jpg); background-position: center; background-size: cover;"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                            </div>
                            @if(Session::has('error'))
                                <p class="text-danger">{{session('error')}}</p>
                            @endif
                            <form class="user" method="post" action="{{url('customer/login')}}">
                                @csrf                   
                                <div class="form-group ">
                                    <input required type="email" class="form-control form-control-user" name="email"  placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input required type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                </div>
                                <div class="form-group ">
                                    <input type="hidden" name="ref" value="front" />
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login" >
                                </div>
                                
                        
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{url('register')}}">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection