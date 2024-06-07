<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List Transaction</h5>
        <form action="/admin/reports/search" method="get">
                <div class="input-group mb-3 w-50">
                    <input type="search" class="form-control" name="keyword" placeholder="Search Buyer or Seller..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="submit" id="button-addon2"><i class="ti ti-search"></i></button>
                </div>
            </form>
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
                            <h6 class="fw-semibold mb-0">Seller</h6>
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
                    <?php $no = 1; ?>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <h6 class="fw-semibold mb-1"><?= $order['buyer']; ?></h6>
                                <span class="fw-normal"><?= $order['emailBuyer']; ?></span>
                            </td>
                            <td>
                                <h6 class="fw-semibold mb-1"><?= $order['seller']; ?></h6>
                                <span class="fw-normal"><?= $order['emailSeller']; ?></span>
                            </td>
                            <td><?= $order['judul'] ?></td>
                            <td>
                                <?php $date = new DateTime($order['created_at']); ?>
                                <p class="mb-0 fw-normal"><?= $date->format('d F Y'); ?></p>
                                <span><?= $date->format('H:i:s'); ?></span>
                            </td>
                            <td>Rp <?= $order['harga'] ?></td>
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
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>