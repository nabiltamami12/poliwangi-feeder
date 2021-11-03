<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class MigrasiData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'code3:migrasi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add program_studi di mahasiswa lama yang valunya 0 atau NULL';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->sync_kelas_dan_prodi();
        $this->add_prodi_mahasiswa();
        return true;
    }

    // step 1
    private function sync_kelas_dan_prodi()
    {
        $this->info("[Proses] Sinkron data kelas dan program_studi");
        $this->info("[...]");
        // cari "kelas" yang tidak ada pada "program_studi", kemudian cari di "kelas_old" untuk mengisi "kelas"
        // mengambil kode "kelas" yang tidak ada di "program_studi" kemudian mencocokan dengan "kelas_old"
        $cek_program_studi_null = DB::select(DB::raw('
            SELECT ko.jurusan, ko.program, jo.jurusan as nama_jurusan, ko.kode FROM kelas_old ko 
            LEFT JOIN jurusan_old jo ON ko.jurusan = jo.nomor 
            WHERE ko.kode IN (
                SELECT k.kode FROM kelas k 
                LEFT JOIN program_studi ps  on k.program_studi = ps.nomor 
                WHERE ps.nomor is NULL 
            )
        '));

        $jurusan_aksi = [];
        $jurusan_arr = [];
        foreach ($cek_program_studi_null as $k => $v) {
            if(!in_array($v->jurusan, $jurusan_arr)) {
                $jurusan_aksi[$v->jurusan] = "insert";
                $jurusan_arr[] = $v->jurusan;
            }
        }

        // insert jursan dari "jurusan_old" ke "jurusan"
        if ($jurusan_arr) {
            $jurusan_cek = DB::table('jurusan')->whereIn('nomor', $jurusan_arr)->get();
            foreach ($jurusan_cek as $k => $v) {
                // jika field jurusan tidak ada isinya tapi exist
                if ($v->jurusan != '') {
                    unset($jurusan_aksi[$v->nomor]);
                    $idx = array_search($v->nomor, $jurusan_arr);
                    unset($jurusan_arr[$idx]);
                } elseif ($v->jurusan == '') {
                    $jurusan_aksi[$v->nomor] = 'update';
                }
            }

            $jurusan_old = DB::table('jurusan_old')
                ->selectRaw('nomor, jurusan, kajur as kepala, jurusan_inggris')
                ->whereIn('nomor', $jurusan_arr)
                ->get();
            foreach ($jurusan_old as $k => $v) {
                if($jurusan_aksi[$v->nomor] === 'insert') {
                    DB::table('jurusan')->insert([
                        "nomor" => $v->nomor,
                        "jurusan" => $v->jurusan,
                        "kepala" => $v->kepala,
                        "jurusan_inggris" => $v->jurusan_inggris
                    ]);
                } elseif($jurusan_aksi[$v->nomor] === 'update') {
                    DB::table('jurusan')->where('nomor', $v->nomor)->update([
                        "jurusan" => $v->jurusan,
                        "kepala" => $v->kepala,
                        "jurusan_inggris" => $v->jurusan_inggris
                    ]);
                }
            }
        }

        if ($cek_program_studi_null) {
            // update atau create ke tabel "program_studi"
            foreach ($cek_program_studi_null as $k => $v) {
                \App\Models\Prodi::updateOrCreate(
                    ['jurusan' => $v->jurusan, 'program' => $v->program, 'program_studi' => $v->nama_jurusan],
                    ['jurusan' => $v->jurusan, 'program' => $v->program, 'program_studi' => $v->nama_jurusan]
                );
            }

            // update field program_sutdi di tabel "kelas"
            foreach ($cek_program_studi_null as $k => $v) {
                $nomor_prodi = \App\Models\Prodi::select('nomor')->where([
                    ['program', '=', $v->program],
                    ['jurusan', '=', $v->jurusan],
                    ['program_studi', '=', $v->nama_jurusan]
                ])->first();
                if(!$nomor_prodi) continue;
                \App\Models\Kelas::where('kode', '=', $v->kode)->update(['program_studi' => $nomor_prodi->nomor]);
            }
        }
        $this->info("[Selesai] Sinkron data kelas dan program_studi");
        return true;
    }

    // step 2
    private function add_prodi_mahasiswa()
    {
        $this->info("[Proses] Add program_studi mahasiswa");
        $this->warn('*mungkin akan membutuhkan waktu lama');
        $obj = DB::select(DB::raw('
            SELECT m.nomor, m.nrp, m.nama, m.kelas, m.kelas_lama, m.program_studi, ko.kode ko_kode, k.kode k_kode, k.program_studi program_studi_kelas
            FROM mahasiswa m
            LEFT JOIN kelas_old ko ON m.kelas = ko.nomor
            LEFT JOIN kelas k ON ko.kode = k.kode 
            WHERE m.program_studi = 0 OR m.program_studi IS NULL
        '));

        // yang di update pada tabel "mahasiswa" hanya field program_studi saja
        $progressBar = $this->output->createProgressBar(count($obj));
        $progressBar->start();
        foreach ($obj as $k => $v) {
            sleep(3);
            $progressBar->advance();
            if (!$v->program_studi_kelas) continue;

            DB::beginTransaction();
            DB::table('mahasiswa')->where('nomor', '=', $v->nomor)->update([
                "program_studi" => $v->program_studi_kelas
            ]);
            DB::table('tmp_backup_migration_mahasiswa')->insert([
                "nomor" => $v->nomor,
                "nrp" => $v->nrp,
                "nama" => $v->nama,
                "kelas" => $v->kelas,
                "kelas_lama" => $v->kelas_lama,
                "program_studi" => $v->program_studi
            ]);
            DB::commit();
        }
        $progressBar->finish();
        $this->info("\n[Selesai] Add program_studi mahasiswa");
        return true;
    }
}
