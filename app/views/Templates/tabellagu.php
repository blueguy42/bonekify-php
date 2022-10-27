
<table id='list-lagu'>
<?php if (isset($data["song"]) && count($data["song"])>0) {?>
    <tr>
        <th>#</th>
        <th colspan=2>JUDUL</th>
        <th>TAHUN TERBIT</th>
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
            <td class="tahun-terbit"><?echo explode("-", $song["Tanggal_terbit"])[0]?></td>
            <td class="genre"><?echo $song["Genre"]?></td>
            <td class="nomertabel"><?
                $hour = floor($song["Duration"]/3600);
                $left = $song["Duration"]%3600;
                $minute = floor($left/60);
                $second = $left%60;
                if ($hour > 0) {
                    echo $hour . ":";
                    if ($minute < 10) {
                        echo '0' . $minute . ":";
                    } else {
                        echo $minute . ":";
                    }
                } else {
                    echo $minute . ":";
                }
                if ($second < 10) {
                    echo '0' . $second;
                } else {
                    echo $second;
            }?></td>
        </tr>
    <?php  $i++;  }} ?>
</table>
