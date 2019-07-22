@include('layouts.public-header')
<div class="container">
	<div class="content">
			<div class="title m-b-md">Sign in</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
				<form method="POST" onsubmit="return userSignIn();" name="user-signin">
					<div class="form-group">
						<label for="username">Username or Email Address</label>
						<input type="text" class="form-control" placeholder="Enter username or email" name="username" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" placeholder="Enter your password" name="password" required>
					</div>
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" name="remember-user">
						<label class="form-check-label" for="remember-user">Remember username</label>
					</div>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<button type="submit" class="btn btn-primary">Sign In</button>
				</form>
			</div>
		</div>
	</div>
</div>
@include('layouts.public-footer')