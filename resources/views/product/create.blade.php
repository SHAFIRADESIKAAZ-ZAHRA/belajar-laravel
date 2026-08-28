@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $title ?? '' }}
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label fws-semibold">Kategori</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fws-semibold">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fws-semibold">Harga</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fws-semibold">Deskripsi</label>
                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url()->previous() }}" class="text-muted">Kembali</a>
            </form>
        </div>
    </div>
@endsection