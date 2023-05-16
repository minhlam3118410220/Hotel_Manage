@extends('frontlayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-6 offset-3">
           
                <div class="card-body">
                    <p class="card-text text-danger text-center">Your online payment booking is fail!!</p>
                </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Gallery Section Begin -->
<section class="gallery-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Gallery</span>
                    <h2>Discover Our Work</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="gallery-item set-bg" data-setbg="front/img/about/about-g1.jpg">
                    <div class="gi-text">
                        <h3>Room LuxuryNatural Grace </h3>
                    </div>
                </div>
                <div class="gallery-item set-bg" data-setbg="front/img/about/about-g2.jpg">
                    <div class="gi-text">
                        <h3>Curated Elegance</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="gallery-item large-item set-bg" data-setbg="front/img/about/about-g3.jpg">
                    <div class="gi-text">
                        <h3>Enriched Experiences</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery Section End -->
@endsection