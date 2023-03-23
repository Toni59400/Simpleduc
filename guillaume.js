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

inscrip_email.addEventListener('input', function () {
    var email = inscrip_email.value;
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (regex.test(email)) {
        email_status.innerHTML = "L'e-mail est valide";
        email_status.classList.add('valid');
        email_status.classList.remove('invalid');
    } else {
        email_status.innerHTML = "L'e-mail est invalide";
        email_status.classList.add('invalid');
        email_status.classList.remove('valid');
    }
    email_status.style.display = "block";
});