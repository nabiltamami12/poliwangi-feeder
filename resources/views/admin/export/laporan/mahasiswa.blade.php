<center>
    <h1>Laporan Mahasiswa {{ ucfirst($status) }}</h1>
    <h3>{{ date('d-m-Y') }}</h3>
    <hr>
    <table cellpadding="5" width="100%">
        <thead>
            <tr>
                <th style="text-align: left">No.</th>
                <th style="text-align: left">NIM / NRP</th>
                <th style="text-align: left">Nama</th>
                <th style="text-align: left">Tanggal Lahir</th>
            </tr>
        </thead>
        @foreach ($mahasiswa as $m)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m->nrp }}</td>
            <td>{{ $m->nama }}</td>
            <td>{{ date('d-m-Y', strtotime($m->tgllahir)) }}</td>
        </tr>
        @endforeach
    </table>
</center>
