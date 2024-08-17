<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">MonJaMer</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">MJM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fas fa-columns"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{ Request::is('dashboard/controls') ? 'active' : '' }}">
                <a href="{{ route('dashboard.controls.index') }}" class="nav-link"><i class="far fa-calendar-alt"></i>
                    <span>History Monitoring</span></a>
            </li>

            <li class="dropdown {{ Request::is('dashboard/history/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i><span>History
                        Kontrol</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard/history/fan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.history.fan') }}">Kipas</a>
                    </li>
                    <li class="{{ Request::is('dashboard/history/humidifier') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.history.humidifier') }}">Pelembab</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
    </aside>
</div>
