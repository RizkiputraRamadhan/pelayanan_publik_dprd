<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    public function index()
    {
        $struktur = Struktur::latest()->paginate(10);
        return view('pages.backend.struktur.index', compact('struktur'))->with('type_menu', 'struktur');
    }

    public function create()
    {
        return view('pages.backend.struktur.create')->with('type_menu', 'struktur');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('images/struktur', 'public');

        Struktur::create([
            'gambar_struktur' => $gambarPath,
        ]);

        return redirect()->route('struktur.index')->with('success', 'Struktur berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $struktur = Struktur::find($id);
        return view('pages.backend.struktur.edit', compact('struktur'))->with('type_menu', 'struktur');
    }

    public function update(Request $request, Struktur $struktur)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($struktur->gambar_struktur && Storage::disk('public')->exists($struktur->gambar_struktur)) {
                Storage::disk('public')->delete($struktur->gambar_struktur);
            }

            $gambarPath = $request->file('gambar')->store('images/struktur', 'public');
            $struktur->gambar_struktur = $gambarPath;
        }

        // Update data struktur
        $struktur->update([
            'gambar_struktur' => $struktur->gambar_struktur,
        ]);

        return redirect()->route('struktur.index')->with('success', 'Struktur berhasil diperbarui!');
    }
}
