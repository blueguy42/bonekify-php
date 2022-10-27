<!DOCTYPE html>

<body>
<div class="center">
  <form id="tambah-form" method="post" enctype="multipart/form-data" action="#">
      <h1>Tambah Album</h1>
      <div id ="div-file">
        <label for="file">Cover Album</label>
        <input type="file" name="file" id="file" accept="image/*">
      </div> 
      <div id ="div-judul">
        <label for="judul">Judul Album</label>
        <input type="text" id="judul" name="judul" onkeyup="" placeholder="Masukkan judul album..">
      </div> 

      <div id ="div-penyanyi">
        <label for="penyanyi">Nama Penyanyi</label>
        <input type="text" id="penyanyi" name="penyanyi" onkeyup="" placeholder="Masukkan nama penyanyi..">
      </div> 

      <div id ="div-tanggalterbit">
        <label for="tanggalterbit">Tanggal Terbit Album</label>
        <input type="date" id="tanggalterbit" name="tanggalterbit" onkeyup="" placeholder="Masukkan tanggal terbit album..">
      </div> 

      <div id ="div-genre">
        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre" onkeyup="" placeholder="Masukkan genre album..">
      </div>
    
      <input type="submit" value="Tambah Album">
      <div id ="submitWarning"><?echo (isset($data["error"]) ? $data["error"] : "")?></div>
  </form>
</div>
</body>