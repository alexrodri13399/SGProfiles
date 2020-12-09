window.onload = function() {
    document.getElementById('form').addEventListener("submit", validacionForm);
}


function validacionForm() {
    val = true;
    var inputs = document.getElementsByTagName("input");
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].type == 'email' && inputs[i].value == '') {
            inputs[i].style.borderColor = 'red';
            val = false;
        } else if (inputs[i].type == 'password' && inputs[i].value == '') {
            inputs[i].style.borderColor = 'red';
            val = false;
        } else {
            inputs[i].style.borderColor = 'black';
        }
    }
    if (!val) {
        event.preventDefault();
    }

}