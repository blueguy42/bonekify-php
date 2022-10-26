<div id="container-putar-lagu">
    <img src="<?echo BASEURL?>/img/<?echo $data["song"]["Image_path"]?>">
    <div id="judul"> 
        <?echo $data["song"]["Judul"]?> 
        <span>
            <!-- Trigger/Open The Modal -->
            <button id="tombol-ganti-judul">edit</button>

            <!-- The Modal -->
            <div id="modal-ganti-judul" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">x</span>
                    <form action="#" method="post">
                        <label for="judul-baru">Judul baru :</label><br>
                        <input type="text" name="judul-baru" id="judul-baru">
                        <input type="submit">
                    </form>
                </div>

            </div>
        </span>
    </div>
    <div id="penyanyi">
        <?echo $data["song"]["Penyanyi"]?> 
        <span>
            <!-- Trigger/Open The Modal -->
            <button id="tombol-ganti-penyanyi">edit</button>

            <!-- The Modal -->
            <div id="modal-ganti-penyanyi" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">x</span>
                    <form action="#" method="post">
                        <label for="penyanyi-baru">Penyanyi baru :</label><br>
                        <input type="text" name="penyanyi-baru" id="penyanyi-baru">
                        <input type="submit">
                    </form>
                </div>

            </div>
        </span>
    </div>
    <div id="div-player">
        <audio controls controlsList="nodownload noplaybackrate" id="songplayer" onplaying="AddPlayCount()">
            <source src="<?=BASEURL?>/music/<?=$data["song"]["Audio_path"]?>">
        </audio>
    </div>
</div>
<script src="<?echo BASEURL;?>/js/lagu.js"></script>