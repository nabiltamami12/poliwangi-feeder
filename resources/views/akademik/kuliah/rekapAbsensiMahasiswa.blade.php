@extends('layouts.mainAkademik')

@section('content')
  <!-- Header -->
  <header class="header"></header>

  <!-- Page content -->
  <section class="page-content container-fluid">
    <div class="row">
      <div class="col-xl-12">
        <div class="card shadow padding--big">
          <div class="card-header p-0">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0">Absensi Mahasiswa</h2>
              </div>
              <div class="col text-right">
                <button type="button" class="btn btn-primary">
                  <i class="iconify-inline mr-1" data-icon="bx:bx-save"></i>
                  Simpan
                </button>
              </div>
            </div>
          </div>

          <div class="card-body p-0">
            <form class="form_absensiMhs">
              <div class="form-row mt-4">
                <div class="col-md-4 pr-md-4-5">
                  <label for="program-studi">Program Studi</label>
                  <select class="form-control" id="program-studi">
                    <option selected="selected">D3 Teknik Informatika</option>
                    <option>D3 Ilmu Gigi</option>
                  </select>
                </div>
                <div class="col-md-4 px-md-3 mt-3 mt-md-0">
                  <label for="mata-kuliah">Mata Kuliah</label>
                  <select class="form-control" id="mata-kuliah">
                    <option>Human Computer Interaction</option>
                    <option selected="selected">Pemrograman Dasar</option>
                  </select>
                </div>
                <div class="col-md-4 pl-md-4-5 mt-3 mt-md-0">
                  <label for="kelas">Kelas</label>
                  <select class="form-control" id="kelas">
                    <option selected="selected">1 (Satu) - A</option>
                    <option>2 (Dua) - A</option>
                  </select>
                </div>
              </div>
            </form>

            <hr class="my-4">

            <div class="table-responsive table_absensiMhs p-0">
              <table cellspacing="0" class="table align-items-center table-flush table-borderless table-hover">
                <thead class="table-header">
                  <tr class="main_header">
                    <th rowspan="2" scope="col" class="text-center">NIM</th>
                    <th rowspan="2" scope="col" class="text-center">NAMA</th>
                    <th colspan="16" scope="col" class="text-center px-1">Pertemuan ke-</th>
                    <th rowspan="2" scope="col" class="text-center px-1">Presentase</th>
                  </tr>
                  <tr>
                    <th colspan="1" scope="col" class="text-center px-1">1</th>
                    <th colspan="1" scope="col" class="text-center px-1">2</th>
                    <th colspan="1" scope="col" class="text-center px-1">3</th>
                    <th colspan="1" scope="col" class="text-center px-1">4</th>
                    <th colspan="1" scope="col" class="text-center px-1">5</th>
                    <th colspan="1" scope="col" class="text-center px-1">6</th>
                    <th colspan="1" scope="col" class="text-center px-1">7</th>
                    <th colspan="1" scope="col" class="text-center px-1">8</th>
                    <th colspan="1" scope="col" class="text-center px-1">9</th>
                    <th colspan="1" scope="col" class="text-center px-1">10</th>
                    <th colspan="1" scope="col" class="text-center px-1">11</th>
                    <th colspan="1" scope="col" class="text-center px-1">12</th>
                    <th colspan="1" scope="col" class="text-center px-1">13</th>
                    <th colspan="1" scope="col" class="text-center px-1">14</th>
                    <th colspan="1" scope="col" class="text-center px-1">15</th>
                    <th colspan="1" scope="col" class="text-center px-1">16</th>
                  </tr>
                </thead>

                <tbody class="table-body">
                  <tr>
                    <td class="text-center">4891203526</td>
                    <td class="font-weight-bold text-capitalize">Dicky Bhismawan H</td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">100%</td>

                  </tr>

                  <tr>
                    <td class="text-center">4891203526</td>
                    <td class="font-weight-bold text-capitalize">Zarkasyi Matiin</td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option>H</option>
                        <option>I</option>
                        <option selected="selected">S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">93.8%</td>

                  </tr>

                  <tr>
                    <td class="text-center">4891203526</td>
                    <td class="font-weight-bold text-capitalize">Tiana Levin</td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option>H</option>
                        <option>I</option>
                        <option>S</option>
                        <option selected="selected">A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">
                      <select class="form-control">
                        <option selected="selected">H</option>
                        <option>I</option>
                        <option>S</option>
                        <option>A</option>
                      </select>
                    </td>
                    <td class="text-center px-1">93.8%</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js')
  <script>
    $(document).ready(function() {
      function chooseColor() {
        var conceptName = $(this).find(":selected").text();
        if (conceptName == 'H') {
          $(this).css('backgroundColor', '#34C38F');
        } else if (conceptName == 'I') {
          $(this).css('backgroundColor', '#28A3EB');
        } else if (conceptName == 'S') {
          $(this).css('backgroundColor', '#F1B44C');
        } else if (conceptName == 'A') {
          $(this).css('backgroundColor', '#F46A6A');
        }
      }
      $(".table_absensiMhs select").each(chooseColor);
      $('.table_absensiMhs select').click(chooseColor);
    })
  </script>
@endsection
