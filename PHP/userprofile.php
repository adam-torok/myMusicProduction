<?php
// KERESETT PROFIL
session_start();
require_once('CONFIG/config.php');
require_once('COMPONENTS/functions.php');
isLogged($_SESSION['logged']);
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
<body oncontextmenu="return false">
<?php
showUserProfileExtraCss();
include_once("COMPONENTS/navbar.php");
?>
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
        <?php $sql = "SELECT * FROM songs WHERE `uploadedby` = '$uname' AND approved = 1 ORDER BY id DESC LIMIT 3";
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
<script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
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
</script>
</body>
</html>
