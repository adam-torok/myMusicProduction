<?php

/* --- HIBAKERESÉS ESZKÖZEIM --- */

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

/* --- INPUT VALIDÁLÁSOK --- */

function sanitiseInput($dbc,$input){
  $sanitizedInput = mysqli_real_escape_string($dbc,$input);
  $sanitizedInput = trim($input);
  return $sanitizedInput;
}

/* --- ADMINISZTRÁTORI FELADATOK --- */

function deleteFromServer($target,$filename){
  $filename = mb_strtolower($filename);
  if(unlink($target.$filename)){
    echo "<h3>Törölve a szerverről.</h3>";
  }
}

function approveMusic($id,$name,$dbc){
  $sql = "UPDATE songs SET approved = 1 WHERE id= ?";
  $stmt = mysqli_stmt_init($dbc);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    showDialog("Sikertelen jóváhagyás.","songs.php");
  }
  else{
    mysqli_stmt_bind_param($stmt,"i",$id);
    if(mysqli_stmt_execute($stmt)){
      echo "<p style='color:white'>Név: ".$name. " ID: ".  $id. " Zene : Frissítve.";
      echo '<h2><a class="material-button" href="songs.php">Vissza az admin oldalra!</a></p>';
    }
    else{
      showDialog("Sikertelen jóváhagyás.","songs.php");
    }
  }
}

function makeSureToDeleteUser($id,$felhnev,$jelszo,$email){
  echo '<p>Biztosan kitörlöd ezt a felhasználót?<br> "'.$felhnev .'"</p>';
  echo '<form action="removeUser.php" method="POST">';
  echo '<br>';
  echo '<input type="hidden" name="id" value="'.$id.'"/>';
  echo '<input type="hidden" name="felhnev" value="'.$felhnev.'"/>';
  echo '<input type="hidden" name="jelszo" value="'.$jelszo.'"/>';
  echo '<input type="hidden" name="email" value="'.$email.'"/>';
  echo '<input class="material-button-delete" type="submit" name="delete" value="TÖRLÉS"/>';
  echo '</form>';
}

function deleteUser($id,$dbc,$felhnev){
  // PREPARED STATEMENTEK
  $sql = "DELETE FROM felhasznalo WHERE id= ? LIMIT 1";
  $stmt = mysqli_stmt_init($dbc);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    showDialog("Sikertelen felhasználó törlés..","admin.php");
  }
  else{
    mysqli_stmt_bind_param($stmt,"i",$id);
    if(mysqli_stmt_execute($stmt)){
      echo '<p>'. $felhnev .' törölve az adatbázisból!</p>';
    }
    else{
      echo '<p> A felhasználó nem lett törölve.</p>';
    }
  }
}

/* --- FELHASZNÁLÓ KEZELÉS --- */

function isLogged($user){
  if(!isset($user)){
    showDialog("Kérlek jelentkezz be.", "../HTML/loginlayout.html");
  }
}

function showFavorites($dbc,$id){
$sql = "SELECT DISTINCT * FROM songs JOIN playlist_songs ON (playlist_songs.song_id = songs.id) JOIN playlists ON (playlist_songs.playlist_id = playlists.id) JOIN felhasznalo ON (playlists.user_id = felhasznalo.id) WHERE felhasznalo.id = $id LIMIT 5";
$res = $dbc->query($sql);
$imgtag = '<img class="tile-img" src="../IMG/ALBUMCOVER/';
while($row = mysqli_fetch_assoc($res)){
  echo "<div  style='margin:0.2rem'>";
  echo $imgtag.$row['covername'].'">';
  echo "<h2 style='color:white'>".$row['artist']."</h2>";
  echo "<h2>".$row['name']."</h2>";
  echo "</div>";
  }
}

function generateNewPassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function saveBio($biopost,$dbc,$id){
  //PREPARED STATEMENTEK, A VÉDELEM ÉRDEKÉBEN
    $bio = $biopost;
    $sql = "UPDATE felhasznalo SET bio = ? WHERE id= ?";
    $stmt = mysqli_stmt_init($dbc);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      showDialog("Hiba történt a biod frissítése közben.","profile.php");
    }
    else{
      mysqli_stmt_bind_param($stmt,"ss",$bio,$id);
      mysqli_stmt_execute($stmt);
      showDialog("Sikersen frissítetted a biodat!","profile.php");
    }
}

function getGenre($genre){
  switch ($genre) {
  case 'Rap':
  $genre= 'Rap';
  break;
  case 'Rock':
  $genre= 'Rock';
  break;
  case 'Jazz':
  $genre= 'Jazz';
  break;
  case 'Metál':
  $genre= 'Metál';
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

function uploadProfilePicture($dbc,$profileImageName,$id){
  $sql = "UPDATE felhasznalo SET profile_image = ? WHERE id= ?";
  $stmt = mysqli_stmt_init($dbc);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    showDialog("Hiba történt a profilkép frissítése közben.","profile.php");
  }
  else{
    mysqli_stmt_bind_param($stmt,"si",$profileImageName,$id);
    mysqli_stmt_execute($stmt);
    showDialog("Sikeresen frissítetted a profilképedet!","profile.php");
  }
}

function uploadMusic($dbc,$artist,$musicName,$genre,$musicFileName,$coverName,$username){
  //PREPARED STATEMENTEK, A VÉDELEM ÉRDEKÉBEN
  $sql = "INSERT INTO songs (artist, name, genre, filename, covername, uploadedby, approved) VALUES (?, ?, ?, ?, ?, ?,?)";
  $stmt = mysqli_stmt_init($dbc);
  $approveStartValue = 0;
  if(!mysqli_stmt_prepare($stmt,$sql)){
      showDialog("Hiba a feltöltés során","profile.php");
  }
  else{
      mysqli_stmt_bind_param($stmt, "sssssss",$artist,$musicName,$genre,$musicFileName,$coverName,$username,$approveStartValue);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      showDialog("Sikeres felöltöltés","profile.php");
    }
}

function updatePassword($dbc,$password,$id){
  $sql = "UPDATE felhasznalo SET jelszo = SHA(?) WHERE id = ?";
  $stmt = mysqli_stmt_init($dbc);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    showDialog("Hiba a jelszó frissítése során","profile.php");
  }
  else{
    mysqli_stmt_bind_param($stmt,"si",$password,$id);
    mysqli_stmt_execute($stmt);
    showDialog("Sikeresen frissítetted a jelszavad!","profile.php");
  }
}

function checkIfHavePlayList($id) {
  global $dbc;
  $sql = "SELECT id FROM playlists WHERE user_id = $id";
  $res = $dbc -> query($sql);
  if ($res->num_rows==1) { return true; } else { return false; }
}

/* --- DIALÓGUSOK --- */

function showDialog($message,$header){
  echo "<div id='popup' class='pop-up'>
      <div class='pop-up-content'>
      <h3>Üzenet</h3>
      <p>".$message."</p>
      <a href='$header' onclick='closePopUp()' id='disable' class='material-button'>Rendben</a>
      </div>
    </div>"
;}


/* --- EXTRA INLINE CSS ---
Miért? -> voltak helyek ahol nem akartam új osztályt létrehozni, apróbb változtatásokért,
ezért style tag-be kellett raknom, de a forráskódot nem akartam csúnyítani.
 */

function showActivityExtraCss(){
  echo "<style>
  p{
  text-align: left;
  color: white;
  }
  h2 {
    color: grey;
  }
  i:hover{
    cursor:pointer;
  }
  .list{
    text-align:left!important;
  }
  .list i{
    text-align:left!important;
  }
  .material-button{
    margin:1rem;
  }
  </style>";
}

function showWelcomeExtraCss(){
  echo "<style>
    h2 {
      color: grey;
    }
    i:hover{
      cursor:pointer;
    }
    .list{
      text-align:left!important;
    }
    .list i{
      text-align:left!important;
    }
    .material-button{
      margin:1rem;
    }
  </style>";
}

function showUserProfileExtraCss(){
  echo "<style>
  body{
    background:var(--bg-color);
  }
  p{
     text-align:left;
  }
  .form{
   background-color:#424242;
  }
  .form input{
   background-color:#424242;
   color:white;
  }
  .form input::placeholder{
   color:white;
  }
  .container{
    display: grid;
    grid-template-columns:1fr 1fr;
    background:var(--bg-color);
  }
  .form-center{
   height: auto;
   background-color: unset;
   background-image: none;
  }
   </style>";
}

function showSearchedExtraCss(){
  echo "<style>
  .tile{
    width: 100%;
  }
  .tile h2,h1{
    text-align: center;
  }
  .track-container{
    display: block;
  }
  </style>";
}

function showFilteredExtraCss(){
  echo "<style>
  p{
  text-align: left;
  color: white;
  }
  h2 {
  color: grey;
  }
  i:hover{
  cursor:pointer;
  }
  .list{
  text-align:left!important;
  }
  .list i{
  text-align:left!important;
  }
  .material-button{
  margin:1rem;
  }
  </style>";
}

function showDisplayPlayListExtraCss(){
  echo "<style>
        .row{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        height:auto;
        }
    </style>";
}
