@extends('layout.default')
@section('content')
<form action="{{ URL::route('account-create') }}" method="post">


	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">
			<div class="form-group">
				<label for="InputFullname">Full Name</label>
				<input type="text" name="fullname" class="form-control" id="InputFullname" placeholder="Enter Full name"{{ (Input::old('fullname')) ? ' value="' . e(Input::old('fullname')) . '"' : '' }}>
				@if($errors->has('fullname'))
					<div>
						<span class="label label-danger">{{ $errors->first('fullname') }}</span>
					</div>
				@endif
			</div>
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
			<div class="form-group">
				<label for="InputConfirmPassword">Confirm Password</label>
				<input type="password" name="confirm_password" class="form-control" id="InputConfirmPassword" placeholder="Confirm Password">
				@if($errors->has('confirm_password'))
					<div>
						<span class="label label-danger">{{ $errors->first('confirm_password') }}</span>
					</div>
				@endif
			</div>
			<button type="submit" class="btn btn-default">Create Account</button>
		</div>
	</div>


	<!-- <input type="submit" value="Create Account"> -->
	{{ Form::token() }}
	
</form>
@stop