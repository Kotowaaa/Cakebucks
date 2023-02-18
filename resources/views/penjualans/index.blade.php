@extends('layouts.master')

@section('h1')
<h1 class="m-0 fw-bold">Data Penjualan</h1>
@endsection

@section('content')

<body>
    <div class="container">
        <div class="card mt-0" style="height: auto;">
            <div class="card-header text-center">
                <h2 class="fw-bold">List Data Penjualan</h2>
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
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kue</th>
                            <th>Jumlah Kue</th>
                            <th>Tanggal</th>
                            <th>Total Penghasilan</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($Penjualans as $p => $Penjualans)
                        <tr>
                            <td scope="row">{{ ++$p }}</td>
                            <td>{{ $Penjualans->nama_kue }}</td>
                            <td>{{ $Penjualans->jumlah_kue }}</td>
                            <td>{{ $Penjualans->created_at }}</td>
                            <td>@currency($Penjualans->nominal_harga)</td>
                            <td>
                                <a href="penjualans/{{ $Penjualans->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <!-- Toggler Button -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Hapus
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Yakin Ingin Menghapus!&hellip;</p>
                                            </div>
                                            <div class="modal-footer">
                                            <form action="{{ route('delete-data-penjualan' , $Penjualans->id) }}" class="pt-3"
                                                    method="post">
                                                    @csrf
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit"
                                                    class="btn btn-danger">Save changes</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
