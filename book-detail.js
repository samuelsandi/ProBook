
async function postOrder(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'book-order.php',true);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         alert(this.responseText);
        }
      };
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('amount=1&book_id=1&user=dabid');
}