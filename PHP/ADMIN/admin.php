<?php
require_once('authorize.php');
require_once('../CONFIG/config.php');
?>
<html lang="hu">
<head>
<?php include_once("adminHeaderMeta.php"); ?>
  <title>Admin felület</title>
</head>
<body>
  <?php include_once("admin-header.php"); ?>
  <div class="container">
    <div class="row">
      <table>
  <thead>
  <tr>
  <th><p><i class="fas fa-user"></i>Felhasználónév</p></th>
  <th><p><i class="fas fa-key"></i>Jelszó</p></th>
  <th><p><i class="fas fa-at"></i>E-mail cím</p></th>
  <th><p><i class="fas fa-user"></i>Profilkép</p></th>
  <th><p><i class="fas fa-calendar-week"></i>Regisztráció dátuma</p></th>
  <th><p><i class="fas fa-pen"></i>Bio</p></th>
  <th><p><i class="fas fa-user-slash"></i>Törlés</p></th>
  </tr>
  </thead>
  <tbody>
    <?php $sql = "SELECT * FROM felhasznalo";
    $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()) {?>
  <tr>
    <td>
    <h2> <?php echo $row['felhnev'];?></h2>
    </td>
    <td>
    <h2><?php echo $row['jelszo'];?></h2>
    </td>
    <td>
    <h2><?php echo $row['email'];?></h2>
    </td>
    <td>
    <h2><?php echo $row['profile_image'];?></h2>
    </td>
    <td>
    <h2><?php echo $row['time'];?></h2>
    </td>
    <td>
    <h2><?php echo $row['bio'];?></h2>
    </td>
    <td>
    <?php echo '<a href="removeUser.php?id=' . $row['id'] . '&amp;felhnev='. $row['felhnev'] . '&amp;jelszo=' . $row['jelszo'] .
    '&amp;email=' . $row['email'].'"><h2 style=" color:#f05123 ;">Törlés</a>'?>
    </td>
  </tr>
    <?php
  }//while end ?>
  </tbody>
  </table>
  </div>
  </div>
</body>
<script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
<?php include_once("../COMPONENTS/footer.php");?>
</html>
