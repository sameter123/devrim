<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					@include('back.layouts.structures.modules.header_menu.search')
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							
							@include('back.layouts.structures.modules.header_menu.dropdown-menu')
							@include('back.layouts.structures.modules.header_menu.notifications')
							@include('back.layouts.structures.modules.header_menu.messages')
						
						</ul>
					</div>
					@include('back.layouts.structures.modules.header_menu.user-menu')
				</nav>
			</div>
		</header>
		<!--end header -->