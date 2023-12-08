 const box = document.querySelector('.box');
 const LoginLink = document.querySelector('.Loginlink');
 const registerLink = document.querySelector('.register');
 const Popup = document.querySelector('.Log-in');
 const Close = document.querySelector('.close');

 registerLink.addEventListener('click', ()=> {
    box.classList.add('active');
 })

 LoginLink.addEventListener('click', ()=> {
    box.classList.remove('active');
 })

 Popup.addEventListener('click', ()=> {
    box.classList.add('active-popup');
 })

 Close.addEventListener('click', ()=> {
    box.classList.remove('active-popup');
 })

 let nameRegex = /^[A-Z][a-z]{3,8}$/;
    let emailRegex = /[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/;

    function validateForm(){
        let nameInput = document.getElementById('name');
        let nameError = document.getElementById('nameError');
        let emailInput = document.getElementById('email');
        let emailError = document.getElementById('emailError');

        nameError.innerText = '';
        emailError.innerText = '';

        if(!emailRegex.test(emailInput.value)){
            emailError.innerText = 'invalid E-mail';
            return;
        }
        if(!nameRegex.test(nameInput.value)){
            nameError.innerText = 'invalid Usename';
            return;
        }
        

        alert('form submitted succesfully!');
    }