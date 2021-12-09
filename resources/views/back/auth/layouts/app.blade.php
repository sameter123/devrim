<!doctype html>
<html lang="tr">


<!-- Mirrored from codervent.com/syndron/demo/vertical/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Dec 2021 08:53:07 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{asset('public/back/')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{asset('public/back/')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{asset('public/back/')}}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('public/back/')}}/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('public/back/')}}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('public/back/')}}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('public/back/')}}/css/app.css" rel="stylesheet">
	<link href="{{asset('public/back/')}}/css/icons.css" rel="stylesheet">
	<title>Syndron - Bootstrap5 Admin Template</title>
</head>
@yield('content')
<!-- Bootstrap JS -->
	<script src="{{asset('public/back/')}}/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('public/back/')}}/js/jquery.min.js"></script>
	<script src="{{asset('public/back/')}}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('public/back/')}}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('public/back/')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	
	<!--app JS-->
	<script src="{{asset('public/back/')}}//js/app.js"></script>
</body>



</html>