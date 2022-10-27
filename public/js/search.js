function livesearch(){
    //CLEAR
    var kagakada = document.getElementById("kagakada");
    if (kagakada != null){
        kagakada.parentNode.removeChild(kagakada);
    }
    
    let searchbox = document.getElementById("search")
        xhttp = new XMLHttpRequest();
        xhttp.open("GET", "search/livesearchphp/" + searchbox.value, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data.song[0])

            let string
            if (data.exists == 1) {
                string = "<tr><th>#</th><th colspan=2>JUDUL</th><th>TAHUN TERBIT</th><th>GENRE</th><th>DURASI</th></tr>"
                for (var i = 0; i < data.song.length; i++) {
                    string += "<tr><td class=\"nomertabel\">" + (i+1).toString() + "</td>";

                    string += "<td><a href =\"http://localhost:8080/public/lagu/putar/" + data.song[i].song_id + "\">"
                    string += "<img id = \"logo\" src=\"http://localhost:8080/public/img/" + data.song[i].Image_path + "\">"
                    string += "</a></td>"

                    string += "<td class='container'>"
                    string += "<div class='judul-lagu'><a href =\"http://localhost:8080/public/lagu/putar/" + data.song[i].song_id+ "\">" + data.song[i].Judul + "</a></div>"
                    string += "<div class='penyanyi'>" + data.song[i].Penyanyi + "</div>"

                    string += "<td class='tahun-terbit'>" + data.song[i].Tanggal_terbit.slice(0,4) + "</td>"
                    string += "<td class='genre'>" + data.song[i].Genre + "</td>"

                    let durasi = data.song[i].Duration
                    let menit = Math.floor(durasi/60)
                    let detik = durasi - menit*60
                    if (detik < 10) {
                        tampilandetik = "0" + detik.toString()
                    }
                    else {
                        tampilandetik = detik.toString()
                    }

                    string += "<td class='nomertabel'>" + menit.toString() + ":" + tampilandetik + "</td>"

                    string += "</tr>"
                }      
            }
            else{
                string = "<p id='kagakada' class='kagakada'>Tidak ada lagu dengan query tersebut :(</p>"
            }
            document.getElementById("list-lagu").innerHTML = string;
          }
        };
}

