// prettier-ignore
var dataJson = [];
var dataTahun = [];
var dataPria = [];
var dataWanita = [];

var dataPieMahasiswa = [];
var dataPieAlumni = [];
var dataPieDosen = [];
var dataPiePegawai = [];

var mahasiswaPerTahun = document.getElementById("mahasiswa-bar").getContext("2d");
var piechartMhs = document.getElementById("piechart-mahasiswa").getContext("2d");
var piechartAlumni = document.getElementById("piechart-alumni").getContext("2d");
var piechartDosen = document.getElementById("piechart-dosen").getContext("2d");
var piechartPegawai = document.getElementById("piechart-pegawai").getContext("2d");

function getDataChart(type) {
    $.ajax({
        url: url_api + `/${type}/dashboard`,
        type: 'get',
        dataType: 'json',
        data: {},
        success: function(res) {
          if (res.status == "success") {
            dataJson = res.data
            $.each(dataJson.tahun,function (key,row) {
                dataTahun.push(row.title)
                dataPria.push(row.jml_pria)
                dataWanita.push(row.jml_wanita)
            })
            
            // SETTING BAR CHART
            var laki = {
                label: "Laki-Laki",
                data: dataPria,
                backgroundColor: "#73C3F2",
                borderWidth: 0,
                barPercentage: 1.0,
            };
    
            var perempuan = {
                label: "Perempuan",
                data: dataWanita,
                backgroundColor: "#F27373",
                borderWidth: 0,
                barPercentage: 1.0,
            };
    
            var mahasiswaTahun = {
                labels: dataTahun,
                datasets: [laki, perempuan],
            };
    
            setBarChart(mahasiswaTahun)
            setPieChart(dataJson)
          } else {
            // alert gagal
          }
          
        }
    });
}



function setBarChart(data) {
    var barChartMahasiswaTahun = new Chart(mahasiswaPerTahun, {
        type: "bar",
        data: data,
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
}


function setPieChart(dataJson) {
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
                        sum += parseInt(data);
                    });
                    let percentage = Math.round((value * 100) / sum) + "% \n" + context.chart.data.labels[context.dataIndex];
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
                    data: [dataJson.mahasiswa.jml_pria, dataJson.mahasiswa.jml_wanita],
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
                    data: [dataJson.alumni.jml_pria, dataJson.alumni.jml_wanita],
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
                    data: [dataJson.dosen.jml_pria, dataJson.dosen.jml_wanita],
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
                    data: [dataJson.pegawai.jml_pria, dataJson.pegawai.jml_wanita],
                },
            ],
        },
        plugins: [ChartDataLabels],
        options: optionObj,
    });
}
