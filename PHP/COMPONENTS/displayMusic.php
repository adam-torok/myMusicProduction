<!---
I DO NOT OWN ANY OF THE MUSIC, OR THE ALBUM COVERS ->
All rights reserved to the respective artists and parties. Support the artists.
No copyright infringement intended for music,
for promotional and study porpuses only,
all rights reserved to their respective owners.
--->
<?php $array = array("Alternativ", "Metál", "Pop", "Rock", "Future", "Jazz", "Classical", "Rap", "Tropical"); ?>
<div class="container">
   <?php foreach($array as $key=>$value): ?>
  <div  id="<?php echo $value?>" class="banner">
    <h3><?php echo $value;?></h2>
      <h2>Felkapott zenék a myMusic közzöségben</h2>
  </div>
      <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = '$value'  AND  approved = 1 LIMIT 10";
        $result = $dbc -> query($sql);
        while($row = $result -> fetch_assoc()){
        ?>
          <div class="row-inner">
            <div class="tile">
              <h2 class="nameButton"><?php echo $row['artist'];?></h2>
              <h4 class="music-name"><?php echo $row['name']; ?></h4>
              <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
            <div class="tile-media">
              <img class="tile-img" src="../IMG/ALBUMCOVER/<?php echo $row['covername'];?> ">
              <div>
                <a href="../SONGS/<?php echo $row['filename']; ?>"></a>
                <i id="playbutton" class="fas fa-play playbutton"></i>
                <i <?php if (userLiked($row['id'])): ?>
                class="fas fa-heart like-btn"
              <?php else: ?>
                class="far fa-heart like-btn"
              <?php endif ?>
              data-id="<?php echo $row['id'] ?>"></i>
              <span class="likes"><?php echo getLikes($row['id']); ?></span>
              </div>
            </div>
          </div>
        </div>
        <?php
      }//while end ?>
</div>
<?php endforeach; ?>
</div>
