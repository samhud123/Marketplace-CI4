<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>

<div class="mb-4" style="background-color: #00619a">
    <div class="container py-4">
        <?php if ($keyword === null) : ?>
            <h3 class="text-white mt-2">All Services</h3>
        <?php else : ?>
            <h3 class="text-white mt-2">Search -> <?= $keyword; ?></h3>
        <?php endif; ?>
        <!-- Breadcrumb -->
        <nav class="d-flex mb-2">
            <h6 class="mb-0">
                <a href="<?= base_url(); ?>" class="text-white-50">Home</a>
                <span class="text-white-50 mx-2"> &gt; </span>
                <a href="/services" class="text-white"><u>Services</u></a>
            </h6>
        </nav>
        <!-- Breadcrumb -->
    </div>
</div>

<div class="container">
    <div class="col-lg-12">
        <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
            <strong class="d-block py-2"><?= count($services); ?> Items found </strong>
            <div class="ms-auto">
                <select class="form-select d-inline-block w-auto border pt-1">
                    <option value="0">Best match</option>
                    <option value="1">Recommended</option>
                    <option value="2">High rated</option>
                    <option value="3">Randomly</option>
                </select>
                <div class="btn-group shadow-0 border">
                    <a href="#" class="btn btn-light" title="List view">
                        <i class="fa fa-bars fa-lg"></i>
                    </a>
                    <a href="#" class="btn btn-light active" title="Grid view">
                        <i class="fa fa-th fa-lg"></i>
                    </a>
                </div>
            </div>
        </header>

        <div class="row">
            <?php if (count($services) === 0) : ?>
                <div class="text-center">
                    <h6>No Data</h6>
                </div>
            <?php else : ?>
                <?php foreach ($services as $service) : ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                        <div class="card w-100 my-2 shadow-2-strong">
                            <img src="/img/services/<?= $service['foto']; ?>" class="card-img-top" height="180">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex flex-row">
                                    <h6 class="mb-1 me-1"><?= $service['judul']; ?></h6>
                                </div>
                                <div class="my-3">
                                    <a href="s/<?= $service['username']; ?>" class="text-decoration-none">
                                        <img src="/assets/images/profile/user-1.jpg" alt="" width="30" height="30" class="rounded-circle me-2">
                                        <p class="d-inline"><?= $service['username']; ?></p>
                                    </a>
                                </div>
                                <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                    <a href="/order?service=<?= $service['service_id']; ?>" class="btn btn-sm btn-primary shadow-0 me-1" style="background-color: #00619a"><i class="fas fa-shopping-cart"></i> Order</a>
                                    <a href="/services/detail/<?= $service['service_id']; ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>