<?= $this->extend('buyers/template/index') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="main-body">
        <div class="row">
            <?= $this->include('buyers/template/sidebar'); ?>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <a href="/buyer/history" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <div class="mb-3">
                                <img src="/img/services/<?= $order->foto; ?>" alt="" width="250">
                            </div>
                            <div class="mb-3">
                                <h3><?= $order->judul; ?></h3>
                            </div>
                            <div class="mb-3">
                                <p><?= $order->deskripsi; ?></p>
                            </div>
                        </div>

                        <hr>

                        <div>
                            <h2 class="fs-5 my-4 fw-bold"><i class="ti ti-shopping-cart"></i> Order Detail</h2>
                            <div class="mb-3">
                                <label for="" class="form-label">Service</label>
                                <input type="text" class="form-control" value="<?= $order->judul; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea name="message" id="message" class="form-control" rows="3" readonly><?= $order->pesan; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status Order</label><br>
                                <span class="badge text-bg-warning"><?= $order->status_order; ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status Payment</label><br>
                                <?php if ($order->status_pembayaran == null) : ?>
                                    <span class="badge text-bg-warning">Unpaid</span>
                                <?php endif; ?>
                                <span class="badge text-bg-warning"><?= $order->status_pembayaran; ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Price</label><br>
                                <input type="text" class="form-control" value="Rp <?= $order->harga; ?>" readonly>
                            </div>
                        </div>

                        <hr>

                        <div>
                            <h2 class="fs-5 my-4 fw-bold"><i class="ti ti-user"></i> Seller Detail</h2>
                        </div>
                        <div class="justify-content-center">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" value="<?= $order->username; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Nama</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                        <input type="text" class="form-control" value="<?= $order->nama; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                        <input type="email" class="form-control" value="<?= $order->email; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">No HP</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        <input type="tel" class="form-control" value="<?= $order->no_tlp; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="2" readonly><?= $order->alamat; ?></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>