<div class="container">
  <div  id="Alternativ" class="banner">
    <h3>Alternatív</h2>
      <h2>Felkapott zenék a myMusic közzöségben</h2>
  </div>
      <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Alternatív'  AND  approved = 1 LIMIT 10";
        $result = $dbc -> query($sql);
        while($row = $result -> fetch_assoc()){
        ?>
          <div class="row-inner">
            <div class="tile">
              <h2 class="nameButton"><?php echo $row['artist'];?></h2>
              <h4 class="music-name"><?php echo $row['name']; ?></h4>
              <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
            <div class="tile-media">
              <img class="tile-img" src="../img/albumcover/<?php echo $row['covername'];?> ">
              <div>
                <a href="../songs/<?php echo $row['filename']; ?>"></a>
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
     <div id="Tropical" class="banner">
        <h3>Tropical</h3>
        <h2>Felkapott zenék a myMusic közzöségben</h2>
</div>
        <div  class="row">
        <?php $sql = "SELECT * FROM songs  WHERE `genre` = 'Tropical' AND  approved = 1 LIMIT 10";
        $result = $dbc -> query($sql);
        while($row = $result -> fetch_assoc()) {
      //A lekérdezésnek megfelelően egy row változóba teszem a resultot
    ?>
        <div  class="row-inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4 class="music-name"><?php echo $row['name']; ?></h4>
        <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
        <div class="tile-media">
          <img class="tile-img"  onclick="play()" src=../img/albumcover/<?php echo $row['covername'];?> ">
          <div>
            <a href="../songs/<?php echo $row['filename']; ?>"></a>
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
     <div id="Rap" class="banner">
        <h3>Rap</h3>
        <h2>Felkapott zenék a myMusic közzöségben</h2>
    </div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Rap' AND  approved = 1 LIMIT 10";
        $result = $dbc -> query($sql);
        while($row = $result -> fetch_assoc()) {
    ?>
        <div class="row-inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4 class="music-name"><?php echo $row['name']; ?></h4>
        <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
        <div class="tile-media">
          <img class="tile-img"  onclick="play()" src=../img/albumcover/<?php echo $row['covername'];?> ">
          <div>
            <a href="../songs/<?php echo $row['filename']; ?>"></a>
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
     <div id="Classical" class="banner">
        <h3>Classical</h2>
        <h2>Felkapott zenék a myMusic közzöségben</h2>
</div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Classical' AND  approved = 1 ORDER BY id DESC LIMIT 10";
        $result = $dbc -> query($sql);
        while($row = $result -> fetch_assoc()) {
    ?>
        <div class="row-inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4 class="music-name"><?php echo $row['name']; ?></h4>
        <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
        <div class="tile-media">
          <img class="tile-img"  onclick="play()" src=../img/albumcover/<?php echo $row['covername'];?> ">
          <div>
            <a href="../songs/<?php echo $row['filename']; ?>"></a>
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
     <div id="Pop" class="banner">
        <h3>Pop</h2>
        <h2>Felkapott zenék a myMusic közzöségben</h2>
      </div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Pop' AND  approved = 1 ORDER BY id DESC LIMIT 10";
        $result = $dbc -> query($sql);
        while($row = $result -> fetch_assoc()) {
        ?>
        <div class="row-inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4 class="music-name"><?php echo $row['name']; ?></h4>
        <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
        <div class="tile-media">
          <img class="tile-img" src=../img/albumcover/<?php echo $row['covername'];?> ">
          <div>
            <a href="../songs/<?php echo $row['filename']; ?>"></a>
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
     <div id="Future" class="banner">
    <h3>Future House</h2>
    <h2>Felkapott zenék a myMusic közzöségben</h2>
    </div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Future' AND  approved = 1 LIMIT 10";
        $result = $dbc -> query($sql);
        while($row = $result -> fetch_assoc()) {
      //A lekérdezésnek megfelelően egy row változóba teszem a resultot
    ?>
        <div class="row-inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4 class="music-name"><?php echo $row['name']; ?></h4>
        <h2 class="userButton">Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
        <div class="tile-media">
          <img class="tile-img" src=../img/albumcover/<?php echo $row['covername'];?> ">
          <div>
            <a href="../songs/<?php echo $row['filename']; ?>"></a>
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
    </div>
