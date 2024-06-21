<?= $this->extend('sellers/template/index') ?>

<?= $this->section('content') ?>
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-75 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Incoming Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $incoming_orders; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-75 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Orders Completed</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $orders_complate; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-75 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Orders failed</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $orders_failed; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-75 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Saldo</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= $saldo == NULL ? '0' : number_format($saldo['saldo'], 2, ',', '.'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="col-lg-4 col-md-5">
        <div class="card">
            <div>
                <canvas id="myChart2" style="height:20vh; width:40vw" class="p-4"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Incoming Orders', 'Orders Completed', 'Orders failed'],
            datasets: [{
                label: 'Sales Statistics',
                data: [<?= $incoming_orders; ?>, <?= $orders_complate; ?>, <?= $orders_failed; ?>],
                backgroundColor: [
                    'rgb(78, 115, 223)',
                    'rgb(28, 200, 138)',
                    'rgb(250, 137, 107)',
                ],
                borderColor: [
                    'rgb(78, 115, 223)',
                    'rgb(28, 200, 138)',
                    'rgb(250, 137, 107)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    const data2 = {
        labels: [
            'Incoming',
            'Completed',
            'failed'
        ],
        datasets: [{
            label: 'Total',
            data: [<?= $incoming_orders; ?>, <?= $orders_complate; ?>, <?= $orders_failed; ?>],
            backgroundColor: [
                'rgb(78, 115, 223)',
                'rgb(28, 200, 138)',
                'rgb(247, 85, 42)'
            ],
            hoverOffset: 4
        }]
    };

    const config2 = {
        type: 'pie',
        data: data2,
    };

    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );
</script>

<?= $this->endSection() ?>