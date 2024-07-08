<?= $this->extend('sellers/template/index') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold">Manage Orders</h5>
    </div>
</div>

<?php if (session()->get('errors')) : ?>
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
        <?= session()->get('errors'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Latest Orders</h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Buyer</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Service</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Date</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Price</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Status</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($orders as $order) : ?>
                            <?php if ($order['status_order'] === 'process' || $order['status_order'] === 'approved') : ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"><?= $i++; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1"><?= $order['username']; ?></h6>
                                        <span class="fw-normal"><?= $order['email']; ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal"><?= $order['judul']; ?></p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <?php $date = new DateTime($order['created_at']); ?>
                                        <p class="mb-0 fw-normal"><?= $date->format('d F Y'); ?></p>
                                        <span><?= $date->format('H:i:s'); ?></span>
                                    </td>
                                    <?php if ($order['harga'] == NULL) : ?>
                                        <td>
                                            <span class="badge bg-warning rounded-3 fw-semibold">-</span>
                                        </td>
                                    <?php else : ?>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">Rp <?= number_format($order['harga'], 2, '.', '.'); ?></p>
                                        </td>
                                    <?php endif; ?>
                                    <td class="border-bottom-0">
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
                                    <td class="border-bottom-0">
                                        <a href="/seller/orders/detail/<?= $order['order_id']; ?>" class="btn btn-success"><i class="ti ti-eye"></i> Detail</a>
                                        <a href="/seller/orders/invoice/<?= $order['order_id']; ?>" class="btn btn-info"><i class="ti ti-file-invoice fs-5"></i></a>
                                        <?php if ($order['status_order'] === 'process') : ?>
                                            <a href="/seller/orders/reject/<?= $order['order_id']; ?>" class="btn btn-danger"><i class="ti ti-x"></i> Reject</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>