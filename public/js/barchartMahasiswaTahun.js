// prettier-ignore
var mahasiswaPerTahun = document.getElementById("mahasiswa-per-tahun").getContext("2d");

var laki = {
    label: "Laki-Laki",
    data: [2, 2, 3, 4, 7, 20, 27, 43, 43, 33, 17],
    backgroundColor: "#73C3F2",
    borderWidth: 0,
    barPercentage: 1.0,
};

var perempuan = {
    label: "Perempuan",
    data: [2, 2, 3, 4, 7, 20, 27, 43, 43, 33, 17],
    backgroundColor: "#F27373",
    borderWidth: 0,
    barPercentage: 1.0,
};

var mahasiswaTahun = {
    labels: [
        "2010",
        "2011",
        "2012",
        "2013",
        "2014",
        "2015",
        "2016",
        "2017",
        "2018",
        "2019",
        "2020",
    ],
    datasets: [laki, perempuan],
};

var barChartMahasiswaTahun = new Chart(mahasiswaPerTahun, {
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
