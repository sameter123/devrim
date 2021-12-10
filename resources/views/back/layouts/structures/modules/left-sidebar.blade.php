<body>
	<div class="wrapper toggled">
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header text-center">
				<div>
					<img src="{{asset(env('ROOT').env('BACK').env('IMAGES').'favicon-32x32.png')}}" class="logo-icon" alt="logo icon">
				</div>
                <div>
                    <img src="{{asset(env('ROOT').env('BACK').env('IMAGES').'text-logo.png')}}" class="w-75" alt="logo icon">
                </div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<ul class="metismenu" id="menu">
                <li {!! pageIsActive(route('panel')) !!}>
                    <a href="{{route('panel')}}">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Anasayfa</div>
                    </a>
                </li>
                @foreach(\App\Models\Modules::where('status', '1')->get() as $module)
                <li {!! pageIsActive(route($module->slug)) !!}>
                    <a href="{{route($module->slug)}}">
                        <div class="parent-icon"><i class='{{$module->icon}}'></i>
                        </div>
                        <div class="menu-title">{{$module->name}}</div>
                    </a>
                </li>
                @endforeach
			</ul>
		</div>
