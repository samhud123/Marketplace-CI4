<?= $this->extend('sellers/template/index') ?>

<?= $this->section('content') ?>
<div class="mb-4">
    <div class="card border-left-primary shadow h-75 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= $wallet == NULL ? '0' : number_format($wallet['saldo'], 2, ',', '.'); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (session()->get('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <?= session()->get('message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (session()->get('errors')) : ?>
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
        <?= session()->get('errors'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if ($wallet == null || ($wallet['no_wallet'] && $wallet['nama_wallet']) == null) : ?>
    <div class="card">
        <div class="card-header">
            <h5 class="fw-bold">Input form withdrawal</h5>
        </div>
        <form action="/seller/wd/norek" method="post">
            <?= csrf_field(); ?>
            <?php if ($wallet != null) : ?>
                <input type="hidden" name="wallet_id" value="<?= $wallet['id']; ?>">
            <?php endif; ?>
            <div class="card-body">
                <div class="mb-3">
                    <label for="wd">Withdrawal method</label>
                    <select name="wd" id="wd" class="form-control" required>
                        <option selected disabled>-- Select a withdrawal method --</option>
                        <option value="Dana">Dana</option>
                        <option value="ShopeePay">ShopeePay</option>
                        <option value="OVO">OVO</option>
                        <option value="BRI">BRI</option>
                        <option value="BNI">BNI</option>
                        <option value="Mandiri">Mandiri</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="no">Enter the account number</label>
                    <input type="number" class="form-control" name="no" required>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
<?php else : ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Withdrawal method</h6>
                </div>
                <div class="col-sm-9 text-primary">
                    <?= $wallet['nama_wallet']; ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Account number</h6>
                </div>
                <div class="col-sm-9 text-primary">
                    <?= $wallet['no_wallet']; ?>
                </div>
            </div>
            <hr>
            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#withdrawal">
                Withdrawal
            </button>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#changeWD">
                Change withdrawal method
            </button>
        </div>
    </div>

    <!-- change WD -->
    <div class="modal fade" id="changeWD" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Change withdrawal method</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/seller/wd/norek" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="wallet_id" value="<?= $wallet['id']; ?>">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="wd">Withdrawal method</label>
                            <select name="wd" id="wd" class="form-control" required>
                                <option selected disabled>-- Select a withdrawal method --</option>
                                <option value="Dana">Dana</option>
                                <option value="ShopeePay">ShopeePay</option>
                                <option value="OVO">OVO</option>
                                <option value="BRI">BRI</option>
                                <option value="BNI">BNI</option>
                                <option value="Mandiri">Mandiri</option>
                            </select>
                        </div>
                        <div>
                            <label for="no">Enter the account number</label>
                            <input type="number" class="form-control" name="no" value="<?= $wallet['no_wallet']; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- WD -->
    <div class="modal fade" id="withdrawal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Withdrawal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/seller/wd" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="wallet_id" value="<?= $wallet['id']; ?>">
                    <div class="modal-body">
                        <label for="">Withdrawal amount</label>
                        <input type="number" class="form-control" name="jumlah_wd" required>
                        <small id="emailHelp" class="form-text text-danger">Maximum withdrawal Rp <?= number_format($wallet['saldo'], 2, ',', '.'); ?></small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <h5>Withdrawal History</h5>
    </div>
    <div class="card-body">
        <table class="table text-nowrap mb-0 align-middle" id="user-table">
            <thead class="text-dark fs-4">
                <tr>
                    <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">No</h6>
                    </th>
                    <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Total</h6>
                    </th>
                    <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Method</h6>
                    </th>
                    <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Status</h6>
                    </th>
                    <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Date</h6>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($wd as $data) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>Rp <?= number_format($data['jml_wd'], 2, ',', '.'); ?></td>
                        <td>
                            <h6><?= $data['nama_wallet']; ?></h6>
                            <span class="fw-normal"><?= $data['no_wallet']; ?></span>
                        </td>
                        <?php if ($data['status_wd'] === 'process') : ?>
                            <?php $bg = 'bg-warning'; ?>
                        <?php elseif ($data['status_wd'] === 'success') : ?>
                            <?php $bg = 'bg-success'; ?>
                        <?php elseif ($data['status_wd'] === 'failed') : ?>
                            <?php $bg = 'bg-danger'; ?>
                        <?php endif; ?>
                        <td><span class="badge <?= $bg; ?> rounded-3 fw-semibold"><?= $data['status_wd']; ?></span></td>
                        <td>
                            <?php $date = new DateTime($data['created_at']); ?>
                            <p class="mb-0 fw-normal"><?= $date->format('d F Y'); ?></p>
                            <span><?= $date->format('H:i:s'); ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>