<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<div class="mb-4" style="background-color: #00619a">
    <div class="container py-4">
        <h3 class="text-white mt-2">All Category</h3>
        <!-- Breadcrumb -->
        <nav class="d-flex mb-2">
            <h6 class="mb-0">
                <a href="<?= base_url(); ?>" class="text-white-50">Home</a>
                <span class="text-white-50 mx-2"> &gt; </span>
                <a href="/categories" class="text-white"><u>Categories</u></a>
            </h6>
        </nav>
        <!-- Breadcrumb -->
    </div>
</div>

<div class="container">
    <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
        <strong class="d-block py-2"><?= count($categories); ?> category found </strong>
    </header>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach ($categories as $category) : ?>
            <div class="col">
                <a href="/category/<?= $category['category_name']; ?>">
                    <div class="card h-100">
                        <img src="/img/categories/<?= $category['picture']; ?>" class="card-img-top" height="280">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title flex-fill text-center p-4 fs-3 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><?= $category['category_name']; ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>