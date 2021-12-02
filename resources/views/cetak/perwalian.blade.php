<html>

<head>
    <title>CETAK PERWALIAN</title>
    <style>
        body {
            width: 1000px;
            font-family: calibri, arial;
        }

        h1 {
            font-size: 20px;
            text-align: center;
        }

        table {
            font-family: calibri, arial;
            font-size: 14px;
            border-collapse: collapse;
        }

        table>tbody>tr>td {
            padding: 3px;
        }

        table>tbody>tr:first-child>td>div {
            border-top: 2px solid black;
        }

        table>tbody>tr>td:first-child>div {
            border-left: 2px solid black;
        }

        table>tbody>tr>td>div {
            page-break-inside: avoid;
            display: inline-block;
            vertical-align: top;
            height: 3.75em;
            border-bottom: 2px solid black;
            border-right: 2px solid black;
        }
        @media print {
            .print {
                display: none  !important;
            }
        }

    </style>
</head>
<body>
    @php
        use App\Models\Periode;
        $semester = Periode::where('status', 1)->first();
    @endphp
    <h2 style="text-align:center">
        DATA PERWALIAN <br>
        TAHUN AJARAN  {{ $semester->tahun }}/{{$semester->tahun + 1}} Semester {{ $semester->semester == 1 ? "Gasal" : "Genap  " }}
        </h1>
        <button type="button" class="print" onclick="window.print()" disabled>Cetak Dokumen</button>
        <table width="100%" border="0">
            <tr>
                <td style="text-align:center"><b style="font-size:18px;">PERWALIAN</b></td>
            </tr>
        </table>
        <br>
        <table width="100%" border="1" cellpadding="8" cellspacing="0" id="table">
            <tr>
                <th style="width:50px;">No</th>
                <th style="width:100px;">Dosen</th>
                <th style="width:60px;">Jumlah Mahasiswa</th>
                <th style="width:60px;">Sudah Perwalian</th>
                <th style="width:60px;">Belum ACC</th>
            </tr>
            <tbody id="table-body"></tbody>
            <tr id="loading">
                <td colspan="5" style="text-align:center">Loading...</td>
            </tr>
        </table>
        <br>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                 function fetchDataPerwalian(){
                    var url =  "{{ url('/api/v1/admin/perwalian') }}";
                    fetch(url)
                        .then(res => res.json())
                        .then(data => {
                            var html = "";
                            data.data.forEach(function(item, index) {
                                html += ` <tr>
                                            <td style="text-align:center;padding:10px;">${index + 1}</td>
                                            <td>${item.gelar_dpn == null ? '' : item.gelar_dpn} ${item.nama}, ${item.gelar_blk == null ? '' : item.gelar_blk}</td>
                                            <td style="text-align:center;padding:10px;">${item.jml_mahasiswa}</td>
                                            <td style="text-align:center;padding:10px;">${item.sudah_acc}</td>
                                            <td style="text-align:center;padding:10px;">${item.belum_acc}</td>
                                        </tr>`;
                            });
                            document.querySelector('#table-body').innerHTML = html;
                            document.querySelector('#loading').remove();
                            document.querySelector('.print').removeAttribute('disabled');
                        });
                    }
                    fetchDataPerwalian();
            })

        
        </script>
</body>

</html>
