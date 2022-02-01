@extends('layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">MTSS Pegambiran</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('profile') }}"><i class="fa fa-arrow-left"></i> Back</a></h3>
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
                                    <form class="form-horizontal" action="{{ route($url, $profile->profile_id ?? null) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($profile))
                                        @method('put')
                                        @endif
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control @error('profile_nama') {{ 'is-invalid' }} @enderror" name="profile_nama" id="profile_nama" value="{{ old('profile_nama') ?? $profile->profile_nama ?? '' }}">
                                                @error('profile_nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Tipe</label>
                                                <select class="custom-select @error('profile_tipe') {{ 'is-invalid' }} @enderror" name="profile_tipe" id="profile_tipe">
                                                    <option value="">--Pilih--</option>
                                                    <option value="teks">Teks</option>
                                                    <option value="file">File</option>
                                                </select>
                                        
                                                @if( old('profile_tipe') != ''  )
                                                <script>
                                                    document.getElementById('profile_tipe').value = "{{ old('profile_tipe') }}"
                                                </script>
                                                @endif
                                                @if(isset($profile))
                                                <script>
                                                    document.getElementById('profile_tipe').value = '<?php echo $profile->profile_tipe ?>'
                                                </script>
                                                @endif
                                                @error('profile_tipe')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" id="div_profile_desk_teks" style="display: none;">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control textarea @error('profile_desk') {{ 'is-invalid' }} @enderror" name="profile_desk" id="profile_desk_teks" rows="2">{{ old('profile_desk') ?? $profile->profile_desk ?? '' }}</textarea>
                                                @error('profile_desk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" id="div_profile_desk_file" style="display: none;">
                                                <label>Deskripsi</label>
                                                <input type="file" class="form-control @error('profile_desk') {{ 'is-invalid' }} @enderror" name="profile_desk" id="profile_desk_file" value="{{ old('profile_desk') ?? $profile->profile_desk ?? '' }}">
                                                @error('profile_desk')
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
            <script>
                $('#profile_tipe').change(function (e) { 
                    if(this.value == 'teks'){
                        document.getElementById("div_profile_desk_teks").style.display = "block";
                        document.getElementById("profile_desk_teks").disabled = false;
                        document.getElementById("div_profile_desk_file").style.display = "none";
                        document.getElementById("profile_desk_file").disabled = true;
                    }else if(this.value == 'file'){
                        document.getElementById("div_profile_desk_teks").style.display = "none";
                        document.getElementById("profile_desk_teks").disabled = true;
                        document.getElementById("div_profile_desk_file").style.display = "block";
                        document.getElementById("profile_desk_file").disabled = false;
                    }else{
                        document.getElementById("div_profile_desk_teks").style.display = "none";
                        document.getElementById("profile_desk_teks").disabled = true;
                        document.getElementById("div_profile_desk_file").style.display = "none";
                        document.getElementById("profile_desk_file").disabled = true;
                    }
                });
            </script>

            @if(count($errors) > 0)
                <script>
                    $(document).ready(function () {
                        var tipe = $('#profile_tipe').val();
                        if(tipe == 'teks'){
                            document.getElementById("div_profile_desk_teks").style.display = "block";
                            document.getElementById("profile_desk_teks").disabled = false;
                            document.getElementById("div_profile_desk_file").style.display = "none";
                            document.getElementById("profile_desk_file").disabled = true;
                        }else if(tipe == 'file'){
                            document.getElementById("div_profile_desk_teks").style.display = "none";
                            document.getElementById("profile_desk_teks").disabled = true;
                            document.getElementById("div_profile_desk_file").style.display = "block";
                            document.getElementById("profile_desk_file").disabled = false;
                        }else{
                            document.getElementById("div_profile_desk_teks").style.display = "none";
                            document.getElementById("profile_desk_teks").disabled = true;
                            document.getElementById("div_profile_desk_file").style.display = "none";
                            document.getElementById("profile_desk_file").disabled = true;
                        }
                    });
                </script>
            @endif

            @if(isset($profile))
                <script>
                    $(document).ready(function () {
                        var tipe = '{{ $profile->profile_tipe }}';
                        if(tipe == 'teks'){
                            document.getElementById("div_profile_desk_teks").style.display = "block";
                            document.getElementById("profile_desk_teks").disabled = false;
                            document.getElementById("div_profile_desk_file").style.display = "none";
                            document.getElementById("profile_desk_file").disabled = true;
                        }else if(tipe == 'file'){
                            document.getElementById("div_profile_desk_teks").style.display = "none";
                            document.getElementById("profile_desk_teks").disabled = true;
                            document.getElementById("div_profile_desk_file").style.display = "block";
                            document.getElementById("profile_desk_file").disabled = false;
                        }else{
                            document.getElementById("div_profile_desk_teks").style.display = "none";
                            document.getElementById("profile_desk_teks").disabled = true;
                            document.getElementById("div_profile_desk_file").style.display = "none";
                            document.getElementById("profile_desk_file").disabled = true;
                        }
                    });
                </script>
            @endif




@endsection