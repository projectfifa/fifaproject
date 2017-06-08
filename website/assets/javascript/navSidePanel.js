
function startUpCall() {

	// navSidePanelSwitch
	toggle = 1;
	
	// navListSwitch
	/*
	document.getElementById('nav-list-pouls').style.height = 'inherit';
	document.getElementById('nav-list-teams').style.height = 'inherit';
	document.getElementById('nav-list-players').style.height = 'inherit';
	document.getElementById('nav-list-games').style.height = 'inherit';*/
	
	navListPoulsHeight = document.getElementById('nav-list-pouls').offsetHeight;
	navListTeamsHeight = document.getElementById('nav-list-teams').offsetHeight;
	navListPlayersHeight = document.getElementById('nav-list-players').offsetHeight;
	navListGamesHeight = document.getElementById('nav-list-games').offsetHeight;
	
	document.getElementById('errorlogfirst').innerHTML = navListPoulsHeight;
	document.getElementById('errorlogsecond').innerHTML = navListTeamsHeight;
	document.getElementById('errorlogthird').innerHTML = navListPlayersHeight;
	document.getElementById('errorlogfourth').innerHTML = navListGamesHeight;

}


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

	if (document.getElementById(a).style.height != '0px') {
		// Close
				
		document.getElementById(a).style.height = '0px';


	} else {
		// Opens

		switch (a) {
			case 'nav-list-pouls':
				document.getElementById(a).style.height = navListPoulsHeight.concat("px");
				break;
		}
	

	}

	document.getElementById('errorlogfirst').innerHTML = "target: ".concat(a);
	document.getElementById('errorlogsecond').innerHTML = document.getElementById(a).style.height;
	document.getElementById('errorlogthird').innerHTML = navListPoulsHeight.concat("px");
	document.getElementById('errorlogfourth').innerHTML = "het werkt";

}