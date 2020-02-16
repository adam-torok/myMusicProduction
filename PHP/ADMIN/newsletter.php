<?php
require_once('authorize.php');
require_once('../CONFIG/config.php');
require_once('../COMPONENTS/functions.php');
?>
<html lang="hu">
<head>
<?php include_once("adminHeaderMeta.php"); ?>
  <title>Admin felület</title>
</head>
<body>
  <style media="screen">
    form{
      margin: 0;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
    }
  </style>
  <?php include_once("admin-header.php"); ?>
  <div class="newsletter-container">
  <table class="admin-table">
  <thead>
  <tr class="admin-tr">
  <th class="admin-th"><p><i class="fas fa-user"></i>Email - id</p></th>
  <th class="admin-th"><p><i class="fas fa-key"></i>Email</p></th>
  <th class="admin-th"><p><i class="fas fa-key"></i>Törlés</p></th>
  </tr>
  </thead>
  <tbody class="admin-tbody">
    <?php $sql = "SELECT * FROM newsletter";
    $result = $dbc -> query($sql);
  while($row = $result -> fetch_assoc()) {?>
  <tr class="admin-tr">
    <td class="admin-td">
    <h2> <?php echo $row['id'];?></h2>
    </td>
    <td class="admin-td">
    <h2><?php echo $row['email'];?></h2>
    </td>
    <td class="admin-td">
    <?php echo '<a href="removeEmail.php?id=' . $row['id'] . '&amp;email='. $row['email'].'"><h2 style="color:red">Törlés</h2></a>'?>
    </td>
  </tr>
    <?php
  }//while end ?>
  </tbody>
  </table>
</div>

  <div style="margin:6rem;width:auto" style="width:auto" class="form root">
     <form  method="GET" action="sendNewsletter.php"  >
        <h1>Hírlevélkezelés</h1>
        <div class="input">
            <input class="inputFields"  type="text"  required placeholder="Tárgy"  name="subject">
          <div class="bar"></div>
        </div>
        <div class="input">
            <textarea class="inputFields"  type="text"  required placeholder="Szöveg"  name="body">  </textarea>
          <div class="bar"></div>
        </div>
        <input class="material-button" type="submit" value="Levél küldése!">
     </form>
  </div>
</body>
<script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
<?php include_once("../COMPONENTS/footer.php");?>
</html>
