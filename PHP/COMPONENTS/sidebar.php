<div class="sidebar">
  <div class="profile-image">
      <img style="padding-left:20px;" src="../PROFILEIMAGES/<?php echo $_SESSION['profpic'];?>"  alt="profilkép">
  </div>
  <div class="sidebar-items">
      <a href="welcome.php" class="sidebar-item">
          <i  class="fas fa-plus-circle  fa-1x"></i>
          <span><h2>Kezdőlap</h2></span>
      </a>
        <a href="explore.php" class="sidebar-item">
            <i  class="fas fa-plus-circle  fa-1x"></i>
            <span><h2>Böngészés</h2></span>
        </a>
        <a href="activity.php" class="sidebar-item">
            <i  class="fas fa-user  fa-1x"></i>
            <span><h2>Aktivitásod</h2></span>
        </a>
        <a href="welcome.php" class="sidebar-item">
            <i  class="fas fa-music  fa-1x"></i>
            <span><h2>Zenék</h2></span>
        </a>
        <a href="artists.php" class="sidebar-item">
            <i class="fas fa-users  fa-1x"></i>
            <span><h2>Zenészek</h2></span>
        </a>
        <a   <?php
            if(checkIfHavePlayList($id)){
              echo "href='./displayPlayList.php'";
            }
            else{
              echo "href='./COMPONENTS/createPlayList.php'";
            }
           ?> class="sidebar-item">
            <i class="fas fa-list-alt  fa-1x"></i>
            <span><h2>Lista</h2></span>
        </a>
    </div>
</div>
