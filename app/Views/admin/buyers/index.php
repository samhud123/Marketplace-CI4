<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<?php
// dd($buyers)
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List of Buyers Accounts</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Email</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">No. HP</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($buyers as $buyer) : ?>
                        <?php if ($buyer['id'] === null) : ?>
                            <tr>
                                <td colspan="5" class="text-center">There is no data to display</td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?= $no++; ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?= $buyer['nama']; ?></h6>
                                    <span class="fw-normal"><?= $buyer['username']; ?></span>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?= $buyer['email']; ?></p>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 fs-4"><?= $buyer['no_tlp']; ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <a href="/admin/buyers/detail/<?= $buyer['username']; ?>" class="btn btn-primary"><i class="ti ti-eye"></i> Detail</a>
                                    <?php if ($buyer['active'] == 1) : ?>
                                        <a href="/admin/buyers/disabled/<?= $buyer['id']; ?>" class="btn btn-danger"><i class="ti ti-square-x"></i> Disabled</a>
                                    <?php elseif ($buyer['active'] == 0) : ?>
                                        <a href="/admin/buyers/enabled/<?= $buyer['id']; ?>" class="btn btn-success"><i class="ti ti-check"></i> Enabled</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>