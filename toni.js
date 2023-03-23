var email_input = document.getElementById("inscrip_email").addEventListener("input", verifEmail);

function verifEmail(){
    var value = document.getElementById("inscrip_email");
    value = value.value;
    console.log(value);
}