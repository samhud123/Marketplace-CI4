<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Jumbotron -->
<div class="text-white py-5" style="background-color: #00619a">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <h1>
                    Find The Best <br />
                    Services & Products
                </h1>
                <p>Trendy Products, Factory Prices, Excellent Service</p>
                <?php if (logged_in() == false) : ?>
                    <a href="/login" class="btn btn-light fw-bold" style="color: #00619a;">
                        Join Now <i class="fas fa-arrow-alt-circle-right"></i>
                    </a>
                <?php endif; ?>
                <!-- <button type="button" class="btn btn-light shadow-0 text-primary pt-2 border border-white">
                            <span class="pt-1">Purchase now</span>
                        </button> -->
            </div>
            <div class="col-lg-6 text-center">
                <img src="/img/dashboard.png" alt="" width="500" class="rounded-4 img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Jumbotron -->

<!-- start Slidebar -->
<div class="container mt-5">
    <div class="text-center mb-3">
        <h2 class="fw-bold" style="color: #00619a;">Popular services</h2>
    </div>
    <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">
            <i class="fas fa-chevron-left"></i>
        </button>
        <ul class="image-list">
            <?php foreach ($categories as $category) : ?>
                <a href="/category/<?= $category['category_name']; ?>">
                    <div class="card text-bg-dark border border-0 rounded-4">
                        <img class="image-item rounded-4" src="/img/categories/<?= $category['picture']; ?>" alt="img-1" />
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title flex-fill text-center p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)"><?= $category['category_name']; ?></h5>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    <div class="slider-scrollbar">
        <div class="scrollbar-track">
            <div class="scrollbar-thumb"></div>
        </div>
    </div>
</div>
<!-- end slidebar -->

<!-- our Qualities -->
<section class="our-qlts py-5 px-3 px-sm-4 px-md-5 mt-5" style="background-color: #f1fdf7">
    <div class="my-5 row align-items-center">
        <div class="qlts-content col-md-5 col-12">
            <h1 style="font-size: 2.1rem" class="mb-4">
                A whole world of freelance talent at your fingertips
            </h1>
            <ul class="d-flex flex-column" style="list-style: none;">
                <li>
                    <div>
                        <i class="far fa-check-circle text-secondary fs-3"></i>
                        <span style="font-size: 1.2rem" class="fw-semibold ms-1">The best for every budget</span>
                    </div>
                    <p class="text-muted" style="font-size: 1.2rem">
                        Find high-quality services at every price point. No hourly
                        rates, just project-based pricing.
                    </p>
                </li>
                <li>
                    <div>
                        <i class="far fa-check-circle text-secondary fs-3"></i>
                        <span style="font-size: 1.2rem" class="fw-semibold ms-1">Quality work done quickly</span>
                    </div>
                    <p class="text-muted" style="font-size: 1.2rem">
                        Find the right freelancer to begin working on your project
                        within minutes.
                    </p>
                </li>
                <li>
                    <div>
                        <i class="far fa-check-circle text-secondary fs-3"></i>
                        <span style="font-size: 1.2rem" class="fw-semibold ms-1">Protected payments, every time</span>
                    </div>
                    <p class="text-muted" style="font-size: 1.2rem">
                        Always know what you'll pay upfront. Your payment isn't
                        released until you approve the work.
                    </p>
                </li>
                <li>
                    <div>
                        <i class="far fa-check-circle text-secondary fs-3"></i>
                        <span style="font-size: 1.2rem" class="fw-semibold ms-1">24/7 support</span>
                    </div>
                    <p class="text-muted" style="font-size: 1.2rem">
                        Questions? Our round-the-clock support team is available to
                        help anytime, anywhere.
                    </p>
                </li>
            </ul>
        </div>
        <div class="col-md-1 col-12"></div>
        <div class="qlts-video-wrapper col-md-6 col-12">
            <picture class="w-100 qlts-video-thumb">
                <img class="w-100" style="cursor: pointer" src="/img/quality.jpg" alt="Qualities">
            </picture>
        </div>
    </div>
</section>
<!-- our Qualities -->
<?= $this->endSection() ?>