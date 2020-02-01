<?php
session_start();
// Session indítása
include_once("CONFIG/config.php");
require_once('COMPONENTS/functions.php');
include_once("COMPONENTS/headerMeta.php");
//Ezek a bejelentkező formból nyert adatok
$username = mysqli_real_escape_string($dbc,$_POST['username']);
$password = mysqli_real_escape_string($dbc,$_POST['password']); 
$sql = "SELECT * FROM felhasznalo WHERE felhnev = '$username' AND jelszo = SHA('$password')";
$result = $dbc -> query($sql);
//A result változóba tárolom el a lekérdezést
if(mysqli_num_rows($result) == 1){
// Itt megnézem, hogy csakis ha egy ilyen párosítás van, akkor engedjen be, és lekérem a többi adatot.
  while($row = mysqli_fetch_assoc($result)){
      $username = $row["felhnev"];
      $passord = $row["jelszo"];
      $time = $row["time"];
      $id = $row["id"];
      $profpic = $row["profile_image"];
      $bio = $row["bio"];
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $passord;
      $_SESSION['time'] = $time;
      $_SESSION['id'] = $id;
      $_SESSION['profpic'] = $profpic;
      $_SESSION['bio'] = $bio;
}
$_SESSION['logged'] = true;
header("Location: welcome.php");
  //A welcome.php-ra átírányítom a felhasználót.
  $dbc->close();
  //Adatbázis kapcsolat bezárása.
}
else{
    showLoginErrorDialog("Hibás Bejelentkezési Adatok!");
}
?>
