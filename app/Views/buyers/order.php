<?= $this->extend('buyers/template/index') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="main-body">
        <div class="row">
            <?= $this->include('buyers/template/sidebar'); ?>
            <div class="col-lg-8">
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

                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($orders as $order) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $order['judul']; ?></td>
                                        <td><span class="badge text-bg-warning"><?= $order['status_order']; ?></span></td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Detail</a>
                                            <a href="" class="btn btn-sm btn-success"><i class="fas fa-comment-dots"></i> Chat</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>