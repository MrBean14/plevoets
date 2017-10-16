<canvas id="myChart"></canvas>

<script>

    window.chartColors = {
        red: 'rgb(255, 0, 0)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(0, 163, 51)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)',
        darkblue: 'rgb(0,0,255)'
    };

    var color = Chart.helpers.color;

    var data_viewer = <?php echo json_encode($resultaten); ?>;
    //alert(data_viewer);
    var myObj = JSON.parse(data_viewer);

    var totalen = [];
    var betaald = [];
    var tebetalen = [];
    var labels = [];

    for (x in myObj) {
        labels.push(x);
        totalen.push(myObj[x].totaal);
        betaald.push(myObj[x].betaald);
        tebetalen.push(myObj[x].tebetalen);
    }

    var barChartData = {
        labels: labels,
        datasets: [{
            label: 'Totaal',
            backgroundColor: color(window.chartColors.darkblue).alpha(0.7).rgbString(),
            borderColor: window.chartColors.darkblue,
            borderWidth: 1,
            data: totalen
        },
        {
            label: 'Betaald',
            backgroundColor: color(window.chartColors.green).alpha(0.7).rgbString(),
            borderColor: window.chartColors.green,
            borderWidth: 1,
            data: betaald
        },
        {
            label: 'Te betalen',
            backgroundColor: color(window.chartColors.red).alpha(0.7).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: tebetalen
        }]
    };

    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            legend: {
                position: 'right'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

</script>