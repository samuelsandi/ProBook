function validateUsername(str){
    var xhttp;
    if (str.length == 0) { 
        document.getElementById("uncon").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("uncon").innerHTML=this.responseText;
        }
      };
    xhttp.open("GET", "control/valusername.php?q="+str, true);
    xhttp.send();
}

function validateEmail(str){
    var xhttp;
    if (str.length == 0) { 
        document.getElementById("emcon").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("emcon").innerHTML=this.responseText;
        }
      };
    xhttp.open("GET", "control/valemail.php?q="+str, true);
    xhttp.send();
}