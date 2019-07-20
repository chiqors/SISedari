@extends('entities.auth.layouts.auth')

@section('content')
<div class="login-box">
	<div class="login-logo">
		<a href="{{ site_url('dashboard') }}">SiSedari</a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<form action="{{ site_url('auth/do_login') }}" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" name="username" placeholder="Username">
					<div class="input-group-append">
						<span class="fa fa-user input-group-text"></span>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" name="password" placeholder="Password">
					<div class="input-group-append">
						<span class="fa fa-lock input-group-text"></span>
					</div>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<!-- /.login-box -->
@endsection
