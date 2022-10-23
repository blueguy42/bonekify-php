<table id='list-lagu'>
    <tr>
        <th colspan=2>JUDUL</th>
        <th>TAHUN</th>
        <th>GENRE</th>
    </tr>
    
    <?php foreach($data["song"] as $song){ ?>
            <tr>
                <td>
                    <img id ="logo" src="../../public/img/<?$song["Image_path"]?>">
                </td>
                <td class="container">
                    <div class="judul-lagu"><?$song["Judul"]?></div>
                    <div class="penyanyi"><?$song["Penyanyi"]?></div>
                </td>
                <td class="deskripsi"><?$song["Tanggal_terbit"]?></td>
                <td class="deskripsi"><?$song["Genre"]?></td>
            </tr>
    <?php    } ?>
    

    <tr>
        <td>
            <img id ="logo" src="../../public/img/cover-album.jpg">
        </td>
        <td class="container">
            <div class="judul-lagu">Secukupnya</div>
            <div class="penyanyi">Hindia</div>
        </td>
        <td class="deskripsi">2020</td>
        <td class="deskripsi">Pop Indonesia</td>
    </tr>
    <tr>
        <td>
            <img src="../../public/img/cover-album.jpg">
        </td>
        <td class="container">
            <div class="judul-lagu">Secukupnya</div>
            <div class="penyanyi">Hindia</div>
        </td>
        <td class="deskripsi">2020</td>
        <td class="deskripsi">Pop Indonesia</td>
    </tr>
    <tr>
        <td>
            <img src="../../public/img/cover-album.jpg">
        </td>
        <td class="container">
            <div class="judul-lagu">Secukupnya</div>
            <div class="penyanyi">Hindia</div>
        </td>
        <td class="deskripsi">2020</td>
        <td class="deskripsi">Pop Indonesia</td>
    </tr>
</table>