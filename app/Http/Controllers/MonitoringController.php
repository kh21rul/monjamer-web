<?php

namespace App\Http\Controllers;

use App\Models\FanLog;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use App\Models\HumidifierLog;

class MonitoringController extends Controller
{
    public function readsensors()
    {
        $datasensors = Monitoring::latest()->first();
        return response()->json($datasensors);
    }

    public function simpan()
    {
        // Ambil data monitoring yang lama
        $monitoring = Monitoring::find(1);

        // Ambil status baru dari request
        $newKipasStatus = request('kipas');
        $newHumidifierStatus = request('humidifier');

        // Update data monitoring terlebih dahulu
        Monitoring::where('id', 1)->update([
            'suhu' => request('suhu'),
            'kelembapan' => request('kelembapan'),
            'kipas' => request('kipas'),
            'humidifier' => request('humidifier'),
        ]);

        // Cek apakah status kipas berubah dari Mati ke Hidup
        if ($monitoring->kipas == 'Mati' && $newKipasStatus == 'Hidup') {
            FanLog::create([
                'start_time' => now(),
            ]);
        }

        // Cek apakah status kipas berubah dari Hidup ke Mati
        if ($monitoring->kipas == 'Hidup' && $newKipasStatus == 'Mati') {
            $lastKipasLog = FanLog::whereNull('end_time')->orderBy('start_time', 'desc')->first();
            if ($lastKipasLog) {
                $lastKipasLog->end_time = now();
                $lastKipasLog->duration = $lastKipasLog->end_time->diffInSeconds($lastKipasLog->start_time);
                $lastKipasLog->save();
            }
        }

        // Cek apakah status humidifier berubah dari Mati ke Hidup
        if ($monitoring->humidifier == 'Mati' && $newHumidifierStatus == 'Hidup') {
            HumidifierLog::create([
                'start_time' => now(),
            ]);
        }

        // Cek apakah status humidifier berubah dari Hidup ke Mati
        if ($monitoring->humidifier == 'Hidup' && $newHumidifierStatus == 'Mati') {
            $lastHumidifierLog = HumidifierLog::whereNull('end_time')->orderBy('start_time', 'desc')->first();
            if ($lastHumidifierLog) {
                $lastHumidifierLog->end_time = now();
                $lastHumidifierLog->duration = $lastHumidifierLog->end_time->diffInSeconds($lastHumidifierLog->start_time);
                $lastHumidifierLog->save();
            }
        }
    }
}
