$(document).on('click','#playButton',function(){
  var src = $(this).find('a').attr('href');
  var imgsrc = $(this).find('a').next().attr("href");
  var playerImage = $("#playerImage").attr('src',imgsrc);
  x = $(this).parent().parent().find('h2').first().text();
  songName = $(this).parent().parent().find('h2').first().text();
  $("#songName").text(songName);
  $("title").text("Most játszott: " + songName);
  $("#artistName").text(x);
  var k = $("#myaudio").attr("src",src);
  $("#downloadButton").attr("href",src);
  $("#downloadButton").attr("download",src);
})
