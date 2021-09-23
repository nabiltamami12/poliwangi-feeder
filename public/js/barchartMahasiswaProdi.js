// prettier-ignore
var mahasiswaPerProdi = document.getElementById("mahasiswa-per-prodi").getContext("2d");

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

var mahasiswaData = {
    labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K"],
    datasets: [laki, perempuan],
};

var barChartMahasiswaProdi = new Chart(mahasiswaPerProdi, {
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
