
function startUpCall() {

	// navSidePanelSwitch
		// Open
        document.getElementById('navSidePanel').style.left = '-3%';
        document.getElementById('closeBtnChamberId').style.left = '9%';
        document.getElementById('closeBtn').innerHTML = '&#10006';

        document.getElementById('bannerId').style.margin = '25px 2% 25px 14%';
        document.getElementById('contentId').style.margin = '0 2% 0 14%';
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
window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();

function navSidePanelSwitch() {
    if (toggle == 1) {

    	// Close

        document.getElementById('navSidePanel').style.left = '-14%';
        document.getElementById('closeBtnChamberId').style.left = '2%';
        document.getElementById('closeBtn').innerHTML = '&#x21FE';



        document.getElementById('bannerId').style.margin = '25px 7% 25px 7%';
        document.getElementById('contentId').style.margin = '0 7% 0 7%';
        toggle = 0;
    } else {

    	// Open
        document.getElementById('navSidePanel').style.left = '-3%';
        document.getElementById('closeBtnChamberId').style.left = '9%';
        document.getElementById('closeBtn').innerHTML = '&#10006';

        document.getElementById('bannerId').style.margin = '25px 2% 25px 14%';
        document.getElementById('contentId').style.margin = '0 2% 0 14%';
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