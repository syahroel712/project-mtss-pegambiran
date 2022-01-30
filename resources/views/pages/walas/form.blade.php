@extends('layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Wali Kelas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">MTSN Pengambiran</a></li>
                                <li class="breadcrumb-item active">Wali Kelas</li>
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

                                    <form class="form-horizontal" action="{{ route($url, $walas->walas_id ?? null) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($walas))
                                        @method('put')
                                        @endif
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Wali Kelas</label>
                                                <select class="custom-select select2bs4 @error('guru_id') {{ 'is-invalid' }} @enderror" name="guru_id" id="guru_id">
                                                    <option value="">--Pilih--</option>
                                                    @foreach($guru as $no => $gr)
                                                    <option value="{{ $gr->guru_id }}">[ {{ $gr->guru_nip }} ] - [ {{ $gr->guru_nama }} ] - [ {{ $gr->guru_jabatan }} ] </option>
                                                    @endforeach
                                                </select>
                                                @if( old('guru_id') != ''  )
                                                <script>
                                                    document.getElementById('guru_id').value = "{{ old('guru_id') }}"
                                                </script>
                                                @endif
                                                @if(isset($walas))
                                                <script>
                                                    document.getElementById('guru_id').value = '<?php echo $walas->guru_id ?>'
                                                </script>
                                                @endif
                                                @error('guru_id')
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
                                                @if(isset($walas))
                                                <script>
                                                    document.getElementById('kelas_id').value = '<?php echo $walas->kelas_id ?>'
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
                                                @if(isset($walas))
                                                <script>
                                                    document.getElementById('tahun_ajar_id').value = '<?php echo $walas->tahun_ajar_id ?>'
                                                </script>
                                                @endif
                                                @error('tahun_ajar_id')
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