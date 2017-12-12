@extends('layouts.master')

@section('content')	
<section class="header_text sub">
	<img class="pageBanner" src="{{ asset('themes/images/pageBanner.png')}}" alt="New products" >
	<h4><span>Change Password</span></h4>
</section>			
<section class="main-content">				
	<div class="row">
		<div class="span5">					
			<h4 class="title"><span class="text"><strong>Change Password</strong> Form</span></h4>
			<form action="{{url('Changepass')}}" method="POST">
			
				<input type="hidden" name="next" value="/">
				<fieldset>
					
					
						@if($errors->has('errormail'))
						<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{$errors->first('errormail')}}
						</div>
						
						@elseif($errors->has('errorchange'))
						<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{$errors->first('errorchange')}}
						</div>

						@elseif($errors->has('errorpass'))
						<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{$errors->first('errorpass')}}
						</div>
						@endif
					
					
					<!-- @if($errors->has('errorchange'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{$errors->first('errorchange')}}
					</div>
					@endif -->
						<div class="control-group">
							<label class="control-label">Email</label>
							<div class="controls">
								<div class="controls">
								<input type="text" name="email" id="email" class="input-xlarge" placeholder="name@gmail.com" required="Email" >
								@if($errors->has('email'))
									<p class="hxx">{{$errors->first('email')}}</p>
								@endif
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Password</label>
							<div class="controls">
								<input type="password" name="password" placeholder="Enter your password" id="password" class="input-xlarge" required="password" data-toggle="tooltip" title="The first character must be capitalized and have 6 characters">
								@if($errors->has('password'))
									<p class="hxx">{{$errors->first('password')}}</p>
								@endif
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Nhập lại Password</label>
							<div class="controls">
								<input type="password" name="password1" placeholder="Enter your password" id="password" class="input-xlarge" required="password1"
								data-toggle="tooltip" title="The first character must be capitalized and have 6 characters">
								@if($errors->has('password1'))
									<p class="hxx">{{$errors->first('password1')}}</p>
								@endif
							</div>
						</div>
						{{ csrf_field()}}
						<div class="control-group">
							<input tabindex="3" class="btn btn-inverse large" type="submit" name="btnSubmit" value="Sign into your account">
						</div>
					</div>

				</fieldset>
			</form>	

		</div>

	</div>
</section>			


@endsection