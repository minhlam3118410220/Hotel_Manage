<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{asset('/')}}" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>A Hotel</title>


 
    {{-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> --}}

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">  

</head>

<body>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="front/img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
            </div>
            <a href="#" class="bk-btn ">Booking </a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./rooms.html">Rooms</a></li>
                <li><a href="./about-us.html">About Us</a></li>
                <li><a href="./pages.html">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./room-details.html">Room Details</a></li>
                        <li><a href="#">Deluxe Room</a></li>
                        <li><a href="#">Family Room</a></li>
                        <li><a href="#">Premium Room</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">News</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (12) 345 67890</li>
            <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> (+84) 893 456 7890</li>
                            <li><i class="fa fa-envelope"></i> info.Ahotel@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            
                            @if (Session::has('customerlogin'))
                            <a href="{{url('booking')}}" class="bk-btn">Booking </a>
                            <div class="language-option">    
                                <a href="{{url('logout')}}"><span><i class="fa fa-sign-out"></i> Logout</span></a>
                            </div>
                            @else
                            <a href="#" class="bk-btn">Booking </a>
                            <div class="language-option">                             
                                <a href="{{url('login')}}"><span><i class="fa fa-user"></i> Login</span></a>/
                                <a href="{{url('register')}}"><span> Register</span></a>                             
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="front/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{url('room')}}">Rooms</a></li>
                                    <li><a href="{{url('about-us')}}">About Us</a></li>
                                    <li><a href="{{url('blog')}}">Blogs</a></li>
                                    <li><a href="{{url('contact')}}">Contact</a></li>
                                    {{-- <li><a href="./pages.html">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./room-details.html">Room Details</a></li>
                                            <li><a href="./blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li> --}}
                                    @if (Session::has('customerlogin'))
                                    <li><a href="{{url('customer/add-testimonial')}}">Testimonial</a></li>
                                    @endif
                                    
                                    
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->


    <!-- Booking Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="container">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0"  width="450">
            <div class="row">
                <div class="col-lg-6" style="background: url(https://tse4.mm.bing.net/th?id=OIP.dK1654vPFRWOXmFLsHciYAHaE8&pid=Api&P=0); background-position: center; background-size: cover;">
                    
                </div>
                <div class=" col-lg-6  ">
                    <div class="booking-form">
                        <h3>Room Booking</h3>
                        @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <p class="text-danger">{{$error}}</p>
                                @endforeach
                        @endif

                        @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                        @endif
                        <form method="post" enctype="multipart/form-data" action="{{url('admin/booking')}}">
                            <div class="check-date">
                                @csrf
                                <label>CheckIn Date </label>
                                <input name="checkin_date" type="date" class="date-input checkin-date" />
                            </div>
                            <div class="check-date">
                                <label >CheckOut Date </label>
                                <input name="checkout_date" type="date" class="date-input" />
                            </div>
                            <div class="select-option">
                                <label >Avaiable Rooms </label>
                                <select class="nice-select room-list" name="room_id">

                                </select>
                                {{-- <br>
                                <label>Price :<span class="show-room-price"> </span></label> --}}
                            
                            </div>
                            <div class="check-date">
                                <label>Total Adults </label>
                                <input name="total_adults" type="text" class="date-input" />
                           </div>
                            <div class="check-date">
                                <label>Total Children </label>
                                <input name="total_children" type="text" class="date-input" />
                            </div>
                            <div  class="check-date">
                                <label>Price : <span class="show-room-price"></span> </label>
                            </div>
                            
                                <input type="hidden" name="customer_id" value="{{session('data')[0]->id}}" />
                                <input type="hidden" name="ref" value="front" />
                                <input type="hidden" name="roomprice" class="room-price" value="" />
                                <button type="submit">Room Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Booking Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @foreach ($roomTypes as $rtype)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item"> 
                    @foreach($rtype->roomtypeimgs as $key => $img)
                        @if($key == 0) 
                        <img src="{{asset('storage/'.str_replace('public/', '',$img->img_src)) }}" alt="">               
                        @endif
                    @endforeach
                        <div class="ri-text">
                            <h4>{{$rtype->title}}</h4>
                            <h3>{{number_format($rtype->price, 0, ',', '.')}} VND<span>/Pernight</span></h3>
                            <a href="{{url('room/'.$rtype->id)}}" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
               
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="front/img/footer-logo.png" alt="">
                                </a>
                            </div>
                            <p>Come join me for the best experience</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Contact Us</h6>
                            <ul>
                                <li>(+84) 893 456 789</li>
                                <li>info.sona@gmail.com</li>
                                <li>123 Nam Ki Khoi Nghia,Vo Thi Sau,District 3,Ho Chi Minh</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>New latest</h6>
                            <p>Get the latest updates and offers.</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul>
                            <li><a href="{{url('contact')}}">Contact</a></li>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Environmental Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="co-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  </a>
   </p></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->
   

   

    <script src="vendor/jquery/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".checkin-date").on('blur',function(){
                var _checkindate=$(this).val();
                
                $.ajax({
                    url:"{{url('admin/booking')}}/available-rooms/"+_checkindate,
                    dataType:'json',
                    beforeSend:function(){
                        $(".room-list").html('<option>--- Loading ---</option>');
                    },
                    success:function(res){
                        var _html='';
                        $.each(res.data,function(index,row){
                            _html+='<option data-price="'+row.roomtype.price+'" value="'+row.room.id+'">'+row.room.title+'-'+row.roomtype.title+'</option>';
                        });
                        $(".room-list").html(_html);
    
                        var _selectedPrice=$(".room-list").find('option:selected').attr('data-price');
                        $(".room-price").val(_selectedPrice);
                        $(".show-room-price").text(' '+_selectedPrice+' VND');
                    }
                });
            });
    
            $(document).on("change",".room-list",function(){
                var _selectedPrice=$(this).find('option:selected').attr('data-price');
                $(".room-price").val(_selectedPrice);
                $(".show-room-price").text(_selectedPrice);
            });
    
        });
    </script>

</body>

</html>