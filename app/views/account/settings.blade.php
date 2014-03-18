@extends('layout.default')
@section('content')
<br>
<br>
<!-- <div class="row">
	<div class="col-lg-3">
		<div class="list-group">
			<a href="#" class="list-group-item active">Change Password</a>
			<a href="#" class="list-group-item">Dapibus ac facilisis in</a>
		</div>
	</div>
</div> -->
<!-- Nav tabs -->
<div class="tabs-left">
	<ul class="nav nav-tabs nav-left">
		<li class="active"><a href="#changePassword" data-toggle="tab">Password</a></li>
		<li><a href="#profile" data-toggle="tab">Profile</a></li>
		<li><a href="#messages" data-toggle="tab">Messages</a></li>
		<li><a href="#settings" data-toggle="tab">Settings</a></li>
	</ul>
	
	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane active" id="changePassword">

			<h3>Change your password</h3>
			
			<div>
				<form action="{{ URL::route('account-password') }}" method="post">

					<div class="row">
						<div class="col-lg-4 col-lg-offset-2">
							
							<div class="form-group">
								<label for="InputOldPassword">Old Password</label>
								<input type="password" name="old_password" class="form-control" id="InputOldPassword" placeholder="Old Password">
								@if($errors->has('old_password'))
									<div>
										<span class="label label-danger">{{ $errors->first('old_password') }}</span>
									</div>
								@endif
							</div>

							<div class="form-group">
								<label for="InputNewPassword">New Password</label>
								<input type="password" name="password" class="form-control" id="InputNewPassword" placeholder="New Password">
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
							
						</div>
					</div>
					<input type="submit" value="Change">
					{{ Form::token() }}
				</form>
			</div>

		</div>
		<div class="tab-pane" id="profile">profile</div>
		<div class="tab-pane" id="messages">messages</div>
		<div class="tab-pane" id="settings">...</div>
	</div>
</div>
@stop