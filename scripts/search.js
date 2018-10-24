function validateForm(formName, inputs) {
    for (var i = 0; i < inputs.length; i++) {
        var query = document.forms[formName][inputs[i]];
        if (query.value==="") {
            alert("The "+inputs[i]+" can't be empty!");
            return false;
        }
    }
    return true;
    
}