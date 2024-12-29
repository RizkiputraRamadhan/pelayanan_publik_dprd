<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('pages.backend.berita.index', compact('beritas'))->with('type_menu', 'berita');
    }

    public function create()
    {
        return view('pages.backend.berita.create')->with('type_menu', 'berita');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'konten' => 'required',
        ]);

        $slug = Str::slug($request->judul) . '-' . rand(1000, 9999);

        $gambarPath = $request->file('gambar')->store('images/berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'gambar' => $gambarPath,
            'konten' => $request->konten,
            'penulis' => auth()->user()->id,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('pages.backend.berita.edit', compact('berita'))->with('type_menu', 'berita');
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'konten' => 'required',
        ]);

        $slug = Str::slug($request->judul) . '-' . rand(1000, 9999);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $gambarPath = $request->file('gambar')->store('images/berita', 'public');
            $berita->gambar = $gambarPath;
        }

        // Update data berita
        $berita->update([
            'judul' => $request->judul,
            'slug' => $slug,
            'konten' => $request->konten,
            'gambar' => $berita->gambar,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return redirect()->route('berita.index')->with('error', 'Berita tidak ditemukan!');
        }

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
