<?= $this->extend('buyers/template/index') ?>

<?= $this->section('content') ?>
<?php if (session()->get('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <?= session()->get('message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->get('errors')) : ?>
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
        <?php foreach (session()->get('errors') as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="container-fluid">
    <div class="main-body">
        <div class="row">
            <?= $this->include('buyers/template/sidebar'); ?>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/buyer/profile" method="post">
                            <?= csrf_field(); ?>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="hidden" name="id" value="<?= user()->id; ?>">
                                    <input type="text" class="form-control" name="nama" value="<?= user()->nama; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="username" value="<?= user()->username; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="email" value="<?= user()->email; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="no_tlp" value="<?= user()->no_tlp; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea class="form-control" name="alamat" rows="3"><?= user()->alamat; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary ">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>