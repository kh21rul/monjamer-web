<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\FanLog;
use App\Models\HumidifierLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $controls = Control::latest();

        if (request('filter')) {
            $controls->where('created_at', 'like', '%' . request('filter') . '%');
        } else {
            $controls->where('created_at', 'like', '%' . Carbon::now()->format('Y-m-d') . '%');
        }

        return view('dashboard.histories.index', [
            'title' => 'Dashboard | Histories',
            'controls' => $controls->get(),
        ]);
    }

    public function cetak()
    {
        $controls = Control::latest();

        if (request('filter')) {
            $controls->where('created_at', 'like', '%' . request('filter') . '%');
        } else {
            $controls->where('created_at', 'like', '%' . Carbon::now()->format('Y-m-d') . '%');
        }

        return view('dashboard.histories.cetakhistory', [
            'title' => 'Dashboard | Histories',
            'today' => Carbon::now()->format('Y-m-d'),
            'controls' => $controls->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Control $control)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Control $control)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Control $control)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Control $control)
    {
        $date = $control->created_at->format('Y-m-d');
        Control::destroy($control->id);
        return redirect('/dashboard/controls?filter=' . $date)->with('success', 'Data berhasil dihapus!');
    }

    public function getfan()
    {
        $histories = FanLog::latest();

        if (request('filter')) {
            $histories->where('created_at', 'like', '%' . request('filter') . '%');
        } else {
            $histories->where('created_at', 'like', '%' . Carbon::now()->format('Y-m-d') . '%');
        }

        return view('dashboard.histories.fan', [
            'title' => 'Dashboard | Histories | Fan',
            'histories' => $histories->get(),
        ]);
    }

    public function deletefan(FanLog $fanLog)
    {
        $date = $fanLog->created_at->format('Y-m-d');
        FanLog::destroy($fanLog->id);
        return redirect('/dashboard/history/fan?filter=' . $date)->with('success', 'Data berhasil dihapus!');
    }

    public function gethumidifier()
    {
        $histories = HumidifierLog::latest();

        if (request('filter')) {
            $histories->where('created_at', 'like', '%' . request('filter') . '%');
        } else {
            $histories->where('created_at', 'like', '%' . Carbon::now()->format('Y-m-d') . '%');
        }

        return view('dashboard.histories.humidifier', [
            'title' => 'Dashboard | Histories | Humidifier',
            'histories' => $histories->get(),
        ]);
    }

    public function deletehumidifier(HumidifierLog $humidifierLog)
    {
        $date = $humidifierLog->created_at->format('Y-m-d');
        HumidifierLog::destroy($humidifierLog->id);
        return redirect('dashboard/history/humidifier?filter=' . $date)->with('success', 'Data berhasil dihapus!');
    }
}
