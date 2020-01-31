<?php
require_once('authorize.php');
require_once('../CONFIG/config.php');
require_once('../COMPONENTS/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("adminHeaderMeta.php"); ?>
<title>Engedélyezés.</title>
</head>
<body>
<div class="delete-section">
  <div class="delete-card">
  <?php
    approveMusic($_GET['id'],$_GET['name'],$dbc);
  ?>
</div>
</div>
</body>
<?php
echo include_once("COMPONENTS/footer.php");
?>
</html>
