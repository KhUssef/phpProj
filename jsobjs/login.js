import { validmail } from "./miscellanious.js";
const form = document.querySelector('.form');
form.addEventListener('submit', e => {
    const _mail = document.querySelector('#mail');
    const _pwd = document.querySelector('#pwd');
    const mail = (_mail.value).trim();
    const pwd = (_pwd.value).trim;
    if (pwd == '' || mail == '') {
        e.preventDefault();
        alert("pwd and mail cant be empty");
    }
    if (!validmail(mail)) {
        e.preventDefault();
        alert(`the email you provided is not valid`);
        alert("an email should have the following format foulene@gmail.com");
    }
})