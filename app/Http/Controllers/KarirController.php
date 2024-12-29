<?php

namespace App\Http\Controllers;

use App\Models\Karir;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KarirController extends Controller
{
    public function index()
    {
        $karirs = Karir::latest()->paginate(10);
        return view('pages.backend.karir.index', compact('karirs'))->with('type_menu', 'karir');
    }

    public function create()
    {
        return view('pages.backend.karir.create')->with('type_menu', 'karir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_akhir' => 'required',
            'jenis' => 'required',
            'status' => 'required',
            'konten' => 'required',
        ]);

        $slug = Str::slug($request->judul) . '-' . rand(1000, 9999);

        Karir::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'tanggal_akhir' => $request->tanggal_akhir,
            'jenis' => $request->jenis,
            'status' => $request->status,
            'deskripsi' => $request->konten,
            'penulis' => auth()->user()->id,
        ]);

        return redirect()->route('karir.index')->with('success', 'Karir berhasil ditambahkan!');
    }

    public function show(Karir $karir)
    {
        return view('karir.show', compact('karir'));
    }

    public function edit($id)
    {
        $karir = Karir::find($id);
        return view('pages.backend.karir.edit', compact('karir'))->with('type_menu', 'karir');
    }

    public function update(Request $request, Karir $karir)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_akhir' => 'required',
            'jenis' => 'required',
            'status' => 'required',
            'konten' => 'required',
        ]);

        $slug = Str::slug($request->judul) . '-' . rand(1000, 9999);

        // Update data karir
        $karir->update([
            'judul' => $request->judul,
            'slug' => $slug,
            'tanggal_akhir' => $request->tanggal_akhir,
            'jenis' => $request->jenis,
            'status' => $request->status,
            'deskripsi' => $request->konten,
        ]);

        return redirect()->route('karir.index')->with('success', 'Karir berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $karir = Karir::find($id);

        if (!$karir) {
            return redirect()->route('karir.index')->with('error', 'Karir tidak ditemukan!');
        }

        if ($karir->gambar && Storage::disk('public')->exists($karir->gambar)) {
            Storage::disk('public')->delete($karir->gambar);
        }

        $karir->delete();

        return redirect()->route('karir.index')->with('success', 'Karir berhasil dihapus!');
    }
}
