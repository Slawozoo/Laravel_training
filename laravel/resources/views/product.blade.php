
@extends('product-layout')

@section('menu')
	@include('includes/menu')
@endsection

@section('content')

<!-- Slider Area -->
<section class="hero-slider">
		<!-- Single Slider -->
		<div class="single-slider">
			<div class="container">
				
					<div class="col-lg-9 offset-lg-3 col-12">
						
							<div class="row">
								<div class="col-lg-7 col-12">
									<div class="hero-text">
                                        <h2>{{$product->product_name}}</h2>
                                        <p>{!! $product->product_desc !!}</p>
                                        
                                       
									</div>
								</div>
							</div>
						
					</div>
				
			</div>
		</div>
		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->

    <article>
        
    </article>
        <a href="/">Go to Home Page</a>

@endsection