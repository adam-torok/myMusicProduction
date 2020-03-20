<?php
// FELHASZNÁLÓI PROFIL
session_start();
require_once('CONFIG/config.php');
require_once('COMPONENTS/functions.php');
isLogged($_SESSION['logged']);
funnyDebugTool();
define('GW_MAXFILESIZE',1000000);
if(!isset($_SESSION['logged'])){
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
}
$id = $_SESSION['id'];
$uname = $_SESSION['username'];
$sql = "SELECT bio FROM felhasznalo WHERE id = '$id'";
$result = $dbc -> query($sql);
while($row = $result->fetch_assoc()) {
       $_SESSION['bio'] = $row["bio"];
    }
$bio = $_SESSION['bio'];
$sql = "SELECT profile_image FROM felhasznalo WHERE id = '$id'";
$result = $dbc -> query($sql);
while($row = $result->fetch_assoc()) {
       $_SESSION['profpic'] = $row["profile_image"];
    }
$bio = $_SESSION['bio'];
$profpic = $_SESSION['profpic'];
$uname = $_SESSION['username'];
$sql = "SELECT COUNT(*) FROM songs where uploadedby like '$uname'";
$res = $dbc -> query($sql);
while($row = $res->fetch_assoc()) {
      $_SESSION['$numOfUploads'] = $row['COUNT(*)'];
};
$numOfUploads = $_SESSION['$numOfUploads'];
if(mysqli_connect_error()) die('nem sikerült a db csatlakozás');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("COMPONENTS/headerMeta.php");?>
<link rel="stylesheet" href="../css/profile.css">
<title>Profilod</title>
</head>
<body oncontextmenu="return false">
<?php include_once("COMPONENTS/navbar.php");?>
<div class="divider">
  <div class="modal">
  <div class="modal-content">
    <span class="close-modal">
    <i class="fas fa-times"></i>
  </span>
    <h2>Jelszóváltoztatás</h2>
    <form class="modal-form" action="#" method="POST">
      <input id="password" class="modal-input" type="text" name="password-renew" placeholder="Új jelszó">
      <input id="passwordagain" class="modal-input" type="text" name="password-renew" placeholder="Új jelszó mégegyszer">
      <input class="material-button" type="submit" name="save_password" value="Mentés">
    </form>
  </div>
</div>
<?php
if(isset($_POST["save_password"])){
  $pass = $_POST['password-renew'];
  sanitiseInput($dbc,$pass);
  if(strlen($pass) >= 20){
    showDialog("Jelszó maximum 20 karakter.","profile.php");
  }
  else if(strlen($pass) <= 10){
    showDialog("Jelszó minimum 10 karakter.","profile.php");
  }
  else{
    updatePassword($dbc,$pass,$id);
  }
}
?>
<?php include_once('COMPONENTS/sidebar.php');?>
<div>
<div style="background: linear-gradient( rgb(19, 13, 10), rgba(0, 0, 0, 0.7), rgba(32, 32, 32,1)), url(../profileimages/<?php echo $profpic?>)!important;" class="user-header">
<div class="user-infos">
 <div class="user-info">
 <div class="profile-image">
     <img id="prof-image" src="../PROFILEIMAGES/<?php echo $_SESSION['profpic'];?>"  alt="profilkép">
 </div>
 <div class="user-details">
    <div class="user-info-type"><h2>Felhasználó</h2></div>
    <div class="user-info-name"><h2><?php echo $_SESSION['username'];?></h2></div>
    <div class="user-info-date"><h2>Feltöltött számok: <span id="upload-counter"><?php echo $numOfUploads;?></span></h2>
    <h2 id="user-title"></h2>
    </div>
    <form enctype="multipart/form-data" action="#" method="POST">
      <div class="user-info-date">
        <input class="bio-input" name="bio-save" id="bio-upload" value="<?php echo $bio;?>">
      </div>
      <label for="file-upload" class="material-icon">
        <i style="color:white" class="fas fa-upload"></i>
      </label>
        <input class="hidden-file-input" id="bio-save" type="submit" name="save_bio">
        <input class="hidden-file-input" id="file-save" type="submit" name="save_user">
        <input class="hidden-file-input" id="file-upload" accept="image/x-png,image/gif,image/jpeg" type="file" name="profile_image" id="profile_image">
        <label for="file-save" class="material-icon">
        <i style="color:white" class="fas fa-save"></i>
        </label>
        <label for="bio-save" class="material-icon">
          <i style="color:white" class="fas fa-comment"></i>
        </label>
            <i id="change-password" style="color:white" class="fas fa-key"></i>
        </form>
            <?php
            if(isset($_POST['save_user'])){
            $profileImageName = $_FILES['profile_image']['name'];
            sanitiseInput($dbc,$profileImageName);
            $profileImageSize = $_FILES['profile_image']['size'];
            $profileImageType = $_FILES['profile_image']['type'];
            $target = "../PROFILEIMAGES/" . $profileImageName;
            if(($profileImageType == 'image/png') || ($profileImageType == 'image/jpg') ||
             ($profileImageType == 'image/jpeg') && !empty($_FILES['profile_image']) &&
              $profileImageSize > 0 && $profileImageSize <= GW_MAXFILESIZE){
              if(move_uploaded_file($_FILES['profile_image']['tmp_name'],$target)){
                  uploadProfilePicture($dbc,$profileImageName,$id);
                }
                else{
                    showDialog("Hiba történt a profilkép frissítése közben.");
                }
              }
              else{
                showDialog("Túl nagy kép / nem kép formátum!","profile.php");
              }
            }
            if(isset($_POST['save_bio'])){
              $bio = htmlentities($_POST['bio-save']);
              saveBio($bio,$dbc,$id);
            }
            ?>
     </div>
</div>
</div>
<h2>Előző feltöltéseid</h2>
<div class="profile-track-container-featured">
        <?php $sql = "SELECT * FROM songs WHERE `uploadedby` = '$uname' AND approved = 1 ORDER BY id DESC LIMIT 3 ";
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
</div>
<div class="user-favorites">
  <h1>Kedvenc zenéid</h1>
  <div class="flex">
    <?php showFavorites($dbc,$id);?>
  </div>
</div>
<div class="container">
<div class="form-center">
  <div class="form-holder">
    <h1 style="color:#fff">FELTÖLTÉS</h1>
  <form class="form form-mobile" method="post" action="#" enctype="multipart/form-data">
    <div>
        <div class="input">
          <h2 id="nameErrorMessage">  * Maximum 20 karakter.</h2>
          <i class="fas fa-signature"></i><input class="inputFields" maxlength="30" onkeydown="checkMusicName()" id="musicName" type="text" placeholder="Zene neve"  name="nameofmusic" required>
            <div class="bar"></div>
        </div>
        <div class="input">
          <h2 id="artistErrorMessage">  * Maximum 20 karakter.</h2>
        <i class="fas fa-signature"></i><input  class="inputFields" maxlength="30" onkeydown="checkArtistName()" id="artistName" type="text" placeholder="Előadója"  name="artistofmusic" required>
            <div class="bar"></div>
        </div>
        <br>
      <p>Műfaj</p>
      <i class="fas fa-headset"></i><select class="select-tex" name="genreofmusic" required>
      <option value="Rap">Rap</option>
      <option value="Classical">Classical</option>
      <option value="Future">Future House</option>
      <option value="Tropical">Tropical</option>
      <option value="Pop">Pop</option>
      <option value="Alternatív">Alternatív</option>
      <option value="Jazz">Jazz</option>
      <option value="Rock">Rock</option>
      <option value="Metál">Metál</option>
      </select>
    </div>
    <div>
      <p>Album fotó</p>
      <i class="fas fa-file-signature"></i><input accept="image/*" class="" type="file" name="albumUpload"  id="albumUpload" required>
      <p>Zene file</p>
      <i class="fas fa-file-signature"></i><input accept="audio/*" class="" type="file" name="musicUpLoad" id="musicUpLoad" required>
      <br>
      <button class="material-button" type="submit" class="btn" id="save_music" name="save_music">Feltöltés!</button>
    </div>
  </form>
        <?php
        if(isset($_POST['save_music'])){
         $musicFileName = $_FILES['musicUpLoad']['name'];
         $coverName = $_FILES['albumUpload']['name'];
         $musicFileName = sanitiseInput($dbc,$musicFileName);
         $musicFileName = appendDateTimeToFileName($musicFileName);
         $musicName = sanitiseInput($dbc,$_POST['nameofmusic']);
         $genre = sanitiseInput($dbc,$_POST['genreofmusic']);
         $artist = sanitiseInput($dbc,$_POST['artistofmusic']);
         $username =  sanitiseInput($dbc,$_SESSION['username']);
         $coverName = sanitiseInput($dbc,$coverName);
         $target = '../songs/' . $musicFileName;
         getGenre($genre);
         $targetForAlbum = '../img/albumcover/'. $coverName;
            if (strlen($artist) <= 25 && strlen($musicName) <= 25) {
              if(move_uploaded_file($_FILES['musicUpLoad']['tmp_name'],$target) && (move_uploaded_file($_FILES['albumUpload']['tmp_name'],$targetForAlbum))) {
                  uploadMusic($dbc,$artist,$musicName,$genre,$musicFileName,$coverName,$username);
                }else{
                  showDialog("Hiba a szerver elérésében.");
                    }
                  }
            else{
              showDialog("Túl hosszú név/előadónév");
            }
          }
        ?>
  </div>
</div>
<div class="profile-track-container">
    <h1 style="color:white;">Feltöltött számok</h1>
        <?php $sql = "SELECT DISTINCT * FROM songs WHERE `uploadedby` = '$uname' AND approved = 1 ORDER BY id DESC";
        $result = $dbc -> query($sql);
 while($row = $result -> fetch_assoc()) {?>
        <div class="track">
        <div class="thing">
        <i id="addPlayListButton" class="fas fa-check  fa-1x"></i>
        </div>
        <div class="track-number">
        <h2><?php echo $row['artist'];?></h2>
        </div>
         <div class="track-number">
        <h2><?php echo $row['id'];?></h2>
        </div>
        <div class="track-added">
        <h2><?php echo $row['time'];?></h2>
        </div>
        <div class="track-audio">
        <a href="../songs/<?php echo $row['filename']; ?>"></a>
        <a id="albumcover" href="../img/albumcover/<?php echo $row['covername']; ?>"></a>
        </div>
        <div class="track-title">
        <h2><?php echo $row['name'];?></h2>
        </div>
        </div>
        <?php
      }//while end ?>
</div>
</div>
</div>
</div>
<a style="background-color:black" id="github" href="#"><img style="width:50px;height:50px;" src="../IMG/myMusicLogo.png" alt=""></a>
<?php include_once("COMPONENTS/footer.php");?>
<script type="text/javascript" src="../JS/jquery-3.4.1.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/script.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/main.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/jquery.easy-autocomplete.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/ajax-search.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/validate-music.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/show-mobile-navbar.js" charset="utf-8"></script>
<script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("input[name='save_password']").click(function(){
      var val1 = $("#password").val();
      var val2 = $("#passwordagain").val();
    })
});
</script>
</body>
</html>
