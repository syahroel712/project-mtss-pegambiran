@extends('layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Input Rapor</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">E Rapor</a></li>
                                <li class="breadcrumb-item active">Input Rapor</li>
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
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Kelas</label>
                                                                <select class="custom-select select2bs4 @error('kelas_id') {{ 'is-invalid' }} @enderror" name="kelas_id" id="kelas_id" onchange="cariSiswa()">
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
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Semester</label>
                                                                <select class="custom-select select2bs4 @error('semester_id') {{ 'is-invalid' }} @enderror" name="semester_id" id="semester_id" onchange="cariSiswa()">
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
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Tahun Ajar</label>
                                                                <select class="custom-select select2bs4 @error('tahun_ajar_id') {{ 'is-invalid' }} @enderror" name="tahun_ajar_id" id="tahun_ajar_id" onchange="cariSiswa()">
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
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Siswa</label>
                                                                <select class="custom-select select2bs4 @error('siswa_id') {{ 'is-invalid' }} @enderror" name="siswa_id" id="siswa_id">
                                                                    <option value="0">--Pilih--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
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
                                                                @error('mapel_id')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nilai</label>
                                                                <input type="number" class="form-control number @error('nilai_detail_nilai') {{ 'is-invalid' }} @enderror" name="nilai_detail_nilai" id="nilai_detail_nilai" value="{{ old('nilai_detail_nilai') ?? $guru->nilai_detail_nilai ?? '' }}" onKeyPress="if(this.value.length==3) return false;">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label><br></label>
                                                                <button class="form-control btn btn-primary" onclick="simpanNilai()">Simpan Nilai</button>
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
                                            <h4 class="text-center">Nilai Siswa</h4>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Mata Pelajaran</th>
                                                        <th>Nilai</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data_nilai_siswa">

                                                </tbody>
                                            </table>
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

            <!-- modal hapus -->
            <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="nilai_detail_id">
                            Yakin Hapus Data ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info btn-sm" onclick="hapusNilai()">Delete</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- modal edit -->
            <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Nilai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="nilai_detail_id_edit">
                            <div class="form-group">
                                <label id="nama_mapel"></label>
                                <input type="number" class="form-control number @error('nilai_detail_nilai_edit') {{ 'is-invalid' }} @enderror" name="nilai_detail_nilai_edit" id="nilai_detail_nilai_edit"  onKeyPress="if(this.value.length==3) return false;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info btn-sm" onclick="editNilai()">Update</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- /.content -->
            <script>
                function cariSiswa() {  
                    var kelas_id = $('#kelas_id').val();
                    var semester_id = $('#semester_id').val();
                    var tahun_ajar_id = $('#tahun_ajar_id').val();
                    
                    if(kelas_id != '0' && semester_id != '0' && tahun_ajar_id != '0'){
                        axios.post('{{ route("rapor.cariSiswa") }}', {
                            '_token': '{{ csrf_token() }}',
                            'kelas_id' : kelas_id, 
                            'semester_id' : semester_id, 
                            'tahun_ajar_id' : tahun_ajar_id, 
                        }).then(function (res) {
                            var siswa = res.data.data;
                            document.getElementById('siswa_id').innerHTML = "<option value='0'>-- Pilih --</option>";
                            for(var x = 0; x < siswa.length; x++)
                            {
                                document.getElementById("siswa_id").innerHTML += "<option value='" + siswa[x].siswa_id + "'>" + siswa[x].siswa_nis + " | " + siswa[x].siswa_nama + "</option>";
                            }
                        }).catch(function (err) {
                            console.log(err);
                        })   
                    } else {
                        $('#data_nilai_siswa').html('');
                        document.getElementById('siswa_id').innerHTML = "<option value='0'>-- Pilih --</option>";
                    }
                }

                $('#siswa_id').change(function (e) { 
                    e.preventDefault();
                    var kelas_id = $('#kelas_id').val();
                    var semester_id = $('#semester_id').val();
                    var tahun_ajar_id = $('#tahun_ajar_id').val();

                    $('#data_nilai_siswa').load(`{{ url("/administrator/rapor/cari-nilai-siswa") }}/` + this.value + '/' + kelas_id + '/' + semester_id + '/' + tahun_ajar_id )
                });

                function simpanNilai() {  
                    var kelas_id = $('#kelas_id').val();
                    var semester_id = $('#semester_id').val();
                    var tahun_ajar_id = $('#tahun_ajar_id').val();
                    var siswa_id = $('#siswa_id').val();
                    var mapel_id = $('#mapel_id').val();
                    var nilai_detail_nilai = $('#nilai_detail_nilai').val();


                    if(kelas_id != '0' && semester_id != '0' && tahun_ajar_id != '0' && siswa_id != '0' && mapel_id != '0'){
                        axios.post('{{ route("rapor.store") }}', {
                            '_token': '{{ csrf_token() }}',
                            'kelas_id' : kelas_id, 
                            'semester_id' : semester_id, 
                            'tahun_ajar_id' : tahun_ajar_id, 
                            'siswa_id' : siswa_id, 
                            'mapel_id' : mapel_id, 
                            'nilai_detail_nilai' : nilai_detail_nilai, 
                        }).then(function (res) {
                            $('#messageModal').show();
                            $('#messageModalText').text(res.data.message)
                            setInterval(function(){ $('#messageModal').hide(); }, 5000);

                            $('#mapel_id').val('0').change();
                            $('#nilai_detail_nilai').val('');

                            $('#data_nilai_siswa').load(`{{ url("/administrator/rapor/cari-nilai-siswa") }}/` + siswa_id + '/' + kelas_id + '/' + semester_id + '/' + tahun_ajar_id )
                            
                        }).catch(function (err) {
                            console.log(err);
                        })
                    }else{
                        alert('Pastikan data tidak kosong!!!')
                    }
                }

                function mHapusNilai(id) { 
                    $('#nilai_detail_id').val(id)
                    $('#ModalHapus').modal();
                }

                function hapusNilai() { 
                    
                    var nilai_detail_id = $('#nilai_detail_id').val();

                    axios.post('{{ route("rapor.delete") }}', {
                        '_token': '{{ csrf_token() }}',
                        'nilai_detail_id' : nilai_detail_id, 
                    }).then(function (res) {
                        $('#messageModal').show();
                        $('#messageModalText').text(res.data.message)
                        setInterval(function(){ $('#messageModal').hide(); }, 5000);
                        $('#ModalHapus').modal('hide');
                        
                        loadTabel();
                        
                    }).catch(function (err) {
                        console.log(err);
                    })

                }

                function mEditSiswa(id, nama_mapel, nilai_detail_nilai) { 
                    $('#nilai_detail_id_edit').val(id)
                    $('#nama_mapel').text(nama_mapel)
                    $('#nilai_detail_nilai_edit').val(nilai_detail_nilai)
                    $('#ModalEdit').modal();
                }

                function editNilai() {  
                    var nilai_detail_id = $('#nilai_detail_id_edit').val()
                    var nilai_detail_nilai = $('#nilai_detail_nilai_edit').val()

                    axios.post('{{ route("rapor.update") }}', {
                        '_token': '{{ csrf_token() }}',
                        'nilai_detail_id' : nilai_detail_id, 
                        'nilai_detail_nilai' : nilai_detail_nilai, 
                    }).then(function (res) {
                        $('#messageModal').show();
                        $('#messageModalText').text(res.data.message)
                        setInterval(function(){ $('#messageModal').hide(); }, 5000);
                        $('#ModalEdit').modal('hide');
                        
                        loadTabel();
                        
                    }).catch(function (err) {
                        console.log(err);
                    })

                }

                function loadTabel() { 
                    var kelas_id = $('#kelas_id').val();
                    var semester_id = $('#semester_id').val();
                    var tahun_ajar_id = $('#tahun_ajar_id').val();
                    var siswa_id = $('#siswa_id').val();

                    $('#data_nilai_siswa').load(`{{ url("/administrator/rapor/cari-nilai-siswa") }}/` + siswa_id + '/' + kelas_id + '/' + semester_id + '/' + tahun_ajar_id )
                }

            </script>

@endsection