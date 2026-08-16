<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\PotensiDesa;
use App\Models\PerangkatDesa;
use App\Models\ProfilDesa;

class PageController extends Controller
{
    public function home()
    {
        $artikelTerbaru = Artikel::where('is_published', true)->latest()->take(5)->get();
        $potensiUnggulan = PotensiDesa::latest()->take(6)->get();
        return view('home', compact('artikelTerbaru', 'potensiUnggulan'));
    }

    public function profil()
    {
        $profil = ProfilDesa::first();
        $perangkat = PerangkatDesa::all();
        return view('profil', compact('profil', 'perangkat'));
    }

    public function artikel()
    {
        $artikels = Artikel::where('is_published', true)->latest()->paginate(9);
        return view('artikel', compact('artikels'));
    }

    public function potensiDesa()
    {
        $potensis = PotensiDesa::latest()->paginate(9);
        return view('potensi-desa', compact('potensis'));
    }
}