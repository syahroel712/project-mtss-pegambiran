@foreach($nilai_detail as $no => $nd)
<tr>
    <td>{{ $no+1 }}</td>
    <td>{{ $nd->mapel_nama }}</td>
    <td>{{ $nd->nilai_detail_nilai }}</td>
    <td>
        <button type="button" class="btn btn-warning btn-sm" onclick="mEditSiswa('{{ $nd->nilai_detail_id }}', '{{ $nd->mapel_nama }}', '{{ $nd->nilai_detail_nilai }}')"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger btn-sm" onclick="mHapusNilai('{{ $nd->nilai_detail_id }}')"><i class="fa fa-trash"></i></button>
    </td>
</tr>
@endforeach
