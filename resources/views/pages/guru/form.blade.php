@extends('layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Guru</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">MTSS Pegambiran</a></li>
                                <li class="breadcrumb-item active">Guru</li>
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
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('guru') }}"><i class="fa fa-arrow-left"></i> Back</a></h3>
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

                                    <form class="form-horizontal" action="{{ route($url, $guru->guru_id ?? null) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($guru))
                                        @method('put')
                                        @endif
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>NIP</label>
                                                        <input type="text" class="form-control number @error('guru_nip') {{ 'is-invalid' }} @enderror" name="guru_nip" id="guru_nip" value="{{ old('guru_nip') ?? $guru->guru_nip ?? '' }}">
                                                        @error('guru_nip')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control @error('guru_nama') {{ 'is-invalid' }} @enderror" name="guru_nama" id="guru_nama" value="{{ old('guru_nama') ?? $guru->guru_nama ?? '' }}">
                                                        @error('guru_nama')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control @error('guru_username') {{ 'is-invalid' }} @enderror" name="guru_username" id="guru_username" value="{{ old('guru_username') ?? $guru->guru_username ?? '' }}">
                                                        @error('guru_username')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control @error('guru_password') {{ 'is-invalid' }} @enderror" name="guru_password" id="guru_password" value="{{ old('guru_password') ?? '' }}">
                                                        @if(isset($guru))
                                                        <span style="color: red; font-style: italic; font-size: 14px;">* Abaikan jika tidak ingin ganti password</span>
                                                        @endif
                                                        @error('guru_password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input type="date" class="form-control @error('guru_tgl_lahir') {{ 'is-invalid' }} @enderror" name="guru_tgl_lahir" id="guru_tgl_lahir" value="{{ old('guru_tgl_lahir') ?? $guru->guru_tgl_lahir ?? '' }}">
                                                        @error('guru_tgl_lahir')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select class="custom-select @error('guru_jk') {{ 'is-invalid' }} @enderror" name="guru_jk" id="guru_jk">
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                        
                                                        @if( old('guru_jk') != ''  )
                                                        <script>
                                                            document.getElementById('guru_jk').value = "{{ old('guru_jk') }}"
                                                        </script>
                                                        @endif
                                                        @if(isset($guru))
                                                        <script>
                                                            document.getElementById('guru_jk').value = '<?php echo $guru->guru_jk ?>'
                                                        </script>
                                                        @endif
                                                        @error('guru_jk')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>No Telpon</label>
                                                        <input type="text" class="form-control number @error('guru_notelp') {{ 'is-invalid' }} @enderror" name="guru_notelp" id="guru_notelp" value="{{ old('guru_notelp') ?? $guru->guru_notelp ?? '' }}">
                                                        @error('guru_notelp')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea class="form-control @error('guru_alamat') {{ 'is-invalid' }} @enderror" name="guru_alamat" id="guru_alamat" rows="2">{{ old('guru_alamat') ?? $guru->guru_alamat ?? '' }}</textarea>
                                                        @error('guru_alamat')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Mata Pelajaran</label>
                                                        <select class="custom-select select2bs4 @error('mapel_id') {{ 'is-invalid' }} @enderror" name="mapel_id" id="mapel_id">
                                                            <option value="0">--Pilih--</option>
                                                            @foreach($mapel as $no => $mpl)
                                                            <option value="{{ $mpl->mapel_id }}">{{ $mpl->mapel_nama }}</option>
                                                            @endforeach

                                                        </select>
                                                        
                                                        @if( old('mapel_id') != ''  )
                                                        <script>
                                                            document.getElementById('mapel_id').value = "{{ old('mapel_id') }}"
                                                        </script>
                                                        @endif
                                                        @if(isset($guru))
                                                        <script>
                                                            document.getElementById('mapel_id').value = '<?php echo $guru->mapel_id ?>'
                                                        </script>
                                                        @endif
                                                        @error('mapel_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="custom-select @error('guru_status') {{ 'is-invalid' }} @enderror" name="guru_status" id="guru_status">
                                                            <option value="Aktif">Aktif</option>
                                                            <option value="Pensiun">Pensiun</option>
                                                            <option value="Pindah">Pindah</option>
                                                        </select>
                                                        
                                                        @if( old('guru_status') != ''  )
                                                        <script>
                                                            document.getElementById('guru_status').value = "{{ old('guru_status') }}"
                                                        </script>
                                                        @endif
                                                        @if(isset($guru))
                                                        <script>
                                                            document.getElementById('guru_status').value = '<?php echo $guru->guru_status ?>'
                                                        </script>
                                                        @endif
                                                        @error('guru_status')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Foto</label>
                                                        <input type="file" class="form-control @error('guru_foto') {{ 'is-invalid' }} @enderror" name="guru_foto" id="guru_foto" value="{{ old('guru_foto') ?? $guru->guru_foto ?? '' }}">
                                                        @error('guru_foto')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <select class="custom-select @error('guru_jabatan') {{ 'is-invalid' }} @enderror" name="guru_jabatan" id="guru_jabatan">
                                                            <option value="">--Pilih--</option>
                                                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                            <option value="Guru">Guru</option>
                                                            <!-- <option value="Karyawan">Karyawan</option> -->
                                                        </select>
                                                        
                                                        @if( old('guru_jabatan') != ''  )
                                                        <script>
                                                            document.getElementById('guru_jabatan').value = "{{ old('guru_jabatan') }}"
                                                        </script>
                                                        @endif
                                                        @if(isset($guru))
                                                        <script>
                                                            document.getElementById('guru_jabatan').value = '<?php echo $guru->guru_jabatan ?>'
                                                        </script>
                                                        @endif
                                                        @error('guru_jabatan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="jabatan_div">

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
            <script>
                $('#guru_jabatan').change(function (e) { 
                    e.preventDefault();
                    if(this.value == 'Kepala Sekolah'){
                        $('#jabatan_div').html(`
                            <div class="form-group">
                                <label>Lama Jabatan</label>
                                <input type="text" class="form-control number @error('kepsek_tahun') {{ 'is-invalid' }} @enderror" name="kepsek_tahun" id="kepsek_tahun" value="{{ old('kepsek_tahun') ?? $guru->kepsek_tahun ?? '' }}" placeholder="2020-2023">
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

            @if(count($errors) > 0)
            <script>
                $(document).ready(function () {
                    var jabatan =  $('#guru_jabatan').val();
                    if(jabatan == 'Kepala Sekolah'){
                        $('#jabatan_div').html(`
                            <div class="form-group">
                                <label>Lama Jabatan</label>
                                <input type="text" class="form-control number @error('kepsek_tahun') {{ 'is-invalid' }} @enderror" name="kepsek_tahun" id="kepsek_tahun" value="{{ old('kepsek_tahun') ?? $guru->kepsek_tahun ?? '' }}" placeholder="Contoh : 2020-2023">
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

            @if(isset($guru))
            <script>
                $(document).ready(function () {
                    var jabatan =  '{{ $guru->guru_jabatan }}';
                    if(jabatan == 'Kepala Sekolah'){
                        $('#jabatan_div').html(`
                            <div class="form-group">
                                <label>Lama Jabatan</label>
                                <input type="text" class="form-control number @error('kepsek_tahun') {{ 'is-invalid' }} @enderror" name="kepsek_tahun" id="kepsek_tahun" value="{{ old('kepsek_tahun') ?? $guru->kepsek_tahun ?? '' }}" placeholder="Contoh : 2020-2023">
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