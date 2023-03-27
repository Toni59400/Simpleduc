var email_connexion = document.getElementById('email_connexion');
var email_status = document.getElementById('email_status');
var button_inscrip = document.getElementById('button_inscrip');
var mdp_connexion = document.getElementById('mdp_connexion');

button_inscrip.addEventListener('click', function(){
    var regexemail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var regexpassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    if(regexemail.test(email_connexion.value) && regexpassword.test(mdp_connexion.value)){
        alert('Email ou mdp invalide');
    }
})

email_connexion.addEventListener('input', function (){
    var email = email_connexion.value;
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (regex.test(email)) {
        email_connexion.classList.add('is-valid');
        email_connexion.classList.remove('is-invalid');
    } else {
        email_connexion.classList.add('is-invalid');
        email_connexion.classList.remove('is-valid');
    }
});

mdp_connexion.addEventListener('input', function (){
    var password = mdp_connexion.value;
    var regexpassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if (regexpassword.test(password)) {
        mdp_connexion.classList.add('is-valid');
        mdp_connexion.classList.remove('is-invalid');
    } else {
        mdp_connexion.classList.add('is-invalid');
        mdp_connexion.classList.remove('is-valid');
    }
});