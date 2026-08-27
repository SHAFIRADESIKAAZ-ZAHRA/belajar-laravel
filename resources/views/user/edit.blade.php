@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{$title ?? ''}}
        </div>
        <div class="card-body">
            <form action="{{route('user.update', $edit->id)}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="" class="form-label fws-semibold">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $edit->name }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fws-semibold">Email</label>
                    <input type="text" class="form-control" name="email" @error('email') is-invalid @enderror" name="email" value="{{ $edit->email }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fws-semibold">Password</label>
                    <input type="password" class="form-control" name="password">
                    <small class="text-muted">(kosongkan jika tidak ingin diubah)</small>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Simpan perubahan</button>
                    <a href="{{ url()->previous() }}" class="text-muted">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection