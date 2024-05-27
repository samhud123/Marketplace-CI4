<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<div style="background-color: #00619a">
  <div class="container py-4">
    <h3 class="text-white mt-2">Order</h3>
    <!-- Breadcrumb -->
    <nav class="d-flex mb-2">
      <h6 class="mb-0">
        <a href="<?= base_url(); ?>" class="text-white-50">Home</a>
        <span class="text-white-50 mx-2"> &gt; </span>
        <a href="/services" class="text-white-50"><u>Services</u></a>
        <span class="text-white-50 mx-2"> &gt; </span>
        <a href="#" class="text-white"><u>Order</u></a>
      </h6>
    </nav>
    <!-- Breadcrumb -->
  </div>
</div>

<section class="bg-light py-5">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 col-lg-8 mb-4">
        <div class="card mb-4 border shadow-0">
          <div class="p-4 d-flex justify-content-between">
            <div class="">
              <h5>Order <i class="fas fa-arrow-right"></i> <?= $service[0]['judul']; ?></h5>
              <p class="mb-0 text-wrap ">Fill out the form below to place an order</p>
            </div>
            <!-- <div class="d-flex align-items-center justify-content-center flex-column flex-md-row">
              <a href="#" class="btn btn-outline-primary me-0 me-md-2 mb-2 mb-md-0 w-100">Register</a>
              <a href="#" class="btn btn-primary shadow-0 text-nowrap w-100">Sign in</a>
            </div> -->
          </div>
        </div>

        <?php $disabled = false; ?>
        <?php if (user()->nama == null || user()->no_tlp == null || user()->alamat == null) : ?>
          <?php $disabled = true; ?>
          <div class="alert alert-warning" role="alert">
            Complete your profile! <a href="/buyer" class="fw-bold text-decoration-none">Go Setting!</a>
          </div>
        <?php endif ?>

        <!-- Checkout -->
        <div class="card shadow-0 border">
          <div class="p-4">
            <h5 class="card-title mb-4">Personal Data</h5>
            <div class="row">
              <div class="col-12 mb-3">
                <p class="mb-0">Fullname</p>
                <div class="form-outline">
                  <input type="text" id="typeText" name="fullname" placeholder="Type here" class="form-control" value="<?= user()->nama; ?>" disabled>
                </div>
              </div>

              <div class="col-6 mb-3">
                <p class="mb-0">Phone</p>
                <div class="form-outline">
                  <input type="tel" id="typePhone" name="no_tlp" class="form-control" placeholder="+62" value="<?= user()->no_tlp; ?>" disabled>
                </div>
              </div>

              <div class="col-6 mb-3">
                <p class="mb-0">Email</p>
                <div class="form-outline">
                  <input type="email" id="typeEmail" name="email" placeholder="example@gmail.com" class="form-control" value="<?= user()->email; ?>" disabled>
                </div>
              </div>

              <div class="col-12 mb-3">
                <p class="mb-0">Address</p>
                <div class="form-outline">
                  <input type="text" id="typeText" name="alamat" placeholder="Type here" class="form-control" value="<?= user()->alamat; ?>" disabled>
                </div>
              </div>
            </div>

            <hr class="my-4">

            <h5 class="card-title mb-3">Message to Seller</h5>
            <form action="/order" method="post">
              <?= csrf_field(); ?>
              <input type="hidden" name="sellerId" id="sellerId" value="<?= $service[0]['user_id']; ?>">
              <input type="hidden" name="serviceId" value="<?= $service[0]['service_id']; ?>">
              <div class="mb-3">
                <p class="mb-0">Input message order</p>
                <div class="form-outline">
                  <textarea class="form-control" id="textAreaExample1" rows="5" name="message" required></textarea>
                </div>
              </div>

              <div class="float-end">
                <a href="/services" class="btn btn-outline-danger">Cancel</a>
                <button class="btn btn-success shadow-0 border <?= $disabled == true ? 'disabled' : ''; ?>" type="submit" style="background-color: #00619a"><i class="fas fa-shopping-cart"></i> Order</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Checkout -->
      </div>

      <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end">
        <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
          <div class="card w-100 shadow-2-strong">
            <img src="/img/services/<?= $service[0]['foto']; ?>" class="card-img-top" height="250">
            <div class="card-body d-flex flex-column">
              <div class="d-flex flex-row">
                <h6 class="mb-1 me-1"><?= $service[0]['judul']; ?></h6>
              </div>
              <div class="my-3">
                <a href="s/<?= $service[0]['username']; ?>" class="text-decoration-none">
                  <img src="/assets/images/profile/user-1.jpg" alt="" width="30" height="30" class="rounded-circle me-2">
                  <p class="d-inline"><?= $service[0]['username']; ?></p>
                </a>
              </div>
              <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                <p><?= $service[0]['deskripsi']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>