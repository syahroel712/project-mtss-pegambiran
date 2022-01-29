<table class="table table-bordered example2">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Status Rapor</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($walas_siswa as $no => $wls)
        <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $wls->siswa_nis }}</td>
            <td>{{ $wls->siswa_nama }}</td>
            <td>
                @if($wls->kepsek_id == null OR $wls->kepsek_id == '0')
                <p style="color: red;">Belum di Acc</p>
                @else
                <p style="color: blue;">Sudah di Acc</p>
                @endif
            </td>
            <td>
                <button type="button" class="btn btn-info btn-sm" onclick="mDetailSiswa('{{ $wls->siswa_id }}')"><i class="fa fa-search"></i> Detail</button>
                @if($wls->kepsek_id == null OR $wls->kepsek_id =='0')
                    @if(session()->has('guru_jabatan') == 'Kepala Sekolah')
                    <button class="btn btn-warning btn-sm" onclick="mAccSiswa('{{ $wls->siswa_id }}')"><i class="fa fa-edit"></i> Acc</button>
                    @endif
                @else
                <a href="{{ route('rapor.cetakDataNilaiSiswa', [$wls->siswa_id, $kelas_id, $semester_id, $tahun_ajar_id]) }}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

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
                            <th>Nilai</th>
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

<!-- modal acc -->
<div class="modal fade" id="ModalAccSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Acc Rapor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="siswa_id_acc">
                Yakin Acc Rapor Siswa ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" onclick="accRaporSiswa()" class="btn btn-info btn-sm">Acc</button>
            </div>
        </div>
    </div>
</div>

<script>
    // untuk rapor data
    function mDetailSiswa(id) {
        var kelas_id = $('#kelas_id').val();
        var semester_id = $('#semester_id').val();
        var tahun_ajar_id = $('#tahun_ajar_id').val();

        $('#data_nilai_rapor_siswa').load(`{{ url("/rapor/cari-data-nilai-siswa") }}/` + id + '/' + kelas_id + '/' + semester_id + '/' + tahun_ajar_id )

        $('#ModalDetailSiswa').modal()
    }

    // utk acc nilai
    function mAccSiswa(siswa_id) { 
        $('#siswa_id_acc').val(siswa_id)
        $('#ModalAccSiswa').modal()
    }



    $(".example2").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
</script>