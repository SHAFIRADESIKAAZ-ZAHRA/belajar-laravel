@extends('greeting')
@section('content')
    <h3>Perkalian</h3>
    <form action="{{ route('action-perkalian') }}" method="post">
        @csrf
        {{-- 419: page expired --}}
        <div class="mb-3"> 
            <label for="">Angka 1</label> 
            <input type="number" name="angka1" placeholder="Masukkan Angka">
        </div>
        <div class="mb-3"> 
            <label for="">Angka 2</label> 
            <input type="number" name="angka2" placeholder="Masukkan Angka">
        </div>
        <button type="submit">Proses</button>
    </form>
    <h3>Hasilnya adalah : {{ $kali }}</h3>
@endsection