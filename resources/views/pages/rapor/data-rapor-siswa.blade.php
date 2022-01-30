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
</tr>
@endforeach
