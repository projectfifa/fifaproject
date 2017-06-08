// navSidePanelSwitch
toggle = 1;
document.getElementById('errorlogthird').innerHTML = 'margin top is';

// navListSwitch 
document.getElementById('nav-list-pouls').firstChild.style.marginTop = '0px';
document.getElementById('nav-list-teams').firstChild.style.marginTop = '0px';
document.getElementById('nav-list-players').firstChild.style.marginTop = '0px';
document.getElementById('nav-list-games').firstChild.style.marginTop = '0px';

navListPoulsHeight = document.getElementById('nav-list-pouls').firstChild.offsetWidth;
navListTeamsHeight = document.getElementById('nav-list-teams').firstChild.offsetWidth;
navListPlayersHeight = document.getElementById('nav-list-players').firstChild.offsetWidth;
navListGamesHeight = document.getElementById('nav-list-games').firstChild.offsetWidth;

document.getElementById('errorlogthird').innerHTML = 'margin top = ';
document.getElementById('errorlogsecond').innerHTML = document.getElementById(a).style.marginTop;


function navSidePanelSwitch() {
    if (toggle == 1) {
        document.getElementById('navSidePanel').style.left = '-11%';
        document.getElementById('closeBtn').style.left = '2%';
        document.getElementById('closeBtn').innerHTML = '&#x21FE';
        toggle = 0;
    } else {
        document.getElementById('navSidePanel').style.left = '0%';
        document.getElementById('closeBtn').style.left = '9%';
        document.getElementById('closeBtn').innerHTML = '&#10006';
        toggle = 1;
    }
}



function navListSwitch(a) {

	document.getElementById('errorlogfirst').innerHTML = a;
	document.getElementById('errorlogsecond').innerHTML = document.getElementById(a).style.marginTop;

	if (document.getElementById(a).firstChild.style.marginTop == '0px') {

		// Close
		//document.getElementById(a).style.marginTop = '-'..'px';
		document.getElementById(a).firstChild.style.marginTop = '-50px';

		document.getElementById(a).firstChild.style.opacity = '0';

	} else {
		// Opens
		document.getElementById(a).firstChild.style.marginTop = '0px';
		document.getElementById(a).firstChild.style.opacity = '1';
		
	}
	
}