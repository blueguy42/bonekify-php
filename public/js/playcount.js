var firstloadplay

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
    if (cookieVal != "") {
        if (parseInt(cookieVal) >= 3) {
            var x = document.getElementById("songplayer");
            x.pause();
            let div = document.getElementById("div-player");
            div.innerHTML = "";
            warningteks = document.createElement("p");
            warningteks.setAttribute('id', 'warningPlayCount')
            warningteks.setAttribute('class','warning')
            warningteks.innerHTML = "Anda sudah memainkan 3 lagu hari ini!";
            warningteks.setAttribute('style', 'color:red')
            div.append(warningteks);
        } else {
            if (firstloadplay == 0) {
                setCookie("playedSong_notLoggedIn", parseInt(cookieVal) + 1, 1);
                firstloadplay++;
            }
        }
    }
};