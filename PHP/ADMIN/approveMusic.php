<?php
require_once('authorize.php');
require_once('../CONFIG/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("adminHeaderMeta.php"); ?>
<title>Biztosan?</title>
</head>
<body>
<div class="delete-section">
  <div class="delete-card">
  <?php
    $id = $_GET['id'];
    $name = $_GET['name'];
    $query = "UPDATE songs SET approved = 1 WHERE id='$id'";
    mysqli_query($dbc,$query);
    echo "<p style='color:white'>Név: ".$name. " ID: ".  $id. " Zene : Frissítve.";
    echo '<h2><a class="material-button" href="songs.php">Vissza az admin oldalra!</a></p>';
    ?>
</div>
</div>
</body>
<?php
echo include_once("COMPONENTS/footer.php");
?>
</html>
