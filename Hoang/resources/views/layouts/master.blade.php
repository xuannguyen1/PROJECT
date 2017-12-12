
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Shopper</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">      
		<link href="{{ asset('bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
		
		<link href="{{ asset('themes/css/bootstrappage.css')}}" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="{{ asset('themes/css/flexslider.css')}}" rel="stylesheet"/>
		<link href="{{ asset('themes/css/main.css')}}" rel="stylesheet"/>
		<link href="{{ asset('css/style.css')}}" rel="stylesheet"/>
		<!-- scripts -->
		<script src="{{ asset('themes/js/jquery-1.7.2.min.js')}}"></script>
		<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>				
		<script src="{{ asset('themes/js/superfish.js')}}"></script>	
		<script src="{{ asset('themes/js/jquery.scrolltotop.js')}}"></script>
		<script src="{{ asset('themes/js/jquery.fancybox.js')}}"></script>
		<script>
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
		</script>
		

	</head>

	<body>
		<div id="top-bar" class="container">

			<div class="row">
				<div class="span4">

					<form action="SearchGD" class="search-wrapper cf" method="POST">
					{{ csrf_field()}}
						<input type="text" name="key" placeholder="Search here..." required="" class="po">
						<button type="submit" name="btnSearch" class="ba">Search</button>
						
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="/Yourcart">Your Cart</a></li>
							<li><a href="/Contact">Contact</a></li>
							<li><a href="/Register">Register</a></li>
							@if(Session::has('Fullname'))
							
							<li><a href="/Login">Xin chào! {{Session::get('Fullname')}}</a></li>
							
							<li><a href="{{url('Logout')}}">Logout</a></li>
							@else
							<li><a href="/Login">Login</a></li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
		<section class="navbar main-menu">
		<div class="navbar-inner main-menu" id="xun">	
			<!-- <img style="position:absolute; left:30px" src="themes/images/logo.png" class="site_logo" alt=""> -->
		<a href="/Home" id="phu" class="logo pull-left"><img src="{{ asset('/')}}/themes/images/logo.png" class="site_logo" alt="" /></a>
			<nav id="menu" class="pull-right">
				
				<ul>
				@foreach($menu['category'] as $item)
					<li><a>{{$item->name}}</a>
						<ul>
						@foreach($menu['parent'] as $val)
						@if($item->id_category === $val->parent)
							<li><a href="/child/{!!$val->id_category!!}" value="" name="test">{{$val->name}}</a></li>
							@endif
						@endforeach																													
						</ul>							
					</li>																					
				@endforeach	
				</ul>
				<br>
		
			</nav>
		</div>
	</section>
			@yield('content')
			<section id="footer-bar">
				<div class="row">
					<div class="span2">
						<h4>Menu</h4>
						<ul class="nav">
							<li><a href="/Home">Homepage</a></li>  
							<li><a href="/Register">Register</a></li>
							<li><a href="/Login">Login</a></li>
							<li><a href="/Contact">Contac Us</a></li>
							<li><a href="/Yourcart">Your Cart</a></li>

						</ul>					
					</div>
					<div class="span5">
						<h4>Contact</h4>
						<ul class="nav">	
							<li>FPT Software Hồ Chí Minh</li>
							<li>Tel:&nbsp;+(0283) 736 2323</li>
							<li>Address:&nbsp;The building F-Town, Lot T2, D1, Khu công nghệ cao Sài Gòn, P. Tân Phú, Q9, Tp.HCM, Việt Nam.</li>
							<li>Email:&nbsp;HoangNK3@fsoft.com.vn</li>								

							<ul>
							</div>
							<div class="span5">
								<p class="logo"><img src="{{ asset('themes/images/logo.png')}}" class="site_logo" alt=""></p>
								<p>Shopper is a reliable place to buy product</p>
								<p>Fast shipping</p>

							</div>					
						</div>	
			</section>
			<section id="copyright">
						<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>

		</div>	
		<!-- script -->
		<script src="{{ asset('themes/js/common.js')}}"></script>
		<script src="{{ asset('themes/js/jquery.flexslider-min.js')}}"></script>
					
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>
		<!-- endscript -->
	</body>
</html>
