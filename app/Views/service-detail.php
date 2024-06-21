<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<div class="mb-4" style="background-color: #00619a">
    <div class="container py-4">
        <h3 class="text-white mt-2"><?= $service[0]['judul']; ?></h3>
        <nav class="d-flex mb-2">
            <h6 class="mb-0">
                <a href="<?= base_url(); ?>" class="text-white-50">Home</a>
                <span class="text-white-50 mx-2"> &gt; </span>
                <a href="/services" class="text-white"><u>Services</u></a>
            </h6>
        </nav>
    </div>
</div>

<div class="container">
    <div class="mb-3 text-center">
        <img src="/img/services/<?= $service[0]['foto']; ?>" alt="" class="w-25">
    </div>
    <div class="mb-3 text-center">
        <h3><?= $service[0]['judul']; ?></h3>
    </div>
    <div class="px-5 text-center">
        <p><?= $service[0]['deskripsi']; ?></p>
    </div>
    <div class="my-3 text-center">
        <a href="s/<?= $service[0]['username']; ?>" class="text-decoration-none">
            <img src="/assets/images/profile/user-1.jpg" alt="" width="40" height="40" class="rounded-circle me-2">
            <p class="d-inline fs-5">@<?= $service[0]['username']; ?></p>
        </a>
    </div>
    <a href="/order?service=<?= $service[0]['service_id']; ?>" class="btn btn-primary w-100" style="background-color: #00619a"><i class="fas fa-shopping-cart"></i> Order</a>

    <hr class="my-3">

    <?php foreach ($comments as $comment) : ?>
        <div class="d-flex">
            <img src="/img/seller/<?= $comment['foto']; ?>" alt="" width="40" height="40" class="rounded-circle me-2">
            <div class="d-inline-block">
                <p class="d-inline">@<?= $comment['username']; ?></p>
                <?php $date = new DateTime($comment['created_at']); ?>
                <p class="d-inline fs-7 ms-2 text-secondary"><?= $date->format('d F Y'); ?></p>
                <p><?= $comment['nama']; ?></p>
            </div>
        </div>
        <div class="d-inline-block">
            <?php $rating = $comment['rating']; ?>
            <?php for ($i = 1; $i <= $rating; $i++) : ?>
                <i class="fas fa-star text-warning"></i>
            <?php endfor; ?>
            <p><?= $comment['comment']; ?></p>
        </div>
        <hr class="mt-0">
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>