@extends('layouts.master')

@section('h1')
<!-- Title Content -->
    <h1 class="m-0 fw-bold">Tambah Kue</h1>
@endsection

@section('content')
<title>Cake</title>
<!-- Form Content -->
<form action="/prosescake" method="POST" enctype="multipart/form-data" class="row g-5">
    @csrf
    <div class="col-lg-5 ms-3">
        <label for="cake" class="form-label">Nama Kue</label>
        <input type="text" name="nama_kue" class="form-control" id="cake" value="{{ old('nama_kue') }}">
        @foreach($errors->get('nama_kue') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-lg-5 ms-3">
        <label for="stok" class="form-label">Stok Kue</label>
        <input type="text" name="stok_kue" class="form-control" id="stok" value="{{ old('stok_kue') }}">
        @foreach($errors->get('stok_kue') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-lg-5 ms-3">
        <label for="jenis" class="form-label">Jenis Kue</label>
        <select id="jenis" class="form-select" name="jenis_kue" required>
            <option disabled="disabled" selected>Pilih...</option>
            <option value="Kering">Kering</option>
            <option value="Basah">Basah</option>
        </select>
        @foreach($errors->get('jenis_kue') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-lg-5 ms-3">
        <label for="tanggal_expired" class="form-label">Tanggal Expired</label>
        <input type="date" name="tanggal_expired" class="form-control" id="tanggal_expired" value="{{ old('tanggal_expired') }}">
        @foreach($errors->get('tanggal_expired') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-lg-5 ms-3">
        <label for="harga_kue" class="form-label">Harga Kue</label>
        <input type="number" name="harga_kue" class="form-control" id="harga_kue" value="{{ old('harga_kue') }}">
        @foreach($errors->get('harga_kue') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-lg-5 ms-3">
        <label for="formFile" class="form-label">Insert Picture</label>
        <input class="form-control" type="file" name="gambar_kue">
        @foreach($errors->get('gambar_kue') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-lg-10 ms-3">
        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Kue</label>
        <textarea class="form-control" name="deskripsi_kue" id="exampleFormControlTextarea1" rows="3">{!! old('deskripsi_kue') !!}</textarea>
        @foreach($errors->get('deskripsi_kue') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-8 ms-3 mt-4 mb-4">
        <button type="submit" class="btn btn-info text-white">Submit</button>
    </div>
</form>
@endsection
