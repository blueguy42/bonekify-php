<!DOCTYPE html>

<head>
    <link href="../../public/css/styles.css" rel="stylesheet">
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
    <label for="fname">Apa email kamu?</label>
    <input type="text" id="email" name="email" placeholder="Masukkan email kamu..">

    <label for="lname">Konfirmasi email kamu</label>
    <input type="text" id="kemail" name="kemail" placeholder="Masukkan lagi email kamu..">

    <label for="lname">Buat kata sandi</label>
    <input type="text" id="sandi" name="sandi" placeholder="Masukkan kata sandi..">

    <label for="lname">Siapa namamu?</label>
    <input type="text" id="nama" name="nama" placeholder="Masukkan nama profil..">
  
    <input type="submit" value="Submit">
  </form>
  <p> <strong>Punya akun?</strong> <a id = "gantiwarna" href="http://localhost:8080/public/Login">Masuk.</a>
</div>
</body>