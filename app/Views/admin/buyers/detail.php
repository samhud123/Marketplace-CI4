<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<a href="/admin/buyers" class="btn btn-primary"><i class="ti ti-arrow-narrow-left"></i> Back</a>
<div class="main-body">
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/img/buyer/<?= $buyer->foto; ?>" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h4><?= $buyer->nama; ?></h4>
                            <p class="text-muted font-size-sm"><?= $buyer->username; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $buyer->nama; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $buyer->username; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $buyer->email; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $buyer->no_tlp; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $buyer->alamat; ?>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col">
            <h5 class="card-title fw-semibold mb-4">Order History</h5>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Service</th>
                                <th>Seller</th>
                                <th>Date</th>
                                <th>Status Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $order['judul']; ?></td>
                                    <td>
                                        <h6 class="fw-semibold mb-1"><?= $order['username']; ?></h6>
                                        <span class="fw-normal"><?= $order['email']; ?></span>
                                    </td>
                                    <td>
                                        <?php $date = new DateTime($order['created_at']); ?>
                                        <p class="mb-0 fw-normal"><?= $date->format('d F Y'); ?></p>
                                        <span><?= $date->format('H:i:s'); ?></span>
                                    </td>
                                    <td>
                                        <?php if ($order['status_order'] === 'process') : ?>
                                            <?php $bg = 'bg-warning'; ?>
                                        <?php elseif ($order['status_order'] === 'approved') : ?>
                                            <?php $bg = 'bg-primary'; ?>
                                        <?php elseif ($order['status_order'] === 'success') : ?>
                                            <?php $bg = 'bg-success'; ?>
                                        <?php elseif ($order['status_order'] === 'rejected' || $order['status_order'] === 'cancelled') : ?>
                                            <?php $bg = 'bg-danger'; ?>
                                        <?php endif; ?>
                                        <span class="badge <?= $bg; ?> rounded-3 fw-semibold"><?= $order['status_order']; ?></span>
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
<?= $this->endSection(); ?>