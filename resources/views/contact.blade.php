@extends('frontlayout')
@section('content')

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-text">
                        <h2>Contact Info</h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Address:</td>
                                    <td>123 Nam Ky Khoi Nghia, Vo Thi Sau, District 3</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Phone:</td>
                                    <td>(+84) 893 456 789 </td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email:</td>
                                    <td>info.sona@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="c-o">City/Location:</td>
                                    <td>Ho Chi Minh</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="text-danger">{{$error}}</p>
                    @endforeach
                    @endif
                        @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                    @endif
                    <form method="post" action="{{url('save-contactus')}}" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="full_name" placeholder="Full Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="email" placeholder="Email">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="subject" placeholder="Subject">
                            </div>
                            <div class="col-lg-12">
                                <textarea name="msg" placeholder="Message"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.321358674838!2d106.68581239442152!3d10.786680667895356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f2d9bf443ed%3A0xeb944875bc7fe0c7!2zMTIzIMSQLiBOYW0gS-G7syBLaOG7n2kgTmdoxKlhLCBWw7UgVGjhu4sgU8OhdSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1682132692435!5m2!1svi!2s" 
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" ></iframe>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection
    
