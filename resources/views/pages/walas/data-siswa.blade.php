<table class="table table-bordered example2">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            @if(session()->get('user_jabatan') == 'Admin')
            <th>Option</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($walasSiswa as $no => $wls)
        <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $wls->siswa_nis }}</td>
            <td>{{ $wls->siswa_nama }}</td>
            @if(session()->get('user_jabatan') == 'Admin')
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="mHapusSiswa('{{ $wls->walas_siswa_id }}')"><i class="fa fa-trash"></i> </button>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

<!-- modal hapus -->
<div class="modal fade" id="ModalHapusSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="walas_siswa_id">
                Yakin Hapus Data ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" onclick="hapusSiswa()" class="btn btn-info btn-sm">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>

    // untuk hapus data
    function mHapusSiswa(id) {
        $('#ModalHapusSiswa').modal()
        $('#walas_siswa_id').val(id);
    }

    $(".example2").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
</script>