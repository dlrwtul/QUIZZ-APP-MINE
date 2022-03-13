const login = document.querySelector("#login");
const password = document.querySelector("#password  ");
const loginbtn = document.querySelector("#loginbtn")

function show_error(input,message) {
    input.classList.remove("succes");
    input.classList.add("error");
    input.classList.add("shake");
    setTimeout(function () {
        input.classList.remove("shake");
    },300)
    const parentinput = input.parentElement;
    parentinput.querySelector(".bi.bi-check2-circle").style.visibility = "hidden";
    parentinput.querySelector(".bi.bi-x-octagon").style.visibility = "visible";
    parentinput.querySelector("small").innerHTML = message;
}

function show_succes(input) {
    input.classList.remove("error");
    input.classList.add("succes");
    const parentinput = input.parentElement;
    parentinput.querySelector(".bi.bi-x-octagon").style.visibility = "hidden";
    parentinput.querySelector(".bi.bi-check2-circle").style.visibility = "visible";
    parentinput.querySelector("small").innerHTML = "";
}

function champ_rempli(input) {
    if (input.value.trim() !== "") {
        return true;
    }
    return false;
}

function valid_login() {
    if (champ_rempli(login)) {
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[\bg\b]+[\bm\b]+[\ba\b]+[\bi\b]+[\bl\b]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (login.value.match(validRegex)) {
            show_succes(login);
            return true;
        } else {
            show_error(login,"")
        }
    } else {
        show_error(login,"champ obligatoire");
    }
    
    return false;
}

function valid_password() {
    if (champ_rempli(password)) {
        var str = password.value;
        if (str.length >=6) {
            const regex1 = /[A-Z]/;
            const regex2 = /[1-9]/;
            if (str.match(regex1) && str.match(regex2)) {
                show_succes(password);
                return true;
            }
        }
        show_error(login,"");
        show_error(password,"login ou mot de passe incorect");
    } else {
        show_error(password,"champ obligatoire");
    }
    
    return false
}

loginbtn.addEventListener('click',function (e) {
    valid_login();
    valid_password();
    if (!valid_login() || !valid_password()) {
        e.preventDefault();
    }
})