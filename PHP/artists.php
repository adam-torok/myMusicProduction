<?php
session_start();
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
require_once('CONFIG/config.php');
$id = $_SESSION['id'];
require_once('COMPONENTS/functions.php');
//csatlakozás felépítéses
$bio = $_SESSION['bio'];
$profpic = $_SESSION['profpic'];
if(mysqli_connect_error()) die('nem sikerült a db csatlakozás');
?>
<!DOCTYPE html>
<html lang="hu">
<?php include_once("COMPONENTS/headerMeta.php");?>
<title>Artisták / Feltöltők</title>
</head>
<body class="bodyblack">
<?php include_once("COMPONENTS/navbar.php");?>
<div class="divider">
<?php include_once('COMPONENTS/sidebar.php');?>
  <form class="hide playlistForm"  action="createPlayList.php" method="post">
    <input style="width:50%!important;" class="uploadmusic" type="text" name="userPlaylistName" placeholder="Playlist name">
  </form>
  <div class="track-container">
  <div class="searched-header">
  <h2>Az összes jelenlegi</h2>
  <h1 style="color:white">ZENÉSZEK</h1>
  </div>
          <?php $sql = "SELECT DISTINCT artist, genre FROM songs ORDER BY genre";
          $result = $dbc -> query($sql);
   while($row = $result -> fetch_assoc()) {?>
          <div class="track">
          <div class="thing">
          <i id="addPlayListButton" class="fas fa-plus-circle  fa-1x"></i>
          </div>
          <div class="track-number">
          <a href="searched.php?artistname=<?php echo $row['artist'];?>"><h2><?php echo $row['artist'];?></h2></a>
          </div>
           <div class="track-added">
          <h2><?php echo "műfaj: ".$row['genre'];?></h2>
          </div>
          </div>
          <?php
        }//while end ?>
       </div>
       <?php include_once("COMPONENTS/player.php");?>s
    </div>
  </div>
  <?php include_once("COMPONENTS/footer.php");?>
  <script type="text/javascript" src="../JS/jquery-3.4.1.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="../JS/script.js" charset="utf-8"></script>
  <script type="text/javascript" src="../JS/main.js" charset="utf-8"></script>
  <script type="text/javascript" src="../JS/music-related.js" charset="utf-8"></script>
  <script type="text/javascript" src="../JS/jquery.easy-autocomplete.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="../JS/ajax-search.js" charset="utf-8"></script>
  <script type="text/javascript" src="../JS/lightmode.js" charset="utf-8"></script>
  </body>
</html>
