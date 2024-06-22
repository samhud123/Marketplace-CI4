<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Withdrawal Request</h5>
        <!-- <form action="/admin/reports/search" method="get">
            <div class="input-group mb-3 w-50">
                <input type="search" class="form-control" name="keyword" placeholder="Search Buyer or Seller..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2"><i class="ti ti-search"></i></button>
            </div>
        </form> -->
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Seller</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Amount of money</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Account number</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Date</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($wd as $data) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <h6><?= $data['username']; ?></h6>
                                <span class="fw-normal"><?= $data['email']; ?></span>
                            </td>
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
                            <td>
                                <?php if ($data['status_wd'] != 'success' && $data['status_wd'] != 'failed') : ?>
                                    <a href="/admin/wd/finish/<?= $data['id']; ?>" class="btn btn-success disbale" onclick="return confirm('Are you sure?')">Finish</a>
                                    <a href="/admin/wd/reject/<?= $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Reject</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>