<?php
require_once('authorize.php');
require_once('../CONFIG/config.php');
require_once('../COMPONENTS/functions.php');
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
// Két féle reagálás, GET / POST esetében.
if(isset($_GET['id']) && isset($_GET['felhnev']) && isset($_GET['jelszo']) && isset($_GET['email'])){
    $id = $_GET['id'];
    $felhnev = $_GET['felhnev'];
    $jelszo = $_GET['jelszo'];
    $email = $_GET['email'];
}
else if(isset($_POST['id']) && isset($_POST['felhnev']) && isset($_POST['jelszo']) && isset($_POST['email'])){
//Pontszámok kinyerése a POST  tömbből
    $id = $_POST['id'];
    $felhnev = $_POST['felhnev'];
    $jelszo = $_POST['jelszo'];
    $email = $_POST['email'];
}
else {
    echo "Sajnáljuk, nem választott ki felhasználót!";
}
// --- --- ----- --- --
if(isset($_POST['delete'])){
  deleteUser($id,$dbc,$felhnev);
}
else if(isset($id) && isset($felhnev) && isset($jelszo) && isset($email) ){
  makeSureToDeleteUser($id,$felhnev,$jelszo,$email);
}
echo '<h2><a class="material-button" href="admin.php">Vissza az admin oldalra!</a></p>';
?>
</div>
</div>
</body>
<?php
echo include_once("COMPONENTS/footer.php");
?>
</html>
