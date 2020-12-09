window.onload = function() {
    document.getElementById('form').addEventListener("submit", validacionPass);
    document.getElementById('form').addEventListener("submit", validacionForm);
}

function validacionPass() {
    var val = true;
    if (document.getElementById('passwd').value != document.getElementById('passwd2').value) {
        if (document.getElementById('passwd').value == "" || document.getElementById('passwd2').value == "") {
            document.getElementById('passwd').style.borderColor = 'red';
            document.getElementById('passwd2').style.borderColor = 'red';
            document.getElementById('message').innerHTML = '';

        } else {
            document.getElementById('passwd').style.borderColor = 'red';
            document.getElementById('passwd2').style.borderColor = 'red';
            document.getElementById('message').innerHTML = 'Las contraseñas no coinciden';
        }
        val = false;

    }
    return val;
}

function validacionForm() {
    val = true;
    var inputs = document.getElementsByTagName("input");
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].type == 'text' && inputs[i].value == '') {
            inputs[i].style.borderColor = 'red';
            val = false;
        } else if (inputs[i].type == 'email' && inputs[i].value == '') {
            inputs[i].style.borderColor = 'red';
            val = false;
        } else if (inputs[i].type == 'password' && inputs[i].value == '') {
            inputs[i].style.borderColor = 'red';
            val = false;
        } else {
            inputs[i].style.borderColor = 'black';
        }
    }
    if (!val || !validacionPass()) {
        event.preventDefault();
    }
}