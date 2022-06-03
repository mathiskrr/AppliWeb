// récupération du graphe
function refreshTab(timeout) {
	console.log('refreshTab');
	$.ajax({
		type: 'GET', // type de requête (POST ou GET)
		url: 'http://192.168.0.28/appliwebold/tableauws.php',
		dataType: 'json',
		success : function(res) {
			constructTab(res['DateTemp'], res['Temp'], res['DateElec'], res['Elec'], res['DateHumid'], res['Humid']);
			if (timeout !== 0) window.setTimeout( function(){ refreshTab(timeout); }, timeout); // timeout: en millisecondes
		},
		error: function (res) {
			console.log('error',res);
			// rafraissement de toute la page si erreur Ajax
			//document.location.reload(true);
		}
	});
}