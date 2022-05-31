// récupération du graphe
function refreshGraph(timeout) {
	console.log('refreshGraph');
	$.ajax({
		type: 'GET', // type de requête (POST ou GET)
		url: 'http://localhost/appliwebold/graphsws.php',
		dataType: 'json',
		success : function(res) {
			constructGraph(res['DateTemp'], res['Temp'], res['DateElec'], res['Elec'], res['DateHumid'], res['Humid']);
			if (timeout !== 0) window.setTimeout( function(){ refreshGraph(timeout); }, timeout); // timeout: en millisecondes
		},
		error: function (res) {
			console.log('error',res);
			// rafraissement de toute la page si erreur Ajax
			//document.location.reload(true);
		}
	});
}
