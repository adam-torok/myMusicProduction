<?php
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
session_start();
error_reporting(1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Megnézem, hogy bevan e jelentkezve az illető
if(!isset($_SESSION['logged'])){
  header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
}
require_once('CONFIG/config.php');
include('CONFIG/likes.php');
$profpic = $_SESSION['profpic'];
$id = $_SESSION['id'];
require_once('COMPONENTS/functions.php');
?>
<html lang="hu">
<head>
  <?php include_once("COMPONENTS/headerMeta.php"); ?>
  <title>Üdvözlünk <?php echo $_SESSION['username'];?></title>
</head>
<body onload="loadSpinner()" class="bodyblack">
  <div id="loader" class="spinner">
    <svg viewBox="0 0 100 100">
      <circle cx="50" cy="50" r="15" />
    </svg>
  </div>
<style>
  h2 {
    color: grey;
  }
  i:hover{
    cursor:pointer;
  }
  .list{
    text-align:left!important;
  }
  .list i{
    text-align:left!important;
  }
  .material-button{
    margin:1rem;
  }
</style>
  <?php include_once("COMPONENTS/navbar.php");?>
<div class="divider">
  <?php include_once('COMPONENTS/sidebar.php');?>
  <form  class="hide playlistForm"  action="createPlayList.php" method="post">
    <input style="width:50%!important;" class="uploadmusic" type="text" name="userPlaylistName" placeholder="Playlist name">
  </form>
<div class="container">
  <?php include_once("COMPONENTS/genres.php");?>
  <?php include_once("COMPONENTS/displayMusic.php");?>
</div>
</div>
<?php include_once("COMPONENTS/player.php");?>
</div>
<a id="github" href="http://www.github.com/woltery99"><i class="github fab fa-github-alt fa-2x"></i></a>
<?php include_once("COMPONENTS/footer.php");?>
<script type="text/javascript">
$(".userButton").click(function(){
  var userName = $(this).text().slice(13);
  window.location.replace('userprofile.php?profilename=' + userName);
  console.log(userName);
});
</script>
<script type="text/javascript" src="../JS/jquery-3.4.1.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/jquery.easy-autocomplete.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/main.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/ajax-search.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/music-player.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/script.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/likes.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/lightmode.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/ribbons.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/music-related.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/gridview.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/tofilter.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/show-mobile-navbar.js" charset="utf-8"></script>
</body>
</html>
