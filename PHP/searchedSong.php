<?php
session_start();
require_once('CONFIG/config.php');
$profpic = $_SESSION['profpic'];
$searched_song = $_POST['searchedSong'];
$sql = "SELECT * FROM songs";
$where_clause = "";
$searched_songs = explode(" ",$searched_song);
$songs = array();
foreach ($searched_songs as $song) {
    $songs[] = " WHERE name LIKE '%$song%'";
}
$real_songs_array = implode(" OR ",$songs);

if(!empty($real_songs_array)){
        $sql .= $real_songs_array;
};
?>
  <!DOCTYPE html>
  <html lang="hu">
    <head>
    <?php include_once("COMPONENTS/headerMeta.php"); ?>
    <title>Welcome <?php echo $_SESSION['username'];?></title>
</head>
    <body class="bodyblack">
      <?php include_once("COMPONENTS/navbar.php");?>
<body>
<div class="container">
<br><br>
<h1>Keresett zeneszám</h1>
<div class="searched-container">
  <?php
  if($dbc = mysqli_connect('localhost', $dbusername, $dbpassword, $dbname)){
      $res = $dbc -> query($sql);
      while($row = $res -> fetch_assoc()){
          ?>
          <div class="row-inner">
          <div class="tile">
              <h2 class="nameButton"><?php echo $row['artist'];?></h2>
              <h4><?php echo $row['name']; ?></h4>
              <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
          <div class="tile-media">
              <img class="tile-img" src="../img/albumcover/<?php echo $row['covername'];?> ">
              <a href="../songs/<?php echo $row['filename']; ?>"></a>
              <i id="playbutton" class="fas fa-play playbutton"></i>
          </div>
          </div>
      </div>
      <?php
      }//while end
      ?>
      <?php
  }
  ?>
</div>
<?php include_once("COMPONENTS/player.php"); ?>
<?php include_once("COMPONENTS/footer.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="../JS/music-related.js" charset="utf-8"></script>
<script src="../JS/music-player.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/jquery.easy-autocomplete.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/ajax-search.js" charset="utf-8"></script>
</div>
</body>
</html>
