@extends('layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Informasi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">MTSN Pengambiran</a></li>
                                <li class="breadcrumb-item active">Informasi</li>
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
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('info') }}"><i class="fa fa-arrow-left"></i> Back</a></h3>
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
                                    <form class="form-horizontal" action="{{ route($url, $info->info_id ?? null) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($info))
                                        @method('put')
                                        @endif
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input type="text" class="form-control @error('info_judul') {{ 'is-invalid' }} @enderror" name="info_judul" id="info_judul" value="{{ old('info_judul') ?? $info->info_judul ?? '' }}">
                                                @error('info_judul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Tipe</label>
                                                <select class="custom-select @error('info_tipe') {{ 'is-invalid' }} @enderror" name="info_tipe" id="info_tipe">
                                                    <option value="">--Pilih--</option>
                                                    <option value="Pengumuman">Pengumuman</option>
                                                    <option value="Berita">Berita</option>
                                                    <option value="Info PPDB">Info PPDB</option>
                                                    <option value="Kegiatan Ekstrakulikuler">Kegiatan Ekstrakulikuler</option>
                                                </select>
                                                @if( old('info_tipe') != ''  )
                                                <script>
                                                    document.getElementById('info_tipe').value = "{{ old('info_tipe') }}"
                                                </script>
                                                @endif
                                                @if(isset($info))
                                                <script>
                                                    document.getElementById('info_tipe').value = '<?php echo $info->info_tipe ?>'
                                                </script>
                                                @endif
                                                @error('info_tipe')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file" class="form-control @error('info_foto') {{ 'is-invalid' }} @enderror" name="info_foto" id="info_foto" value="{{ old('info_foto') ?? $info->info_foto ?? '' }}">
                                                @error('info_foto')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="date" class="form-control @error('info_tgl') {{ 'is-invalid' }} @enderror" name="info_tgl" id="info_tgl" value="{{ old('info_tgl') ?? $info->info_tgl ?? '' }}">
                                                @error('info_tgl')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control textarea @error('info_desk') {{ 'is-invalid' }} @enderror" name="info_desk" id="info_desk" rows="2">{{ old('info_desk') ?? $info->info_desk ?? '' }}</textarea>
                                                @error('info_desk')
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