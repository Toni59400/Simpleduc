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
  });
}

$(document).ready(function() {    
	
	var codePostal = $('#codePostal');
	var selectVille = $('#villeSelect');
	var rue = $('#inputRue');
	var data_rue = $('#data_result');
	var maps = $("#maps");

	codePostal.keyup(function(){
		if(codePostal.val().length >= 5){
			villeByCodePostal(codePostal.val());
		}
	});

	rue.keyup(function(){
		if(rue.val().length >=5){
			rueByVille(selectVille.val(), rue.val())
		}
	});

	data_rue.click(function(){
		afficherCarte(data_rue.val());
	})

	function rueByVille(codeVille, inputRue){
		data_rue.find('option').remove().end();
		var request= $.ajax({        
			url: "https://api-adresse.data.gouv.fr/search/?q="+inputRue+"&citycode="+codeVille,
			method : "GET",
			beforeSend: function( xhr ) {      
				xhr.overrideMimeType("application/json; charset=utf-8");    
			}});        
			request.done(function( msg ){
				$.each(msg.features, function(index,e){
					console.log(e);
					var tmp = e.properties.label.replace(/ /g, "%");
					
					data_rue.append('<option value='+tmp+'>'+e.properties.name+' '+e.properties.city+' '+e.properties.postcode+'</option>')
					
				})
			});        
			// Fonction qui se lance lorsque l’accès au web service provoque une erreur         
			request.fail(function( jqXHR, textStatus ) {         
			});

			
		}

	function villeByCodePostal(cp){
		selectVille.find('option').remove().end();
		var request= $.ajax({        
			url: "https://geo.api.gouv.fr/communes?codePostal="+cp+"&fields=nom,code,codesPostaux,siren,codeEpci,codeDepartement,codeRegion,population&format=json&geometry=centre",  
			method : "GET",
			beforeSend: function( xhr ) {            
				xhr.overrideMimeType("application/json; charset=utf-8");    
			}});        
			request.done(function( msg ){ 
				
				maps.html("");
				$.each(msg, function(index,e){
					selectVille.append('<option value='+e.code+'>'+e.nom+'</option>')    
				})
			});        
			// Fonction qui se lance lorsque l’accès au web service provoque une erreur         
			request.fail(function( jqXHR, textStatus ) {    
			});    
		}
});

