// navSidePanelSwitch
toggle = 1;
document.getElementById('errorlogthird').innerHTML = 'margin top is';

// navListSwitch
document.getElementById('nav-list-pouls').style.marginTop = '0px';
document.getElementById('nav-list-teams').style.marginTop = '0px';
document.getElementById('nav-list-players').style.marginTop = '0px';
document.getElementById('nav-list-games').style.marginTop = '0px';

navListPoulsHeight = document.getElementById('nav-list-pouls').offsetWidth;
navListTeamsHeight = document.getElementById('nav-list-teams').offsetWidth;
navListPlayersHeight = document.getElementById('nav-list-players').offsetWidth;
navListGamesHeight = document.getElementById('nav-list-games').offsetWidth;

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

	if (document.getElementById(a).style.marginTop == '0px') {

		// Close
		//document.getElementById(a).style.marginTop = '-'..'px';
		document.getElementById(a).style.marginTop = '-50px';

		document.getElementById(a).style.opacity = '0';

	} else {

		// Opens
		document.getElementById(a).style.marginTop = '0px';

		document.getElementById(a).style.opacity = '1';
		
	}
	
}