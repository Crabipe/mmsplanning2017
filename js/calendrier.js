// <!-- <![CDATA[

//initialisation de la date
var ds_i_date = new Date();
ds_c_month = ds_i_date.getMonth() + 1;
ds_c_year = ds_i_date.getFullYear();

// Get Element By Id
/*
function ds_getel(id) {
	return document.getElementById(id);
}*/

// On récupère les left et top de l'élement (css)
function ds_getleft(el) {
	var tmp = el.offsetLeft;
	el = el.offsetParent
	while(el) {
		tmp += el.offsetLeft;
		el = el.offsetParent;
	}
	return tmp;
}
function ds_gettop(el) {
	var tmp = el.offsetTop;
	el = el.offsetParent
	while(el) {
		tmp += el.offsetTop;
		el = el.offsetParent;
	}
	return tmp;
}

setTimeout(
	function(){
		// Output Element
		ds_oe = ds_getel('ds_calclass');
		// Container
		ds_ce = ds_getel('ds_conclass');
	}, 100
);

// Output Buffering
var ds_ob = ''; 
function ds_ob_clean() {
	ds_ob = '';
}
function ds_ob_flush() {
	ds_oe.innerHTML = ds_ob;
	ds_ob_clean();
}
function ds_echo(t) {
	ds_ob += t;
}

var ds_element;

/**
 * @var contient tous les mois de l'années
 * @type Array 
 */
var ds_monthnames = [
'Janvier', 'F�vrier', 'Mars', 'Avril', 'Mai', 'Juin',
'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'D�cembre'
]; // You can translate it for your language.

/**
 * @var contient les jours de la semaine
 * @type Array
 */
var ds_daynames = [
'Dim', 'Lun', 'Mar', 'Me', 'Jeu', 'Ven', 'Sam'
]; // You can translate it for your language.

// On remplit le tableau de la page avec le calendrier
function ds_template_main_above(t) {
	return '<table cellpadding="3" cellspacing="1" class="ds_tbl">'
		 + '<tr>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_py();">&lt;&lt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_pm();">&lt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_hi();" colspan="3">[Fermer]</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_nm();">&gt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_ny();">&gt;&gt;</td>'
		 + '</tr>'
		 + '<tr>'
		 + '<td colspan="7" class="ds_head">' + t + '</td>'
		 + '</tr>'
		 + '<tr>';
}

//Crétaion des lignes du calendrier
function ds_template_day_row(t) {
	return '<td class="ds_subhead">' + t + '</td>';
	// Define width in CSS, XHTML 1.0 Strict doesn't have width property for it.
}

//Nouvelle semaine = retour à la ligne
function ds_template_new_week() {
	return '</tr><tr>';
}

//Si le 1er est un ardi, le lundi sera blanc
function ds_template_blank_cell(colspan) {
	return '<td colspan="' + colspan + '"></td>'
}

//création d'une "case" pour chaque jour
function ds_template_day(d, m, y) {
	return '<td class="ds_cell" onclick="ds_onclick(' + d + ',' + m + ',' + y + ')">' + d + '</td>';
	// Define width the day row.
}

function ds_template_main_below() {
	return '</tr>' + '</table>';
}

// Remplissage du clendrier
function ds_draw_calendar(m, y) {
	// First clean the output buffer.
	ds_ob_clean();
	// Here we go, do the header
	ds_echo (ds_template_main_above(ds_monthnames[m - 1] + ' ' + y));
	for (i = 0; i < 7; i ++) {
		ds_echo (ds_template_day_row(ds_daynames[i]));
	}
	
	if (m == 1 || m == 3 || m == 5 || m == 7 || m == 8 || m == 10 || m == 12) {
		days = 31;
	}
	else if (m == 4 || m == 6 || m == 9 || m == 11) {
		days = 30;
	}
	else {
		days = (y % 4 == 0) ? 29 : 28;
	}
	var first_day = new Date(y, (m-1), 1).getDay();
	var first_loop = 1;
	// Start the first week
	ds_echo (ds_template_new_week());
	// If sunday is not the first day of the month, make a blank cell...
	if (first_day != 0) {
		ds_echo (ds_template_blank_cell(first_day));
	}
	var j = first_day;
	for (i = 0; i < days; i ++) {
		// Today is sunday, make a new week.
		// If this sunday is the first day of the month,
		// we've made a new row for you already.
		if (j == 0 && !first_loop) {
			// New week!!
			ds_echo (ds_template_new_week());
		}
		
		ds_echo (ds_template_day(i + 1, m, y)); // Make a row of that day!
		first_loop = 0; // This is not first loop anymore...
		
		// What is the next day?
		j ++;
		j %= 7;
	}
	
	ds_echo (ds_template_main_below()); // Do the footer
	ds_ob_flush();                      // And let's display..
	ds_ce.scrollIntoView();             // Scroll it into view.
}

//affichage du calendrier (au clic)
function ds_sh(t) {
	// Set the element to set...
	ds_element = t;
	// Make a new date, and set the current month and year.
	var ds_sh_date = new Date();
	ds_c_month = ds_sh_date.getMonth() + 1;
	ds_c_year = ds_sh_date.getFullYear();
	// Draw the calendar
	ds_draw_calendar(ds_c_month, ds_c_year);
	// To change the position properly, we must show it first.
	ds_ce.style.display = '';
	// Move the calendar container!
	the_left = ds_getleft(t);
	the_top = ds_gettop(t) + t.offsetHeight;
	ds_ce.style.left = the_left + 'px';
	ds_ce.style.top = the_top + 'px';
	// Scroll it into view.
	ds_ce.scrollIntoView();
}

//cacher le calendrier
function ds_hi() {ds_ce.style.display = 'none';}

//mois suivant
function ds_nm() {
	//on augmente le mois
	ds_c_month ++;
	//si le mois est Decembre, on va en janvier de l'année n+1
	if (ds_c_month > 12) {
		ds_c_month = 1; 
		ds_c_year++;
	}
	//afficher le nouveau calendrier
	ds_draw_calendar(ds_c_month, ds_c_year);
}

//mois précédant
function ds_pm() {
    // on diminue le mois
	ds_c_month = ds_c_month - 1;
        //si janvier alors on repasse en décembre de l'année n-1
	if (ds_c_month < 1) {
		ds_c_month = 12; 
		ds_c_year = ds_c_year - 1; // Can't use dash-dash here, it will make the page invalid.
	}
	//afficher le nouveau calendrier
	ds_draw_calendar(ds_c_month, ds_c_year);
}

//année suivante
function ds_ny() {
    //on augmente l'année
	ds_c_year++;
       //afficher le nouveau calendrier
	ds_draw_calendar(ds_c_month, ds_c_year);
}

//année précédente
function ds_py() {
	//on diminue l'année
	ds_c_year = ds_c_year - 1;
        //afficher le nouveau calendrier
	ds_draw_calendar(ds_c_month, ds_c_year);
}

//affichage de la date au format jj/mm/aaaa
function ds_format_date(d, m, y) {
	m2 = '00' + m; // 2 digits month.
	m2 = m2.substr(m2.length - 2);
	d2 = '00' + d; // 2 digits day.
	d2 = d2.substr(d2.length - 2);
	return d2 + '/' + m2 + '/' + y;
}

//si on clic sur une case on récupère la date
function ds_onclick(d, m, y) {
        //on cache le calendrier
	ds_hi();
	//on récupère la date
	if (typeof(ds_element.value) != 'undefined') {
		ds_element.value = ds_format_date(d, m, y);
	}
        //on affiche la date dans le formulaire
	else if (typeof(ds_element.innerHTML) != 'undefined') {
		// Maybe we want to set the HTML in it.
		ds_element.innerHTML = ds_format_date(d, m, y);
	}
        //sino on lève une erreur
	else {
		alert (ds_format_date(d, m, y));
	}
}

//on affiche le calendrier au clic sur les éléments de date
var date_debut = document.getElementById('dateDebut');
var date_fin = document.getElementById('dateFin');
date_debut.addEventListener("click", ds_sh(this));
date_fin.addEventListener("click", ds_sh(this));
// ]]> -->