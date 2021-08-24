var piechartMhs = document.getElementById("piechart-mahasiswa").getContext("2d");
var piechartAlumni = document.getElementById("piechart-alumni").getContext("2d");
var piechartDosen = document.getElementById("piechart-dosen").getContext("2d");
var piechartPegawai = document.getElementById("piechart-pegawai").getContext("2d");

var optionObj = {
    plugins:{
        legend:{
            display: false,
        },
        datalabels:{
            color: 'white',
            textAlign: 'center',
            font:{
                weight: 600,
                lineHeight: 1.5,
                family: "Montserrat"
            },
            formatter: function(value, context) {
              let sum = 0;
              let dataArr = context.chart.data.datasets[0].data;
              dataArr.map(data => {
                  sum += data;
              });
              let percentage = Math.round(value*100 / sum)+"% \n" + context.chart.data.labels[context.dataIndex];
              return percentage;
            }
          }
    },
    elements: {
        arc: {
            borderWidth: 0,
        }
    },
    rotation: 90,
    tooltips: {
        callbacks: {
            label: function (tooltipItem) {
                return tooltipItem.yLabel;
            },
        },
    },
}

var chartMhs = new Chart(piechartMhs, {
    type: "pie",
    data: {
        labels: ['laki-laki', 'perempuan'],
        datasets: [
            {
                backgroundColor: ["#73C3F2", "#F27373"],
                data: [45, 55],
            },
        ],
    },
    plugins: [ChartDataLabels],
    options: optionObj,
});

var chartAlumni = new Chart(piechartAlumni, {
    type: "pie",
    data: {
        labels: ['laki-laki', 'perempuan'],
        datasets: [
            {
                label: "Data Alumni",
                backgroundColor: ["#73C3F2", "#F27373"],
                data: [53, 47],
            },
        ],
    },
    plugins: [ChartDataLabels],
    options: optionObj,
});

var chartDosen = new Chart(piechartDosen, {
    type: "pie",
    data: {
        labels: ['laki-laki', 'perempuan'],
        datasets: [
            {
                label: "Data Dosen",
                backgroundColor: ["#73C3F2", "#F27373"],
                data: [57, 43],
            },
        ],
    },
    plugins: [ChartDataLabels],
    options: optionObj,
});

var chartPegawai = new Chart(piechartPegawai, {
    type: "pie",
    data: {
        labels: ['laki-laki', 'perempuan'],
        datasets: [
            {
                label: "Data Pegawai",
                backgroundColor: ["#73C3F2", "#F27373"],
                data: [72, 28],
            },
        ],
    },
    plugins: [ChartDataLabels],
    options: optionObj,
});

// BAR CHART
var mahasiswaPerProdi = document.getElementById("mahasiswa-per-prodi");
var mahasiswaPerTahun = document.getElementById("mahasiswa-per-tahun");

var laki = {
    label: "Laki-Laki",
    data: [2, 2, 3, 4, 7, 20, 27, 43, 43, 33, 17],
    backgroundColor: "#73C3F2",
    borderWidth: 0,
    barPercentage: 1.0,
    // categoryPercentage: 1.0,
};

var perempuan = {
    label: "Perempuan",
    data: [2, 2, 3, 4, 7, 20, 27, 43, 43, 33, 17],
    backgroundColor: "#F27373",
    borderWidth: 0,
    barPercentage: 1.0,
    // categoryPercentage: 1.0,
};

var mahasiswaData = {
    labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K"],
    datasets: [laki, perempuan],
};

var mahasiswaTahun = {
    labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020"],
    datasets: [laki, perempuan],
}

var barChart = new Chart(mahasiswaPerProdi, {
    type: "bar",
    data: mahasiswaData,
    options: {
        plugins: {
            legend: {
                position: "bottom",
                labels: {
                    color: "#000",
                    padding: 15,
                },
            },
        },
        scales: {
            x: {
                grid: {
                    offset: true,
                },
            },
        },
    },
});


var barChart = new Chart(mahasiswaPerTahun, {
    type: "bar",
    data: mahasiswaTahun,
    options: {
        plugins: {
            legend: {
                position: "bottom",
                labels: {
                    color: "#000",
                    padding: 15,
                },
            },
        },
        scales: {
            x: {
                grid: {
                    offset: true,
                },
            },
        },
    },
});



