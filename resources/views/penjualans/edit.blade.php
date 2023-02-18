@extends('layouts.master')

@section('h1')
<!-- Title Content -->
    <h1 class="m-0 fw-bold">Edit | Data Penjualan</h1>
@endsection

@section('content')
<title>Edit | Data Penjualan</title>
<!-- Form Content -->
<form action="/proses-data-penjualan" method="POST">
    @csrf
    <div class="col-lg-5 ms-3">
        <label for="cake" class="form-label">Nama Kue</label>
        <input type="text" name="nama_kue" class="form-control" id="cake" value="{{ $Penjualans->nama_kue }}">
        @foreach($errors->get('nama_kue') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-lg-5 ms-3">
        <label for="jumlah_kue" class="form-label">Jumlah Kue</label>
        <input type="text" name="jumlah_kue" class="form-control" id="jumlah_kue" value="{{ $Penjualans->jumlah_kue }}">
        @foreach($errors->get('jumlah_kue') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-lg-5 ms-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $Penjualans->tanggal }}">
        @foreach($errors->get('tanggal') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-lg-5 ms-3">
        <label for="nominal_harga" class="form-label">Total Penghasilan</label>
        <input type="number" name="nominal_harga" class="form-control" id="nominal_harga" value="{{ $Penjualans->nominal_harga }}">
        @foreach($errors->get('nominal_harga') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
    <div class="col-8 ms-3 mt-4 mb-4">
        <button type="submit" class="btn btn-info text-white">Submit</button>
    </div>
</form>
@endsection