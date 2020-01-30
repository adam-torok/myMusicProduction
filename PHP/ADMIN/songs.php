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
  <th><p><i class="fas fa-user"></i>Zenész</p></th>
  <th><p><i class="fas fa-key"></i>Név</p></th>
  <th><p><i class="fas fa-at"></i>Műfaj</p></th>
  <th><p><i class="fas fa-user"></i>Filenév</p></th>
  <th><p><i class="fas fa-calendar-week"></i>Albumnév</p></th>
  <th><p><i class="fas fa-pen"></i>Feltöltő</p></th>
  <th><p><i class="fas fa-user-slash"></i>Feltöltés ideje</p></th>
  <th><p><i class="fas fa-user-slash"></i>Jóváhagyva</p></th>
  <th><p><i class="fas fa-user-slash"></i>Törlés</p></th>
  </tr>
  </thead>
  <tbody>
    <?php $sql = "SELECT * FROM songs";
    $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()) {?>
  <tr>
    <td>
    <h2> <?php echo $row['artist'];?></h2>
    </td>
    <td>
    <h2><?php echo $row['name'];?></h2>
    </td>
    <td>
    <h2><?php echo $row['genre'];?></h2>
    </td>
    <td>
    <h2><?php echo $row['filename'];?></h2>
    </td>
    <td>
    <h2><?php echo $row['covername'];?></h2>
    </td>
    <td>
    <h2><?php echo $row['uploadedby'];?></h2>
    </td>
    <td>
    <h2><?php echo $row['time'];?></h2>
    </td>
    <td>
    <?php if($row['approved'] == '0'){
      echo  '<a  href="approveMusic.php?id=' . $row['id'] . '&amp;artist='. $row['artist'] . '&amp;name=' . $row['name'] .
      '&amp;genre=' . $row['genre'] . '&amp;uploadedby' . $row['uploadedby'] . '"><h2 style=" color:#f05123 ;">Engedélyezés</h3></a>';
    }else{
      echo "<h2>".$row['approved'];"</h2>";
    }?>
    </td>
    <td>
    <?php echo '<a href="removeMusic.php?id=' . $row['id'] . '&amp;artist='. $row['artist'] . '&amp;name=' . $row['name'] .
    '&amp;genre=' . $row['genre'].'"><h2 style=" color:#f05123 ;">Törlés</a>'?>
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
