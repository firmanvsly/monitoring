<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Monitoring;
use App\Http\Requests\StoreMonitoringRequest;
use App\Http\Requests\UpdateMonitoringRequest;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Monitoring::query();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $button = '';
                    $button .= '<a href="monitoring/' . $data->id . '/edit" class="btn btn-outline-warning btn-xs mr-1"><i class="fa fa-edit"></i></a>';
                    $button .= '<a href="javascript:void(0)"  onclick="delConfirm(' . $data->id . ')" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash"></i></a>';

                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('backend.pages.admin.monitoring.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.admin.monitoring.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMonitoringRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonitoringRequest $request)
    {
        Monitoring::create($request->validated() + [
            'nomer' => $this->generateUniqueCode(),
        ]);

        return redirect()->route('admin.monitoring.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function show(Monitoring $monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitoring $monitoring)
    {
        return view('backend.pages.admin.monitoring.edit', ['data' => $monitoring]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonitoringRequest  $request
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonitoringRequest $request, Monitoring $monitoring)
    {
        $monitoring->nama               = $request->nama;
        $monitoring->alamat             = $request->alamat;
        $monitoring->meteran_bulan_ini  = $request->meteran_bulan_ini;
        $monitoring->meteran_bulan_lalu = $request->meteran_bulan_lalu;
        $monitoring->save();

        return redirect()->route('admin.monitoring.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitoring $monitoring)
    {
        $monitoring->delete();
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Monitoring::where('nomer', $code)->first());

        return $code;
    }
}
