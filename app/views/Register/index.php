<!DOCTYPE html>

<head>
    <link href="../../public/css/styles.css" rel="stylesheet">
    <script src="../../public/js/register.js"></script>
    <title>Bonekify Register Page</title>
</head>

<body class ="center">
  <div id  = "register-page">
    <img src = "../../public/img/bonekify.png" id ="logo">
        <h1>Sign up for free to start<br>listening.</h1>
        <hr>
  </div> 
  <div>
  <form id = "register-form">
    <div id ="div-email">
      <label for="fname">Apa email kamu?</label>
      <input type="text" id="email" name="email" onkeyup="emailWarning()" placeholder="Masukkan email kamu..">
    </div> 

    <div id ="div-sandi">
      <label for="lname">Buat kata sandi</label>
      <input type="password" autocomplete="off" id="sandi" name="sandi" onkeyup="sandiWarning()" placeholder="Masukkan kata sandi..">
    </div> 

    <div id ="div-ksandi">
      <label for="lname">Konfirmasi sandi kamu</label>
      <input type="password" autocomplete="off" id="ksandi" name="ksandi" onkeyup="ksandiWarning()" placeholder="Masukkan lagi sandi kamu..">
    </div> 

    <label for="lname">Siapa namamu?</label>
    <input type="text" id="nama" name="nama" placeholder="Masukkan nama profil..">
  
    <input type="submit" value="Submit">
  </form>
  <p> <strong>Punya akun?</strong> <a id = "gantiwarna" href="http://localhost:8080/public/Login">Masuk.</a>
</div>
</body>