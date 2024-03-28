import { findcookie } from "./miscellanious.js";
const sidebarBtn = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("aside");
const logout = document.getElementById("settings");
const search = document.getElementById("addfilter");
const searchbtn = document.querySelector(".search__button");
const filters = document.getElementById("filters");

sidebarBtn.addEventListener("click", () => {
  document.body.classList.toggle("active");
});

logout.addEventListener('click', e => {
  e.preventDefault();
  document.cookie = 'id=-1';
  location.reload();
});

searchbtn.addEventListener("click", e => {
  if (filters.children.length == 5) {
    alert("maximum number of filters is 5");
    return;
  }
  filters.innerHTML += `<button class="noselect filter" title =${search.value}><span class="text">${(search.value).slice(0, 9)}</span><span class="icon"><img src="assets/ico.svg"
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
})
filters.addEventListener("click", e => {
  e.target.parentElement.remove();
})