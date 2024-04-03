<?= $this->extend('sellers/template/index') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add New Service</h5>
            <?php if (session()->get('errors')) : ?>
                <div class="alert alert-danger mb-4">
                    <?php foreach (session()->get('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url(); ?>seller/services/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="<?= old('title'); ?>" id="title" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="category" id="category" required>
                                <option selected disabled>-- Select Category --</option>
                                <?php foreach ($categories as $c) : ?>
                                    <option value="<?= $c['id_categories']; ?>"><?= $c['category_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea class="form-control" name="desc" rows="4" required><?= old('desc'); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Picture</label>
                            <input class="form-control <?php if (session('errors.picture')) : ?>is-invalid<?php endif ?>" type="file" name="picture" id="formFile" required>
                        </div>
                        <a href="/seller/services" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>