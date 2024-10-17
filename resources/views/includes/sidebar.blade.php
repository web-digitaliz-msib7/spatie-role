<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('assets') }}/images/brand/logo/logo.svg" alt="" />
        </a>
        
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow" href="/">
                    <i class="fa-solid fa-house nav-icon icon-xs me-2"></i>
                    Dashboard
                </a>
            </li>
            @can('view-product')
                <li class="nav-item">
                    <a class="nav-link has-arrow" href="{{ route('admin.products.index') }}">
                        <i class="fa-solid fa-shirt nav-icon icon-xs me-2"></i> Product
                    </a>
                </li>
            @endcan
            {{-- @endif --}}
            @can('view-order')
                <li class="nav-item">
                    <a class="nav-link has-arrow" href="{{ route('admin.orders') }}">
                        <i class="fa-solid fa-cart-shopping nav-icon icon-xs me-2"></i>
                        Order
                    </a>
                </li>
            @endcan

            <h6 class="navbar-heading text-muted px-3 mt-1">
                <span>Account</span>
            </h6>

            @can('view-user')
                <li class="nav-item">
                    <a class="nav-link has-arrow" href="{{ route('admin.users') }}">
                        <i class="fa-solid fa-users nav-icon icon-xs me-2"></i> Users
                    </a>
                </li>
            @endcan

            @can('view-admin-account')
                <li class="nav-item">
                    <a class="nav-link has-arrow" href="{{ route('admin.admin-accounts.index') }}">
                        <i class="fa-solid fa-person nav-icon icon-xs me-2"></i> Admin Account
                    </a>
                </li>
            @endcan

            <h6 class="navbar-heading text-muted px-3 mt-1">
                <span>Middleware</span>
            </h6>

            @role('super-admin')
                <li class="nav-item">
                    <a class="nav-link has-arrow" href="{{ route('admin.categories.index') }}">
                        <i class="fa-solid fa-list nav-icon icon-xs me-2"></i> Category
                    </a>
                </li>
            @endrole


            @role('super-admin')
                <li class="nav-item">
                    <a class="nav-link has-arrow" href="{{ route('admin.permissions.index') }}">
                        <i class="fa-solid fa-handshake nav-icon icon-xs me-2"></i>
                        Permission
                    </a>
                </li>
            @endrole
        </ul>
    </div>
</nav>
