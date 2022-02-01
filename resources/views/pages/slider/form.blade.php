@extends('layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Slider</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">MTSS Pegambiran</a></li>
                                <li class="breadcrumb-item active">Slider</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('slider') }}"><i class="fa fa-arrow-left"></i> Back</a></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            data-toggle="tooltip" title="Remove">
                                            <i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" action="{{ route($url, $slider->slider_id ?? null) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($slider))
                                        @method('put')
                                        @endif
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control @error('slider_nama') {{ 'is-invalid' }} @enderror" name="slider_nama" id="slider_nama" value="{{ old('slider_nama') ?? $slider->slider_nama ?? '' }}">
                                                @error('slider_nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file" class="form-control @error('slider_foto') {{ 'is-invalid' }} @enderror" name="slider_foto" id="slider_foto" value="{{ old('slider_foto') ?? $slider->slider_foto ?? '' }}">
                                                @error('slider_foto')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    
                                </div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            
@endsection