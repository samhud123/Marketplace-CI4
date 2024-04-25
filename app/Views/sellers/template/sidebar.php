<ul id="sidebarnav">
    <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Home</span>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link <?php if ($title == "Seller | Dashboard") echo "active"; ?>" href="<?= base_url(); ?>seller" aria-expanded="false">
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
        <a class="sidebar-link <?php if ($title == "Seller | Services") echo "active"; ?>" href="<?= base_url(); ?>seller/services" aria-expanded="false">
            <span>
                <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Manage Services</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link <?php if ($title == "Seller | Orders") echo "active"; ?>" href="/seller/orders" aria-expanded="false">
            <span>
                <i class="ti ti-alert-circle"></i>
            </span>
            <span class="hide-menu">Manage Orders</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
            <span>
                <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">Withdrawal</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
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
        <a class="sidebar-link <?php if ($title == "Seller | Profile") echo "active"; ?>" href="<?= base_url(); ?>seller/profile" aria-expanded="false">
            <span>
                <i class="ti ti-user fs-6"></i>
            </span>
            <span class="hide-menu">My Profile</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
            <span>
                <i class="ti ti-user fs-6"></i>
            </span>
            <span class="hide-menu">Reset Password</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="<?= base_url(); ?>logout" aria-expanded="false">
            <span>
                <i class="ti ti-login"></i>
            </span>
            <span class="hide-menu">Logout</span>
        </a>
    </li>
</ul>