<div class="row mb-5">
    <div class="col-md-6">
        <canvas id="covidIdnChart"></canvas>
    </div>
    <div class="col-md-6">
        <canvas id="genderChart"></canvas>
    </div>
</div>
<div class="row mb-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Provinsi Tertinggi
            </div>
            <div class="card-body">
            <ul class="list-group">
                <?php foreach($covid['highest'] as $ch): ?>
                <li class="list-group-item"><?= $ch['key'] ?><span class="float-right"><?= $ch['jumlah_kasus'] ?></span></li>
                <?php endforeach ?>
            </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Provinsi Terendah
            </div>
            <div class="card-body">
                <?php foreach($covid['lowest'] as $cl): ?>
                    <li class="list-group-item"><?= $cl['key'] ?><span class="float-right"><?= $cl['jumlah_kasus'] ?></span></li>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url(); ?>/js/Chart.js"></script>
<script>
    var ctx1 = document.getElementById("covidIdnChart").getContext('2d');
    var covidIdnChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['0-5', '6-18', '19-30', '31-45', '46-59', '>60'],
            datasets: [{
                label: 'Kelompok Usia',
                data: [
                    '<?= $covid['age']['0-5'] ?>',
                    '<?= $covid['age']['6-18'] ?>',
                    '<?= $covid['age']['19-30'] ?>',
                    '<?= $covid['age']['31-45'] ?>',
                    '<?= $covid['age']['46-59'] ?>',
                    '<?= $covid['age']['>= 60'] ?>',
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }
        ]},
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        }
    });

    var ctx2 = document.getElementById("genderChart").getContext('2d');
    var genderChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Laki-Laki', 'Perempuan'],
            datasets: [{
                label: 'Jenis Kelamin',
                data: [
                    '<?= $covid['male'] ?>',
                    '<?= $covid['female'] ?>',
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }, ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        }
    });
</script>