
function addfilterfunc(exp) {
    document.querySelector("body").innerHTML += `<button class="noselect filter" title ='${exp}'><span class="text">${(exp).slice(0, 9)}</span><span class="icon"><img src="assets/ico.svg"
    alt=""></span></button>`;
}