<?php
// LEJÁTSZÁSI LISTA GENERÁLÁSA
require_once('../CONFIG/config.php');
session_start();
$id = $_SESSION['id'];
$query = "INSERT INTO playlists (`user_id`) values  ('$id')";
if($dbc -> query($query)){
    header("Location: ../welcome.php");
}
$dbc->close();
