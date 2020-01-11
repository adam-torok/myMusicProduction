$(document).ready(function(){
  $("#change").click(function(){
    console.log("LIGHT MODE ON! 🎈");
    $(".row-inner").toggleClass("row-inner-white");
    $("body").toggleClass("bodyblack");
    $(".nav-dark").toggleClass("nav-light");
    $(".sidebar").toggleClass("sidebar-light")
    $(".player").toggleClass("player-light");
    $(".container").toggleClass("container-light");
    $(".music-name").toggleClass("music-name-light");
    $(".hot").toggleClass("hot-light");
    $("h3").toggleClass("text-light");
    $("h4").toggleClass("text-light");
  });
})
