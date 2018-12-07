$(document).ready(function () {
    drawPenyerapanChart()
    drawRealisasiChart()
    drawKomposisiChart()
    drawAlokasiChart()
})

function drawPenyerapanChart(){
    Morris.Line({
        element: 'dashboard-penyerapan-chart',
        data: lineData,
        xkey: 'x',
        ykeys: ['y'],
        labels: ['Realisasi'],
        xLabels: "month",
        hideHover: 'auto',
        yLabelFormat: function (number) {
          var reverse = number.toString().split('').reverse().join(''),
          currency  = reverse.match(/\d{1,3}/g)
          return 'Rp ' + currency.join(',').split('').reverse().join('')
        },
        resize: true,
        lineColors: [
            'rgb(158, 216, 95)',
        ],
        pointFillColors: [
             'rgb(133, 206, 54)',
        ]
    });
}

function drawRealisasiChart () {
    gaugeData.pagu = gaugeData.pagu / 1000000
    gaugeData.realisasi = gaugeData.realisasi / 1000000

    var opts = {
      angle: -0.2, // The span of the gauge arc
      lineWidth: 0.02, // The line thickness
      radiusScale: 1, // Relative radius
      pointer: {
        length: 0.48, // // Relative to gauge radius
        strokeWidth: 0.018, // The thickness
        color: '#000000' // Fill color
      },
      limitMax: false,     // If false, max value increases automatically if value > maxValue
      limitMin: false,     // If true, the min value of the gauge will be fixed
      colorStart: '#6FADCF',   // Colors
      colorStop: '#8FC0DA',    // just experiment with them
      strokeColor: '#E0E0E0',  // to see which ones work best for you
      generateGradient: true,
      highDpiSupport: true,     // High resolution support
      renderTicks: {
        divisions: 5,
        divWidth: 1.1,
        divLength: 0.7,
        divColor: '#333333',
        subDivisions: 3,
        subLength: 0.5,
        subWidth: 0.6,
        subColor: '#666666'
      },
      percentColors: [[0.0, "#a9d70b" ], [0.50, "#f9c802"], [1.0, "#ff0000"]],
      staticLabels: {
        font: "10px sans-serif",  // Specifies font
        labels: [0,
            gaugeData.pagu / 3,
            2 * (gaugeData.pagu / 3),
            gaugeData.pagu
        ],  // Print labels at these values
        color: "#000000",  // Optional: Label text color
        fractionDigits: 0  // Optional: Numerical precision. 0=round off.
      },
      staticZones: [
       {strokeStyle: "#F03E3E", min: 0, max: gaugeData.pagu / 3}, // Red from 100 to 130
       {strokeStyle: "#FFDD00", min: gaugeData.pagu / 3, max:  2 * (gaugeData.pagu / 3)}, // Yellow
       {strokeStyle: "#30B32D", min: 2 * (gaugeData.pagu / 3), max: gaugeData.pagu}, // Green
      ],
    };
    var target = document.getElementById('realisasi'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = gaugeData.pagu; // set max gauge value
    gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
    gauge.animationSpeed = 32; // set animation speed (32 is default value)
    gauge.set(gaugeData.realisasi); // set actual value
}

function drawKomposisiChart () {
    Morris.Bar({
        element: 'dashboard-komposisi-chart',
        data: barData,
        xkey: 'absis',
        ykeys: ['ordinat'],
        labels: ['Realisasi'],
        hideHover: 'auto',
        resize: true,
        barColors: [
            'rgb(133, 206, 54)',
            tinycolor('rgb(133, 206, 54)').darken(10).toString()
        ],
    })
}

function drawAlokasiChart () {
    var $dashboardAlokasiBreakdownChart = $('#dashboard-alokasi-chart')
    $dashboardAlokasiBreakdownChart.empty()
    Morris.Donut({
        element: 'dashboard-alokasi-chart',
        data: donutData,
        resize: true,
        colors: [
            tinycolor('rgb(133, 206, 54)'.toString()).lighten(10).toString(),
            tinycolor('rgb(133, 206, 54)'.toString()).darken(8).toString(),
            'rgb(133, 206, 54)'.toString()
        ],
    });
}