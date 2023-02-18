@extends('layouts.master')

@section('h1')
<h1 class="m-0 fw-bold">Cetak Data</h1>
@endsection

@section('content')
<!-- content -->
<div class="content">
    <!-- card -->
    <div class="card card-info card-outline" style="height: auto; margin-bottom: 20px;">
        <!-- card header -->
        <div class="card-header">
            <h3 class="fw-bold m-3">Cetak Data Penjualan</h3>
        </div>
        <!-- /. card header -->
        <!-- Card body -->
        <!-- Form Content -->
        <form action="{{ route('cetak-data-pertanggal') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="col-lg-5 mb-3">
                    <label for="label" class="form-label">Tanggal Awal</label>
                    <input type="date" name="start_date" id="start_date" class="form-control">
                </div>
                <div class="col-lg-5 mb-3">
                    <label for="label" class="form-label">Tanggal Akhir</label>
                    <input type="date" name="end_date" id="end_date" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" name="exportExcel"
                        class="btn btn-info col-md-12">
                        Cetak Data Penjualan <i class="nav-icon fas fa-print"></i>
                    </button>
        </form>
    </div>
    </form>
    <!-- /. Form Content -->
</div>
<!-- /. card-body -->
</div>
<!-- /. card -->
</div>
<!-- /. content -->
@endsection
