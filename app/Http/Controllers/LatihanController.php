<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function greeting()
    {
        return view ('greeting');
    }

    public function penjumlahan()
    {
        $jumlah = 0;
        return view ('penjumlahan', compact('jumlah'));
    }

    public function pengurangan()
    {
        $kurang = 0;
        return view ('pengurangan',  compact('kurang'));
    }

    public function pembagian()
    {
        $bagi = 0;
        return view ('pembagian',  compact('bagi'));
    }

    public function perkalian()
    {
        $kali = 0;
        return view ('perkalian',  compact('kali'));
    }

    public function actionPenjumlahan(Request $request) {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = $angka1+$angka2;
        return view('penjumlahan', compact('jumlah'));
    }

    public function actionPengurangan(Request $request) {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $kurang = $angka1-$angka2;
        return view ('pengurangan',  compact('kurang'));
    }

    public function actionPembagian(Request $request) {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $bagi = $angka1/$angka2;
        return view ('pembagian',  compact('bagi'));
    }

    public function actionPerkalian(Request $request) {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $kali = $angka1*$angka2;
        return view ('perkalian',  compact('kali'));
    }
}
