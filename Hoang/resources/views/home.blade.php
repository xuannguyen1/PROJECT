@extends('layouts.master')

@section('content')
	
	<section  class="homepage-slider" id="home-slider">
		<div class="flexslider">
			
			<ul class="slides">
				<li>
					<img src="{{ asset('themes/images/carousel/banner-1.jpg')}}" alt="" />
				</li>
				<li>
					<img src="{{ asset('themes/images/carousel/banner-2.jpg')}}" alt="" />
					<div class="intro">
						<h1>Mid season sale</h1>
						<p><span>Up to 50% Off</span></p>
						<p><span>On selected items online and in stores</span></p>
					</div>
				</li>
			</ul>
		</div>			
	</section>
	<section class="header_text">
		<h4 class="x">There is no bad woman only the woman does not know beauty</h4>
	</section>
	<section class="main-content">
		<div class="row">
			<div class="span12">													
				<div class="row">
					<div class="span12">
						<h4 class="title">
							<span class="pull-left"><span class="text"><span class="line">Women <strong>Products</strong></span></span></span>
							<span class="pull-right">
								<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
							</span>
						</h4>
						<div id="myCarousel" class="myCarousel carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul class="thumbnails">						
									@foreach($women as $item)
										<li class="span3">
											<form action="/ProductDetail" method="post">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">	
													<div class="product-box">
														<button type="submit" value="{{$item['id_product']}}" name="xuan">
														<span class="sale_tag"></span>
														<p><a href="ProductDetail"><img class="h" src="{{url('/')}}/upload/{{$item['image']}}" alt="" /></a></p>
														<a href="ProductDetail" class="title">{{$item['productName']}}</a><br/>
														<a href="products.html" class="category">{{$item['description']}}</a>
														<p class="price">{{$item['price']}}</p>
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
		</div>
		<div class="row">
			<div class="span12">													
				<div class="row">
					<div class="span12">
						<h4 class="title">
							<span class="pull-left"><span class="text"><span class="line">Man <strong>Products</strong></span></span></span>
							<span class="pull-right">
								<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
							</span>
						</h4>
						<div id="myCarousel" class="myCarousel carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul class="thumbnails">							
									@foreach($men as $item1)
									<li class="span3">
										<form action="/ProductDetail" method="post">
											 <button type="submit" value="{{$item1['id_product']}}" name="xuan">		
											<input type="hidden" name="_token" value="{{ csrf_token() }}">												
												<div class="product-box">
													<span class="sale_tag"></span>
													<p><img class="h" src="{{url('/')}}/upload/{{$item1['image']}}" alt="" /></p>
													<a href="ProductDetail" class="title">{{$item1['productName']}}</a><br/>
													{{$item1['description']}}
													<p class="price">{{$item1['price']}}</p>
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
		</div>
		<div class="row">
			<div class="span12">													
				<div class="row">
					<div class="span12">
						<h4 class="title">
							<span class="pull-left"><span class="text"><span class="line">Kid <strong>Products</strong></span></span></span>
							<span class="pull-right">
								<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
							</span>
						</h4>
						<div id="myCarousel" class="myCarousel carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul class="thumbnails">							
									@foreach($kid as $item2)
									<li class="span3">
										<form action="/ProductDetail" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">	
											<button type="submit" value="{{$item2['id_product']}}" name="xuan">													
												<div class="product-box">
													<span class="sale_tag"></span>
													<p><a href="ProductDetail"><img class="h" src="{{url('/')}}/upload/{{$item2['image']}}" alt="" /></a></p>
													<a href="ProductDetail" class="title">{{$item2['productName']}}</a><br/>
													<a href="products.html" class="category">{{$item2['description']}}</a>
													<p class="price">{{$item2['price']}}</p>
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
		</div>
	</section>
	<section class="our_client">
		<h4 class="title"><span class="text">Manufactures</span></h4>
		<div class="row">					
			<div class="span2">
				<a href="#"><img alt="" src="{{ asset('themes/images/clients/14.png')}}"></a>
			</div>
			<div class="span2">
				<a href="#"><img alt="" src="{{ asset('themes/images/clients/35.png')}}"></a>
			</div>
			<div class="span2">
				<a href="#"><img alt="" src="{{ asset('themes/images/clients/1.png')}}"></a>
			</div>
			<div class="span2">
				<a href="#"><img alt="" src="{{ asset('themes/images/clients/2.png')}}"></a>
			</div>
			<div class="span2">
				<a href="#"><img alt="" src="{{ asset('themes/images/clients/3.png')}}"></a>
			</div>
			<div class="span2">
				<a href="#"><img alt="" src="{{ asset('themes/images/clients/4.png')}}"></a>
			</div>
		</div>
	</section>
					
			
@endsection