function refreshPage(){
    window.location.reload();
  }
function closePopUp(){
      var x = document.getElementById("popup");
   if (x.style.display === "none") {
     x.style.display = "block";
   } else {
     x.style.display = "none";
   }
}
function checkMusicName() {
    let inputForUsername = document.getElementById("musicName").value;
    if (inputForUsername.length == null || inputForUsername.length < 20) {
      var errormsg = document.getElementById("nameErrorMessage").style.display = "none";
    } else var errormsg = document.getElementById("nameErrorMessage").style.display = "block";
  }
function checkArtistName() {
  let inputForUsername = document.getElementById("artistName").value;
  if (inputForUsername.length == null || inputForUsername.length < 20) {
  var errormsg = document.getElementById("artistErrorMessage").style.display = "none";
  }
   else var errormsg = document.getElementById("artistErrorMessage").style.display = "block";
 }
