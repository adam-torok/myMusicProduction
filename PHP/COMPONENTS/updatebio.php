<?php
session_start();
//csatlakozás felépítése
require_once('CONFIG/config.php');
$id = $_SESSION['id'];
$bio = $_SESSION['bio'];
if(isset($_POST['save_user'])){
    $sql = "UPDATE felhasznalo SET bio = '$bio' WHERE id='$id'";
    if(mysqli_query($dbc,$sql)){
        echo $_SESSION['id'];
        echo "<script> alert('Bio updated.')</script>.";
    }
    else{
        echo "<script> alert('Upload failed to database.')</script>.";
    }
 }
?>
