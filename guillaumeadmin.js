var coordonnees = document.getElementById('coordonnees');

coordonnees.addEventListener('input', function (){
    console.log(coordonnees.value);
    var email = coordonnees.value;
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (regex.test(email)) {
        coordonnees.classList.add('is-valid');
        coordonnees.classList.remove('is-invalid');
    } else {
        coordonnees.classList.add('is-invalid');
        coordonnees.classList.remove('is-valid');
    }
});

console.log("test");