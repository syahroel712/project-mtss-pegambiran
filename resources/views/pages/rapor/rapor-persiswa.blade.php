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
                                <li class="breadcrumb-item"><a href="#">MTSS Pegambiran</a></li>
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
                                            <div class="callout callout-success" style="display:none" id="messageModal">
                                                <strong id="messageModalText"></strong>
                                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                            </div>
                                            <h4 class="text-center">Rapor Siswa : {{ session()->get('user_nama') }}</h4>
                                            <table class="table table-bordered table-striped example1">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kelas</th>
                                                        <th>Semester</th>
                                                        <th>Tahun Ajar</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($rapor as $no => $rp)
                                                    <tr>
                                                        <td>{{ $no+1 }}</td>
                                                        <td>{{ $rp->kelas_nama }}</td>
                                                        <td>{{ $rp->semester_nama }}</td>
                                                        <td>{{ $rp->tahun_ajar_nama }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-info btn-sm" onclick="mDetailSiswa('{{ $rp->siswa_id }}','{{ $rp->kelas_id }}','{{ $rp->semester_id }}','{{ $rp->tahun_ajar_id }}')"><i class="fa fa-search"></i> Detail</button>
                                                            <a href="{{ route('rapor.cetakDataNilaiSiswa', [$rp->siswa_id, $rp->kelas_id, $rp->semester_id, $rp->tahun_ajar_id]) }}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
            <!-- /.content -->
            <!-- modal rapor -->
            <div class="modal fade" id="ModalDetailSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data Rapor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Nilai Kognitif</th>
                                        <th>Grade Kognitif</th>
                                        <th>Nilai Keterampilan</th>
                                        <th>Grade Keterampilan</th>
                                    </tr>
                                </thead>
                                <tbody id="data_nilai_rapor_siswa">
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                // untuk rapor data
                function mDetailSiswa(siswa_id,kelas_id,semester_id,tahun_ajar_id) {

                    $('#data_nilai_rapor_siswa').load(`{{ url("/administrator/rapor/cari-data-nilai-siswa") }}/` + siswa_id + '/' + kelas_id + '/' + semester_id + '/' + tahun_ajar_id )

                    $('#ModalDetailSiswa').modal()
                }
            </script>

@endsection