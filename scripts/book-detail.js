
async function postOrder(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'control/book-order.php',true);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         showNotification(this.responseText);
        }
      };
    var amount = document.forms['orderform']['amount'].value;
    var book_id = document.forms['orderform']['book_id'].value;
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('amount='+amount+'&book_id='+book_id);
}

function showNotification(txt) {
    d = document;
    if(d.getElementById("modalContainer")) return;

    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    mObj.id = "modalContainer";
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    document.body.style.overflow = "hidden";

    alertObj = mObj.appendChild(d.createElement("div"));
    alertObj.id = "alertBox";

    alertObj.style.top = "30%";
    alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
    alertObj.style.visibility="visible";

    alertObj.innerHTML = 
    `
    <img id='alertcheck' src='assets/check.png'>
    <div id='alertmsg'>
        <h2>Pemesanan Berhasil!</h2>
        <div>`+txt+`</div>
    </div>
    <a id='closeNotif' href="#" onclick="removeNotification();return false">X</a> `;

}

function removeNotification() {
    document.body.style.overflow = "auto";
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}