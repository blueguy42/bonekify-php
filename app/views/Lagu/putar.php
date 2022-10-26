<div id="container-putar-lagu">
    <div id='img-container'>
        <img src="<?echo BASEURL?>/img/<?echo $data["song"]["Image_path"]?>">
        <?if(isset($_SESSION['username']) && isset($_SESSION['isAdmin'])){
            if($_SESSION['isAdmin']==='1'){?>
                <span>
                    <!-- Trigger/Open The Modal -->
                    <button class="tombol-ganti-file">edit</button>

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
        <?if(isset($_SESSION['username']) && isset($_SESSION['isAdmin'])){
            if($_SESSION['isAdmin']==='1'){?>
                <span>
                    <!-- Trigger/Open The Modal -->
                    <button class="tombol-ganti-deskripsi">edit</button>

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
            <?}
        }?>
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
    <?if(isset($_SESSION['username']) && isset($_SESSION['isAdmin'])){
        if($_SESSION['isAdmin']==='1'){?>
            <span>
                <!-- Trigger/Open The Modal -->
                <button class="tombol-ganti-file">edit</button>

                <!-- The Modal -->
                <div id="modal-ganti-lagu" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">x</span>
                        <form action="#" method="post">
                            <label for="lagu-baru">Lagu baru :</label><br>
                            <input type="file" enctype="multipart/form-data" name="lagu-baru" id="lagu-baru">
                            <input type="submit">
                        </form>
                    </div>

                </div>
            </span>
        <?}
    }?>
</div>
<script src="<?echo BASEURL;?>/js/lagu.js"></script>