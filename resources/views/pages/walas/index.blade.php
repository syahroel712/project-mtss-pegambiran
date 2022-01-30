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
                                    @if(session()->get('user_jabatan') == 'Admin')
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('walas.create') }}"><i class="fa fa-plus"></i> Add</a></h3>
                                    @endif
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

                                    <table id="example1" class="table table-bordered table-striped example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Wali Kelas</th>
                                                <th>Kelas</th>
                                                <th>Tahun Ajar</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($walas as $no => $wls)
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{ $wls->guru_nama }}</td>
                                                <td>{{ $wls->kelas_nama }}</td>
                                                <td>{{ $wls->tahun_ajar_nama }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" onclick="mDetail('{{$wls->walas_id}}')"><i class="fa fa-search"></i> Data Siswa</button>
                                                    @if(session()->get('user_jabatan') == 'Admin')
                                                    <a href="{{ route('walas.edit', $wls->walas_id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('walas.delete', $wls->walas_id) }}')"><i class="fa fa-trash"></i> </button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                        <form action="" method="POST" id="formDelete">
                            <div class="modal-body">
                                @csrf
                                @method('delete')
                                Yakin Hapus Data ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info btn-sm">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- modal detail -->
            <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if(session()->get('user_jabatan') == 'Admin')
                            <div class="card">
                                <div class="card-header">
                                    Tambah Data Siswa
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Siswa</label>
                                        <input type="hidden" name="walas_id" id="walas_id">
                                        <select class="custom-select select2bs4 @error('siswa_id') {{ 'is-invalid' }} @enderror" name="siswa_id" id="siswa_id">
                                            <option value="">--Pilih--</option>
                                            @foreach($siswa as $no => $swa)
                                            <option value="{{ $swa->siswa_id }}"> [ {{ $swa->siswa_nis }} ] - [ {{ $swa->siswa_nama }} ]</option>
                                            @endforeach
                                        </select>
                                        @if( old('siswa_id') != ''  )
                                        <script>
                                            document.getElementById('siswa_id').value = "{{ old('siswa_id') }}"
                                        </script>
                                        @endif
                                        @error('siswa_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button onclick="simpanSiswa()" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    Data Siswa
                                </div>
                                <div class="card-body" >
                                    <div class="callout callout-success" style="display:none" id="messageModal">
                                        <strong id="messageModalText"></strong>
                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                    <div id="dataSiswa"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                // untuk hapus data
                function mHapus(url) {
                    $('#ModalHapus').modal()
                    $('#formDelete').attr('action', url);
                }

                function mDetail(id) {
                    $('#ModalDetail').modal()
                    $('#walas_id').val(id);
                    $('#dataSiswa').load(`{{ url("administrator/wali-kelas-siswa") }}/` + id);
                    
                }

                function simpanSiswa() { 
                    var siswa_id = $('#siswa_id').val();
                    var walas_id = $('#walas_id').val();
                    axios.post('{{ route("walasSiswa.store") }}', {
                        '_token': '{{ csrf_token() }}',
                        'siswa_id' : siswa_id, 
                        'walas_id' : walas_id, 
                    }).then(function (res) {
                        mDetail(walas_id)
                        $('#messageModal').show();
                        $('#messageModalText').text(res.data.message)
                        setInterval(function(){ $('#messageModal').hide(); }, 5000);
                    }).catch(function (err) {
                        console.log(err);
                    })    
                }

                function hapusSiswa() {
                    var walas_siswa_id = $('#walas_siswa_id').val(); 
                    var walas_id = $('#walas_id').val();
                    axios.post('{{ route("walasSiswa.delete") }}', {
                        '_token': '{{ csrf_token() }}',
                        'walas_siswa_id' : walas_siswa_id, 
                    }).then(function (res) { 
                        mDetail(walas_id)
                        $('#messageModal').show();
                        $('#messageModalText').text(res.data.message)
                        $('#ModalHapusSiswa').modal('hide')
                        setInterval(function(){ $('#messageModal').hide(); }, 5000);
                    }).catch(function (err) {
                        console.log(err);
                    })
                }
            </script>

            @if (session()->has('message'))
            <script>
                $('#message').show();
                setInterval(function(){ $('#message').hide(); }, 5000);
            </script>
            @endif
            

@endsection