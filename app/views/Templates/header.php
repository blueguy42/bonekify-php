<!DOCTYPE html>
<html>
<head>
    <title><? echo (isset($data["title"]) ? $data["title"] : "Bonekify")?></title>
    <link href="<?echo BASEURL;?>/css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?echo BASEURL;?>/img/favicon.ico" type="image/x-icon"/>
</head>
<body class="bodyflex">
<div id="sidebar">
  <img id="headerlogo" src="<?echo BASEURL;?>/img/bonekify.png">
  <!-- SIDEBAR LINKS -->
  <a <? echo ((isset($data["route"]) and $data["route"] == 'Home') ? "class=\"active\"": "") ?> href="<?echo BASEURL?>">Home</a>
  <a <? echo ((isset($data["route"]) and $data["route"] == 'Search') ? "class=\"active\"": "") ?> href="<?echo BASEURL?>/search">Search</a>
  <a href="<?echo BASEURL?>/album">Album</a>
  <? if (isset($_SESSION["isAdmin"]) and $_SESSION["isAdmin"] == 1) {
    echo "<a " . ((isset($data["route"]) and $data["route"] == 'Daftar User') ? "class=\"active\"": "") . " href=\"" . BASEURL . "/users\">Daftar User</a>";
  }
  ?>
  <?php 
  ?>
</div>
<div id="side">
<div class="topnav">
  <?php if (isset($data["route"]) and $data["route"] != 'Search'){?>
  <form id="tes" method="post" action="<?= BASEURL?>/search">
    <input id="navbar-search" name="navbar-search" type="text" placeholder="Apa yang ingin kamu dengarkan ?">
  </form>
  <?php }?>
  <!-- DROP DOWN BOS -->
  <div class="dropdown">
    <button class="dropbtn"><?php
      if (isset($_SESSION["username"])){
        echo $_SESSION["username"];
      }
      else {
        echo 'Not Logged In';
      }
      ?></button>
    <?php if (isset($_SESSION["username"])){
      echo "<div class=\"dropdown-content\">
      <a href=\"" . BASEURL . "\home\logout\">Log out</a>
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
