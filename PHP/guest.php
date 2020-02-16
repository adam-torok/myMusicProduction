<?php
require_once('CONFIG/config.php');
session_start();
//Csatlakozás felépítése
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("..\PHP\COMPONENTS\headerMeta.php"); ?>
<title>Üdvözlünk látogató!</title>
</head>
<style media="screen">
h1{
  margin-top: 6rem;
}
  .material-button{
  margin: 1rem;
  }
</style>
<body oncontextmenu="return false"  class="bodyblack">
<header class="nav-dark" id="header"></header>
<h1>Válogatott zenék, neked!</h1>
<div class="container">
<div  id="Alternativ" class="banner">
<h3>Alternatív</h2>
<h2>Felkapott zenék a myMusic közzöségben</h2>
</div>
<div class="row">
  <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Alternatív'  AND  approved = 1 LIMIT 10";
  $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()){
  ?>
    <div class="row-inner">
      <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4 class="music-name"><?php echo $row['name']; ?></h4>
        <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
      <div class="tile-media">
        <img class="tile-img" src="../img/albumcover/<?php echo $row['covername'];?> ">
        <div>
          <a href="../songs/<?php echo $row['filename']; ?>"></a>
          <i id="playbutton" class="fas fa-play playbutton"></i>
        </div>
      </div>
    </div>
  </div>
  <?php
}//while end ?>
</div>
<div id="Tropical" class="banner">
  <h3>Tropical</h3>
  <h2>Felkapott zenék a myMusic közzöségben</h2>
</div>
  <div  class="row">
  <?php $sql = "SELECT * FROM songs  WHERE `genre` = 'Tropical' AND  approved = 1 LIMIT 10";
  $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()) {
//A lekérdezésnek megfelelően egy row változóba teszem a resultot
?>
  <div  class="row-inner">
  <div class="tile">
  <h2 class="nameButton"><?php echo $row['artist'];?></h2>
  <h4 class="music-name"><?php echo $row['name']; ?></h4>
  <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
  <div class="tile-media">
    <img class="tile-img"  onclick="play()" src=../img/albumcover/<?php echo $row['covername'];?> ">
    <div>
      <a href="../songs/<?php echo $row['filename']; ?>"></a>
      <i id="playbutton" class="fas fa-play playbutton"></i>
    </div>
  </div>
</div>
  </div>
  <?php
}//while end ?>
</div>
<div id="Rap" class="banner">
  <h3>Rap</h3>
  <h2>Felkapott zenék a myMusic közzöségben</h2>
</div>
  <div class="row">
  <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Rap' AND  approved = 1 LIMIT 10";
  $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()) {
?>
  <div class="row-inner">
  <div class="tile">
  <h2 class="nameButton"><?php echo $row['artist'];?></h2>
  <h4 class="music-name"><?php echo $row['name']; ?></h4>
  <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
  <div class="tile-media">
    <img class="tile-img"  onclick="play()" src=../img/albumcover/<?php echo $row['covername'];?> ">
    <div>
      <a href="../songs/<?php echo $row['filename']; ?>"></a>
      <i id="playbutton" class="fas fa-play playbutton"></i>
    </div>
  </div>
</div>
  </div>
  <?php
}//while end ?>
</div>
<div id="Classical" class="banner">
  <h3>Classical</h2>
  <h2>Felkapott zenék a myMusic közzöségben</h2>
</div>
  <div class="row">
  <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Classical' AND  approved = 1 LIMIT 10";
  $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()) {
?>
  <div class="row-inner">
  <div class="tile">
  <h2 class="nameButton"><?php echo $row['artist'];?></h2>
  <h4 class="music-name"><?php echo $row['name']; ?></h4>
  <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
  <div class="tile-media">
    <img class="tile-img"  onclick="play()" src="../img/albumcover/<?php echo $row['covername'];?> ">
    <div>
      <a href="../songs/<?php echo $row['filename']; ?>"></a>
      <i id="playbutton" class="fas fa-play playbutton"></i>
    </div>
  </div>
  </div>
  </div>
  <?php
}//while end ?>
</div>
<div id="Pop" class="banner">
  <h3>Pop</h2>
  <h2>Felkapott zenék a myMusic közzöségben</h2>
</div>
  <div class="row">
  <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Pop' AND  approved = 1 LIMIT 10";
  $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()) {
  ?>
  <div class="row-inner">
  <div class="tile">
  <h2 class="nameButton"><?php echo $row['artist'];?></h2>
  <h4 class="music-name"><?php echo $row['name']; ?></h4>
  <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
  <div class="tile-media">
    <img class="tile-img" src="../img/albumcover/<?php echo $row['covername'];?> ">
    <div>
      <a href="../songs/<?php echo $row['filename']; ?>"></a>
      <i id="playbutton" class="fas fa-play playbutton"></i>
    </div>
  </div>
</div>
  </div>
  <?php
}//while end ?>
</div>
<div id="Future" class="banner">
<h3>Future House</h2>
<h2>Felkapott zenék a myMusic közzöségben</h2>
</div>
  <div class="row">
  <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Future' AND  approved = 1 LIMIT 10";
  $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()) {
//A lekérdezésnek megfelelően egy row változóba teszem a resultot
?>
  <div class="row-inner">
  <div class="tile">
  <h2 class="nameButton"><?php echo $row['artist'];?></h2>
  <h4 class="music-name"><?php echo $row['name']; ?></h4>
  <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
  <div class="tile-media">
    <img class="tile-img" src="../img/albumcover/<?php echo $row['covername'];?> ">
    <div>
      <a href="../songs/<?php echo $row['filename']; ?>"></a>
      <i id="playbutton" class="fas fa-play playbutton"></i>
    </div>
  </div>
</div>
  </div>
  <?php
}//while end ?>
</div>
<div id="Rock" class="banner">
<h3>Rock</h2>
<h2>Felkapott zenék a myMusic közzöségben</h2>
</div>
  <div class="row">
  <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Rock' AND  approved = 1 LIMIT 10";
  $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()) {
//A lekérdezésnek megfelelően egy row változóba teszem a resultot
?>
  <div class="row-inner">
  <div class="tile">
  <h2 class="nameButton"><?php echo $row['artist'];?></h2>
  <h4 class="music-name"><?php echo $row['name']; ?></h4>
  <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
  <div class="tile-media">
    <img class="tile-img" src="../img/albumcover/<?php echo $row['covername'];?> ">
    <div>
      <a href="../songs/<?php echo $row['filename']; ?>"></a>
      <i id="playbutton" class="fas fa-play playbutton"></i>
    </div>
  </div>
</div>
  </div>
  <?php
}//while end ?>
</div>
<div id="Jazz" class="banner">
<h3>Jazz</h2>
<h2>Felkapott zenék a myMusic közzöségben</h2>
</div>
  <div class="row">
  <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Jazz' AND  approved = 1 LIMIT 10";
  $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()) {
//A lekérdezésnek megfelelően egy row változóba teszem a resultot
?>
  <div class="row-inner">
  <div class="tile">
  <h2 class="nameButton"><?php echo $row['artist'];?></h2>
  <h4 class="music-name"><?php echo $row['name']; ?></h4>
  <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
  <div class="tile-media">
    <img class="tile-img" src="../img/albumcover/<?php echo $row['covername'];?> ">
    <div>
      <a href="../songs/<?php echo $row['filename']; ?>"></a>
      <i id="playbutton" class="fas fa-play playbutton"></i>
    </div>
  </div>
</div>
  </div>
  <?php
}//while end ?>
</div>
<div id="Metál" class="banner">
<h3>Metál</h2>
<h2>Felkapott zenék a myMusic közzöségben</h2>
</div>
  <div class="row">
  <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Metál' AND  approved = 1 LIMIT 10";
  $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()) {
//A lekérdezésnek megfelelően egy row változóba teszem a resultot
?>
  <div class="row-inner">
  <div class="tile">
  <h2 class="nameButton"><?php echo $row['artist'];?></h2>
  <h4 class="music-name"><?php echo $row['name']; ?></h4>
  <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
  <div class="tile-media">
    <img class="tile-img" src="../img/albumcover/<?php echo $row['covername'];?> ">
    <div>
      <a href="../songs/<?php echo $row['filename']; ?>"></a>
      <i id="playbutton" class="fas fa-play playbutton"></i>
    </div>
  </div>
</div>
  </div>
  <?php
}//while end ?>
</div>
</div>

  <!-- SAJÁT, NEM HTML5 PLAYER -->

<?php include_once("COMPONENTS/player.php");?>
<?php include_once("COMPONENTS/footer.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../JS/music-related.js" charset="utf-8"></script>
<script src="../JS/music-player.js" charset="utf-8"></script>
<script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  // HA MOBILRÓL NÉZI MEG AZ OLDALT A USER  -AGENT, AKKOR DROPDOWN MENÜ LESZ A NAVIGÁCIÓ (DINAMIKUSAN)
  var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
  if (isMobile) {
   var toogle = $("<span id='toggleNav' style='z-index:999999;font-size:50px;cursor:pointer;color:white'>&#9776;</span>")
   $(".nav-dark").append(toogle);
   var t = $("<div class='mobile hidden animated bounceInDown delay-0s'><ul><img class='animated jackInTheBox delay-0s' style='padding-bottom: 1rem;width:100px;height:100px;' src='../IMG/myMusicLogo.png' alt=''><li><a href='../HTML/index.html'><i style='padding:0;padding-right:1rem' class='fas fa-home fa-1x'></i>Főoldal</a></li><li ><a href='../PHP/guest.php'><i style='padding:0;padding-right:1rem' class='fas fa-sign-in-alt fa-1x'></i>Vendég</a></li><li><a href='../HTML/loginlayout.html'><i style='padding:0;padding-right:1rem' class='fas fa-sign-in-alt fa-1x'></i>Bejelentkezés</a></li><li><a href='#contact'><i style='padding:0;padding-right:1rem' class='fas fa-question fa-1x'></i>Súgó</a></li></ul></div>");
   $(".nav-dark").append(t);
 } else {
   var t = $("<nav><ul><img style='width:50px;height:50px;' src='../IMG/myMusicLogoBlack.png' alt=''><li><a href='../HTML/index.html'>Főoldal</a></li><li><a href='../PHP/guest.php'>Böngészés</a></li><li><a href='#gallery'>Média</a></li><div id='button'><a href='../HTML/loginlayout.html'><i style='padding: 0' class='fas fa-sign-in-alt fa-1x'></i></a></div><li><a href=''#contact'>Sugó</a></li></ul></nav>");
   $(".nav-dark").append(t);
 }
 $("#toggleNav").click(function(){
   $(".mobile").toggleClass("hidden");
 })
})
</script>
</body>
</html>
