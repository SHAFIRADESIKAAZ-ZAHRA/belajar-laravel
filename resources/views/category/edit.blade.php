@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $title ?? '' }}
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $edit->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold">Nama Category</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', $edit->name) }}">
                    @error('name')
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