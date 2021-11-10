<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

class RiwayatCicilanImport implements ToCollection
{
	public function collection(Collection $rows)
	{
		$tahun = 2010;
		$semester = 1;
		foreach ($rows as $key => $row) {
			if ($key == 1) {
				$tahun = $row[4];
			}
			if ($key == 2) {
				$semester = $row[4];
			}
			if ($key > 4) {
				$mahasiswa = DB::table('mahasiswa')->select('nomor')->where('nrp', $row[1])->first();
				$id_mahasiswa = $mahasiswa->nomor;
				$kp = DB::table('keuangan_piutang')->select('id')->where('tahun', $tahun)->where('semester', $semester)->where('id_mahasiswa', $id_mahasiswa)->first();
				if (!$kp) {
					$id_piutang = DB::table('keuangan_piutang')->insertGetId(
						array(
							'tahun' => $tahun,
							'semester' => $semester,
							'status' => $row[3],
							'id_mahasiswa' => $id_mahasiswa
						)
					);
					for ($i=4; $i <= 9; $i++) {
						if (intval($row[$i]) > 0) {
							DB::table('keuangan_pembayaran')->insert(
								array(
									'id_mahasiswa' => $id_mahasiswa,
									'id_piutang' => $id_piutang,
									'tanggal' => $tahun.'-12-12',
									'nominal' => intval($row[$i]),
									'status' => 1,
									'keterangan' => 'UKT'
								)
							);
						}
					}
				}
			}
		}
	}

}