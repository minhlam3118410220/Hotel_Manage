@extends('frontlayout')
@section('content')

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Sona A Luxury Hotel</h1>
                        <p>Here are the best hotel booking sites, including recommendations for international
                            travel and for finding old world Chic in Saigon.</p>
                        <a href="/room" class="primary-btn">Discover Now</a>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            @foreach ($banners as $banner)
                <div class="hs-item set-bg" data-setbg="{{$banner->banner_src}}"></div>
            @endforeach
          
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>Sona Hotel SaiGon</h2>
                        </div>
                        <p class="f-para">Sona Hotel Saigon is a little like an elegantly furnished boutique gallery. 
                            Interior spaces start your journey through local culture with collections of artwork, literature and artifacts. 
                            Each tells a captivating story about the locale, providing historic context with fascinating tidbits of information. 
                            More than a hotel, Sona Hotel Saigon is a work of art in itself, every nook lovingly embellished with pieces that connect to the greater story.</p>
                        <a href="#" class="primary-btn about-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="front/img/about/about-1.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="front/img/about/about-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What We Do</span>
                        <h2>Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($services as $service)
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="{{$service->small_desc}}"></i>
                        <h4>{{$service->title}}</h4>
                        <p>{{ substr($service->detail_desc,0,100)}}</p>
                    </div>
                </div>
                @endforeach
 
                
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">

                    @foreach ($roomTypes as $rtype)
                    <div class="col-lg-3 col-md-6">
                        @foreach($rtype->roomtypeimgs as $index => $img)
                        		@if($index == 0)
                                <div class="hp-room-item set-bg" data-setbg="{{$img->img_src }}">  
                        		@endif
                        @endforeach
                            <div class="hr-text">
                                <h3>{{$rtype->title}}</h3>
                                
                                <a href="{{url('room/'.$rtype->id)}}" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Testimonials</span>
                        <h2>What Customers Say?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">

                        @foreach ($testimonials as $index=>$testi)
                        <div class="ts-item" >
                            <p>{{$testi->testi_cont}}</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - {{$testi->customer->full_name}}</h5>
                            </div>
                        </div>
                        @endforeach
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Hotel News</span>
                        <h2>Our Blog & Event</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="front/img/blog/blog-1.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="#">Tremblant In Canada</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="front/img/blog/blog-2.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="#">Choosing A Static Caravan</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="front/img/blog/blog-3.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="#">Copper Canyon</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2022</div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection

    