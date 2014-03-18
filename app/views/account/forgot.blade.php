@extends('layout.default')
@section('content')
<div class="row">
	<form action="{{ URL::route('account-forgot-password') }}" method="post">
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
			
			<button type="submit" class="btn btn-default">Send Mail</button>
			{{ Form::token() }}
		</div>
		
		
	</form>
</div>
@stop