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
  $sanitizedInput = ucfirst($input);
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
  $query = "UPDATE songs SET approved = 1 WHERE id='$id'";
  if(mysqli_query($dbc,$query)){
    echo "<p style='color:white'>Név: ".$name. " ID: ".  $id. " Zene : Frissítve.";
    echo '<h2><a class="material-button" href="songs.php">Vissza az admin oldalra!</a></p>';
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
  $query = "DELETE FROM felhasznalo WHERE id=$id LIMIT 1";
  if(mysqli_query($dbc,$query)){
    mysqli_close($dbc);
    echo '<p>'. $felhnev .' törölve az adatbázisból!</p>';
  }
  else{
    echo '<p> A felhasználó nem lett törölve.</p>';
  }
}

/* --- FELHASZNÁLÓ KEZELÉS --- */

function isLogged($user){
  if(!isset($user)){
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
  }
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

/* --- DIALÓGUSOK --- */

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
/* --- DALOK MEGJELENÍTÉSE ---
