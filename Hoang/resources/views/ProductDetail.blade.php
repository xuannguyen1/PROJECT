@extends('layouts.master')

@section('content')
<section class="header_text sub">
	<img class="pageBanner" src="{{ asset('themes/images/pageBanner.png')}}" alt="New products" >
	<h4><span>Product Detail</span></h4>
</section>	

<section class="main-content">				
	<div class="row">						
		<div class="span9">
			<div class="row">
				<div class="span4">
					@foreach ($product['product'] as $key)
					<a href="#"><img alt="" src="{{url('/')}}/upload/{{$key->image}}"></a>		

				</div>

				<div class="span5">
					<address>
						<strong>Brand:</strong> <span>{{$key->trademark}}</span><br>
						<strong>Product Code:</strong> <span>{{$key->id_product}}</span><br>							
					</address>									
					<h4><strong>Price: {{$key->price}}</strong></h4>
				</div>

				<div class="span5">
					<form class="form-inline" action="cart" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<p>&nbsp;</p>
						<strong>Quantity:</strong>
						<input type="hidden" name="name" value="{{$key->productName}}">
						<input type="hidden" name="size" value="{{$key->size}}">
						<input type="hidden" name="color" value="{{$key->color}}">
						<input type="hidden" name="id" value="{{$key->id_product}}">
						<input type="hidden" name="image" value="{{$key->image}}">
						<input type="hidden" name="price" value="{{$key->price}}">
						<input type="number" min = "0" class="span1" placeholder="1" name = "quantity" value = "0"  />
						<button class="btn btn-inverse" type="submit">Add To Cart</button>
					</form>
				</div>							
			</div>
			<div class="row">
				<div class="span4" id="xu">
					<table>
						<tr>
							<td>
								<a href="#"><img  class="ha" alt="" src="{{url('/')}}/upload/{{$key->image_url}}"></a>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="span9">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#home">Description</a></li><!-- href="#home" -->
						<li class=""><a href="#profile">Additional Information</a></li><!-- href="#profile" -->
					</ul>							 
					<div class="tab-content">
						<div class="tab-pane active" id="home">{{$key->description}}</div>
						<div class="tab-pane" id="profile">
							<table class="table table-striped shop_attributes">	
								<tbody>
									<tr class="">
										<th>Size</th>
										<td>{{$key->size}}</td>
										
									</tr>		
									<tr class="alt">
										<th>Colour</th>
										<td>{{$key->color}}</td>
										
									</tr>
								</tbody>
							</table>
						</div>
					</div>							
				</div>	
				@endforeach					
				<br/>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span12" id="ta">
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
							@foreach ($product['related'] as $item2)
							<li class="span3">
								<form action="/ProductDetail" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" value="{{$item2->id_product}}" name="xuan">

										<div class="product-box">
											<span class="sale_tag"></span>
											<p><a href="/ProductDetail"><img class="h" src="{{url('/')}}/upload/{{$item2->image}}" alt="" /></a></p>
											<a class="title">{{$item2->productName}}</a><br/>
											<a class="category">{{$item2->description}}</a>
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
</section>			



<script>
	// $(function () {

	// 	$('#myTab a').click(function (e) {
	// 		alert(45456);
	// 	})
	// 	$('#myTab a:first').tab('show');
	// 	$('#myTab a').click(function (e) {
	// 		//e.preventDefault();
	// 		alert(3454);
	// 		$(this).tab('show');
	// 	})
	// });

	$(document).ready(function()
	 {
		$('.thumbnail').fancybox({
			openEffect  : 'none',
			closeEffect : 'none'
		});

		$('#myCarousel-2').carousel({
			interval: 2500
		});

		$('#myTab a:first').tab('show');
		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		})

	});
</script>

		
@endsection