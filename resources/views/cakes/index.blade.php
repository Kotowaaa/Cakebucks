@extends('layouts.master')

@section('h1')
<h1 class="m-0 fw-bold">Stok Kue</h1>
@endsection

@section('content')

<body>
    <div class="container">
        <div class="card mt-0" style="height: auto;">
            <div class="card-header text-center">
                <h2 class="fw-bold">List Stok Kue</h2>
            </div>

            <!-- Alert -->
            @if(session()->has('succes'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('succes') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <!-- /. Alert -->

            <!-- View data table kue -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kue</th>
                            <th>Stok Kue</th>
                            <th>Jenis Kue</th>
                            <th>Tanggal Expired</th>
                            <th>Harga Kue</th>
                            <th>Gambar Kue</th>
                            <th>Deskripsi Kue</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($cake as $c => $cake)
                        <tr>
                            <td scope="row">{{ ++$c }}</td>
                            <td>{{ $cake->nama_kue }}</td>
                            <td>{{ $cake->stok_kue }}</td>
                            <td>{{ $cake->jenis_kue }}</td>
                            <td>{{ $cake->tanggal_expired }}</td>
                            <td>@currency($cake->harga_kue)</td>
                            <td>
                                <img src="{{ asset('IMG/Cake/' . $cake->gambar_kue) }}" class="img-fluid"
                                    style="width: 100px ;" alt="">
                            </td>
                            <td>{{Str::limit($cake->deskripsi_kue, 100) }}</td>
                            <td>
                                <a href="cakes/{{ $cake->id }}/edit" class="btn btn-warning btn-sm  mb-3">Edit</a>
                                <a href="{{ route('delete-cake', $cake->id) }}" onclick="return('Apakah Yakin Hapus!')" class="btn btn-danger btn-sm  mt-3">Hapus !</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <br />
            </div>
            <!-- End of data table kue -->
        </div>
    </div>
</body>
@endsection
