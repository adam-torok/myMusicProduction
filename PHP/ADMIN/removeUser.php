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
if(isset($_POST['submit'])){
    if(true){
        $query = "DELETE FROM felhasznalo WHERE id=$id LIMIT 1";
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
        echo '<p>'. $felhnev .' törölve az adatbázisból!</p>';
    }
    else{
        echo '<p> A felhasználó nem lett törölve.</p>';
    }
}
else if(isset($id) && isset($felhnev) && isset($jelszo) && isset($email) ){
echo '<p>Biztosan kitörlöd ezt a felhasználót?<br> "'.$felhnev .'"</p>';
echo '<form action="removeUser.php" method="POST">';
echo '<br>';
echo '<input type="hidden" name="id" value="'.$id.'"/>';
echo '<input type="hidden" name="felhnev" value="'.$felhnev.'"/>';
echo '<input type="hidden" name="jelszo" value="'.$jelszo.'"/>';
echo '<input type="hidden" name="email" value="'.$email.'"/>';
echo '<input class="material-button-delete" type="submit" name="submit" value="TÖRLÉS"/>';
echo '</form>';
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
