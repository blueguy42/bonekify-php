var firstloadplay

// Get the modal
var modal_ganti_judul = document.getElementById("modal-ganti-judul");
var modal_ganti_penyanyi = document.getElementById("modal-ganti-penyanyi");

// Get the button that opens the modal
var btn_ganti_judul = document.getElementById("tombol-ganti-judul");
var btn_ganti_penyanyi = document.getElementById("tombol-ganti-penyanyi");

// Get the <span> element that closes the modal
var span0 = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];

// When the user clicks on the button, open the modal
btn_ganti_judul.onclick = function() {
  modal_ganti_judul.style.display = "block";
}

btn_ganti_penyanyi.onclick = function() {
  modal_ganti_penyanyi.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span0.onclick = function() {
  modal_ganti_judul.style.display = "none";
}

span1.onclick = function() {
  modal_ganti_penyanyi.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if ((event.target == modal_ganti_judul) || (event.target==modal_ganti_penyanyi)){

    modal_ganti_judul.style.display = "none";
    modal_ganti_penyanyi.style.display = "none";
  }
}
window.onload = function() {
  firstloadplay = 0;
}

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function AddPlayCount(){
  let cookieVal = getCookie("playedSong_notLoggedIn");
  let cookieUser = getCookie("username");
  if (cookieUser == "") {
    if (cookieVal != "") {
      if (parseInt(cookieVal) >= 3) {
        var x = document.getElementById("songplayer");
        x.pause();
        let div = document.getElementById("div-player");
        div.innerHTML = "";
        warningteks = document.createElement("p");
        warningteks.setAttribute('id', 'warningPlayCount');
        warningteks.setAttribute('class','warning');
        warningteks.innerHTML = "Anda sudah memainkan 3 lagu hari ini!";
        warningteks.setAttribute('style', 'color:red');
        div.append(warningteks);
      } else {
        if (firstloadplay == 0) {
          setCookie("playedSong_notLoggedIn", parseInt(cookieVal) + 1, 1);
          firstloadplay++;
        }
      }
    }
  }
};