@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{$title ?? ''}}
        </div>
        <div class="card-body">
            <div align="right" class="mb-3">
                <a href="#" class="btn btn-primary">Tambah</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $users as $index =>$value)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm">Edit</a>
                                    <button class="btn btn-warning btn-sm" type="submit">
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