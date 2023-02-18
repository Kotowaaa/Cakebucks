@extends('layouts.master')

@section('h1')
    <h1 class="m-0 fw-bold">About | Developer</h1>
@endsection

@section('content')
    <!-- About Me Box -->
            <div class="card card-info ms-3 me-3" style="height: auto;">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                    <p class="text-muted">
                        Jurusan Rekayasa Perangkat Lunak,  Dari SMK Negeri 2 Banjarmasin
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">Banjarmasin, Kalimantan Selatan, Indonesia</p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                    <p class="text-muted">
                        <span class="tag tag-danger">Front End Dev</span>
                        <span class="tag tag-success">Coding</span>
                        <span class="tag tag-info">Javascript</span>
                        <span class="tag tag-warning">PHP</span>
                        <span class="tag tag-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                    <p class="text-muted">Always Happy Wherever you are!!!</p>

                    <hr>

                    <strong></strong>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
@endsection
