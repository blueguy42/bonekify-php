<table id='list-lagu'>
    <tr>
        <th colspan=2>JUDUL</th>
        <th>TAHUN</th>
        <th>GENRE</th>
    </tr>
    <?php foreach($data["song"] as $id => $song){ ?>
        <tr>
            <td>
                <a href="<?echo BASEURL;?>/lagu/putar/<?echo $song["song_id"];?>">
                    <img id ="logo" src="<?echo BASEURL;?>/img/<?echo $song["Image_path"]?>" onerror="this.onerror=null;this.src='<?echo BASEURL;?>/img/cover-album.png';">
                </a>
            </td>
            <td class="container">
                <div class="judul-lagu"><?echo $song["Judul"]?></div>
                <div class="penyanyi"><?echo $song["Penyanyi"]?></div>
            </td>
            <td class="deskripsi"><?echo $song["Tanggal_terbit"]?></td>
            <td class="deskripsi"><?echo $song["Genre"]?></td>
        </tr>
    <?php    } ?>
</table>