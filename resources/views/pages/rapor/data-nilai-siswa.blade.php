@foreach($nilai_detail as $no => $nd)
<tr>
    <td>{{ $no+1 }}</td>
    <td>{{ $nd->mapel_nama }}</td>
    <td>{{ $nd->nilai_detail_kognitif }}</td>
    <td>
        <?php 
            if($nd->nilai_detail_kognitif >= 85){
                echo "A";
            }elseif ($nd->nilai_detail_kognitif >= 75) {
                echo "B";
            }elseif ($nd->nilai_detail_kognitif >= 60) {
                echo "C";
            }elseif ($nd->nilai_detail_kognitif >= 40) {
                echo "D";
            }elseif ($nd->nilai_detail_kognitif < 40) {
                echo "E";
            }
        ?>
    </td>
    <td>{{ $nd->nilai_detail_keterampilan }}</td>
    <td>
        <?php 
            if($nd->nilai_detail_keterampilan > 85){
                echo "A";
            }elseif ($nd->nilai_detail_keterampilan >= 75) {
                echo "B";
            }elseif ($nd->nilai_detail_keterampilan >= 60) {
                echo "C";
            }elseif ($nd->nilai_detail_keterampilan >= 40) {
                echo "D";
            }elseif ($nd->nilai_detail_keterampilan < 40) {
                echo "E";
            }
        ?>
    </td>
    <td>
        <button type="button" class="btn btn-warning btn-sm" onclick="mEditSiswa('{{ $nd->nilai_detail_id }}', '{{ $nd->mapel_nama }}', '{{ $nd->nilai_detail_kognitif }}', '{{ $nd->nilai_detail_keterampilan }}')"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger btn-sm" onclick="mHapusNilai('{{ $nd->nilai_detail_id }}')"><i class="fa fa-trash"></i></button>
    </td>
</tr>
@endforeach
