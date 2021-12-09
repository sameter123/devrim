<!doctype html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset(env('ROOT').env('BACK').env('IMAGES').'favicon-32x32.png')}}" type="image/png" />
	<link href="{{asset('public/back/')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{asset('public/back/')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{asset('public/back/')}}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="{{asset('public/back/')}}/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('public/back/')}}/js/pace.min.js"></script>
	<link href="{{asset('public/back/')}}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('public/back/')}}/css/app.css" rel="stylesheet">
	<link href="{{asset('public/back/')}}/css/icons.css" rel="stylesheet">
	<title></title>
</head>
@yield('content')
	<script src="{{asset('public/back/')}}/js/bootstrap.bundle.min.js"></script>
	<script src="{{asset('public/back/')}}/js/jquery.min.js"></script>
	<script src="{{asset('public/back/')}}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('public/back/')}}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('public/back/')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
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
<script src="{{asset('public/back/')}}//js/app.js"></script>
</body>
</html>
