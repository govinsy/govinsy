<div class="mb-5">
    <canvas id="covidChart"></canvas>
</div>

<script type="text/javascript" src="<?= base_url(); ?>/js/Chart.js"></script>
<script>
  var ctx = document.getElementById("covidChart").getContext('2d');
  var covidChart = new Chart(ctx, {
            type: 'line',
                data: {
                    labels: ["<?= join('", "', $covid_dayone['date']);  ?> "],
                        datasets : [
                            {
                                label: 'Terkonfirmasi',
                                data: [ <?= join(', ', $covid_dayone['confirmed']); ?> ],
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Sembuh',
                                data: [ <?= join(', ', $covid_dayone['recovered']); ?> ],
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Meninggal',
                                data: [ <?= join(', ', $covid_dayone['deaths']); ?> ],
                                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                                borderColor: 'rgba(255, 206, 86, 1)',
                                borderWidth: 1
                            },
                            // {
                            //     label: 'Aktif',
                            //     data: [ <?= join(', ', $covid_dayone['active']); ?> ],
                            //     backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            //     borderColor: 'rgba(75, 192, 192, 1)',
                            //     borderWidth: 1
                            // }
                        ]
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