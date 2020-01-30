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
  .material-button{
  margin: 1rem;
  }
</style>
<body oncontextmenu="return false"  class="bodyblack">
    <header class="nav-down" id="header">
        <nav class="fill">
            <ul>
              <img style="width:50px;height:50px;" src="../IMG/myMusicLogo.png" alt="">
                <li><a href="../HTML/index.html">Főoldal</a></li>
                <input class="inputFields" type="text" placeholder="Keresés">
                <div id="button"><a href="../HTML/loginlayout.html"><i style="padding: 0" class="fas fa-sign-in-alt fa-1x"></i></a></div>
                <li id="sugo"><a href="#contact"> Sugó</a></li>
            </ul>
        </nav>
    </header>
    <div class="genres" style="margin-top:100px; padding-bottom:50px;">
    <a href="#Alternativ"><button   class="material-button" type="button">Alternatív</button></a>
    <a href="#Tropical"><button   class="material-button" type="button">Tropical</button></a>
    <a href="#Rap"><button   class="material-button" type="button">Rap</button></a>
    <a href="#Classical"><button   class="material-button" type="button">Classical</button></a>
    <a href="#Pop"><button   class="material-button" type="button">Pop</button></a>
    <a href="#Future"><button   class="material-button" type="button">Future</button></a>
    </div>
<h1>Válogatott zenék, neked!</h1>

  <!-- ZENE LEKÉRDEZÉSEK -->

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
</div>

  <!-- SAJÁT, NEM HTML5 PLAYER -->

<?php include_once("COMPONENTS/player.php");?>
<?php include_once("COMPONENTS/footer.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../JS/music-related.js" charset="utf-8"></script>
<script src="../JS/music-player.js" charset="utf-8"></script>
<script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
</body>
</html>
