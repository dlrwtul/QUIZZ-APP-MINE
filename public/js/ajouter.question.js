const question = document.querySelector("#question");
const nbrpts = document.querySelector("#nbrpts");
const minus = document.querySelector("#minus");
const plus = document.querySelector("#plus");
const dynamiccontain = document.querySelector(".dynamiccontain");
const typerep = document.querySelector("#typerep");
const typerepbtn = document.querySelector("#typerepbtn");
const subcreerquestion = document.querySelector("#subcreerquestion");
nbrpts.value = 1;
var numRep = 0;
minus.style.visibility = "hidden"

//=============================================

function show_error3(input,message) {
    input.classList.remove("succes");
    input.classList.add("error");
    const parentinput = input.parentElement;
    parentinput.querySelector("small").innerHTML = message;
    parentinput.querySelector("small").style.color = "red"
}

function show_succes3(input) {
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

function valid_question() {
    if (champ_rempli(question)) {
        show_succes3(question);
        return true;
    }
    show_error3(question,"champ obligatoire");
    return false;
}

function remove_elements() {
    while (dynamiccontain.firstChild) {
        dynamiccontain.removeChild(dynamiccontain.firstChild)
    }
}

function rename_labels() {
    for (let index = 0; index < dynamiccontain.childNodes.length; index++) {
        const element = dynamiccontain.childNodes[index];
        console.log(element)
        const labelrename = element.querySelector("label")
        labelrename.innerHTML = `reponse ${index+1}`
    }
}

function build(numrep) {
    const reponses = document.createElement("div");
    reponses.className = "reponses";

    const label = document.createElement("label");
    label.innerHTML = `reponse ${numrep}`

    reponses.appendChild(label);

    const reponse = document.createElement("input");
    reponse.type = "text";
    reponse.name = "reponse[]";

    reponses.appendChild(reponse);

    switch (typerep.value) {
        case 'radio':
            const radio = document.createElement("input");
            radio.type = "radio";
            radio.name = "correct[]"
            reponse.addEventListener('keyup',function () {
                radio.value = reponse.value;
            })
            reponses.appendChild(radio);
            break;
        case 'text':
            const text = document.createElement("input");
            text.type = "text";
            text.name = "correct[]"
            label.innerHTML = "Reponse correct"
            reponse.style.display = "none";
            reponses.appendChild(text);
            break;
        default:
            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.name = "correct[]"
            reponse.addEventListener('keyup',function () {
                checkbox.value = reponse.value;
            })
            reponses.appendChild(checkbox);
            break;
    }

    const trash = document.createElement("span");
    trash.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/></svg>';
    trash.addEventListener('click',function () {
        reponses.remove();
        numRep--;
        rename_labels();
    })

    reponses.appendChild(trash);
    dynamiccontain.appendChild(reponses);  
       
}

//============================================

plus.addEventListener('click',function () {
    minus.style.visibility = "visible"
    nbrpts.value ++;
})

minus.addEventListener('click',function () {
    if (nbrpts.value > 1) {
        nbrpts.value --;
    }
    if (nbrpts.value == 1){
        minus.style.visibility = "hidden"
    }
})

nbrpts.addEventListener('mouseleave',function () {
    if (nbrpts.value < 1) {
        nbrpts.value = 1;
        minus.style.visibility = "hidden"
    }
})

typerep.addEventListener('change',function () {
    remove_elements();
    numRep = 0;
})

numRep=1;
build(numRep);

typerepbtn.addEventListener('click',function () {
    if (typerep.value === 'text') {
        if (numRep == 0) {
            numRep = 1;
            build(numRep);
        }
    } else {
        if (numRep < 5) {
            numRep++;
            build(numRep);
        }
    }  
})

subcreerquestion.addEventListener('click',function (e) {
    valid_question();
    if (!valid_question()) {
        e.preventDefault();
    }
})
