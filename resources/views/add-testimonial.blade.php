@extends('frontlayout')
@section('content')

<section class="blog-details-section m-b-20">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="blog-details-text">					
					<div class="leave-comment">
						<h4>Add Testimonial</h4>
						@if(Session::has('success'))
						<p class="text-success">{{session('success')}}</p>
						@endif
						<form method="post" action="{{url('customer/save-testimonial')}}" class="comment-form">
							@csrf
							<div class="row">
								<div class="col-lg-12 text-center">
									<textarea name="testi_cont" rows="5" placeholder="Messages"></textarea>
								</div>
								<div class="col-lg-12 text-center">
									<input type="submit" class="site-btn" value="Send Message" />
									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection