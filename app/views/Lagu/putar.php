<script src="<?echo BASEURL;?>/js/playcount.js"></script>
<div id="container-putar-lagu">
    <img src="<?echo BASEURL?>/img/<?echo $data["Image_path"]?>">
    <div id="judul"> <?echo $data["Judul"]?> </div>
    <div id="penyanyi"><?echo $data["Penyanyi"]?> </div>
    <div id="div-player">
        <audio controls controlsList="nodownload noplaybackrate" id="songplayer" onplaying="AddPlayCount()">
            <source src="<?=BASEURL?>/music/<?=$data["Audio_path"]?>">
        </audio>
    </div>
</div>