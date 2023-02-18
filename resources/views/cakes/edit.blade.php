@extends('layouts.master')

@section('h1')
    <h1 class="m-0 fw-bold">Edit Kue</h1>
@endsection

@section('content')
<!-- Form Content -->
<form action="/prosesedit/{{ $cake->id }}" method="POST" enctype="multipart/form-data">
    @csrf
        {{-- Edit Nama Kue --}}
    <div class="col-lg-8 ms-1">
        <label for="cake" class="form-label">Nama Kue</label>
        <input type="text" name="nama_kue" class="form-control" id="cake" value="{{ $cake->nama_kue }}">
        @foreach($errors->get('nama_kue') as $msg)
        <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
        {{-- Edit Stok Kue --}}
    <div class="col-lg-8 ms-1 mt-3">
        <label for="stok" class="form-label">Stok Kue</label>
        <input type="text" name="stok_kue" class="form-control" id="stok" value="{{ $cake->stok_kue }}">
        @foreach($errors->get('stok_kue') as $msg)
        <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
        {{-- Edit Jenis Kue --}}
    <div class="col-lg-8 ms-1 mt-3">
        <label for="jenis" class="form-label">Jenis Kue</label>
        <select id="jenis" class="form-select" name="jenis_kue" required>
            <option disabled="disabled" selected>{{ $cake->jenis_kue }}</option>
            <option value="Kering">Kering</option>
            <option value="Basah">Basah</option>
        </select>
        @foreach($errors->get('jenis_kue') as $msg)
        <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
        {{-- Edit Tanggal Expired --}}
    <div class="col-lg-8 ms-1 mt-3">
        <label for="stok" class="form-label">Tanggal Expired</label>
        <input type="date" name="tanggal_expired" class="form-control" id="tanggal_expired"
            value="{{ $cake->tanggal_expired }}">
        @foreach($errors->get('tanggal_expired') as $msg)
        <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
        {{-- Edit Harga Kue --}}
    <div class="col-lg-8 ms-1 mb-2 mt-3">
        <label for="harga_kue" class="form-label">Harga Kue</label>
        <input type="text" name="harga_kue" class="form-control" id="harga_kue" value="{{ $cake->harga_kue }}">
        @foreach($errors->get('harga_kue') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
        {{-- Gambar Lama Kue --}}
    <div class="col-md-4 m-5">
        <img src="{{ asset('IMG/Cake/'. $cake->gambar_kue) }}" width="55%" height="10%" alt="">
    </div>
        {{-- Edit Gambar Kue --}}
    <div class="col-lg-8 ms-1 mt-3>
        <label for="formFile" class="form-label">Insert Picture</label>
        <input class="form-control" type="file" name="gambar_kue">
        @foreach($errors->get('gambar_kue') as $msg)
        <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
        {{-- Edit Deskripsi Kue --}}
    <div class="col-lg-10 ms-1 mt-4">
        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Kue</label>
        <textarea class="form-control" name="deskripsi_kue" id="exampleFormControlTextarea1" rows="3">{!! $cake->deskripsi_kue !!}</textarea>
        @foreach($errors->get('deskripsi_kue') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-8 ms-1 pb-3 mt-3">
        <button type="submit" class="btn btn-info">Submit</button>
    </div>
</form>
@endsection
