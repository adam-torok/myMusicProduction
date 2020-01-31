<?php

function sanitiseInput($dbc,$input){
  $sanitizedInput = mysqli_real_escape_string($dbc,$input);
  $sanitizedInput = ucfirst($input);
  $sanitizedInput = trim($input);
  return $sanitizedInput;
}

function funnyDebugTool(){
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

function dumpAndDie($param){
  echo strlen($param);
  var_dump($param);
  die();
}

function saveBio($biopost,$dbc,$id){
    $bio = $biopost;
    $sql = "UPDATE felhasznalo SET bio = '$bio' WHERE id='$id'";
    if($dbc -> query($sql)){
    showDialog("Sikersen frissítetted a biodat!");
    }
    else{
    showErrorDialog("Hiba történt a biod frissítése közben.");
    }
}

function getGenre($genre){
  switch ($genre) {
     case 'Rap':
         $genre= 'Rap';
         break;
         case 'Alternatív':
         $genre= 'Alternatív';
         break;
         case 'Classical':
         $genre= 'Classical';
         break;
         case 'Pop':
         $genre= 'Pop';
         break;
         case 'Tropical':
         $genre= 'Tropical';
         break;
         case 'Future':
         $genre= 'Future';
         break;
 }
}

function uploadMusic($dbc,$artist,$musicName,$genre,$musicFileName,$coverName,$username){
  //PREPARED STATEMENTEK, A VÉDELEM ÉRDEKÉBEN
  $sql = "INSERT INTO songs (artist, name, genre, filename, covername, uploadedby, approved) VALUES (?, ?, ?, ?, ?, ?,?)";
  $stmt = mysqli_stmt_init($dbc);
  $approveStartValue = 0;
  if(!mysqli_stmt_prepare($stmt,$sql)){
      showDialog("Hiba a feltöltés során");
  }
  else{
      mysqli_stmt_bind_param($stmt, "sssssss",$artist,$musicName,$genre,$musicFileName,$coverName,$username,$approveStartValue);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      showDialog("Sikeres felöltöltés");
    }
}

function checkIfHavePlayList($id) {
  global $dbc;
  $sql = "SELECT id FROM playlists WHERE user_id = $id";
  $res = $dbc -> query($sql);
  if ($res->num_rows==1) { return true; } else { return false; }
}
function showDialog($message){
  echo "<div id='popup' class='pop-up'>
      <h3>Üzenet</h3>
      <p>".$message."</p>
      <a href='profile.php' onclick='closePopUp()' id='disable' class='material-button'>Rendben</a>
    </div>";
}
function showErrorDialog($message){
  echo "<div id='popup' class='pop-up'>
      <h3>Üzenet</h3>
      <p>".$message."</p>
      <a href='profile.php' onclick='closePopUp()' id='disable' class='material-button'>Rendben</a>
    </div>";}
function showLoginErrorDialog($message){
    echo "<div id='popup' class='pop-up'>
          <h3>Üzenet</h3>
          <p>".$message."</p>
          <a href='../HTML/loginlayout.html' onclick='closePopUp()' id='disable' class='material-button'>Rendben</a>
      </div>"
;}
 ?>
