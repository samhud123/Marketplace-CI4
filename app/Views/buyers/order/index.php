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
                                    <th scope="col">Price</th>
                                    <th scope="col">Status Order</th>
                                    <th scope="col">Status Payment</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($orders as $order) : ?>
                                    <?php if ($order['status_order'] === 'process' || $order['status_order'] === 'approved') : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $order['judul']; ?></td>
                                            <?php if ($order['harga'] == NULL) : ?>
                                                <td>
                                                    <span class="badge text-bg-warning">-</span>
                                                </td>
                                            <?php else : ?>
                                                <td>Rp <?= number_format($order['harga'], 2, ',', '.'); ?></td>
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
                                                <a href="/buyer/order/datail/<?= $order['order_id']; ?>" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i> Detail</a>
                                                <!-- <a href="" class="btn btn-sm btn-success"><i class="fas fa-comment-dots"></i> Chat</a> -->
                                                <?php if ($order['status_order'] == 'process') : ?>
                                                    <a href="/buyer/order/cancel/<?= $order['order_id']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Cancel</a>
                                                    <?php if ($order['harga'] !== Null) : ?>
                                                        <a href="/buyer/order/invoice/<?= $order['order_id']; ?>" class="btn btn-sm btn-info text-white"><i class="fas fa-file-invoice-dollar"></i> Invoice</a>
                                                        <button type="button" class="btn btn-sm btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#konfirmasi<?= $order['order_id']; ?>">
                                                            <i class="fas fa-check"></i>Confirm
                                                        </button>
                                                        <div class="modal fade" id="konfirmasi<?= $order['order_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload File</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="/buyer/order/confirm/<?= $order['order_id']; ?>" method="post" enctype="multipart/form-data">
                                                                        <?= csrf_field(); ?>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="harga" value="<?= $order['harga']; ?>">
                                                                            <div>
                                                                                <label for="file_zip">Project File Materials</label>
                                                                                <input type="file" name="file_zip" id="file_zip" accept=".zip" class="form-control" required>
                                                                                <small id="file_zip" class="form-text text-danger">Upload in .zip file format</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Confirm</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php elseif ($order['status_order'] == 'approved') : ?>
                                                    <a href="/buyer/order/invoice/<?= $order['order_id']; ?>" class="btn btn-sm btn-info text-white"><i class="fas fa-file-invoice-dollar"></i> Invoice</a>
                                                    <?php if ($order['status_pembayaran'] == 'settlement') : ?>
                                                        <a href="/buyer/order/finish/<?= $order['order_id']; ?>" class="btn btn-sm btn-success">Finish</a>
                                                    <?php else : ?>
                                                        <button id="pay-button_<?= $order['order_id']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-wallet"></i> Bayar</button>
                                                    <?php endif; ?>
                                                    <!-- <a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-wallet"></i> Bayar</a> -->
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
                                    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-CeimdajizKz2h_js"></script>
                                    <script type="text/javascript">
                                        document.getElementById('pay-button_<?= $order["order_id"]; ?>').onclick = function() {
                                            // SnapToken acquired from previous step
                                            snap.pay('<?= $order['token'] ?>', {
                                                // Optional
                                                onSuccess: function(result) {
                                                    send_result_to_server<?= $order['order_id'] ?>(result);
                                                },
                                                // Optional
                                                onPending: function(result) {
                                                    send_result_to_server<?= $order['order_id'] ?>(result);
                                                },
                                                // Optional
                                                onError: function(result) {
                                                    send_result_to_server<?= $order['order_id'] ?>(result);
                                                },
                                                onClose: function() {
                                                    alert('Payment popup closed without finishing the payment');
                                                }
                                            });
                                        };

                                        function send_result_to_server<?= $order['order_id'] ?>(result) {
                                            var form = document.createElement("form");
                                            form.setAttribute("method", "POST");
                                            form.setAttribute("action", "/buyer/order/payment/<?= $order['order_id'] ?>");
                                            var hiddenField = document.createElement("input");
                                            hiddenField.setAttribute("type", "hidden");
                                            hiddenField.setAttribute("name", "result_data");
                                            hiddenField.setAttribute("value", JSON.stringify(result));
                                            form.appendChild(hiddenField);
                                            document.body.appendChild(form);
                                            form.submit();
                                        }
                                    </script>
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