<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
require_once('CONFIG/config.php');
// Megnézem, hogy bevan e jelentkezve az illető
if(!isset($_SESSION['logged'])){
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
}
$uname = $_GET['profilename'];
$id = null;
$profpic = null;
$numOfUploads = null;

$sql = "SELECT COUNT(*) FROM songs where uploadedby like '$uname'";
$res = mysqli_query($dbc,$sql);
while($row = $res->fetch_assoc()) {
      $numOfUploads = $row['COUNT(*)'];
};

$sql = "SELECT * from felhasznalo WHERE felhnev = '$uname'";
$res = mysqli_query($dbc,$sql);
while($row = $res -> fetch_assoc()){
  $id = $row["id"];
  $profpic = $row["profile_image"];
}
$id = $_SESSION['id'];
require_once('COMPONENTS/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("COMPONENTS/headerMeta.php"); ?>
    <title>Welcome <?php echo $_SESSION['username'];?></title>
</head>
<?php

?>
<body>
<style>
body{
  background:var(--bg-color);
}
p{
   text-align:left;
}
.form{
 background-color:#424242;
}
.form input{
 background-color:#424242;
 color:white;
}
.form input::placeholder{
 color:white;
}
.container{
  display: grid;
  grid-template-columns:1fr 1fr;
  background:var(--bg-color);
}
.form-center{
 height: auto;
 background-color: unset;
 background-image: none;
}
 </style>
<?php include_once("COMPONENTS/navbar.php");?>
<div style="background: linear-gradient( rgb(19, 13, 10), rgba(0, 0, 0, 0.7), rgba(32, 32, 32,1)), url(../profileimages/<?php echo $profpic?>)!important;" class="user-header">
<div class="user-infos">
   <div class="user-info">
     <div class="profile-image">
         <img id="prof-image" src="../PROFILEIMAGES/<?php echo $profpic;?>"  alt="profilkép">
     </div>
     <div class="user-details">
       <img style="width:50px;height:50px;" src="../IMG/myMusicLogo.png" alt="">
        <div class="user-info-type"><h2>Felhasználó</h2></div>
        <div class="user-info-name"><h2><?php echo $uname;?></h2></div>
        <div class="user-info-date"><h2>Feltöltött számok: <span id="upload-counter"><?php echo $numOfUploads;?></span></h2>
        <h2 id="user-title"></h2></div>
     </div>
    </div>
</div>
</div>
<h1 style="color:white">Nemrég feltöltött zenék</h1>
<div class="profile-track-container-featured">
        <?php $sql = "SELECT * FROM songs WHERE `uploadedby` = '$uname' AND approved = 1 ORDER BY id DESC LIMIT 4 ";
        $result = $dbc -> query($sql);
 while($row = $result -> fetch_assoc()) {?>
   <div>
     <img id="albumcover" class="track-container-picture" src="../img/albumcover/<?php echo $row['covername'];?>"></a>
     <h2 style="text-align:center"><?php echo $row['artist'];?></h2>
     <h2 style="text-align:center"><?php echo $row['time'];?></h2>
   </div>
        <?php
      }//while end ?>
</div>
<a style="background-color:black" id="github" href="#"><img style="width:50px;height:50px;" src="../IMG/myMusicLogo.png" alt="">
</a><?php
include_once("COMPONENTS/footer.php");
?>
<script src="../JS/script.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/jquery.easy-autocomplete.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/ajax-search.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/show-mobile-navbar.js" charset="utf-8"></script>
<script>
function refreshPage(){
    window.location.reload();
  }
function closePopUp(){
      var x = document.getElementById("popup");
   if (x.style.display === "none") {
     x.style.display = "block";
   } else {
     x.style.display = "none";
   }
    }
function checkMusicName() {
		let inputForUsername = document.getElementById("musicName").value;
		if (inputForUsername.length == null || inputForUsername.length < 20) {
			var errormsg = document.getElementById("nameErrorMessage").style.display = "none";
		} else var errormsg = document.getElementById("nameErrorMessage").style.display = "block";
	}
function checkArtistName() {
	let inputForUsername = document.getElementById("artistName").value;
	if (inputForUsername.length == null || inputForUsername.length < 20) {
	var errormsg = document.getElementById("artistErrorMessage").style.display = "none";
	}
   else var errormsg = document.getElementById("artistErrorMessage").style.display = "block";
 }
</script>
</body>
</html>
