<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('pages.dashboard') }}">UNIQUE COFFE</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">UC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>

                </ul>
            </li>

        <li class="menu-header">Management Users</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('user.index') }}">List Users</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('user.create') }}">Add Users</a>
                    </li>
                </ul>
            </li>
        </li>
        <li class="menu-header">Management Products</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Products</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('products.index') }}">List Products</a>
                    </li>
                    <li>
                        <a class="nav-link" href="">Add Products</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('category.index') }}">List Category</a>
                    </li>
                    <li>
                        <a class="nav-link" href="">Add Category</a>
                    </li>
                </ul>
            </li>
        </li>
    </aside>
</div>
