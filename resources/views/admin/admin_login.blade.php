<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Trang quản lý Admin</title>
    <!-- google font -->
    <base href="{{ asset('') }}public/backend/">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="plugins/iconic/css/material-design-iconic-font.min.css">
    <!-- bootstrap -->
	<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="css/pages/extra_pages.css">
	<!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" /> 
</head>
<body>
    <div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				
				@if(Session::has('thongbao'))
				<div class="alert alert-danger" role="alert">
					{!! Session('thongbao') !!}
				  </div>
					
				@endif
				<form class="login100-form validate-form" method="POST">
					{{ csrf_field() }}
					<span class="login100-form-logo">
						<i class="zmdi zmdi-flower"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Nhớ đăng nhập
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đăng nhập
						</button>
					</div>
					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Quên mật khẩu?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- start js include path -->
    <script src="plugins/jquery/jquery.min.js" ></script>
    <!-- bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="js/pages/extra_pages/login.js" ></script>
    <!-- end js include path -->
</body>
</html>