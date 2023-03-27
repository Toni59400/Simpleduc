var inscrip_email = document.getElementById('inscrip_email');
var email_status = document.getElementById('email_status');
var button_inscrip = document.getElementById('button_inscrip');
var inscrip_mdp = document.getElementById('inscrip_mdp');

button_inscrip.addEventListener('click', function(){
    var regexemail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var regexpassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    if(regexemail.test(inscrip_email.value) && regexpassword.test(inscrip_mdp.value)){
        alert('Email ou mdp invalide');
    }
})

inscrip_email.addEventListener('input', function (){
    var email = inscrip_email.value;
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (regex.test(email)) {
        inscrip_email.classList.add('is-valid');
        inscrip_email.classList.remove('is-invalid');
    } else {
        inscrip_email.classList.add('is-invalid');
        inscrip_email.classList.remove('is-valid');
    }
});

inscrip_mdp.addEventListener('input', function (){
    var password = inscrip_mdp.value;
    var regexpassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if (regexpassword.test(password)) {
        inscrip_mdp.classList.add('is-valid');
        inscrip_mdp.classList.remove('is-invalid');
    } else {
        inscrip_mdp.classList.add('is-invalid');
        inscrip_mdp.classList.remove('is-valid');
    }
});