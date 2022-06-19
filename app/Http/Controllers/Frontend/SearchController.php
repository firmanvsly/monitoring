<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Monitoring;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('frontend.pages.search');
    }

    public function search(Request $request)
    {
        $data = Monitoring::where('nomer', $request->nomer)->first();

        if ($data) {
            return view('frontend.pages.search', compact('data'));
        }

        return back()->withErrors([
            'nomer' => 'Nomer pengguna tidak ditemukan',
        ]);
    }
}
