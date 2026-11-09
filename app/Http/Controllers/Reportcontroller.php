<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Report::latest();

        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('description', 'like', '%'.$request->search.'%')
                  ->orWhere('location', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->type) {
            $query->where('type', $request->type);
        }

        $reports = $query->get();
        return view('reports', compact('reports'));
    }

    public function destroy($id)
    {
        Report::findOrFail($id)->delete();
        return redirect('/reports');
    }

    public function toggleStatus($id)
    {
        $report = Report::findOrFail($id);
        $report->status = $report->status == 'تم الحل' ? 'قيد المعالجة' : 'تم الحل';
        $report->save();
        return redirect('/reports');
    }

    public function create()
    {
        return view('report');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'location' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('reports', 'public');
        }

        Report::create([
            'title' => $request->title,
            'type' => $request->type,
            'location' => $request->location,
            'phone' => $request->phone,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect('/reports')->with('success', 'تم إرسال البلاغ بنجاح');
    }
}