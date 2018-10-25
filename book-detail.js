
async function postOrder(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'book-order.php',true);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         alert(this.responseText);
        }
      };
    var amount = document.forms['orderform']['amount'].value;
    var book_id = document.forms['orderform']['book_id'].value;
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('amount='+amount+'&book_id='+book_id);
}