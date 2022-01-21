@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Buku</div>
               <div class="card-body">
                {!! Form::model($objek, ['route' => $route,'method' => $method]) !!}
                <div class="form-group">
                    <label for="judul">Judul</label>
                    {!! Form::text('judul',null, ['class' => 'form-control','autofocus']) !!}
                    <span class="text-danger">{!! $errors->first('judul') !!}</span>
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang</label>
                    {!! Form::text('pengarang',null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{!! $errors->first('pengarang') !!}</span>
                </div>
                {!! Form::submit($namaTombol, ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
