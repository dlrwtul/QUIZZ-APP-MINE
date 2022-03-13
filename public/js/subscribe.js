const firstname = document.querySelector("#firstname");
const lastname = document.querySelector("#lastname");
const loginsub = document.querySelector("#loginsub");
const passwordsub = document.querySelector("#passwordsub");
const cpasswordsub = document.querySelector("#cpasswordsub");
const subbtn = document.querySelector("#subbtn")
const avatarsub = document.querySelector("#avatarsub");
const avatarimg = document.querySelector("#avatarimg");

function show_error(input,message) {
    input.classList.remove("succes");
    input.classList.add("error");
    const parentinput = input.parentElement;
    parentinput.querySelector("small").innerHTML = message;
}

function show_succes(input) {
    input.classList.remove("error");
    input.classList.add("succes");
    const parentinput = input.parentElement;
    parentinput.querySelector("small").innerHTML = "";
}

function champ_rempli(input) {
    if (input.value.trim() !== "") {
        return true;
    }
    return false;
}

function valid_login() {
    if (champ_rempli(loginsub)) {
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[gmail]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (loginsub.value.match(validRegex)) {
            show_succes(loginsub);
            return true;
        } else {
            show_error(loginsub,"email invalid (gmail only plz)")
        }
    } else {
        show_error(loginsub,"champ obligatoire");
    }
    
    return false;
}

function valid_password() {
    if (champ_rempli(passwordsub)) {
        var str = passwordsub.value;
        if (str.length >=6) {
            const regex1 = /[A-Z]/;
            const regex2 = /[1-9]/;
            if (str.match(regex1) && str.match(regex2)) {
                show_succes(passwordsub);
                return true;
            } else {
                show_error(passwordsub,"le mot de passe doit contenir aumoins un Maj et un nombre");
            }
        }else {
            show_error(passwordsub,"le mot de passe doit contenir au moins 6 caracteres");
        }
    } else {
        show_error(passwordsub,"champ obligatoire");
    }
    
    return false
}

function valide_confirm()
{
    
    if (champ_rempli(cpasswordsub)) {
        if (valid_password()) {
            var str = passwordsub.value;
            var str2 = cpasswordsub.value;
            if (str === str2) {
                show_succes(cpasswordsub)
                return true;
            }
            show_error(cpasswordsub,"confirmation incorrect");
        }else {
            show_error(cpasswordsub,"mot de passe invalide");
        }
    }else {
        show_error(cpasswordsub,"champ obligatoire");
    }
    return false;
    
}

function valid_nom(nom)
{
    if (champ_rempli(nom)) {
        var str = nom.value;
        const regex = /^[a-zA-Z\ ]/;
        if (str.length <= 15 && str.match(regex)) {
            show_succes(nom)
            return true;
        } else {
            show_error(nom,"Entrer un nom valid")
        }
    } else {
        show_error(nom,"champ obligatoire");
    }
}

function avatar_force() {
    if (avatarsub.value !== "") {
        show_succes(avatarsub);
        return true;
    }
    show_error(avatarsub,"veuillez choisir un avatar");
    return false;
}

if (subbtn !== null) {
    subbtn.addEventListener('click',function (e) {
        valid_login();
        valid_password();
        valide_confirm();
        valid_nom(firstname);
        valid_nom(lastname);
        avatar_force();
        console.log(avatarsub.value);
        if (!valid_login() || !valid_password() || !valide_confirm() || !valid_nom(firstname) || !valid_nom(lastname) || !avatar_force()) {
            e.preventDefault();
        }
    })
}

if (avatarsub !== null) {
    avatarsub.addEventListener('change',function () {
        const reader = new FileReader();
        reader.addEventListener('load',function () {
            avatarimg.src = reader.result;
        })
        reader.readAsDataURL(this.files[0]);
    })
}