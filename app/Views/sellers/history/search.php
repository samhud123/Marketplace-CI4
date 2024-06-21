<?= $this->extend('sellers/template/index') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold">Reports</h5>
    </div>
</div>

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Order History</h5>
            <form action="/seller/history/search" method="get">
                <div class="input-group mb-3 w-50">
                    <input type="search" class="form-control" name="keyword" placeholder="Search Buyer..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="submit" id="button-addon2"><i class="ti ti-search"></i></button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle" id="user-table">
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
                            <?php if ($order['status_order'] === 'cancelled' || $order['status_order'] === 'rejected' || $order['status_order'] === 'success') : ?>
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
                                        <a href="/seller/history/detail/<?= $order['order_id']; ?>" class="btn btn-success"><i class="ti ti-eye"></i> Detail</a>
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