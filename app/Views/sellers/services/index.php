<?= $this->extend('sellers/template/index') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Manage Service</h5>
        <a href="/seller/services/add" class="btn btn-primary mb-1">(+) Add New Service</a>
    </div>
</div>

<?php if (session()->get('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <?= session()->get('message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($services as $service) : ?>
        <div class="col">
            <div class="card h-100">
                <img src="/img/services/<?= $service['foto']; ?>" class="card-img-top" alt="..." style="height: 250px;">
                <div class="card-body">
                    <h5 class="card-title"><?= $service['judul']; ?></h5>
                    <div class="mb-2">
                        <span><b>Category : </b></span><span class="badge text-bg-primary"><?= $service['category_name']; ?></span>
                    </div>
                    <p class="card-text"><?= $service['deskripsi']; ?></p>
                    <a href="/seller/services/edit/<?= $service['service_id']; ?>" class="btn btn-secondary">Edit</a>
                    <form action="<?= base_url(); ?>seller/delService/<?= $service['service_id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>