<div class="p-3 text-center bg-white border-bottom">
    <div class="container">
        <div class="row gy-3">
            <!-- Left elements -->
            <div class="col-lg-2 col-sm-4 col-4">
                <a href="<?= base_url(); ?>" class="float-start">
                    <img src="<?= base_url(); ?>/img/logo.png" height="35" />
                </a>
            </div>
            <!-- Left elements -->

            <!-- Center elements -->
            <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                <div class="d-flex float-end">

                    <?php if (!(in_groups('Seller') || in_groups('Buyer') || in_groups('Admin'))) : ?>
                        <a href="<?= base_url(); ?>register" class="me-4 border rounded py-1 px-3 nav-link d-flex align-items-center" style="border-color: #0d6efd">
                            <i class="fas fa-store m-1 me-md-2 text-secondary"></i>
                            <p class="d-none d-md-block mb-0 text-secondary">
                                Become a Seller
                            </p>
                        </a>

                        <a href="<?= base_url(); ?>login" class="border rounded py-1 px-3 nav-link d-flex align-items-center" style="background-color: #0d6efd; color: white">
                            <i class="fas fa-user-alt m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0">Login</p>
                        </a>
                    <?php endif; ?>

                    <?php if (in_groups('Seller')) : ?>
                        <a href="/seller" class="border rounded py-1 px-3 nav-link d-flex align-items-center" style="background-color: #0d6efd; color: white">
                            <i class="fas fa-user-alt m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0">My Account</p>
                        </a>
                    <?php elseif (in_groups('Buyer')) : ?>
                        <a href="/buyer" class="border rounded py-1 px-3 nav-link d-flex align-items-center" style="background-color: #0d6efd; color: white">
                            <i class="fas fa-user-alt m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0">My Account</p>
                        </a>
                    <?php elseif (in_groups('Admin')) : ?>
                        <a href="/admin" class="border rounded py-1 px-3 nav-link d-flex align-items-center" style="background-color: #0d6efd; color: white">
                            <i class="fas fa-user-alt m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0">Admin Panel</p>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
            <!-- Center elements -->

            <!-- Right elements -->
            <div class="col-lg-5 col-md-12 col-12">
                <form action="/services" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" placeholder="Search..." />
                        <button class="btn btn-primary" type="submit" id="button-addon2">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <!-- Right elements -->
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                <a class="nav-link" href="#">About Us</a>
                <a class="nav-link" href="/categories">Categories</a>
                <a class="nav-link" href="/services">All Services</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar -->