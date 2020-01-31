<div class="player">
   <div class="player-image-container" style="padding-left:3rem;">
      <img style="width:100px;height:auto;" id="playerImage"  src="../IMG/ALBUMCOVER/albumcoverbase.png">
   </div>
   <div class="name">
      <h2>Előadó</h2>
      <h2 class="nameButton" id="artistName"></h2>
      <h4 id="songName">Játsz zenét!</h4>
      <div id="buttons">
         <i id="playButton" class="fas fa-play fa-1x"></i>
         <i id="pauseButton" class="fas fa-pause fa-1x"></i>
         <i id="volumeUp" class="fas fa-volume-up fa-1x"></i>
         <i id="volumeDown" class="fas fa-volume-down fa-1x"></i>
         <?php if(isset($_SESSION['logged'])){
           echo ' <a id="downloadButton" class="tooltip" download="filename.mp3" href="../songs/">
                 <span class="animated pulse tooltiptext">Zene letöltése!</span>
              <i class="fas fa-download"></i></a>';
         }?>
      </div>
   </div>
   <h2 style="padding-right:1rem; font-size:13px; color:#ed2553" id="current-time"></h2>
   <canvas id="progress" width="500" height="5"></canvas>
   <i id="addToPlayList" class="fas fa-plus-circle  fa-1"></i>
   <h2  style=" padding-left:1rem;" id="duration"></h2>
   <img class="logo" style="margin-left: 2rem;width:100px;height:100px;" src="../IMG/myMusicLogo.png" alt="">
   <audio ontimeupdate="updateBar()" id="myaudio"  id="player" autoplay>
      <source src="../SONGS/" type="audio/mpeg">
      Your browser does not support the audio element.
   </audio>
</div>
