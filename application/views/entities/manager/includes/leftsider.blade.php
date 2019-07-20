<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ site_url('manager/beranda') }}" class="brand-link bg-primary">
        <img src="{{ asset('cpanel/img/logo.png') }}" alt="Logo" class="brand-image"
            style="opacity: .8">
        <span class="brand-text font-weight"><b>{{ getenv('APP_NAME') }}</b></span>
    </a>
    <!-- Profile panel -->
    <div class="user-profile d-flex">
        <div class="profile-canvas" style="background-image: linear-gradient(135deg,rgba(45,53,61,.79) 0,rgba(45,53,61,.5) 100%),url({{ asset('cpanel/img/bg.jpg') }})"></div>
        <a href="#" class="profile-link">
            <img src="{{ asset('cpanel/img/_manager.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text profile-text font-weight-light"><b>{{ $this->session->username }}</b> <i class="fa fa-cog"></i></span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2 sidebar-container">
            <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item {{ @$activeMenu == 'beranda' ? 'menu-open' : '' }}">
                    <a href="{{ site_url('manager/beranda') }}" class="nav-link {{ @$activeMenu == 'beranda' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
				</li>
				<li class="nav-item {{ @$activeMenu == 'kupon' ? 'menu-open' : '' }}">
                    <a href="{{ site_url('manager/kupon') }}" class="nav-link {{ @$activeMenu == 'kupon' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-percent"></i>
                        <p>
                            Kupon
                        </p>
                    </a>
				</li>
				<li class="nav-item {{ @$activeMenu == 'menu' ? 'menu-open' : '' }}">
                    <a href="{{ site_url('manager/menu') }}" class="nav-link {{ @$activeMenu == 'menu' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-cutlery"></i>
                        <p>
                            Menu
                        </p>
                    </a>
                </li>
				<li class="nav-item {{ @$activeMenu == 'planning' ? 'menu-open' : '' }}">
                    <a href="{{ site_url('manager/planning') }}" class="nav-link {{ @$activeMenu == 'planning' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-tasks"></i>
                        <p>
                            Planning
                        </p>
                    </a>
				</li>
				<li class="nav-item {{ @$activeMenu == 'transaksi' ? 'menu-open' : '' }}">
						<a href="{{ site_url('manager/transaksi') }}" class="nav-link {{ @$activeMenu == 'transaksi' ? 'active' : '' }}">
							<i class="nav-icon fa fa-exchange"></i>
							<p>
								Transaksi
							</p>
						</a>
					</li>
				<li class="nav-item {{ @$activeMenu == 'pengguna' ? 'menu-open' : '' }}">
                    <a href="{{ site_url('manager/pengguna') }}" class="nav-link {{ @$activeMenu == 'pengguna' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Pengguna
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
