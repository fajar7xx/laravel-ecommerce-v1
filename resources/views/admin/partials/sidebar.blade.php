<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="#">
            <div class="logo-img">
               <img src="{{ asset('images/backend') }}/brand-white.svg" class="header-brand-img" alt="lavalite"> 
            </div>
            <span class="text">Ecommerce</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Navigation</div>
                <div class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Users</span></a>
                    <div class="submenu-content">
                        <a href="#" class="menu-item">Admin Users</a>
                        <a href="#" class="menu-item">Roles</a>
                        <a href="#" class="menu-item">Permissions</a>
                    </div>
                </div>
                <div class="nav-item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}"><i class="ik ik-settings"></i><span>Settings</span></a>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-settings"></i><span>Settings</span></a>
                    <div class="submenu-content">
                        <a href="#" class="menu-item">General</a>
                        <a href="#" class="menu-item">Site Logo</a>
                        <a href="#" class="menu-item">Footer & Seo</a>
                        <a href="#" class="menu-item">Social Links</a>
                        <a href="#" class="menu-item">Analitycs</a>
                        <a href="#" class="menu-item">Payments</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>