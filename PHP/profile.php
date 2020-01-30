<?php
// FELHASZNÁLÓI PROFIL
session_start();
error_reporting(0);
require_once('CONFIG/config.php');
define('GW_MAXFILESIZE',1000000);
if(!isset($_SESSION['logged'])){
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
}
$id = $_SESSION['id'];
$uname = $_SESSION['username'];
$password = $_POST['password'];
require_once('COMPONENTS/functions.php');
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
<?php include_once('COMPONENTS/sidebar.php');?>
<div>
<div style="background: linear-gradient( rgb(19, 13, 10), rgba(0, 0, 0, 0.7), rgba(32, 32, 32,1)), url(../profileimages/<?php echo $profpic?>)!important;" class="user-header">
<div class="user-infos">
 <div class="user-info">
 <div class="profile-image">
     <img id="prof-image" src="../PROFILEIMAGES/<?php echo $_SESSION['profpic'];?>"  alt="profilkép">
 </div>
 <div class="user-details">
   <img style="width:50px;height:50px;" src="../IMG/myMusicLogo.png" alt="">
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
        </form>
        <?php
        if(isset($_POST['save_user'])){
        $profileImageName = $_FILES['profile_image']['name'];
        $profileImageName = strtolower($profileImageName);
        $profileImageName = trim($profileImageName);
        $profileImageSize = $_FILES['profile_image']['size'];
        $profileImageType = $_FILES['profile_image']['type'];
        $target = "../PROFILEIMAGES/" . $profileImageName;
        if(($profileImageType == 'image/png') || ($profileImageType == 'image/jpg') ||
         ($profileImageType == 'image/jpeg') && !empty($_FILES['profile_image']) &&
          $profileImageSize > 0 && $profileImageSize <= GW_MAXFILESIZE){
          if(move_uploaded_file($_FILES['profile_image']['tmp_name'],$target)){
              $sql = "UPDATE felhasznalo SET profile_image = '$profileImageName' WHERE id='$id'";
                if(mysqli_query($dbc,$sql)){
                showDialog("Sikersen frissítetted a profilképedet!");
                }
                else{
                showErrorDialog("Hiba történt a profilkép frissítése közben.");
                }
            }else{
              showErrorDialog("Hiba történt");
              }
            }
            else showErrorDialog("Túl nagy kép / nem kép formátum!");
        }
        if(isset($_POST['save_bio'])){
          $bio = $_POST['bio-save'];
          $sql = "UPDATE felhasznalo SET bio = '$bio' WHERE id='$id'";
          if($dbc -> query($sql)){
          showDialog("Sikersen frissítetted a biodat!");
          }
          else{
          showErrorDialog("Hiba történt a biod frissítése közben.");
          }
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
<div class="container">
<div class="form-center">
  <div class="form-holder">
    <h1 style="color:#fff">FELTÖLTÉS</h1>
  <form class="form form-mobile" method="post" action="#" enctype="multipart/form-data">
    <div>
        <div class="input">
          <h2 id="nameErrorMessage">  * Maximum 20 karakter.</h2>
          <i class="fas fa-signature"></i><input class="inputFields"  onkeydown="checkMusicName()" id="musicName" type="text" placeholder="Zene neve"  name="nameofmusic" required>
            <div class="bar"></div>
        </div>
        <div class="input">
          <h2 id="artistErrorMessage">  * Maximum 20 karakter.</h2>
        <i class="fas fa-signature"></i><input  class="inputFields" onkeydown="checkArtistName()" id="artistName" type="text" placeholder="Előadója"  name="artistofmusic" required>
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
   $musicFileName = strtolower($musicFileName);
   $musicName =  mysqli_real_escape_string($dbc,$_POST['nameofmusic']);
   //$genre = mysqli_real_escape_string($link,$_POST['genreofmusic']);
   $genre = mysqli_real_escape_string($dbc,$_POST['genreofmusic']);
   switch ($genre) {
      case 'Rap':
          $genre= 'Rap';
          break;
          case 'Alternatív':
          $genre= 'Alternatív';
          break;
          case 'Classical':
          $genre= 'Classical';
          break;
          case 'Pop':
          $genre= 'Pop';
          break;
          case 'Tropical':
          $genre= 'Tropical';
          break;
          case 'Future':
          $genre= 'Future';
          break;
  }

   $artist = mysqli_real_escape_string($dbc,$_POST['artistofmusic']);
   $username =  mysqli_real_escape_string($dbc,$_SESSION['username']);
   $musicName = strtolower($musicName);
   $coverName = $_FILES['albumUpload']['name'];
   $coverName = strtolower($coverName);

   $a = $artist;
   $mn = $musicName;
   $g = $genre;
   $mfn = $musicFileName;
   $c = $coverName;
   $u = $username;

   $target = '../songs/' . $musicFileName;
   $targetForAlbum = '../img/albumcover/'. $coverName;
  //PREPARED STATEMENTEK, A VÉDELEM ÉRDEKÉBEN
  if(move_uploaded_file($_FILES['musicUpLoad']['tmp_name'],$target) && (move_uploaded_file($_FILES['albumUpload']['tmp_name'],$targetForAlbum))) {
      $sql = "INSERT INTO songs (artist, name, genre, filename, covername, uploadedby, approved) VALUES (?, ?, ?, ?, ?, ?,?)";
      $stmt = mysqli_stmt_init($dbc);
      $approveStartValue = 0;
      if(!mysqli_stmt_prepare($stmt,$sql)){
          echo "Hiba a feltöltés során.";
      }
      else{
          mysqli_stmt_bind_param($stmt, "sssssss",$a,$mn,$g,$mfn,$c,$u,$approveStartValue);
          // azért a fura változó nevek mert belekavarodtam és így egyszerűbb volt.
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
        echo "<div id='popup' class='pop-up'>
            <h3>Sikeres frissítés!</h3>
            <p>Sikeresen feltölttél egy zenét, már csak az admin jóváhagyása szükséges! </p>
            <a href='profile.php' onclick='closePopUp()' id='disable' class='material-button'>Rendben</a>
          </div>";
      }
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
</body>
</html>
