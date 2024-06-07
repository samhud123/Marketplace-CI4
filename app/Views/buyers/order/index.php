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
                                                <td>Rp <?= $order['harga']; ?></td>
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
                                                        <form action="/buyer/order/confirm/<?= $order['order_id']; ?>" method="post">
                                                            <div class="mt-2">
                                                                <input type="hidden" name="harga" value="<?= $order['harga']; ?>">
                                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Confirm</button>
                                                            </div>
                                                        </form>
                                                    <?php endif; ?>
                                                <?php elseif ($order['status_order'] == 'approved') : ?>
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