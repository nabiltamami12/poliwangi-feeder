// prettier-ignore
var piechartMhs = document.getElementById("piechart-mahasiswa").getContext("2d");
// prettier-ignore
var piechartAlumni = document.getElementById("piechart-alumni").getContext("2d");
// prettier-ignore
var piechartDosen = document.getElementById("piechart-dosen").getContext("2d");
// prettier-ignore
var piechartPegawai = document.getElementById("piechart-pegawai").getContext("2d");

var optionObj = {
    plugins: {
        legend: {
            display: false,
        },
        datalabels: {
            color: "white",
            textAlign: "center",
            font: {
                weight: 600,
                lineHeight: 1.5,
                family: "Montserrat",
            },
            formatter: function (value, context) {
                let sum = 0;
                let dataArr = context.chart.data.datasets[0].data;
                dataArr.map((data) => {
                    sum += data;
                });
                let percentage =
                    Math.round((value * 100) / sum) +
                    "% \n" +
                    context.chart.data.labels[context.dataIndex];
                return percentage;
            },
        },
    },
    elements: {
        arc: {
            borderWidth: 0,
        },
    },
    rotation: 90,
    tooltips: {
        callbacks: {
            label: function (tooltipItem) {
                return tooltipItem.yLabel;
            },
        },
    },
};

var chartMhs = new Chart(piechartMhs, {
    type: "pie",
    data: {
        labels: ["laki-laki", "perempuan"],
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
        labels: ["laki-laki", "perempuan"],
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
        labels: ["laki-laki", "perempuan"],
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
        labels: ["laki-laki", "perempuan"],
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
