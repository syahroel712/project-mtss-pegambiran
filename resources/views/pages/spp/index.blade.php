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
                                    @if(session()->get('user_jabatan') == 'Admin')
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('spp.create') }}"><i class="fa fa-plus"></i> Add</a></h3>
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
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Tahun Ajar</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Jumlah Bayar</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($spp as $no => $sp)
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{ $sp->siswa_nis }}</td>
                                                <td>{{ $sp->siswa_nama }}</td>
                                                <td>{{ $sp->kelas_nama }}</td>
                                                <td>{{ $sp->tahun_ajar_nama }}</td>
                                                <td>{{ \Carbon\Carbon::parse($sp->spp_tgl_bayar)->isoFormat('D MMMM Y') }}</td>
                                                <td>Rp.{{ number_format($sp->spp_bayar) }}</td>
                                                <td>
                                                    <a href="{{ route('spp.cetak', $sp->spp_id) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"> Cetak</i></a>
                                                    @if(session()->get('user_jabatan') == 'Admin')
                                                    <a href="{{ route('spp.edit', $sp->spp_id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('spp.delete', $sp->spp_id) }}')"><i class="fa fa-trash"></i> </button>
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


            <script>
                // untuk hapus data
                function mHapus(url) {
                    $('#ModalHapus').modal()
                    $('#formDelete').attr('action', url);
                }

            </script>

            @if (session()->has('message'))
            <script>
                $('#message').show();
                setInterval(function(){ $('#message').hide(); }, 5000);
            </script>
            @endif
            

@endsection