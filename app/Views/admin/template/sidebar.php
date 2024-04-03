<ul id="sidebarnav">
    <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Home</span>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link <?php if ($title == "Admin | Dashboard") echo "active"; ?>" href="/admin" aria-expanded="false">
            <span>
                <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
        </a>
    </li>
    <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Manage</span>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link <?php if ($title == "Admin | Categories") echo "active"; ?>" href="/admin/categories" aria-expanded="false">
            <span>
                <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Manage Categories</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link <?php if ($title == "Admin | Sellers") echo "active"; ?>" href="/admin/sellers" aria-expanded="false">
            <span>
                <i class="ti ti-building-store"></i>
            </span>
            <span class="hide-menu">Manage Sellers</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link <?php if ($title == "Admin | Buyers") echo "active"; ?>" href="/admin/buyers" aria-expanded="false">
            <span>
                <i class="ti ti-users"></i>
            </span>
            <span class="hide-menu">Manage Buyers</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="/" aria-expanded="false">
            <span>
                <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">Reports</span>
        </a>
    </li>
    <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">ACCOUNT</span>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link <?php if ($title == "Admin | Profile") echo "active"; ?>" href="<?= base_url(); ?>seller/profile" aria-expanded="false">
            <span>
                <i class="ti ti-user fs-6"></i>
            </span>
            <span class="hide-menu">My Profile</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="/" aria-expanded="false">
            <span>
                <i class="ti ti-key"></i>
            </span>
            <span class="hide-menu">Reset Password</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="/logout" aria-expanded="false">
            <span>
                <i class="ti ti-login"></i>
            </span>
            <span class="hide-menu">Logout</span>
        </a>
    </li>
</ul>