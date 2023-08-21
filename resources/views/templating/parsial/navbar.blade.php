<div id="header" class="app-header">
<!-- BEGIN navbar-header -->
			<div class="navbar-header">
				<a href="#" class="navbar-brand"><img src ="{{ asset ('static/manggala.png')}}"><b>MCR</b> Production</a>
				<button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- END navbar-header -->
			<!-- BEGIN header-nav -->
			<div class="navbar-nav">
				<div class="navbar-item navbar-form">
					<form action="" method="POST" name="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter keyword">
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>

				<div class="navbar-item navbar-user dropdown">
					<a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
						<span>
							<span class="d-none d-md-inline"> {{ Auth::user()->name }}</span>
							<b class="caret"></b>
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end me-1">
						<a href="{{ route('profile.edit') }}" class="dropdown-item">Edit Profile</a>
						{{--  <a href="email_inbox.html" class="dropdown-item d-flex align-items-center">
							Inbox
							<span class="badge bg-danger rounded-pill ms-auto pb-4px"></span>
						</a>  --}}
						{{--  <a href="#" class="dropdown-item">Calendar</a>  --}}
						{{--  <a href="#" class="dropdown-item">Settings</a>  --}}
						<div class="dropdown-divider"></div>
						<a href="logout" class="dropdown-item">Log Out</a>
					</div>
				</div>
			</div>
			<!-- END header-nav -->
</div>
