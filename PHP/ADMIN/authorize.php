<?php
//HTTP AUTENTIKÁCIÓ 🚫
$username = 'admin';
$password = 'admin';
if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
 ($_SERVER['PHP_AUTH_USER'] != $username)||
 ($_SERVER['PHP_AUTH_PW'] != $password)){
   header('HTTP/1.1 401 Unauthorized');
   header("WWW-Authenticate: Basic realm='mymusic'");
   exit('<h2>Hiteles admin jelszót és felhasználónevet igényel az oldal megtekintése.');
}
?>
