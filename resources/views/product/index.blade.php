@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $title ?? '' }}
        </div>
        <div class="card-body">
            <div align="right" class="mb-3">
                <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->category->name ?? '-' }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success btn-sm">Edit</a>

                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-warning btn-sm" type="submit"
                                        onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection