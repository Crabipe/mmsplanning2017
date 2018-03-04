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
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ nom non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
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
		}
	});	
}

function verifPrenom() {
	var champ = document.getElementById('prenom');
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
		alert("Champ prénom non renseigné");
		surligne(champ, true);
		return false;
		}
		else 
		{
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
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ login non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
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
	var regex = /^(?=[0-9a-z]+$)(?=.*[0-9]+)(?=.*[a-z]+).+$/i;
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ password non renseigné");
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
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ libellé non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
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
		}
	});
}

function verifHeureDebut() {
	var champ = document.getElementById('heure_debut');
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ heure début non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
			if(champ.value.length > 2 || champ.value < 8 || champ.value > 19)
			{
				alert("Champ heure fin mal renseigné : taille supérieure à 2 caractères ou la valeur n'est pas comprise entre 8 et 19");
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

<<<<<<< HEAD
//au chargement de la page on vérifie les champs
window.onload = function(){
	verifLibelle();
	verifAdresse();
	verifPassword();
	verifMail();
	verifLogin();
	verifNom();
	verifPrenom();
}



/*
    On valide ou non le formulaire
*/
/*
formulaire.addEventListener("submit", function(e) {
    var testEmail = validationEmail(email);
    var texteASaisir = document.getElementById("texte");

    if(texteASaisir == "" || testEmail == false) {
        //on bloque l'envoie du formualaire
        e.preventDefault();
    }*/
=======
function verifHeureFin() {
	var champ = document.getElementById('heure_fin');
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ heure fin non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
			if(champ.value.length > 2 || champ.value < 8 || champ.value > 19)
			{
				alert("Champ heure fin mal renseigné : taille supérieure à 2 caractères ou la valeur n'est pas comprise entre 8 et 19");
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

function verifMinuteDebut() {
	var champ = document.getElementById('minute_debut');
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ minute début non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
			if(champ.value.length > 2 || champ.value > 59)
			{
				alert("Champ minute début mal renseigné : taille supérieure à 2 caractères ou la valeur n'est pas comprise entre 0 et 59");
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

function verifMinuteFin() {
	var champ = document.getElementById('minute_fin');
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ minute fin non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
			if(champ.value.length > 2 || champ.value > 59)
			{
				alert("Champ minute fin mal renseigné : taille supérieure à 2 caractères ou la valeur n'est pas comprise entre 0 et 59");
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

function verifDateDebut() {
	var regex = /^[0-9]{2}[/]{1}[0-9]{2}[/]{1}[0-9]{4}/;
	var champ = document.getElementById('date_debut');
	var tab = champ.split('/');
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ date début non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
			if(!regex.test(champ.value))
			{
				alert("Format incorrect. Format accepté : jj/mm/aaaa");
				surligne(champ, true);
				return false;
			}
			else
			{
				if((tab[0] < 1 && tab[0] > 31) || (tab[1] < 1 && tab[1] > 12) || (tab[2] < 2000 && tab[2] > 2100))
				{
					alert("Valeur inccorect : sélectionnez une date valide");
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
	});	
}

function verifDateFin() {
	var regex = /^[0-9]{2}[/]{1}[0-9]{2}[/]{1}[0-9]{4}/;
	var champ = document.getElementById('date_fin');
	var tab = champ.value.split('/');
	champ.addEventListener('blur', function() {
		if (champ.value.length==0 || champ.value.replace(/\s/g,"").length==0){
			alert("Champ date fin non renseigné");
			surligne(champ, true);
			return false;
		}
		else 
		{
			if(!regex.test(champ.value))
			{
				alert("Format incorrect. Format accepté : jj/mm/aaaa");
				surligne(champ, true);
				return false;
			}
			else
			{
				if((tab[0] < 1 && tab[0] > 31) || (tab[1] < 1 && tab[1] > 12) || (tab[2] < 2000 && tab[2] > 2100))
				{
					alert("Valeur inccorect : sélectionnez une date valide");
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
	});	
}

function verifDate() {
	var date_debut = document.getElementById('date_debut');
	var date_fin = document.getElementById('date_fin');
	tabdeb = (date_debut.value.split(/[- //]/));
    tabfin = (date_fin.value.split(/[- //]/));
	Odeb = new Date(tabdeb[2],tabdeb[1],tabdeb[0]);
    Ofin = new Date(tabfin[2],tabfin[1],tabfin[0]);
    if(Odeb > Ofin) {
        alert ("La date de fin ne doit pas être antérieure à la date de début.");
        surligne(date_fin, true);
        return false;
    }
	else
	{
		surligne(date_fin, false);
		return true;
	}	
}
	
	

>>>>>>> bdeed1474c37051474eed377472625490b941b03
