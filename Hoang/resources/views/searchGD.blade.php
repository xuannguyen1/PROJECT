@extends('layouts.master')

@section('content')

<section class="header_text sub">
	<img class="pageBanner" src="{{ asset('themes/images/pageBanner.png')}}" alt="New products" >
	<h4><span>SEARCH</span></h4>
</section>			
<section class="main-content">
	<div class="row">
		@if(isset($err))
		<div class="span12">
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{{$err}}
			</div>
		</div>
		<div class="span12">													
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">New <strong>Products</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails">	

								@foreach($newpro as $item3)
								<li class="span3">
									<form action="ProductDetail" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									
										<button type="submit" value="{{$item3->id_product}}" name="xuan">													
											<div class="product-box">
												<span class="sale_tag"></span>
												<p><a href="ProductDetail"><img class="h" src="{{url('/')}}/upload/{{$item3->image}}" alt="" /></a></p>
												<a href="ProductDetail" class="title">{{$item3->productName}}</a><br/>
												<a href="products.html" class="category">{{$item3->description}}</a>
												<p class="price">{{$item3->price}}</p>
											</div>
										</button>
										
									</form>
								</li>
								@endforeach			
							
								</ul>
							</div>

						</div>							
					</div>
				</div>						
			</div>
		</div>
		@else
		<div class="span12">													
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line"><!-- Feature <strong> -->Products</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails">	

								@foreach($result['search'] as $item)
								<li class="span3">
									<form action="ProductDetail" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									
										<button type="submit" value="{{$item->id_product}}" name="xuan">													
											<div class="product-box">
												<span class="sale_tag"></span>
												<p><a href="ProductDetail"><img class="h" src="{{url('/')}}/upload/{{$item->image}}" alt="" /></a></p>
												<a href="ProductDetail" class="title">{{$item->productName}}</a><br/>
												<a href="products.html" class="category">{{$item->description}}</a>
												<p class="price">{{$item->price}}</p>
											</div>
										</button>
										
									</form>
								</li>
								@endforeach			
							
								</ul>
							</div>

						</div>							
					</div>
				</div>						
			</div>
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Related <strong> Products</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel-2" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails">							
								@foreach($result['related'] as $item2)
								<li class="span3">
									<form action="ProductDetail" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									
										<button type="submit" value="{{$item2->id_product}}" name="xuan">													
											<div class="product-box">
												
												<span class="sale_tag"></span>
												<p><a href="/ProductDetail"><img class="h" src="{{ url('/')}}/upload/{{$item2->image}}" alt="" /></a></p>
												<a href="/ProductDetail" class="title">{{$item2->productName}}</a><br/>
												<a href="/ProductDetail" class="category">{{$item2->description}}</a>
												<p class="price">{{$item2->price}}</p>
											</div>
										</button>
										
									</form>
								</li>
								@endforeach	
									
								</ul>
							</div>
						</div>							
					</div>
				</div>						
			</div>
			<br/>

			<div class="row feature_box">						
				<div class="span4">
					<div class="service">
						<div class="responsive">	
							<img src="{{ asset('themes/images/feature_img_2.png')}}" alt="" />
							<h4>MODERN <strong>DESIGN</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
						</div>
					</div>
				</div>
				<div class="span4">	
					<div class="service">
						<div class="customize">			
							<img src="{{ asset('themes/images/feature_img_1.png')}}" alt="" />
							<h4>FREE <strong>SHIPPING</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="service">
						<div class="support">	
							<img src="{{ asset('themes/images/feature_img_3.png')}}" alt="" />
							<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>	
			</div>		
		</div>
		@endif				
	</div>
</section>
	
@endsection
