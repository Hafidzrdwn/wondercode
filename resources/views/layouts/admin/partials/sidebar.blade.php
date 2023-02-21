<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('user.index') }}">WonderCode</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="@if(Request::is('admin/dashboard')) active @endif"><a class="nav-link"
                href="{{ route('dashboard.index') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Master User</li>
        <li class="nav-item dropdown @if(Request::is('admin/user*', 'admin/user-profile', 'admin/user-medsos')) active @endif">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Master User</span></a>
            <ul class="dropdown-menu">
                <li class="@if(Request::is('admin/user*')) active @endif"><a class="nav-link" href="{{ route('user.index') }}">Data User</a></li>
                <li class="@if(Request::is('admin/user-profile')) active @endif"><a class="nav-link" href="{{ route('user-profile.index') }}">Data User Profile</a></li>
                <li class="@if(Request::is('admin/user-medsos')) active @endif"><a class="nav-link" href="{{ route('user-medsos.index') }}">Data User Medsos</a></li>
            </ul>
        </li>
    </ul>
</aside>
