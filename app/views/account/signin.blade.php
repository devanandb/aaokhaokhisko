@extends('layout.default')
@section('content')



	<div class="row">
		<form action="{{ URL::route('account-sign-in') }}" method="post">
		<div class="col-lg-4 col-lg-offset-4">
			
			<div class="form-group">
				<label for="InputEmail">Email</label>
				<input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }}>
				@if($errors->has('email'))
					<div>
						<span class="label label-danger">{{ $errors->first('email') }}</span>
					</div>
				@endif
			</div>
			<div class="form-group">
				<label for="InputPassword">Password</label>
				<input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password">
				@if($errors->has('password'))
					<div>
						<span class="label label-danger">{{ $errors->first('password') }}</span>
					</div>
				@endif
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember" id="remember"> Remember Me
				</label>
			</div>
			<button type="submit" class="btn btn-default">Sign In</button>
			{{ Form::token() }}
		</div>
		
	
		</form>
	</div>

	<div>
		<a href="{{ URL::route('account-forgot-password') }}">Forgot Password?</a>
	</div>


	<!-- <input type="submit" value="Create Account"> -->
	


@stop