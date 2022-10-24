<div id="container-putar-lagu">
    <img src="<?echo BASEURL?>/img/<?echo $data["Image_path"]?>">
    <div id="judul"> <?echo $data["Judul"]?> </div>
    <div id="penyanyi"><?echo $data["Penyanyi"]?> </div>
    <audio controls>
        <source src="<?=BASEURL?>/music/<?=$data["Audio_path"]?>">
    </audio>
</div>