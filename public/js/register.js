function emailWarning(){
    let div = document.getElementById("div-email");
    let inputform = document.getElementById("email")
    let warningteks = document.getElementById("warningEmail");
    const regex = new RegExp(/[^@]+@[^@]+\.[^@]+$/);

    // Mengambil atau mengubah teks warning
    if (warningteks) { //Berarti dah ada warningnya
        warningteks = document.getElementById("warningEmail");
    } else{
        warningteks = document.createElement("p");
        warningteks.setAttribute('id', 'warningEmail')
    }

    if(regex.test(inputform.value)){
        warningteks.innerHTML = "Email sudah sesuai";
        warningteks.setAttribute('style', 'color:green')
    }
    else{
        warningteks.innerHTML = "Tidak sesuai masukan input email";
        warningteks.setAttribute('style', 'color:red')
    }
    
    inputform.setAttribute('style', 'margin-bottom:2px')
    div.append(warningteks);
}

function sandiWarning(){
    let div = document.getElementById("div-sandi");
    let inputform = document.getElementById("sandi")
    let warningteks = document.getElementById("warningSandi");

    // Mengambil atau mengubah teks warning
    if (warningteks) { //Berarti dah ada warningnya
        warningteks = document.getElementById("warningSandi");
    } else{
        warningteks = document.createElement("p");
        warningteks.setAttribute('id', 'warningSandi')
    }


    if(inputform.value.length>6){
        warningteks.innerHTML = "Sandi sudah sesuai";
        warningteks.setAttribute('style', 'color:green')
    }
    else{
        warningteks.innerHTML = "Masukkan minimal 8 huruf sandi";
        warningteks.setAttribute('style', 'color:red')
    }
    
    inputform.setAttribute('style', 'margin-bottom:2px')
    div.append(warningteks);
}

function ksandiWarning(){
    let div = document.getElementById("div-ksandi");
    let inputform = document.getElementById("ksandi")
    let inputformori = document.getElementById("sandi")
    let warningteks = document.getElementById("warningkSandi");

    // Mengambil atau mengubah teks warning
    if (warningteks) { //Berarti dah ada warningnya
        warningteks = document.getElementById("warningkSandi");
    } else{
        warningteks = document.createElement("p");
        warningteks.setAttribute('id', 'warningkSandi')
    }

    if(inputformori.value==inputform.value){
        warningteks.innerHTML = "Sandi sudah sama";
        warningteks.setAttribute('style', 'color:green')
    }
    else{
        warningteks.innerHTML = "Sandi tidak sama";
        warningteks.setAttribute('style', 'color:red')
    }
    
    console.log(inputformori.value + " , " + inputform.value)
    inputform.setAttribute('style', 'margin-bottom:2px')
    div.append(warningteks);
}