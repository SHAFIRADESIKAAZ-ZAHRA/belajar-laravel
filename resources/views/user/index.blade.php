@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{$title ?? ''}}
        </div>
        <div class="card-body">
            <div align="right" class="mb-3">
                <a href="{{ route('user.create')}}" class="btn btn-primary">Tambah</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $users as $index =>$value)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>
                                <a href="{{ route('user.edit', $value->id)}}" class="btn btn-success btn-sm">Edit</a>
                                <form class="d-inline" action="{{ route('user.destroy', $value->id) }}" method="post">
                                    @csrf
                                    @method('delete')
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