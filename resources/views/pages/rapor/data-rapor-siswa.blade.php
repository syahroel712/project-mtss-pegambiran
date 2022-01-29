@foreach($nilai_detail as $no => $nd)
<tr>
    <td>{{ $no+1 }}</td>
    <td>{{ $nd->mapel_nama }}</td>
    <td>{{ $nd->nilai_detail_nilai }}</td>
</tr>
@endforeach
