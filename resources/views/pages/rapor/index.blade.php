@extends('layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Rapor</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">E Rapor</a></li>
                                <li class="breadcrumb-item active">Data Rapor</li>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Kelas</label>
                                                                <select class="custom-select select2bs4 @error('kelas_id') {{ 'is-invalid' }} @enderror" name="kelas_id" id="kelas_id" onchange="cariDataSiswa()">
                                                                    <option value="0">--Pilih--</option>
                                                                    @foreach($kelas as $no => $kls)
                                                                    <option value="{{ $kls->kelas_id }}">{{ $kls->kelas_nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if( old('kelas_id') != ''  )
                                                                <script>
                                                                    document.getElementById('kelas_id').value = "{{ old('kelas_id') }}"
                                                                </script>
                                                                @endif
                                                                @error('kelas_id')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Semester</label>
                                                                <select class="custom-select select2bs4 @error('semester_id') {{ 'is-invalid' }} @enderror" name="semester_id" id="semester_id" onchange="cariDataSiswa()">
                                                                    <option value="0">--Pilih--</option>
                                                                    @foreach($semester as $no => $sms)
                                                                    <option value="{{ $sms->semester_id }}">{{ $sms->semester_nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if( old('semester_id') != ''  )
                                                                <script>
                                                                    document.getElementById('semester_id').value = "{{ old('semester_id') }}"
                                                                </script>
                                                                @endif
                                                                @error('semester_id')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tahun Ajar</label>
                                                                <select class="custom-select select2bs4 @error('tahun_ajar_id') {{ 'is-invalid' }} @enderror" name="tahun_ajar_id" id="tahun_ajar_id" onchange="cariDataSiswa()">
                                                                    <option value="0">--Pilih--</option>
                                                                    @foreach($tahunAjar as $no => $thn)
                                                                    <option value="{{ $thn->tahun_ajar_id }}">{{ $thn->tahun_ajar_nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if( old('tahun_ajar_id') != ''  )
                                                                <script>
                                                                    document.getElementById('tahun_ajar_id').value = "{{ old('tahun_ajar_id') }}"
                                                                </script>
                                                                @endif
                                                                @error('tahun_ajar_id')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="callout callout-success" style="display:none" id="messageModal">
                                                <strong id="messageModalText"></strong>
                                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                            </div>
                                            <hr>
                                            <h4 class="text-center">Data Siswa</h4>
                                            <div id="data_siswa">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nis</th>
                                                            <th>Nama</th>
                                                            <th>Option</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
                function cariDataSiswa() {  
                    var kelas_id = $('#kelas_id').val();
                    var semester_id = $('#semester_id').val();
                    var tahun_ajar_id = $('#tahun_ajar_id').val();
                    
                    if(kelas_id != '0' && semester_id != '0' && tahun_ajar_id != '0'){
                        $('#data_siswa').load(`{{ url("/administrator/rapor/cari-data-siswa") }}/` + kelas_id + '/' + semester_id + '/' + tahun_ajar_id )
                    } else {
                        $('#data_siswa').html();
                    }
                }

                
                function accRaporSiswa() {  
                    var siswa_id = $('#siswa_id_acc').val();
                    var kelas_id = $('#kelas_id').val();
                    var semester_id = $('#semester_id').val();
                    var tahun_ajar_id = $('#tahun_ajar_id').val();


                    axios.post('{{ route("rapor.acc") }}', {
                        '_token': '{{ csrf_token() }}',
                        'kelas_id' : kelas_id, 
                        'semester_id' : semester_id, 
                        'tahun_ajar_id' : tahun_ajar_id, 
                        'siswa_id' : siswa_id, 
                    }).then(function (res) {
                        $('#messageModal').show();
                        $('#messageModalText').text(res.data.message)
                        setInterval(function(){ $('#messageModal').hide(); }, 5000);
                        $('#ModalAccSiswa').modal('hide')
                        $('#data_siswa').load(`{{ url("/administrator/rapor/cari-data-siswa") }}/` + kelas_id + '/' + semester_id + '/' + tahun_ajar_id )

                    }).catch(function (err) {
                        console.log(err);
                    })
                
                }

            </script>

@endsection