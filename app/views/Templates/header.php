<!DOCTYPE html>
<html>
<head>
    <title>Bonekify</title>
    <link href="<?echo BASEURL;?>/css/styles.css" rel="stylesheet">
</head>
<body>
<div class="topnav">
  <img src="<?echo BASEURL;?>/img/bonekify.png">
  <input type="text" placeholder="Apa yang ingin kamu dengarkan ?">
  <a class="active" href="<?echo BASEURL?>">Home</a>
  <a href="<?echo BASEURL?>">Album</a>

  <div class="dropdown">
    <button class="dropbtn"><?php
    if (isset($_COOKIE["username"])){
      echo $_COOKIE["username"];
    }
    else {
      echo 'Not Logged In';
    }
    ?></button>
    <div id="myDropdown" class="dropdown-content">
        <a href="#">Logout</a>
    </div>
  </div>
</div>
<div id='main'>