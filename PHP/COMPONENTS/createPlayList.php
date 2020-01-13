<?php
require_once('../CONFIG/config.php');
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
session_start();
$id = $_SESSION['id'];
$query = "INSERT INTO playlists (`user_id`) values  ('$id')";
if($dbc -> query($query)){
    header("Location: ../welcome.php");
}
$dbc->close();
