<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
Route::get('/', function () {
    $total = \App\Models\Report::count();
    $solved = \App\Models\Report::where('status', 'تم الحل')->count();
    $pending = $total - $solved;
    return view('welcome', compact('total', 'solved', 'pending'));
});

Route::get('/report', [ReportController::class, 'create']);
Route::post('/report', [ReportController::class, 'store']);
Route::get('/reports', [ReportController::class, 'index']);
Route::delete('/reports/{id}', [ReportController::class, 'destroy']);
Route::post('/reports/{id}/toggle', [ReportController::class, 'toggleStatus']);