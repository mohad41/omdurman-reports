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
    public function destroy($id)
{
    $report = \App\Models\Report::findOrFail($id);
    $report->delete();

    return redirect('/reports')->with('success', 'تم حذف البلاغ بنجاح');
}
    public function toggleStatus($id)
{
    $report = \App\Models\Report::findOrFail($id);
    $report->status = $report->status == 'تم الحل' ? 'قيد المعالجة' : 'تم الحل';
    $report->save();

    return redirect('/reports')->with('success', 'تم تحديث حالة البلاغ');
}
}
