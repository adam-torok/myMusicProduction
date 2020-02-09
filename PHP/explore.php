<?php
// FŐOLDAL
session_start();
require_once('CONFIG/config.php');
include('CONFIG/likes.php');
require_once('COMPONENTS/functions.php');
isLogged($_SESSION['logged']);
$profpic = $_SESSION['profpic'];
$id = $_SESSION['id'];
?>
<html lang="hu">
<head>
  <?php include_once("COMPONENTS/headerMeta.php"); ?>
  <title>Üdvözlünk <?php echo $_SESSION['username'];?></title>
</head>
<body oncontextmenu="return false" onload="loadSpinner()" class="bodyblack">
  <div id="loader" class="spinner">
    <svg viewBox="0 0 100 100">
      <circle cx="50" cy="50" r="15" />
    </svg>
  </div>
<?php
include_once("COMPONENTS/navbar.php");
?>
<div class="divider">
  <?php include_once('COMPONENTS/sidebar.php');?>
<div style="display:flex; flex-direction:column;" class="container">
  <?php include_once("COMPONENTS/exploreGenres.php");?>
</div>
</div>
</div>
<a id="github" href="http://www.github.com/woltery99"><i class="github fab fa-github-alt fa-2x"></i></a>
<?php include_once("COMPONENTS/footer.php");?>
</script>
<script type="text/javascript" src="../JS/jquery-3.4.1.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/jquery.easy-autocomplete.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/main.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/ajax-search.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/script.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/lightmode.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/gridview.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/tofilter.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/show-mobile-navbar.js" charset="utf-8"></script>
<script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
</body>
</html>
