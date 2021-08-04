@extends('layouts.mainMala')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content container-fluid" id="krsMahasiswa">
    <h1 class="page-content__title">Input KRS Mahasiswa</h1>

    <div class="row">
        <div class="col-xl-12">
            <form class="form-input shadow padding--small">
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Jessica Clara">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" placeholder="2204719384">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" placeholder="Nama Jurusan">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="program-studi">Program Studi</label>
                        <input type="text" class="form-control" id="program-studi"
                            placeholder="Ilmu Kedokteran Gigi Anak">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow padding--big">
                <div class="card-header border-0 p-0 m-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="mb-0">Pilihan KRS</h2>
                        </div>
                    </div>
                </div>
                <hr class="mt">
                <form class="form-select">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="paketKRS">Paket KRS</label>
                            <select class="form-control" id="paketKRS">
                                <option>Semester 1 ( Ilmu Kedokteran Gigi Anak)</option>
                                <option>Semester 2 ( Ilmu Kedokteran Gigi Anak)</option>
                                <option>Semester 3 ( Ilmu Kedokteran Gigi Anak)</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="kelas">Kelas</label>
                            <select class="form-control" id="kelas">
                                <option selected>Kelas</option>
                                <option>Kelas</option>
                                <option>Kelas 2</option>
                                <option>Kelas 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 align-items-end">
                            <button type="submit" class="btn btn--blue">Cari KRS</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table align-items-center table-borderless table-flush table-hover">
                        <thead class="table-header">
                            <tr>
                                <th scope="col" class="border-0 text-center px-0">Pilih</th>
                                <th scope="col" class="border-0">Kode</th>
                                <th scope="col" class="border-0">Mata Kuliah</th>
                                <th scope="col" class="border-0">Dosen</th>
                                <th scope="col" class="border-0 text-center">jumlah sks</th>
                            </tr>
                        </thead>

                        <tbody class="table-body">
                            <tr>
                                <td class="text-center"><input type="checkbox" name="pilih1" id="pilih1"></td>
                                <td>P001</td>
                                <td class="font--bold text-capitalize">Pengantar perkuliahan II</td>
                                <td>249235901- Dr. Deddy Purwanto</td>
                                <td class="text-center">8</td>
                            </tr>

                            <tr>
                                <td class="text-center"><input type="checkbox" name="pilih1" id="pilih1"></td>
                                <td>P001</td>
                                <td class="font--bold text-capitalize">Pengantar perkuliahan II</td>
                                <td>249235901- Dr. Deddy Purwanto</td>
                                <td class="text-center">8</td>
                            </tr>

                            <tr>
                                <td class="text-center"><input type="checkbox" name="pilih1" id="pilih1"></td>
                                <td>P001</td>
                                <td class="font--bold text-capitalize">Pengantar perkuliahan II</td>
                                <td>249235901- Dr. Deddy Purwanto</td>
                                <td class="text-center">8</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row justify-content-between align-items-center table-information">
                    <h2>Jumlah SKS yang Dipilih : <span class="text--blue">0 SKS</span></h2>
                    <button type="submit" class="btn btn--blue">Ambil KRS</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow padding--small">
                <div class="card-header border-0 p-0 m-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="mb-0">KRS yang Sudah Diambil </h2>
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn btn--blue"><span class="iconify printer-icon mr-3"
                                    data-icon="bx:bx-printer" data-inline="true"></span>Cetak Data</button>
                        </div>
                    </div>
                </div>
                <hr class="mt">
                <div class="table-responsive">
                    <table class="table align-items-center table-borderless table-flush table-hover">

                        <thead class="table-header">
                            <tr>
                                <th scope="col" class="border-0 text-center">No</th>
                                <th scope="col" class="border-0">Kode</th>
                                <th scope="col" class="border-0">Mata Kuliah</th>
                                <th scope="col" class="border-0 text-center">Semester MK</th>
                                <th scope="col" class="border-0 text-center">Jumlah SKS</th>
                                <th scope="col" class="border-0 text-center">Kelas</th>
                                <th scope="col" class="border-0 text-center">Status</th>
                            </tr>
                        </thead>

                        <tbody class="table-body">
                            <tr>
                                <td class="text-center">
                                    1
                                </td>
                                <td>
                                    P001
                                </td>
                                <td class="font--bold">
                                    Pengantar perkuliahan II
                                </td>
                                <td class="text-center">
                                    3
                                </td>
                                <td class="text-center">
                                    8
                                </td>
                                <td class="text-center">
                                    Reguler - 40
                                </td>
                                <td class="text-center">
                                    Diterima
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">
                                    2
                                </td>
                                <td>
                                    MTK01
                                </td>
                                <td class="font--bold">
                                    Matematika Dasar
                                </td>
                                <td class="text-center">
                                    1
                                </td>
                                <td class="text-center">
                                    12
                                </td>
                                <td class="text-center">
                                    XL
                                </td>
                                <td class="text-center">
                                    Diterima
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">
                                    3
                                </td>
                                <td>
                                    P003
                                </td>
                                <td class="font--bold">
                                    Pengantar perkuliahan III
                                </td>
                                <td class="text-center">
                                    4
                                </td>
                                <td class="text-center">
                                    10
                                </td>
                                <td class="text-center">
                                    Reguler - 40
                                </td>
                                <td class="text-center">
                                    Diterima
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection