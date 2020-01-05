<?php
require_once('../CONFIG/config.php');
$sql = "SELECT name, artist FROM songs";
$res = mysqli_query($dbc,$sql);
$json_array = array();
while ($row = mysqli_fetch_assoc($res)) {
  $json_array[] = $row;
  strtoupper($row['name']);
}
  print(json_encode($json_array,JSON_UNESCAPED_UNICODE));
?>
