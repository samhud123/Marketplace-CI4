<?= $this->extend('sellers/template/index') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Service</h5>
            <?php if (session()->get('errors')) : ?>
                <div class="alert alert-danger mb-4">
                    <?php foreach (session()->get('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <form action="/seller/services/update/<?= $service->service_id; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="foto" value="<?= $service->foto; ?>">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="<?= old('title') ? old('title') : $service->judul ?>" id="title" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="category" id="category" required>
                                <?php foreach ($categories as $c) : ?>
                                    <?php if (old('category', $service->category_id) == $c['id_categories']) : ?>
                                        <option value="<?= $c['id_categories'] ?>" selected><?= $c['category_name'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $c['id_categories'] ?>"><?= $c['category_name'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea class="form-control" name="desc" rows="4" required><?= old('desc') ? old('desc') : $service->deskripsi ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Picture</label><br>
                            <img src="/img/services/<?= $service->foto; ?>" alt="" width="200" class="mb-3">
                            <input class="form-control <?php if (session('errors.picture')) : ?>is-invalid<?php endif ?>" type="file" name="picture" id="formFile">
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