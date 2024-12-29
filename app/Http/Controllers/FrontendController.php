<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Karir;
use App\Models\Struktur;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $data = [
            'karir' => Karir::orderBy('id', 'desc')->paginate('10'),
            'berita' => Berita::inRandomOrder()->paginate(10),
            'struktur' => Struktur::get(),
        ];
        return view('pages.frontend.home', $data);
    }

    public function postDetail($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        if(!$berita) {
            abort(404);
        }
        $data = [
            'postDetail' => $berita,
            'berita' => Berita::inRandomOrder()->paginate(5),
        ];
        return view('pages.frontend.post_detail', $data);
    }

    public function karirDetail($slug)
    {
        $karir = Karir::where('slug', $slug)->first();
        if(!$karir) {
            abort(404);
        }
        $data = [
            'postDetail' => $karir,
            'karir' => Karir::inRandomOrder()->paginate(5),
        ];
        return view('pages.frontend.karir_detail', $data);
    }
}
