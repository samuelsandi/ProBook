function validateAndSend() {
    if (document.forms['reviewform']['rating'].value == '') {
        alert('Invalid rating');
    } else if (document.forms['reviewform']['comment'].value == ''){
        alert('Please insert a comment');
    } else {
        var form = document.forms['reviewform'];
        form.setAttribute('method', 'POST');
        form.setAttribute('action', 'control/createreview.php');
        form.submit();
    }
}

function setRating(num) {
    document.forms['reviewform']['rating'].value = num;
    var starset = document.getElementsByClassName('ratingstarset')[0];
    var stars = starset.getElementsByTagName('img');
    for (var i = 0; i < 5; i++) {
        var image = i < num ? 'star.png' : 'star-empty.png';
        stars[i].src = "assets/"+image;
    }
}