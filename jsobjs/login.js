const form = document.querySelector('.form');
form.addEventListener('submit', e=>{
    const _mail = document.querySelector('#mail');
    const _pwd = document.querySelector('#pwd');
    const mail = (_mail.value).trim();
    const pwd = (_pwd.value).trim;
    if(pwd==''||mail==''){
        e.preventDefault();
        alert("pwd and mail cant be empty");
    }
    const mailformat = mail.slice(0, mail.lastIndexOf("@"))+'@'+mail.slice(mail.lastIndexOf('@')+1, mail.lastIndexOf('.'))+'.'+mail.slice(mail.lastIndexOf('.')+1, mail.length);
    if(mail!=mailformat){
        e.preventDefault();
        alert(`${mailformat}`);
        alert("an email should have the following format foulene@gmail.com");
    }    
})