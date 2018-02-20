function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#ffbbaa";
   else
      champ.style.backgroundColor = "";
}

function verifNom() {
	var champ = document.getElementById('nom');
	champ.addEventListener('blur', function() {
		if(champ.value.length < 1 || champ.value.length > 25)
		{
			alert("Champ nom mal renseigné : champ vide ou taille supérieure à 25 caractères");
			surligne(champ, true);
			return false;
		}
		else
		{
			surligne(champ, false);
			return true;
		}
	});	
}

function verifPrenom() {
	var champ = document.getElementById('prenom');
	champ.addEventListener('blur', function() {
		if(champ.value.length < 1 || champ.value.length > 25)
		{
			alert("Champ prénom mal renseigné : champ vide ou taille supérieure à 25 caractères");
			surligne(champ, true);
			return false;
		}
		else
		{
			surligne(champ, false);
			return true;
		}
	});	
}

function verifAdresse() {
	var champ = document.getElementById('adresse');
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ adresse non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
			if(champ.value.length < 10 || champ.value.length > 255)
			{
				alert("Champ adresse mal renseigné : taille inférieure à 10 caractères ou supérieure à 255 caractères");
				surligne(champ, true);
				return false;
			}
			else
			{
				surligne(champ, false);
				return true;
			}
		}
	});	
}

function verifTelephone() {
	var regex = /^0[1-68]([-. ]?[0-9]{2}){4}/;
	var champ = document.getElementById('telephone');
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ téléphone non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
			if(!regex.test(champ.value))
			{
				alert("Format incorrect");
				surligne(champ, true);
				return false;
			}
			else
			{
				surligne(champ, false);
				return true;
			}
		}
	});	
}

function verifLogin() {
	var champ = document.getElementById('login');
	champ.addEventListener('blur', function() {
		if(champ.value.length < 1)
		{
			alert("Champ login non renseigné");
			surligne(champ, true);
			return false;
		}
		else
		{
			surligne(champ, false);
			return true;
		}
	});	
}


function verifMail() {
	var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	var champ = document.getElementById('email');
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ email non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
			if(!regex.test(champ.value))
			{
				alert("Champ email mal renseigné");
				surligne(champ, true);
				return false;
			}
			else
			{
				surligne(champ, false);
				return true;
			}
		}
	});	
}


function verifPassword() {
	var champ = document.getElementById('mdp');
	var regex = /^[a-zA-Z0-9._&~"'{(|`@)=}$¤+¨%*µ;:!§€[\^\/\]\#-]$/;
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ adresse non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
			if(!regex.test(champ.value))
			{
				alert("Champ password mal renseigné");
				surligne(champ, true);
				return false;
			}
			else
			{
				surligne(champ, false);
				return true;
			}
		}
	});	
}

function verifLibelle() {
	var champ = document.getElementById('libelle');
	champ.addEventListener('blur', function() {
		if(champ.value.length < 1 || champ.value.length > 255)
		{
			alert("Champ libellé mal renseigné : champ vide ou taille supérieure à 255 caractères");
			surligne(champ, true);
			return false;
		}
		else
		{
			surligne(champ, false);
			return true;
		}
	});
}

