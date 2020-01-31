<?php
require_once('authorize.php');
require_once('../CONFIG/config.php');
require_once('../COMPONENTS/functions.php');
funnyDebugTool();
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
if(isset($_GET['id']) && isset($_GET['artist']) && isset($_GET['name']) && isset($_GET['genre'])){
    $id = $_GET['id'];
    $artist = $_GET['artist'];
    $fileName = $_GET['filename'];
    $name = $_GET['name'];
    $genre = $_GET['genre'];
}
else if(isset($_POST['id']) && isset($_POST['artist']) && isset($_POST['name']) && isset($_POST['genre'])){
//Pontszámok kinyerése a POST  tömbből
    $id = $_POST['id'];
    $artist = $_POST['artist'];
    $name = $_POST['name'];
    $genre = $_POST['genre'];
}
else {
    echo "Sajnáljuk, nem választott ki zenét!";
}
// --- --- ----- --- --
if(isset($_POST['submit'])){
    if(true){
        $target = dirname(__FILE__,3)."/SONGS/";
        $query = "DELETE FROM songs WHERE id=$id LIMIT 1";
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
        deleteFromServer($target,$_POST['filename']);
        echo '<p>'. $name .' törölve  az adatbázisból!</p>';
    }
    else{
        echo '<p> A zene nem lett törölve.</p>';
    }
}
else if(isset($id) && isset($artist) && isset($name) && isset($genre) ){
echo '<p>Biztosan kitörlöd ezt a zenét?<br> "'.$artist." - " . $name.'"</p>';
echo '<form action="removeMusic.php" method="POST">';
echo '<br>';
echo '<input type="hidden" name="id" value="'.$id.'"/>';
echo '<input type="hidden" name="filename" value="'.$fileName .'"/>';
echo '<input type="hidden" name="artist" value="'.$artist.'"/>';
echo '<input type="hidden" name="name" value="'.$name.'"/>';
echo '<input type="hidden" name="genre" value="'.$genre.'"/>';
echo '<input class="material-button-delete" type="submit" name="submit" value="TÖRLÉS"/>';
echo '</form>';
}
echo '<h2><a class="material-button" href="songs.php">Vissza az admin oldalra!</a></p>';
?>
</div>
</div>
</body>
<?php
echo include_once("COMPONENTS/footer.php");
?>
</html>
