var canwasWidth = 500;
var audioEl = document.getElementById("myaudio");
var canvas = document.getElementById("progress").getContext('2d');
function updateBar(){
audioEl.addEventListener('loadedmetadata',function(){
var duration = audioEl.duration;
var currentTime = audioEl.currentTime;
document.getElementById("duration").innerHTML = convertElapsedTime(duration);
document.getElementById("current-time").innerHTML = convertElapsedTime(currentTime);
canvas.fillRect(0,0,canwasWidth,50);
});
    function convertElapsedTime(inputSeconds){
    var seconds = Math.floor(inputSeconds % 60);
    if(seconds < 10){
      seconds = "0"+seconds;
    }
    var minutes = Math.floor(inputSeconds / 60);
    return minutes + ":" + seconds;
  };
    console.log("im heree");
    canvas.clearRect(0,0,canwasWidth,50);
    canvas.fillStyle = "#000";
    canvas.fillRect(0,0,canwasWidth,50);

    var currentTime = audioEl.currentTime;
    var duration = audioEl.duration;

    document.getElementById("current-time").innerHTML = convertElapsedTime(currentTime);

    var percentage = currentTime / duration;
    var progress = (canwasWidth * percentage);
    canvas.fillStyle = "#ED2553";
    canvas.fillRect(0,0,progress,50);
  };
