<?php
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
session_start();
require_once('CONFIG/config.php');
include('CONFIG/likes.php');
require_once('COMPONENTS/functions.php');
isLogged($_SESSION['logged']);
$profpic = $_SESSION['profpic'];
$id = $_SESSION['id'];
$username = $_SESSION['username'];
$genre = $_GET['genre'];
?>
<html lang="hu">
<head>
  <?php include_once("COMPONENTS/headerMeta.php"); ?>
  <title>Üdvözlünk <?php echo $_SESSION['username'];?></title>
</head>
<body oncontextmenu="return false"  class="bodyblack">
<?php
showActivityExtraCss();
include_once("COMPONENTS/navbar.php")
;?>
<div class="divider">
  <?php include_once('COMPONENTS/sidebar.php');?>
  <form  class="hide playlistForm"  action="createPlayList.php" method="post">
    <input style="width:50%!important;" class="uploadmusic" type="text" name="userPlaylistName" placeholder="Playlist name">
  </form>
<div class="container">
  <?php include_once("COMPONENTS/genres.php");?>
  <div class="filtered-track-container-featured">
    <?php $sql = "SELECT * FROM songs WHERE approved = 1 AND uploadedby = '$username' ORDER BY id asc LIMIT 4";
    $result = $dbc -> query($sql);
    while($row = $result -> fetch_assoc()) {?>
    <div>
       <img id="albumcover" class="filtered-image-container" src="../img/albumcover/<?php echo $row['covername'];?>"></a>
       <a href="searched.php?artistname=<?php echo $row['artist'];?>"><h2 style="text-align:center"><?php echo $row['artist'];?></h2></a>
    </div>
          <?php
        }//while end ?>
  </div>
<div class="row">
<table>
  <thead>
    <tr>
      <th><p>Előadó</p></th>
      <th><p>Cím</p></th>
      <th><p>Feltöltés dátuma</p></th>
      <th><p>Lejátszás</p></th>
      <th><p>Kedvelem!</p></th>
    </tr>
  </thead>
<tbody>
<?php $sql = "SELECT * FROM songs WHERE uploadedby = '$username' AND approved = 1 ORDER BY id DESC";
$result = $dbc -> query($sql);
while($row = $result -> fetch_assoc()) {?>
<tr>
<td style="width:30%">
<a href="searched.php?artistname=<?php echo $row['artist'];?>"><h2><?php echo $row['artist'];?></h2></a>
</td>
<td>
<h2><?php echo $row['name'];?></h2>
</td>
<td>
<h2><?php echo $row['time'];?></h2>
</td>
<td>
<i id="playButton" class="fas fa-play fa-xs">
<a href="../songs/<?php echo $row['filename']; ?>"></a>
<a id="albumcover" href="../img/albumcover/<?php echo $row['covername']; ?>"></a>
</i>
</td>
<td><i <?php if (userLiked($row['id'])): ?>
class="fas fa-heart like-btn"
<?php else: ?>
class="far fa-heart like-btn"
<?php endif ?>
data-id="<?php echo $row['id'] ?>"></i>
</td>
</tr>
<?php
}//while end ?>
</tbody>
</table>
</div>
</div>
<?php include_once("COMPONENTS/player.php");?>
</div>
<a id="github" href="http://www.github.com/woltery99"><i class="github fab fa-github-alt fa-2x"></i></a>
<?php include_once("COMPONENTS/footer.php");?>
<script type="text/javascript" src="../JS/jquery-3.4.1.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/jquery.easy-autocomplete.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/main.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/ajax-search.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/music-player.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/activity-music-player.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/script.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/likes.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/lightmode.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/ribbons.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/gridview.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/tofilter.js" charset="utf-8"></script>
<script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>

</body>
</html>
