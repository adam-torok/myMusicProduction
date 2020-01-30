<?php
session_start();
if(empty($_FILES)){
  die(var_dump($_FILES['profile_image']));
}

require_once('../CONFIG/config.php');$id = $_SESSION['id'];
if(isset($_POST['save_user'])){
$allowedImagesTypes = array('image/gif');
$profileImageName = $_FILES['profile_image']['name'];
$profileImageName = strtolower($profileImageName);
$profileImageName = trim($profileImageName);
// TODO: CHECK FOR SIZE, AND THINGS BEFORE UPLOAD
$target = 'C:\wamp64\www\mymusic\PROFILEIMAGES/' . $profileImageName; //ezzel lehetnek még bajok.
if(move_uploaded_file($_FILES['profile_image']['tmp_name'],$target)){
    $sql = "UPDATE felhasznalo SET profile_image = '$profileImageName' WHERE id='$id'";
    if(mysqli_query($dbc,$sql)){
      echo "<div id='popup' class='pop-up'>
          <h3>Sikeres frissítés!</h3>
          <p>Sikeresen feltölttél egy zenét, már csak az admin jóváhagyása szükséges! </p>
          <a onclick='closePopUp()' id='disable' class='material-button'>Rendben</a>
        </div>";
    }
    else{
        echo "<script> alert('Sikertelen)</script>.";
    }
}else{
    echo "<script> alert('Sikertelen feltöltés.')</script>";
}
}
?>
