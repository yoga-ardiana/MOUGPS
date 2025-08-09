<?php

namespace App\Http\Controllers;

use App\Models\MouPelanggan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MouPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mouPelanggans = MouPelanggan::all();
        return view('layouts.mouPelanggan.index', compact('mouPelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layouts.mouPelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'namaPelanggan' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'deskripsiProduk' => 'required|string',
            'note' => 'nullable|string',
            'telp' => 'required|string|max:20',
        ]);
        $mou = MouPelanggan::create([
            'namaPelanggan' => $request->namaPelanggan,
            'email' => $request->email,
            'telp' => $request->telp,
            'deskripsiProduk' => $request->deskripsiProduk,
            'note' => $request->note,
            'token' => Str::random(32),
        ]);
        return redirect()->route('mouPelanggan.linkInfo', $mou->id)
            ->with('status', 'MOU Pelanggan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MouPelanggan $mouPelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MouPelanggan $mouPelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MouPelanggan $mouPelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MouPelanggan $mouPelanggan)
    {
        //
    }

    public function linkInfo(MouPelanggan $mou)
    {
        $link = url('/mou/view/' . $mou->token);

        return view('layouts.mouPelanggan.linkInfo', compact('mou', 'link'));
    }

    public function publicView(String $token)
    {
        $mou = MouPelanggan::where('token', $token)->firstOrFail();
        return view('layouts.mouPelanggan.publicView', compact('mou'));
    }

    public function saveSignature(Request $request, $id)
    {
        $mou = MouPelanggan::findOrFail($id);

        $folderPath = public_path('storage/signatures');

        // kalau folder belum ada, buat foldernya
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0777, true);
        }

        if ($request->has('signature')) {
            $signatureData = $request->input('signature');
            $signature = str_replace('data:image/png;base64,', '', $signatureData);
            $signature = str_replace(' ', '+', $signature);
            $fileName = 'signature_' . $id . '.png';

            File::put($folderPath . '/' . $fileName, base64_decode($signature));

            $mou->signature_path = 'storage/signatures/' . $fileName; // simpan path relatif, bukan full path
            $mou->save();
        }
        return redirect()->back()->with('success', 'Tanda tangan berhasil disimpan!');
    }
}
