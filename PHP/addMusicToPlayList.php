<?php
session_start();
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
require_once('COMPONENTS/functions.php');
isLogged($_SESSION['logged']);
require_once('CONFIG/config.php');
$id = $_SESSION['id'];
$songName = $_GET['songname'];
$song_ID = "";
$playlistID ="";
$query = "SELECT * FROM songs WHERE name = '$songName'";
$result = $dbc -> query($query);
  while($row = $result -> fetch_assoc()) {
    $song_ID = $row['id'];
  }
echo "<br>";
$query = "SELECT * FROM playlists WHERE user_id = '$id'";
$result = $dbc -> query($query);
  while($row = $result -> fetch_assoc()) {
    $playlistID = $row['id'];
  }
$query = "INSERT INTO playlist_songs (playlist_id, song_id) VALUES ('$playlistID','$song_ID')";
if(mysqli_query($dbc,$query)){
header("Location:  displayPlayList.php");
}
mysqli_close($dbc);
