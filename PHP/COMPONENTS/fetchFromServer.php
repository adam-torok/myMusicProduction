<?php
require_once('../CONFIG/config.php');
$sql = "SELECT name, artist FROM songs";
$res = $dbc -> query($sql);
$json_array = array();
while ($row = $res -> fetch_assoc()) {
  $json_array[] = $row;
  strtoupper($row['name']);
}
  print(json_encode($json_array,JSON_UNESCAPED_UNICODE));
?>
