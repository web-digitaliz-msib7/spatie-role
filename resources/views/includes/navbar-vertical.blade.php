<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('assets') }}/images/brand/logo/logo.svg" alt="" />
        </a>
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow" href="/">
                    <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                </a>
            </li>
            {{-- @if(Auth::check()) --}}
            @can('show-product')
            <li class="nav-item">
                <a class="nav-link has-arrow" href="{{ route('admin.product') }}">
                    <i data-feather="box" class="nav-icon icon-xs me-2"></i> Product
                </a>
            </li>
            @endcan
            {{-- @endif --}}
            @can('show-order')
            <li class="nav-item">
                <a class="nav-link has-arrow" href="{{ route('admin.orders') }}">
                    <i data-feather="shopping-cart" class="nav-icon icon-xs me-2"></i> Order
                </a>
            </li>
            @endcan

            @can('show-user')
            <li class="nav-item">
                <a class="nav-link has-arrow" href="{{ route('admin.users') }}">
                    <i data-feather="users" class="nav-icon icon-xs me-2"></i> Users
                </a>
            </li>
            @endcan

            @role('super-admin')
            <li class="nav-item">
                <a class="nav-link has-arrow" href="{{ route('admin.accounts') }}">
                    <i data-feather="user" class="nav-icon icon-xs me-2"></i> Admin Account
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link has-arrow" href="{{ route('admin.permissions') }}">
                    <i data-feather="lock" class="nav-icon icon-xs me-2"></i> Permission
                </a>
            </li>
            @endrole
        </ul>
    </div>
</nav>
