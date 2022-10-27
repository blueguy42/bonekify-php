<div>
    <div id="detail-album">
        <span>
            <img src="<?=BASEURL?>/img/<?=$data['album_detail']['Image_path']?>">
        </span>
        <span>
            <div class="judul-album-detail"><?=$data['album_detail']['Judul']?></div>
            <div class='deskripsi-album-detail'><?=$data['album_detail']['Penyanyi']?></div>
            <div class='deskripsi-album-detail'><?
                    $hour = floor($data['album_detail']["Total_duration"]/3600);
                    $left = $data['album_detail']["Total_duration"]%3600;
                    $minute = floor($left/60);
                    $second = $left%60;
                    if ($hour > 0) {
                        echo $hour . " jam ";
                        if ($minute < 10) {
                            echo '0' . $minute . " menit ";
                        } else {
                            echo $minute . " menit ";
                        }
                    } else {
                        echo $minute . " menit ";
                    }
                    if ($second < 10) {
                        echo '0' . $second . " detik";
                    } else {
                        echo $second . " detik";
                }?></div>
        </span>
    </div>
    <table id='list-lagu'>
        <tr>
            <th style="text-align: center;">#</th>
            <th>JUDUL</th>
            <th>TAHUN TERBIT</th>
            <th>GENRE</th>
            <th style="text-align: center;">DURASI</th>
            <th></th>
        </tr>
        <?php $i=1; foreach($data["song"] as $id => $song){  ?>
            <tr class="list-lagu-item">
                <td class="nomertabel"><?echo $i?></td>
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
                <td>
                <?if(isset($_SESSION['username']) && isset($_SESSION['isAdmin'])){
                    if($_SESSION['isAdmin']==='1'){?>
                        <form action="#" method="post">
                            <input type="hidden" name="hapus-lagu" value="<?=$song['song_id']?>">
                            <input type="submit" id="tombol-hapus" value="Hapus Lagu">
                        </form>
                    <?}
                }?>
                </td>
            </tr>
        <?php  $i++;  }?>
    </table>
</div>