const form = document.querySelector('.form');
form.addEventListener('submit', e=>{
    const _mail = document.querySelector('#mail');
    const _pwd = document.querySelector('#pwd');
    const _pwdc = document.querySelector('#pwdc');
    const _fname = document.querySelector("#fullname");
    const mail = (_mail.value).trim();
    const pwd = (_pwd.value).trim;
    const pwdc = (_pwdc.value).trim;
    const fname = (_fname.value).trim;
    if(mail==''||pwd==''||pwdc==''||fname==''){
        e.preventDefault();
        alert("all fields must be filled");
    }if(pwd!=pwdc){
        e.preventDefault();
        alert("passwords dont match");
    }
})