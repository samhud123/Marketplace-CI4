<?= $this->extend('sellers/template/index') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold">Detail Orders</h5>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"><a href="/seller/orders" class="btn btn-primary">Back</a></h5>
            <?php if (session()->get('errors')) : ?>
                <div class="alert alert-danger mb-4">
                    <?php foreach (session()->get('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="card">
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
                        <h2 class="fs-5 mb-4 fw-bold"><i class="ti ti-user"></i> Buyer Detail</h2>
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
                                    <span class="input-group-text"><i class="ti ti-user"></i></span>
                                    <input type="text" class="form-control" value="<?= $order->nama; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                    <input type="email" class="form-control" value="<?= $order->email; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">No HP</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti ti-brand-whatsapp"></i></span>
                                    <input type="tel" class="form-control" value="<?= $order->no_tlp; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="2" readonly><?= $order->alamat; ?></textarea>
                            </div>
                        </div>
                    </div>

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
                    </div>

                    <hr>

                    <div>
                        <h2 class="fs-5 my-4 fw-bold"><i class="ti ti-cash-banknote"></i> Offer Price</h2>
                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="price" value="<?= $order->harga; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>