<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::all();
        return view('materi.index', compact('materi'));
    }

    public function create()
    {

        return view('materi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kode' => 'required|unique:materi,kode,NULL,id',
            'materi' => 'required|unique:materi,materi,NULL,id'
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/gambar');
            $gambarPath = str_replace('public/', 'storage/', $gambarPath); // Ubah path sesuai dengan storage link
        } else {
            $gambarPath = null;
        }

        Materi::create([
            'kode' => $request->input('kode'),
            'materi' => $request->input('materi'),
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil disimpan.');
    }

    public function edit($id)
    {
        $materi = Materi::find($id);

        return view('materi.edit', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kode' => 'required|unique:materi,kode,' . $id . ',id',
            'materi' => 'required|unique:materi,materi,' . $id . ',id',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/gambar');
            $gambarPath = str_replace('public/', 'storage/', $gambarPath);
        } else {
            $gambarPath = null;
        }

        $materi = Materi::find($id);

        $materi->update([
            'kode' => $request->input('kode'),
            'materi' => $request->input('materi'),
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diupdate.');
    }

    public function deleteForm($id)
    {
        $materi = Materi::findOrFail($id);
        return view('materi.delete', compact('materi'));
    }

    public function destroy($id)
    {
        Materi::destroy($id);

        return redirect()->route('materi.index')->with('success', 'materi berhasil dihapus.');
    }
}
