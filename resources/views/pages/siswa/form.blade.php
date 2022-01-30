@extends('layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">MTSN Pengambiran</a></li>
                                <li class="breadcrumb-item active">Siswa</li>
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
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('siswa') }}"><i class="fa fa-arrow-left"></i> Back</a></h3>
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
                                    <form class="form-horizontal" action="{{ route($url, $siswa->siswa_id ?? null) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($siswa))
                                        @method('put')
                                        @endif
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>NIS</label>
                                                <input type="text" class="form-control number @error('siswa_nis') {{ 'is-invalid' }} @enderror" name="siswa_nis" id="siswa_nis" value="{{ old('siswa_nis') ?? $siswa->siswa_nis ?? '' }}">
                                                @error('siswa_nis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control @error('siswa_nama') {{ 'is-invalid' }} @enderror" name="siswa_nama" id="siswa_nama" value="{{ old('siswa_nama') ?? $siswa->siswa_nama ?? '' }}">
                                                @error('siswa_nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control @error('siswa_password') {{ 'is-invalid' }} @enderror" name="siswa_password" id="siswa_password" value="{{ old('siswa_password') ?? '' }}">
                                                @if(isset($siswa))
                                                <span style="color: red; font-style: italic; font-size: 14px;">* Abaikan jika tidak ingin ganti password</span>
                                                @endif
                                                @error('siswa_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control @error('siswa_tgl_lahir') {{ 'is-invalid' }} @enderror" name="siswa_tgl_lahir" id="siswa_tgl_lahir" value="{{ old('siswa_tgl_lahir') ?? $siswa->siswa_tgl_lahir ?? '' }}">
                                                @error('siswa_tgl_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="custom-select @error('siswa_jk') {{ 'is-invalid' }} @enderror" name="siswa_jk" id="siswa_jk">
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                
                                                @if( old('siswa_jk') != ''  )
                                                <script>
                                                    document.getElementById('siswa_jk').value = "{{ old('siswa_jk') }}"
                                                </script>
                                                @endif
                                                @if(isset($siswa))
                                                <script>
                                                    document.getElementById('siswa_jk').value = '<?php echo $siswa->siswa_jk ?>'
                                                </script>
                                                @endif
                                                @error('siswa_jk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>No Telpon</label>
                                                <input type="text" class="form-control number @error('siswa_notelp') {{ 'is-invalid' }} @enderror" name="siswa_notelp" id="siswa_notelp" value="{{ old('siswa_notelp') ?? $siswa->siswa_notelp ?? '' }}">
                                                @error('siswa_notelp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control @error('siswa_alamat') {{ 'is-invalid' }} @enderror" name="siswa_alamat" id="siswa_alamat" rows="2">{{ old('siswa_alamat') ?? $siswa->siswa_alamat ?? '' }}</textarea>
                                                @error('siswa_alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="custom-select @error('siswa_status') {{ 'is-invalid' }} @enderror" name="siswa_status" id="siswa_status">
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Non Aktif">Non Aktif</option>
                                                </select>
                                                
                                                @if( old('siswa_status') != ''  )
                                                <script>
                                                    document.getElementById('siswa_status').value = "{{ old('siswa_status') }}"
                                                </script>
                                                @endif
                                                @if(isset($siswa))
                                                <script>
                                                    document.getElementById('siswa_status').value = '<?php echo $siswa->siswa_status ?>'
                                                </script>
                                                @endif
                                                @error('siswa_status')
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
            <!-- /.content -->

@endsection