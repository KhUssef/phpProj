const sidebarBtn = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("aside");
const dropdownToggle = document.querySelector(".dropdown-toggle");

sidebarBtn.addEventListener("click", () => {
  document.body.classList.toggle("active");
});

dropdownToggle.addEventListener("click", () => {
  const dropdownMenu = document.querySelector("#dropdown > .menu");

  dropdownMenu.classList.toggle("open");
  dropdownToggle.classList.toggle("open");
});
