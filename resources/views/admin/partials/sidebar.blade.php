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
                <div class="nav-item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}">
                  <a href="{{ route('admin.products.index') }}"><i class="ik ik-folder"></i><span>Products</span></a>
              </div>
                <div class="nav-item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}"><i class="ik ik-tag"></i><span>Categories</span></a>
                </div>
                <div class="nav-item {{ Route::currentRouteName() == 'admin.attributes.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.attributes.index') }}"><i class="ik ik-bookmark"></i><span>Attributes</span></a>
                </div>
                <div class="nav-item {{ Route::currentRouteName() == 'admin.attributes.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.brands.index') }}"><i class="ik ik-box"></i><span>Brands</span></a>
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
            </nav>
        </div>
    </div>
</div>