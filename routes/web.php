<?php

use Illuminate\Support\Facades\Route;

Route::get('/mou-pelanggan', [App\Http\Controllers\MouPelangganController::class, 'index'])->name('mouPelanggan.index');
Route::get('/mou-pelanggan/create', [App\Http\Controllers\MouPelangganController::class, 'create'])->name('mouPelanggan.create');
Route::post('/mou-pelanggan', [App\Http\Controllers\MouPelangganController::class, 'store'])->name('mouPelanggan.store');
Route::get('/mou-pelanggan/{mouPelanggan}/edit', [App\Http\Controllers\MouPelangganController::class, 'edit'])->name('mouPelanggan.edit');
Route::put('/mou-pelanggan/{mouPelanggan}', [App\Http\Controllers\MouPelangganController::class, 'update'])->name('mouPelanggan.update');
Route::delete('/mou-pelanggan/{mouPelanggan}', [App\Http\Controllers\MouPelangganController::class, 'destroy'])->name('mouPelanggan.destroy');

Route::get('/mou/link/{mou}', [App\Http\Controllers\MouPelangganController::class, 'linkInfo'])->name('mouPelanggan.linkInfo');
Route::get('/mou/view/{token}', [App\Http\Controllers\MouPelangganController::class, 'publicView'])->name('mouPelanggan.publicView');
Route::post('/mou/{id}/save-signature', [App\Http\Controllers\MouPelangganController::class, 'saveSignature'])->name('mouPelanggan.saveSignature');