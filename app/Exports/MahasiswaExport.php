<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MahasiswaExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithCustomValueBinder
{
	protected $where;
	private $i = 1;
	private $status = [
		"A" => "Aktif",
		"B" => "Mahasiswa Baru",
		"C" => "Cuti",
		"D" => "DO",
		"H" => "Punya SPTH",
		"K" => "Mengundurkan Diri",
		"L" => "Lulus",
		"M" => "Meninggal",
		"P" => "Pendaftar",
		"R" => "Tugas Akhir",
		"T" => "Tanpa Keterangan"
	];
	private $jenis_kelamin = ['P' => 'Perempuan', 'L' => 'Laki-laki'];

	public function __construct(array $where) {
		$this->where = $where;
	}

	public function map($mhs): array
    {
    	$mhs->no = $this->i++;
    	$mhs->tgllahir = date('d-m-Y',strtotime($mhs->tgllahir));
    	$mhs->tglmasuk = date('d-m-Y',strtotime($mhs->tglmasuk));
    	$mhs->status = $this->status[$mhs->status];
    	$mhs->jenis_kelamin = $this->jenis_kelamin[$mhs->jenis_kelamin];
        return (array) $mhs;
    }

	public function collection() {
		return DB::table('mahasiswa as m')
			->selectRaw('
				"no",
				m.nrp as nim,
				m.nama,
				p.program,
				j.jurusan,
				k.kode,
				pg.nama as dosen_wali,
				m.status,
				m.tgllahir,
				m.tmplahir,
				m.tglmasuk,
				m.jenis_kelamin,
				m.warga,
				a.agama,
				m.darah as golongan_darah,
				m.alamat,
				m.notelp,
				m.anak_ke,
				m.prestasi_olahraga,
				m.smu,
				m.beasiswa,
				m.ayah,
				m.kerja_ayah,
				m.penghasilan_ayah,
				m.ibu,
				m.kerja_ibu,
				m.penghasilan_ibu,
				m.alamat_ortu,
				m.notelp_ortu,
				m.nun,
				m.tgllulus,
				m.lulussmu,
				mjp.jalur_penerimaan,
				m.nik,
				m.jalan,
				m.rt,
				m.rw,
				m.kelurahan,
				m.kecamatan,
				m.kabupaten_kota,
				m.propinsi,
				m.kode_pos,
				m.tempat_lahir_ayah,
				m.tempat_lahir_ibu,
				m.tanggal_lahir_ayah,
				m.tanggal_lahir_ibu,
				m.pendidikan_ayah,
				m.pendidikan_ibu,
				m.jalan_ortu,
				m.rt_ortu,
				m.rw_ortu,
				m.kelurahan_ortu,
				m.kecamatan_ortu,
				m.kabupaten_kota_ortu,
				m.propinsi_ortu,
				m.kode_pos_ortu
			')
			->where($this->where)
			->leftJoin('program_studi as ps','m.program_studi','=','ps.nomor')
			->leftJoin('program as p','ps.program','=','p.nomor')
			->leftJoin('jurusan as j','ps.jurusan','=','j.nomor')
			->leftJoin('kelas as k','m.kelas','=','k.nomor')
			->leftJoin('pegawai as pg','m.dosen_wali','=','pg.nomor')
			->leftJoin('agama as a','m.agama','=','a.nomor')
			->leftJoin('mahasiswa_jalur_penerimaan as mjp','m.mahasiswa_jalur_penerimaan','=','mjp.nomor')
			->get();
	}

	public function headings(): array
    {
    	return [
    		'No',
			'NIM',
			'NAMA',
			'JENJANG',
			'PRODI',
			'KELAS',
			'DOSEN_WALI',
			'STATUS',
			'TGLLAHIR',
			'TMPLAHIR',
			'TGLMASUK',
			'JENIS_KELAMIN',
			'WARGA',
			'AGAMA',
			'GOLONGAN_DARAH',
			'ALAMAT',
			'NOTELP',
			'ANAK_KE',
			'PRESTASI_OLAHRAGA',
			'SMU',
			'BEASISWA',
			'AYAH',
			'KERJA_AYAH',
			'PENGHASILAN_AYAH',
			'IBU',
			'KERJA_IBU',
			'PENGHASILAN_IBU',
			'ALAMAT_ORTU',
			'NOTELP_ORTU',
			'NUN',
			'TGLLULUS',
			'LULUSSMU',
			'JALUR_PENERIMAAN',
			'NIK',
			'JALAN',
			'RT',
			'RW',
			'KELURAHAN',
			'KECAMATAN',
			'KABUPATEN_KOTA',
			'PROPINSI',
			'KODE_POS',
			'TEMPAT_LAHIR_AYAH',
			'TEMPAT_LAHIR_IBU',
			'TANGGAL_LAHIR_AYAH',
			'TANGGAL_LAHIR_IBU',
			'PENDIDIKAN_AYAH',
			'PENDIDIKAN_IBU',
			'JALAN_ORTU',
			'RT_ORTU',
			'RW_ORTU',
			'KELURAHAN_ORTU',
			'KECAMATAN_ORTU',
			'KABUPATEN_KOTA_ORTU',
			'PROPINSI_ORTU',
			'KODE_POS_ORTU',
		];
    }
}
