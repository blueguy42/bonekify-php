<!DOCTYPE html>

<head>
    <link href="<?echo BASEURL;?>/css/styles.css" rel="stylesheet">

    <title>Bonekify | Login</title>
</head>

<body class ="center">
    <div id="register-page">
    <img src = "<?echo BASEURL;?>/img/bonekify.png" id ="logo">
        <h4>Untuk melanjutkan, masuk ke Bonekify.</h4>
        <hr>
    </div> 
    <div>
  <form id = "register-form">
    <label for="email-nama">Alamat email atau nama pengguna</label>
    <input type="text" id="email-nama" name="email-nama" placeholder="Alamat email atau nama pengguna">

    <label for="sandi">Kata sandi</label>
    <input type="password" autocomplete="off" id="sandi" name="sandi" placeholder="Kata sandi">
  
    <input type="submit" value="Masuk">
  </form>
  <p> <strong>Belum punya akun?</strong> <a id = "gantiwarna" href="register">Daftar.</a>
</div>
</body>