const sidebarBtn = document.querySelector(".toggle-btn");
const logout = document.getElementById("settings");
sidebarBtn.addEventListener("click", () => {
    document.body.classList.toggle("active");
});

logout.addEventListener('click', e => {
    e.preventDefault();
    document.cookie = 'id=-1';
    location.href = "login.php";
});
