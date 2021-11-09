<?php

namespace App\Listeners;

use App\Events\LogMahasiswaStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\LogMahasiswaStatus as MLogMahasiswaStatus;

class LogMahasiswa
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LogMahasiswaStatus  $event
     * @return void
     */
    public function log_mahasiswa_status(LogMahasiswaStatus $event)
    {
        MLogMahasiswaStatus::updateOrCreate(
            [
                'mahasiswa' => $event->arr['mahasiswa'],
                'tahun' => $event->arr['tahun'],
                'semester' => $event->arr['semester'],
            ],
            [
                'mahasiswa' => $event->arr['mahasiswa'],
                'tahun' => $event->arr['tahun'],
                'semester' => $event->arr['semester'],
                'status' => $event->arr['status'],
            ]
        );
    }
}
