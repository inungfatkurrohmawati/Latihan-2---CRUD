@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Buku</div>
                <div class="card-body">
                    <a href="{{ route('buku.create', []) }}" class="btn btn-primary m-1">
                         Tambah</a>
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>NO</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>TANGGAL BUAT</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($objek as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->pengarang }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        {!! Form::open(['method' =>'DELETE',
                                        'route' => ['buku.destroy', $item->id],
                                        'onsubmit' => 'return confirm("Anda yakin")'
                                        ]) !!}
                                        <a class="btn btn-info" href="{{ route('buku.edit', [$item->id]) }}">
                                            Edit</a>
                                        <button class="btn btn-danger ml-2">
                                            Hapus</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
