<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"><a href="/admin/reports" class="btn btn-primary"><i class="ti ti-arrow-narrow-left"></i> Back</a></h5>
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div class="mb-3">
                            <img src="/img/services/<?= $orderDetail->foto; ?>" alt="" width="250">
                        </div>
                        <div class="mb-3">
                            <h3><?= $orderDetail->judul; ?></h3>
                        </div>
                        <div class="mb-3">
                            <p><?= $orderDetail->deskripsi; ?></p>
                        </div>
                        <div class="my-3 text-center">
                            <a href="/admin/sellers/detail/<?= $orderDetail->seller; ?>" class="text-decoration-none">
                                <img src="/img/seller/<?= $orderDetail->fotoSeller; ?>" alt="" width="40" height="40" class="rounded-circle me-2">
                                <p class="d-inline fs-5">@<?= $orderDetail->seller; ?></p>
                            </a>
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
                                    <input type="text" class="form-control" value="<?= $orderDetail->buyer; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Nama</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti ti-user"></i></span>
                                    <input type="text" class="form-control" value="<?= $orderDetail->nameBuyer; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                    <input type="email" class="form-control" value="<?= $orderDetail->emailBuyer; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">No HP</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti ti-brand-whatsapp"></i></span>
                                    <input type="tel" class="form-control" value="<?= $orderDetail->tlpBuyer; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="2" readonly><?= $orderDetail->alamatBuyer; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="fs-5 my-4 fw-bold"><i class="ti ti-shopping-cart"></i> Order Detail</h2>
                        <div class="mb-3">
                            <label for="" class="form-label">Service</label>
                            <input type="text" class="form-control" value="<?= $orderDetail->judul; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea name="message" id="message" class="form-control" rows="3" readonly><?= $orderDetail->pesan; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <?php if ($orderDetail->status_order === 'process') : ?>
                                <?php $bg = 'bg-warning'; ?>
                            <?php elseif ($orderDetail->status_order === 'approved') : ?>
                                <?php $bg = 'bg-primary'; ?>
                            <?php elseif ($orderDetail->status_order === 'success') : ?>
                                <?php $bg = 'bg-success'; ?>
                            <?php elseif ($orderDetail->status_order === 'rejected' || $orderDetail->status_order === 'cancelled') : ?>
                                <?php $bg = 'bg-danger'; ?>
                            <?php endif; ?>
                            <label for="" class="form-label">Status Order</label><br>
                            <span class="badge <?= $bg; ?>"><?= $orderDetail->status_order; ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status Payment</label><br>
                            <span class="badge text-bg-warning"><?= $orderDetail->status_pembayaran; ?></span>
                        </div>
                    </div>

                    <hr>

                    <div>
                        <h2 class="fs-5 my-4 fw-bold"><i class="ti ti-cash-banknote"></i> Offer Price</h2>
                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="price" value="<?= $orderDetail->harga; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>