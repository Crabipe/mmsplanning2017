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
		if(champ.value.length < 10 || champ.value.length > 255)
		{
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

function verifTelephone() {
	var regex = /^0[1-68]([-. ]?[0-9]{2}){4}/;
	var champ = document.getElementById('telephone');
	champ.addEventListener('blur', function() {
		if(!regex.test(champ.value))
		{
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

function verifLogin() {
	var champ = document.getElementById('login');
	champ.addEventListener('blur', function() {
		if(champ.value.length < 1)
		{
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
		if(!regex.test(champ.value))
	{
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


function verifPassword() {
	var champ = document.getElementById('mdp');
	var regex = /^[a-zA-Z0-9._&~"'{(|`@)=}$¤+¨%*µ;:!§€[\^\/\]\#-]$/;
	champ.addEventListener('blur', function() {
		if(!regex.test(champ.value))
		{
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

function verifLibelle() {
	var champ = document.getElementById('libelle');
	champ.addEventListener('blur', function() {
		if(champ.value.length < 1 || champ.value.length > 255)
		{
			surligne(champ, true);
			return false;
		}
		else
		{
			surligne(champ, false);
			return true;
		}
	}
}

