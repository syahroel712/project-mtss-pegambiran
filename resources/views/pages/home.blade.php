@extends('layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Home</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">E Rapor</a></li>
                                <li class="breadcrumb-item active">Home</li>
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
                                    <h3 class="card-title">Aplikasi E-Rapor</h3>

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
                                    <h4>Tata Cara Penggunaan Aplikasi E-Rapor</h4>
                                    <ol>
                                        <li><h5>Rule Admin</h5></li>
                                            <ul>
                                                <li>Admin bisa akses semua menu</li>
                                                <li>Admin harus mengisi semua data master terlebih dahulu</li>
                                                <li>Kemudian, Admin harus mengisi semua data user</li>
                                                <li>Kemudian, Admin harus mengisi semua data user</li>
                                                <li>Terakhir, Admin harus menentukan walikelas dari masing-masing kelas dan menentukan siswa yang termasuk ke kelas tersebut</li>
                                            </ul>
                                        <li><h5>Rule Wali Kelas</h5></li>
                                            <ul>
                                                <li>Wali Kelas bisa melihat semua data dan hanya beberapa fitur yang bisa digunakan oleh wali kelas</li>
                                                <li>Wali kelas bisa mengisi nilai siswa di bagian menu E-Rapor -> Input Rapor</li>
                                            </ul>
                                        <li><h5>Rule Kepala Sekolah</h5></li>
                                            <ul>
                                                <li>Kepala sekolah bisa melihat semua data dan hanya beberapa fitur yang bisa digunakan oleh kepala sekolah</li>
                                                <li>Kepala sekolah bertugas memastikan nilai yang diinput wali kelas sudah benar dan tidak ada kecurangan. Berada pada menu E-Rapor -> Data Rapor</li>
                                            </ul>
                                        <li><h5>Rule Guru</h5></li>
                                            <ul>
                                                <li>Guru hanya bisa melihat data tanpa ada satu fitur yang bisa ia gunakan.</li>
                                            </ul>
                                    </ol>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    Footer
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