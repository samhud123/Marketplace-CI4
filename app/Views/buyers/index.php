<?= $this->extend('buyers/template/index') ?>

<?= $this->section('content') ?>
<div class="bg-primary mb-4">
    <div class="container py-4">
        <h3 class="text-white mt-2">My Account</h3>
        <!-- Breadcrumb -->
        <nav class="d-flex mb-2">
            <h6 class="mb-0">
                <a href="<?= base_url(); ?>" class="text-white-50">Home</a>
                <span class="text-white-50 mx-2"> &gt; </span>
                <a href="/buyer" class="text-white"><u>Profile</u></a>
            </h6>
        </nav>
        <!-- Breadcrumb -->
    </div>
</div>

<?php if (session()->get('message')) : ?>
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <?= session()->get('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->get('errors')) : ?>
    <div class="container">
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <?php foreach (session()->get('errors') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4><?= user()->username; ?></h4>
                                <button type="button" class="btn btn-sm btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Change Picture
                                </button>
                            </div>
                        </div>
                        <hr class="my-4">
                        <ul class="list-group list-group-flush">
                            <a href="" class="text-decoration-none border-0 rounded-2">
                                <li class="list-group-item d-flex align-items-center flex-wrap border-0"><i class="fas fa-shopping-cart me-3"></i><span>Orders</span></li>
                            </a>
                            <hr>
                            <a href="" class="text-decoration-none border-0 rounded-2">
                                <li class="list-group-item d-flex align-items-center flex-wrap border-0"><i class="fas fa-history me-3"></i><span>History</span></li>
                            </a>
                            <hr>
                            <a href="" class="text-decoration-none border-0 rounded-2">
                                <li class="list-group-item d-flex align-items-center flex-wrap border-0"><i class="fas fa-key me-3"></i><span>Reset Password</span></li>
                            </a>
                            <hr>
                            <a href="/logout" class="text-decoration-none border-0 rounded-2">
                                <li class="list-group-item d-flex align-items-center flex-wrap border-0"><i class="fas fa-sign-out-alt me-3"></i><span>Logout</span></li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
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
                                    <input type="text" class="form-control" value="<?= user()->no_tlp; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea class="form-control" rows="3"><?= user()->alamat; ?></textarea>
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

<!-- Modal Change Profile-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>