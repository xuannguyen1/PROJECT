@extends('layouts.master')

@section('content')
<section class="header_text sub">
	<img class="pageBanner" src="{{ asset('themes/images/pageBanner.png')}}" alt="New products" >
	<h4><span>REGISTER</span></h4>
</section>			
<section class="main-content">				
	<div class="row">
		<form action="/Register" method="POST" class="form-stacked">
			<h4 class="title" id="tolo"><span class="text"><strong>Register</strong> Form</span></h4>	
			<input type="hidden" name="_token" value="{{ csrf_token() }}">	
			<div class="span5">		

				<fieldset>
					@if(isset($err))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{$err}}
					</div>
					@endif
					<div class="control-group">
						<label class="control-label">Username</label>
						<div class="controls">
							<input type="text" placeholder="Enter your username" class="input-xlarge" name="username" required="name">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Fullname</label>
						<div class="controls">
							<input type="text" placeholder="Enter your fullname" class="input-xlarge" name="fullname" required="name">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Address</label>
						<div class="controls">
							<input type="text" placeholder="Enter your address" class="input-xlarge" name="address" required>
						</div>
					</div>						                            
					<div class="control-group">
						<p>Now that we know who you are. I'm not a mistake! In a comic, you know how you can tell who the arch-villain's going to be?</p>
					</div>
					<hr>

				</fieldset>
			</div>
			<div class="span5">	

				<fieldset>
					<div class="control-group">
						<label class="control-label">Email address:</label>
						<div class="controls">
							<input type="Email" placeholder="Enter your email" class="input-xlarge" name="email" required="Email">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Password:</label>
						<div class="controls">
							<input type="password" placeholder="Enter your password" class="input-xlarge" name="password" required="password" data-toggle="tooltip" title="The first character must be capitalized and have 6 characters">
						</div>
					</div>	
					<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Create your account"></div>
				</fieldset>
			</div>
		</form>			
	</div>
</section>			
@endsection