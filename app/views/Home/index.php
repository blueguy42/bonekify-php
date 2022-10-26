<table id='list-lagu'>
    <tr>
        <th>#</th>
        <th colspan=2>JUDUL</th>
        <th>TANGGAL</th>
        <th>GENRE</th>
        <th>DURASI</th>
    </tr>
    <?php $i=1; foreach($data["song"] as $id => $song){  ?>
        <tr>
            <td class="nomertabel"><?echo $i?></td>
            <td>
                <a href="<?echo BASEURL;?>/lagu/putar/<?echo $song["song_id"];?>">
                    <img id ="logo" src="<?echo BASEURL;?>/img/<?echo $song["Image_path"]?>" onerror="this.onerror=null;this.src='<?echo BASEURL;?>/img/cover-album.png';">
                </a>
            </td>
            <td class="container">
                <div class="judul-lagu"><a href="<?echo BASEURL;?>/lagu/putar/<?echo $song["song_id"];?>" style="text-decoration:none;"><?echo $song["Judul"]?></a></div>
                <div class="penyanyi"><?echo $song["Penyanyi"]?></div>
            </td>
            <td class="deskripsi"><?echo $song["Tanggal_terbit"]?></td>
            <td class="deskripsi"><?echo $song["Genre"]?></td>
            <td class="nomertabel"><?echo floor($song["Duration"]/60) . ":" ;
             if ($song["Duration"] % 60 < 10){
                echo '0' . $song["Duration"] % 60;
             }else{
                echo $song["Duration"] % 60;
             }?></td>
        </tr>
    <?php  $i++;  } ?>
</table>