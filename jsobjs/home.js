import { findcookie, isvalidsql } from "./miscellanious.js";
const search = document.getElementById("addfilter");
const searchbtn = document.querySelector(".search__button");
const filters = document.getElementById("filters");
const searchbutton = document.querySelector(".cta");


searchbtn.addEventListener("click", e => {
  if (filters.children.length == 5) {
    alert("maximum number of filters is 5");
    return;
  }
  var text = search.value;
  var sliced = text.split(':');
  sliced = [sliced[0].toLowerCase().trim(), sliced[1].toLowerCase().trim()];
  if (sliced[0] != 'description') {
    if (!isvalidsql(text)) {
      alert("not valid syntaxe");
      return;
    }
  }
  filters.innerHTML += `<button class="noselect filter" title ='${text}'><span class="text">${(sliced[0]).slice(0, 11)}</span><span class="icon"><img src="assets/ico.svg"
  alt=""></span></button>`;
});

search.addEventListener("keypress", e => {
  if (e.key == 'Enter') {
    e.preventDefault();
    searchbtn.click();
  }
})
document.querySelector("body").addEventListener("keypress", e => {
  if (e.key == '/') {
    search.select();
  }
});
filters.addEventListener("click", e => {
  if (e.target.tagName.toLowerCase() === 'button') {
    e.target.remove();
    return;
  }
  e.target.parentElement.remove();
});


searchbutton.addEventListener('click', e => {
  const form = document.createElement('form');

  form.method = 'get';
  form.action = 'home.php';
  var children = filters.children;
  var inputField;
  inputField = document.createElement('input');
  inputField.type = 'text';
  inputField.name = 'filtered';
  inputField.value = 'true';
  form.appendChild(inputField);
  for (var i = 0; i < children.length; i++) {
    inputField = document.createElement('input');
    inputField.type = 'text';
    inputField.name = i;
    inputField.value = children[i].getAttribute('title');
    form.appendChild(inputField);
  }
  document.body.appendChild(form);

  form.submit();
});
function idk() {
  console.log('lol');
  alert("lol");
}
