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

  <!-- DROP DOWN BOS -->
  <div class="dropdown">
    <button class="dropbtn"><?php
      if (isset($_COOKIE["username"])){
        echo $_COOKIE["username"];
      }
      else {
        echo 'Not Logged In';
      }
      ?></button>
    <?php if (isset($_COOKIE["username"])){
      echo "<div class=\"dropdown-content\">
      <a href=\"#\">Log out</a>
      <a href=\"#\">Delete Account</a>
    </div>" ;}
    else{
      echo "<div class=\"dropdown-content\">
      <a href=\"" . BASEURL . "\login\">Log in</a>
    </div>" ;
}
    ?>

  </div>
  
</div>
<div id='main'>