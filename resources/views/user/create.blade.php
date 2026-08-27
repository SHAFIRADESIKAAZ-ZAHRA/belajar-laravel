@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{$title ?? ''}}
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label fws-semibold">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fws-semibold">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fws-semibold">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="{{ url()->previous() }}" class="text-muted">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection