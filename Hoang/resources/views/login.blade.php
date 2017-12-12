@extends('layouts.master')

@section('content')

<section class="header_text sub">
	<img class="pageBanner" src="{{ asset('themes/images/pageBanner.png')}}" alt="New products" >
	<h4><span>LOGIN</span></h4>
</section>			
<section class="main-content">				
	<div class="row">
		<div class="span6">					
			<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>

			<form action="{{url('Login')}}" method="POST" role="form">
			    <fieldset>
					@if($errors->has('errorlogin'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{$errors->first('errorlogin')}}
					</div>
					@endif
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}" required="Email">
						@if($errors->has('email'))
							<p class="hxx">{{$errors->first('email')}}</p>
						@endif
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						@if($errors->has('password'))
							<p class="hxx">{{$errors->first('password')}}</p>
						@endif
					</div>
				
					
					{!! csrf_field() !!}
					<!-- <button type="submit" class="btn btn-primary">Đăng nhập</button> -->
					<div class="control-group">
						<input tabindex="3" class="btn btn-inverse large" type="submit" name="btnLogin" value="Sign into your account">
						<hr>
						<p class="reset">Recover your <a tabindex="4" href="Changepass" title="Forgot password">Forgot password !</a></p>
					</div>
				</fieldset>
			</form>
		</div>

	</div>
</section>					
@endsection