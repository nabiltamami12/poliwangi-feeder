<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class KelasBatal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kelas:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if the class is missed';

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
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');

        $day = Carbon::now()->isoformat('dddd');
        $year = Carbon::now()->isoformat('Y');
        $date = Carbon::now()->format('Y-m-d');


        $now = Carbon::now()->format('H:i');

        $data = DB::table('kuliah')->select(
            'matakuliah.matakuliah',
            'kuliah.*',
            'kuliah.nomor as kuliah',
            'jam.jam as jam_kelas',
        )
        ->join("kelas", "kelas.nomor", "=", "kuliah.kelas")
        ->join("matakuliah", "matakuliah.nomor", "=", "kuliah.matakuliah")
        ->join("pegawai", "pegawai.nomor", "=", "kuliah.dosen")
        ->join("hari", "hari.nomor", "=", "kuliah.hari")
        ->join("jam", "jam.nomor", "=", "kuliah.jam")
        ->where("hari.hari", $day)
        ->where("kuliah.tahun", $year)
        ->orderBy('jam.jam', 'asc')
        ->get();
        $i=0;
        foreach ($data as $key => $value) {
            $data = [
                'tahun' => $year,
                'dosen' => $value->dosen,
                'kuliah' => $value->kuliah,
            ];

            $pertemuan = DB::table('kelas_mengajar')
                            ->select('pertemuan','created_at')
                            ->where($data)
                            ->first();
            $date_pertemuan = "";
            if ($pertemuan == null) {
                $count_pertemuan = 0;
                $date_pertemuan = "";
            }else{
                $date_pertemuan = Carbon::parse($pertemuan->created_at)->format('Y-m-d');
                if ($date!=$date_pertemuan) {
                    $count_pertemuan = $pertemuan->pertemuan+1;
                }else{
                    $count_pertemuan = $pertemuan->pertemuan;
                }
            }
            $limit = Carbon::parse($value->jam_kelas)->addMinutes(180)->format('H:i');
            if($now>$limit){
                $data['pertemuan'] = $count_pertemuan;
                $data['status'] = "batal";
                $check = DB::table('kelas_mengajar')->where($data)->get();
                if (count($check)==0) {
                    DB::table('kelas_mengajar')->insert($data);
                }
                $i++;
            }
        }
    }
}
