<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Manage Categories</h5>
        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#addCat">
            <i class="ti ti-plus"></i> Add New Category
        </button>
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
        <?php foreach (session()->get('errors') as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">All Categories</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Picture</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Category Name</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($categories as $cat) : ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"><?= $no++; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <img src="/img/categories/<?= $cat['picture']; ?>" alt="" width="120" class="rounded-1">
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1"><?= $cat['category_name']; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $cat['id_categories']; ?>">
                                            <i class="ti ti-edit"></i> Edit
                                        </button>
                                        <form action="/admin/categories/delete/<?= $cat['id_categories']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="ti ti-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="edit<?= $cat['id_categories']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Category</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="/admin/categories/update" method="post" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_category" value="<?= $cat['id_categories']; ?>">
                                                    <input type="hidden" name="old_picture" value="<?= $cat['picture']; ?>">
                                                    <div class="mb-3">
                                                        <label for="catName" class="form-label">Category Name</label>
                                                        <input type="text" class="form-control" name="category" id="catName" value="<?= $cat['category_name']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="catName" class="form-label">Picture</label><br>
                                                        <img src="/img/categories/<?= $cat['picture']; ?>" alt="" width="120" class="rounded-1 mb-2">
                                                        <input type="file" class="form-control" name="picture" id="picture">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addCat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/categories" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="catName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category" id="catName" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="catName" class="form-label">Picture</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>