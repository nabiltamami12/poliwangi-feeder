const piechartMhs = document
    .getElementById("piechart-mahasiswa")
    .getContext("2d");
const piechartAlumni = document
    .getElementById("piechart-alumni")
    .getContext("2d");
const piechartDosen = document
    .getElementById("piechart-dosen")
    .getContext("2d");
const piechartPegawai = document
    .getElementById("piechart-pegawai")
    .getContext("2d");

var chartMhs = new Chart(piechartMhs, {
    type: "pie",
    data: {
        datasets: [
            {
                label: "Data Mahasiswa",
                backgroundColor: ["#F27373", "#73C3F2"],
                data: [55, 45],
            },
        ],
    },
    options: {
        legend: {
            display: false,
        },
        tooltips: {
            callbacks: {
                label: function (tooltipItem) {
                    return tooltipItem.yLabel;
                },
            },
        },
    },
});

var chartAlumni = new Chart(piechartAlumni, {
    type: "pie",
    data: {
        datasets: [
            {
                label: "Data Alumni",
                backgroundColor: ["#F27373", "#73C3F2"],
                data: [47, 53],
            },
        ],
    },
    options: {
        legend: {
            display: false,
        },
        tooltips: {
            callbacks: {
                label: function (tooltipItem) {
                    return tooltipItem.yLabel;
                },
            },
        },
    },
});

var chartDosen = new Chart(piechartDosen, {
    type: "pie",
    data: {
        datasets: [
            {
                label: "Data Dosen",
                backgroundColor: ["#F27373", "#73C3F2"],
                data: [43, 57],
            },
        ],
    },
    options: {
        legend: {
            display: false,
        },
        tooltips: {
            callbacks: {
                label: function (tooltipItem) {
                    return tooltipItem.yLabel;
                },
            },
        },
    },
});

var chartPegawai = new Chart(piechartPegawai, {
    type: "pie",
    data: {
        datasets: [
            {
                label: "Data Pegawai",
                backgroundColor: ["#F27373", "#73C3F2"],
                data: [28, 72],
            },
        ],
    },
    options: {
        legend: {
            display: false,
        },
        tooltips: {
            callbacks: {
                label: function (tooltipItem) {
                    return tooltipItem.yLabel;
                },
            },
        },
    },
});

// BAR CHART
var mahasiswaPerProdi = document.getElementById("mahasiswa-per-prodi");

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
