<?php
session_start();
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
require_once('CONFIG/config.php');
$bio = $_SESSION['bio'];
$profpic = $_SESSION['profpic'];
$id = $_SESSION['id'];
if(mysqli_connect_error()) die('nem sikerült a db csatlakozás');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once("COMPONENTS/headerMeta.php");?>
        <title>Üdvözlünk
            <?php echo $_SESSION['username'];?>
        </title>
    </head>
    <body class="bodyblack">
        <style>
            .row{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            height:auto;
            }
        </style>
  <?php
  include_once('COMPONENTS/navbar.php');
  ?>
<div class="divider">
  <?php
  include_once('COMPONENTS/sidebar.php');
  ?>
<div class="container">
<h1 style="padding-top:5rem;">Lejátszási lista</h1>
<div class="row">
        <?php $sql = "SELECT id FROM playlists WHERE user_id = '$id'";
        $query1 = "";
        $res = mysqli_query($dbc,$sql);
        while($row = mysqli_fetch_assoc($res)){
        $query1 = $row['id'];
        $sql2 = "SELECT DISTINCT song_id FROM playlist_songs WHERE playlist_id = '$query1'";
        $res2 = mysqli_query($dbc,$sql2);
        while ($row2 = mysqli_fetch_assoc($res2)){
            $query2 = $row2['song_id'];
            $sql3 = "SELECT DISTINCT * FROM songs WHERE id = '$query2' ORDER BY artist ASC";
            $res3 = mysqli_query($dbc,$sql3);
            ?>
        <div class="row-inner"><?php
            while($row3 = mysqli_fetch_assoc($res3)){
            ?>
        <div class="tile">
        <h2 class="nameButton"><?php echo $row3['artist'];?></h2>
        <h4><?php echo $row3['name']; ?></h4>
        <h2>Uploaded by <?php echo $row3['uploadedby']; ?></h4>
        <div class="tile-media">
        <img class="tile-img"  onclick="play()" src=../img/albumcover/<?php echo $row3['covername'];?>>
        <a href="../songs/<?php echo $row3['filename'] ?>"></a>
        <i id="playbutton" class="fas fa-play playbutton"></i>
        </div>
        </div>
        <?php
    }//while end ?>
    </div>
    <?php } } ?>
        </div>
        </div>
        </div>
<?php include_once("COMPONENTS/player.php");?>
<a id="github" href="http://www.github.com/woltery99">
    <i class="fab fa-github-alt fa-2x"></i>
</a>
<?php include_once("COMPONENTS/footer.php");?>
<script type="text/javascript" src="../JS/jquery-3.4.1.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/jquery.easy-autocomplete.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/ajax-search.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/music-player.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/script.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/main.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/music-related.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/lightmode.js" charset="utf-8"></script>
</body>
</html>
