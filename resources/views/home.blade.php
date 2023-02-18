@extends('layouts.master')

@section('h1')
<h1 class="m-0 fw-bold">Dashboard</h1>
@endsection

@section('content')

<!-- Alert -->
@if(session()->has('succes'))
<div class="alert alert-success alert-dismissible fade show col-lg-5 float-right" role="alert">
    <strong>{{ session('succes') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!-- /. Alert -->

<div class="row row-cols-5 row-cols-md-4 g-4 container">
    @foreach($cake as $c)
    <div class="col">
        <div class="card" style="width: 100%;">
            <img src="{{ asset('IMG/Cake/' . $c->gambar_kue) }}" class="card-img-top" style="height: 55vh;" alt="...">
            <div class="card-body">
                <h1 class="card-title fw-bold mb-2">{{ $c->nama_kue }}</h1>
                <p class="card-text overflow-auto">{{ Str::limit($c->deskripsi_kue, 300) }}</p>
                <a href="#" class="btn btn-info fixed">Read More...</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
