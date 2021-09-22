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
        DB::enableQueryLog();
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
                'kuliah' => $value->kuliah,
            ];

            $pertemuan = DB::table('kelas_mengajar')
                            ->select('pertemuan','created_at','jam_mulai')
                            ->where($data)
                            ->first();
            $date_pertemuan = "";
            if ($pertemuan == null) {
                $count_pertemuan = 1;
                $date_pertemuan = "";
            }else{
                $date_pertemuan = Carbon::parse($pertemuan->created_at)->format('Y-m-d');
                if ($date!=$date_pertemuan) {
                    $count_pertemuan = $pertemuan->pertemuan+1;
                }else{
                    $count_pertemuan = $pertemuan->pertemuan;
                }
            }

            $data['pertemuan'] = $count_pertemuan;
            if ($pertemuan==null) {
                $jam_mulai = $value->jam_kelas;
            }else{
                $jam_mulai = $pertemuan->jam_mulai;
            }
            $limit = Carbon::parse($jam_mulai)->addMinutes(1)->format('H:i');
            // echo $value->matakuliah." - ".$jam_mulai." - ".$now." - ".$limit." || ";
            if($now>$limit){
                // echo "true";
                $check = DB::table('kelas_mengajar')->where($data)->first();
                $data['status_kelas'] = "close";
                if ($check==null) {
                    $data['jam_mulai'] = $jam_mulai;
                    $data['status'] = "batal";
                    DB::table('kelas_mengajar')->insert($data);
                    DB::table('absensi_mahasiswa')
                    ->where('kuliah',$data['kuliah'])
                    ->where('minggu',$data['pertemuan'])
                    ->delete();
                }else{
                    if($check->status!="hadir"){
                        $data['status'] = "batal";
                        DB::table('absensi_mahasiswa')
                        ->where('kuliah',$data['kuliah'])
                        ->where('minggu',$data['pertemuan'])
                        ->delete();

                    }
                    DB::table('kelas_mengajar')->where('id',$check->id)->update($data);
                }
                $i++;
            }
        }
    }
}
