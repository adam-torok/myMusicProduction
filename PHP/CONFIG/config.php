<?php
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "felhasznalo";

//csatlakozás felépítése
$dbc = new mysqli($host, $dbusername, $dbpassword, $dbname);

if($dbc){
  $dbc -> set_charset("utf8");
}
else{
  echo "Nem sikerült beállítani a karakter kódolást.";
}
?>
