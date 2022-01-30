@extends('layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Admin</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">MTSN Pengambiran</a></li>
                                <li class="breadcrumb-item active">Admin</li>
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
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('admin') }}"><i class="fa fa-arrow-left"></i> Back</a></h3>
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
                                    
                                    <div class="callout callout-success" style="display:none" id="message">
                                        <strong>{{ session()->get('message') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>

                                    <form class="form-horizontal" action="{{ route($url, $admin->admin_id ?? null) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($admin))
                                        @method('put')
                                        @endif
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control @error('admin_nama') {{ 'is-invalid' }} @enderror" name="admin_nama" id="admin_nama" value="{{ old('admin_nama') ?? $admin->admin_nama ?? '' }}">
                                                        @error('admin_nama')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control @error('admin_username') {{ 'is-invalid' }} @enderror" name="admin_username" id="admin_username" value="{{ old('admin_username') ?? $admin->admin_username ?? '' }}">
                                                        @error('admin_username')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control @error('admin_password') {{ 'is-invalid' }} @enderror" name="admin_password" id="admin_password" value="{{ old('admin_password') ?? '' }}">
                                                        @if(isset($admin))
                                                        <span style="color: red; font-style: italic; font-size: 14px;">* Abaikan jika tidak ingin ganti password</span>
                                                        @endif
                                                        @error('admin_password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select class="custom-select @error('admin_jk') {{ 'is-invalid' }} @enderror" name="admin_jk" id="admin_jk">
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                        
                                                        @if( old('admin_jk') != ''  )
                                                        <script>
                                                            document.getElementById('admin_jk').value = "{{ old('admin_jk') }}"
                                                        </script>
                                                        @endif
                                                        @if(isset($admin))
                                                        <script>
                                                            document.getElementById('admin_jk').value = '<?php echo $admin->admin_jk ?>'
                                                        </script>
                                                        @endif
                                                        @error('admin_jk')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>No Telpon</label>
                                                        <input type="text" class="form-control number @error('admin_notelp') {{ 'is-invalid' }} @enderror" name="admin_notelp" id="admin_notelp" value="{{ old('admin_notelp') ?? $admin->admin_notelp ?? '' }}">
                                                        @error('admin_notelp')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea class="form-control @error('admin_alamat') {{ 'is-invalid' }} @enderror" name="admin_alamat" id="admin_alamat" rows="2">{{ old('admin_alamat') ?? $admin->admin_alamat ?? '' }}</textarea>
                                                        @error('admin_alamat')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
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

            @if(isset($admin))
            <script>
                $(document).ready(function () {
                    var jabatan =  '{{ $admin->admin_jabatan }}';
                    if(jabatan == 'Kepala Sekolah'){
                        $('#jabatan_div').html(`
                            <div class="form-group">
                                <label>Lama Jabatan</label>
                                <input type="text" class="form-control number @error('kepsek_tahun') {{ 'is-invalid' }} @enderror" name="kepsek_tahun" id="kepsek_tahun" value="{{ old('kepsek_tahun') ?? $admin->kepsek_tahun ?? '' }}" placeholder="Contoh : 2020-2023">
                                @error('kepsek_tahun')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        `);
                    }else{
                        $('#jabatan_div').html('');
                    }
                });
            </script>
            @endif


            @if (session()->has('message'))
            <script>
                $('#message').show();
                setInterval(function(){ $('#message').hide(); }, 5000);
            </script>
            @endif
@endsection