@extends('layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pembayaran SPP</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">MTSS Pegambiran</a></li>
                                <li class="breadcrumb-item active">Pembayaran SPP</li>
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
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('walas') }}"><i class="fa fa-arrow-left"></i> Back</a></h3>
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

                                    <form class="form-horizontal" action="{{ route($url, $spp->spp_id ?? null) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($spp))
                                        @method('put')
                                        @endif
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <select class="custom-select select2bs4 @error('siswa_id') {{ 'is-invalid' }} @enderror" name="siswa_id" id="siswa_id">
                                                    <option value="">--Pilih--</option>
                                                    @foreach($siswa as $no => $sw)
                                                    <option value="{{ $sw->siswa_id }}">[ {{ $sw->siswa_nis }} ] - [ {{ $sw->siswa_nama }} ] </option>
                                                    @endforeach
                                                </select>
                                                @if( old('siswa_id') != ''  )
                                                <script>
                                                    document.getElementById('siswa_id').value = "{{ old('siswa_id') }}"
                                                </script>
                                                @endif
                                                @if(isset($spp))
                                                <script>
                                                    document.getElementById('siswa_id').value = '<?php echo $spp->siswa_id ?>'
                                                </script>
                                                @endif
                                                @error('siswa_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select class="custom-select select2bs4 @error('kelas_id') {{ 'is-invalid' }} @enderror" name="kelas_id" id="kelas_id">
                                                    <option value="">--Pilih--</option>
                                                    @foreach($kelas as $no => $kls)
                                                    <option value="{{ $kls->kelas_id }}">{{ $kls->kelas_nama }}</option>
                                                    @endforeach
                                                </select>
                                                @if( old('kelas_id') != ''  )
                                                <script>
                                                    document.getElementById('kelas_id').value = "{{ old('kelas_id') }}"
                                                </script>
                                                @endif
                                                @if(isset($spp))
                                                <script>
                                                    document.getElementById('kelas_id').value = '<?php echo $spp->kelas_id ?>'
                                                </script>
                                                @endif
                                                @error('kelas_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Tahun Ajar</label>
                                                <select class="custom-select select2bs4 @error('tahun_ajar_id') {{ 'is-invalid' }} @enderror" name="tahun_ajar_id" id="tahun_ajar_id">
                                                    <option value="">--Pilih--</option>
                                                    @foreach($tahunAjar as $no => $thn)
                                                    <option value="{{ $thn->tahun_ajar_id }}">{{ $thn->tahun_ajar_nama }}</option>
                                                    @endforeach
                                                </select>
                                                @if( old('tahun_ajar_id') != ''  )
                                                <script>
                                                    document.getElementById('tahun_ajar_id').value = "{{ old('tahun_ajar_id') }}"
                                                </script>
                                                @endif
                                                @if(isset($spp))
                                                <script>
                                                    document.getElementById('tahun_ajar_id').value = '<?php echo $spp->tahun_ajar_id ?>'
                                                </script>
                                                @endif
                                                @error('tahun_ajar_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Bayar</label>
                                                <input type="date" class="form-control @error('spp_tgl_bayar') {{ 'is-invalid' }} @enderror" name="spp_tgl_bayar" id="spp_tgl_bayar" value="{{ old('spp_tgl_bayar') ?? $spp->spp_tgl_bayar ?? date('Y-m-d') }}">
                                                @error('spp_tgl_bayar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah Bayar</label>
                                                <input type="number" class="number form-control @error('spp_bayar') {{ 'is-invalid' }} @enderror" name="spp_bayar" id="spp_bayar" value="{{ old('spp_bayar') ?? $spp->spp_bayar ?? '' }}">
                                                @error('spp_bayar')
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
            @if (session()->has('message'))
            <script>
                $('#message').show();
                setInterval(function(){ $('#message').hide(); }, 5000);
            </script>
            @endif
@endsection