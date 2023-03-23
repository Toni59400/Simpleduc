var email_input = document.getElementById("inscrip_email").addEventListener("input", verifEmail);

function verifEmail(){
    var inscrip_email = document.getElementById("inscrip_email");
    var value = document.getElementById("inscrip_email");
    value = value.value;
    fetch('./function.php?mail=' + value)
  .then(response => response.json())
  .then(data => {
    if(data == 1){
        document.getElementById("info_mail_exist").style.display = "block";
        inscrip_email.classList.add('is-invalid');
    } else{
        document.getElementById("info_mail_exist").style.display = "none";
        inscrip_email.classList.remove('is-invalid');
    }
  })
  .catch(error => {
    console.error(error);
    // Gérer les erreurs éventuelles ici
  });
}