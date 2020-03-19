<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar fix-btn-menu-mb @if(Route::current()->getName() != 'index') hidden-xs @endif" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand hidden-xs" href="admin/dashboard">
					<marquee class="caption-text" direction="left"><i class="hot-icon"></i><span>Phần mềm ghi chú sức khỏe</span></marquee>
				</a>
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right acount-menu">
						@if(Auth::check())
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> {{Auth::user()->name}}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="logout"><i class="halflings-icon off"></i> Đăng xuất</a></li>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
	