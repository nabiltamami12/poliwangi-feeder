@extends('layouts.mainMala')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="heregistrasi">
    <h1 class="page-content__title">Heregistrasi</h1>

    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow">
                <div class="card-header border-0 padding--medium">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Syarat-Syarat Daftar Ulang</h3>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive padding--medium">
                    <table class="table align-items-center table-borderless table-flush table-hover">
                        <thead class="table-header">
                            <tr>
                                <th scope="col" class="border-0">No</th>
                                <th scope="col" class="border-0">Keterangan</th>
                                <th scope="col" class="border-0">File</th>
                                <th scope="col" class="border-0 text-center">Status</th>
                            </tr>
                        </thead>

                        <tbody class="table-body">
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    <h2>sudah mendapat ijazah</h2>
                                </td>
                                <td>
                                    <span class="iconify" data-icon="bx:bx-file-blank" data-inline="true"></span>
                                    <span>dokumen terunggah</span>
                                </td>
                                <td class="text-center">
                                    <span class="iconify status-pending" data-icon="fluent:clock-20-filled"
                                        data-inline="true"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    <h2>memiliki surat kelulusan asli</h2>
                                </td>
                                <td>
                                    <span class="iconify text--blue" data-icon="bx:bx-upload" data-inline="true"></span>
                                    <span class="font--bold text--blue">Unggah Dokumen</span>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    3
                                </td>
                                <td>
                                    <h2>mendapat bukti diterima masuk kuliah</h2>
                                </td>
                                <td>
                                    <span class="iconify text--blue" data-icon="bx:bx-upload" data-inline="true"></span>
                                    <span class="font--bold text--blue">Unggah Ulang Dokumen</span>
                                </td>
                                <td class="text-center">
                                    <span class="iconify status-rejected" data-icon="bi:x-circle-fill"
                                        data-inline="true"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    4
                                </td>
                                <td>
                                    <h2>sudah melakukan pembayaran UKT awal dan biaya daftar<br>ulang (upload bukti
                                        pembayaran)</h2>
                                </td>
                                <td>
                                    <span class="iconify" data-icon="bx:bx-file-blank" data-inline="true"></span>
                                    <span>dokumen terunggah</span>
                                </td>
                                <td class="text-center">
                                    <span class="iconify status-success" data-icon="fluent:clock-20-filled"
                                        data-inline="true"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    5
                                </td>
                                <td>
                                    <h2>Memiliki foto mahasiswa</h2>
                                </td>
                                <td>
                                    <span class="iconify" data-icon="bx:bx-file-blank" data-inline="true"></span>
                                    <span>dokumen terunggah</span>
                                </td>
                                <td class="text-center">
                                    <span class="iconify status-success" data-icon="fluent:clock-20-filled"
                                        data-inline="true"></span>
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