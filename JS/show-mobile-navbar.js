$(document).ready(function(){
  // Ez fontos, a telefonos navigációs sáv végett...
  var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
 if (isMobile) {
   var toogle = $("<span id='toggleNav' style='z-index:999999;font-size:50px;cursor:pointer;color:white'>&#9776;</span>");
   $(".fill").css("display","none");
   $(".nav-dark").append(toogle);
   var t = $("<div class='mobile hidden animated bounceInDown delay-0s'><ul><img class='animated jackInTheBox delay-0s' style='padding-bottom: 1rem;width:150px;height:150px;' src='../IMG/myMusicLogo.png' alt=''><li><a href='welcome.php'><i style='padding:0;padding-right:1rem' class='fas fa-home fa-1x'></i>Böngészés</a></li><li><a href='profile.php'><i style='padding:0;padding-right:1rem' class='fas fa-user fa-1x'></i>Profil</a></li><li><a href='welcome.php'><i style='padding:0;padding-right:1rem' class='fas fa-list-alt fa-1x'></i>Zenészek</a></li><li><a href='https://github.com/woltery99/myMusic/wiki'><i style='padding:0;padding-right:1rem' class='fab fa-github fa-1x'></i>Sugó</a></li><li><a href='displayPlayList.php'><i style='padding:0;padding-right:1rem' class='fas fa-list fa-1x'></i>Lista</a></li><li><a href='logout.php'><i style='padding:0;padding-right:1rem' class='fas fa-sign-out-alt  fa-1x'></i>Kilépés</a></li></ul></div>");
   $(".nav-dark").append(t);
}
 $("#toggleNav").click(function(){
   $(".mobile").toggleClass("hidden");
   $("body").css("overflow-y","hidden");

 })
})
