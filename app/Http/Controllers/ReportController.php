<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function create()
    {
        return view('report');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        return redirect('/')->with('success', 'تم استلام البلاغ بنجاح');
    }
   public function index()
{
    $reports = \App\Models\Report::latest()->get();
    return view('reports', compact('reports'));
}
}
