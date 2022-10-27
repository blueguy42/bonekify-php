<div id="container-putar-lagu">
    <div id='img-container'>
        <img src="<?echo BASEURL?>/img/<?echo $data["song"]["Image_path"]?>">
        <?if(isset($_SESSION['username']) && isset($_SESSION['isAdmin'])){
            if($_SESSION['isAdmin']==='1'){?>
                <span>
                    <!-- Trigger/Open The Modal -->
                    <button class="tombol-ganti-file">Edit Gambar Cover</button>

                    <!-- The Modal -->
                    <div id="modal-ganti-cover" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">x</span>
                            <form action="#" method="post" enctype="multipart/form-data">
                                <label for="cover-baru">Cover baru :</label><br>
                                <input type="file" name="cover-baru" id="cover-baru">
                                <input type="submit">
                            </form>
                        </div>

                    </div>
                </span>
            <?}
        }?>
    </div>
    <div id="judul"> 
        <?echo $data["song"]["Judul"]?> 
        <?if(isset($_SESSION['username']) && isset($_SESSION['isAdmin'])){
            if($_SESSION['isAdmin']==='1'){?>
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
            <?}
        }?>
    </div>
    <div class="deskripsi">
        <?echo $data["song"]["Penyanyi"];?> 
    </div>
    <div class="deskripsi">
        <?echo $data["song"]["Tanggal_terbit"];?> 
        <?if(isset($_SESSION['username']) && isset($_SESSION['isAdmin'])){
            if($_SESSION['isAdmin']==='1'){?>
                <span>
                    <!-- Trigger/Open The Modal -->
                    <button class="tombol-ganti-deskripsi">edit</button>

                    <!-- The Modal -->
                    <div id="modal-ganti-tanggal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">x</span>
                            <form action="#" method="post">
                                <label for="tanggal-baru">Tanggal baru :</label><br>
                                <input type="text" name="tanggal-baru" id="tanggal-baru">
                                <input type="submit">
                            </form>
                        </div>

                    </div>
                </span>
                <?}
        }?>
    </div>
    <div class="deskripsi">
        <?echo $data["song"]["Genre"];?> 
        <?if(isset($_SESSION['username']) && isset($_SESSION['isAdmin'])){
            if($_SESSION['isAdmin']==='1'){?>
                <span>
                    <!-- Trigger/Open The Modal -->
                    <button class="tombol-ganti-deskripsi">edit</button>

                    <!-- The Modal -->
                    <div id="modal-ganti-genre" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">x</span>
                            <form action="#" method="post">
                                <label for="genre-baru">Genre baru :</label><br>
                                <input type="text" name="genre-baru" id="genre-baru">
                                <input type="submit">
                            </form>
                        </div>

                    </div>
                </span>
                <?}
        }?>
    </div>
    <div id="div-player">
        <audio controls controlsList="nodownload noplaybackrate" id="songplayer" onplaying="AddPlayCount()">
            <source src="<?=BASEURL?>/music/<?=$data["song"]["Audio_path"]?>">
        </audio>
    </div>
    <div style="text-align:center;">
        <?if(isset($_SESSION['username']) && isset($_SESSION['isAdmin'])){
            if($_SESSION['isAdmin']==='1'){?>
                <span>
                    <!-- Trigger/Open The Modal -->
                    <button class="tombol-ganti-file">Edit Audio Lagu</button>

                    <!-- The Modal -->
                    <div id="modal-ganti-lagu" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">x</span>
                            <form action="#" method="post" enctype="multipart/form-data">
                                <label for="lagu-baru">Lagu baru :</label><br>
                                <input type="file" name="lagu-baru" id="lagu-baru">
                                <input type="submit">
                            </form>
                        </div>

                    </div>
                </span>
            <?}
        }?>
        <?if(isset($_SESSION['username']) && isset($_SESSION['isAdmin'])){
            if($_SESSION['isAdmin']==='1'){?>
                <form action="#" method="post">
                    <input type="hidden" name="hapus-lagu" value="1">
                    <input type="submit" id="tombol-hapus" value="Hapus Lagu">
                </form>
            <?}
        }?>
    </div>
</div>
<script src="<?echo BASEURL;?>/js/lagu.js"></script>