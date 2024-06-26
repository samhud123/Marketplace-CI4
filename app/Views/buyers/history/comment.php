<?= $this->extend('buyers/template/index') ?>

<?= $this->section('content') ?>
<style>
    .stars {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }

    .stars input {
        display: none;
    }

    .stars label {
        cursor: pointer;
        width: 1em;
        font-size: 3rem;
        color: #968f8f;
        transition: color 0.3s;
    }

    .stars input:checked~label {
        color: #FFD700;
    }

    .stars input:not(:checked)~label:hover,
    .stars input:not(:checked)~label:hover~label {
        color: #FFD700;
    }
</style>
<div class="container-fluid">
    <div class="main-body">
        <div class="row">
            <?= $this->include('buyers/template/sidebar'); ?>
            <div class="col-lg-8">
                <?php if (session()->get('errors')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <?php foreach (session()->get('errors') as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <a href="/buyer/history" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <div class="mb-3">
                                <img src="/img/services/<?= $order->foto; ?>" alt="" width="250">
                            </div>
                            <div class="mb-3">
                                <h3><?= $order->judul; ?></h3>
                            </div>
                            <div class="mb-3">
                                <p><?= $order->deskripsi; ?></p>
                            </div>
                        </div>

                        <hr>
                        <form action="/buyer/history/comment/" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="service_id" value="<?= $order->service_id; ?>">
                            <input type="hidden" name="order_id" value="<?= $order->order_id; ?>">
                            <div>
                                <h2 class="fs-5 my-4 fw-bold"><i class="fas fa-star"></i> Rating</h2>
                                <div class="stars">
                                    <input type="radio" name="star" id="star-5" value="5"><label for="star-5">★</label>
                                    <input type="radio" name="star" id="star-4" value="4"><label for="star-4">★</label>
                                    <input type="radio" name="star" id="star-3" value="3"><label for="star-3">★</label>
                                    <input type="radio" name="star" id="star-2" value="2"><label for="star-2">★</label>
                                    <input type="radio" name="star" id="star-1" value="1"><label for="star-1">★</label>
                                </div>
                            </div>
                            <div>
                                <h2 class="fs-5 my-4 fw-bold"><i class="fas fa-pen"></i> write comment</h2>
                                <div class="mb-3">
                                    <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>