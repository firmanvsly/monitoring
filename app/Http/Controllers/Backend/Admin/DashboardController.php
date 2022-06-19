<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Monitoring;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Monitoring::query();
            return datatables()->of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.pages.admin.dashboard');
    }
}
