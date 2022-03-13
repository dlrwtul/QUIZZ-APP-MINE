const nbrElementsPage = document.querySelector("#nbrElementsPage");
const subnbrElementsPage = document.querySelector("#subnbrElementsPage");
const options = document.querySelectorAll(".bodyleftcontain ul li a")

function show_error2(input,message) {
    input.classList.remove("succes");
    input.classList.add("error");
    const parentinput = input.parentElement;
    parentinput.querySelector("small").innerHTML = message;
    parentinput.querySelector("small").style.color = "red"
}

function show_succes2(input) {
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

function valid_nbrElementsPage() {
    if (champ_rempli(nbrElementsPage)) {
        var value = Number(nbrElementsPage.value);
        if (Math.floor(value) == value) {
            if (value > 0 ) {
                show_succes2(nbrElementsPage);
                return true;
            }else {
                show_error2(nbrElementsPage,"entrer un nombre superieur a 1")
            }
        } else {
            show_error2(nbrElementsPage,"entrer un nombre")
        }
    } else {
        show_error2(nbrElementsPage,"champ vide")
    }
    return false;
}

if (subnbrElementsPage !== null) {
    subnbrElementsPage.addEventListener('click',function (e) {
        valid_nbrElementsPage();
        if (!valid_nbrElementsPage()) {
            e.preventDefault();
        }
    })   
}

options.forEach(element => {
    if (document.location.href === element.href) {
        element.style.borderLeft = "8px solid green";
        element.querySelector("span").style.color = "green"
        element.querySelector(".bi").style.color = "green"
    }
});