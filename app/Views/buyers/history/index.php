<?= $this->extend('buyers/template/index') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
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
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status Order</th>
                                    <th scope="col">Status Payment</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($orders as $order) : ?>
                                    <?php if ($order['status_order'] === 'cancelled' || $order['status_order'] === 'rejected' || $order['status_order'] === 'success') : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $order['judul']; ?></td>
                                            <?php if ($order['harga'] == NULL) : ?>
                                                <td>
                                                    <span class="badge text-bg-warning">-</span>
                                                </td>
                                            <?php else : ?>
                                                <td>Rp <?= number_format($order['harga'], '2', ',', '.'); ?></td>
                                            <?php endif; ?>
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
                                                <span class="badge <?= $bg; ?>"><?= $order['status_order']; ?></span>
                                            </td>
                                            <td><?= $order['status_pembayaran']; ?></td>
                                            <td>
                                                <a href="/buyer/history/detail/<?= $order['order_id']; ?>" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i> Detail</a>
                                                <a href="/buyer/history/comment/<?= $order['order_id']; ?>" class="btn btn-sm btn-primary"><i class="far fa-comment-dots"></i> Comment</a>
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
    </div>
</div>
<?= $this->endSection() ?>