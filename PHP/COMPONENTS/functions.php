<?php
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
