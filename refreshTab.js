// récupération du tableau
function refreshTab(timeout,salle) {
	console.log('refreshTab', salle);
	$.ajax({
		type: 'GET', // type de requête (POST ou GET)
		url: 'http://localhost/appliweb/tableauws.php',
		data: 'salle=' + salle,
		dataType: 'json',
		success : function(res) {
			constructTab(res['Temp'], res['Elec'], res['Humid']);
			//console.log(res);
			if (timeout !== 0) window.setTimeout( function(){ refreshTab(timeout,salle); }, timeout); // timeout: en millisecondes
		},
		error: function (res) {
			console.log('error',res);
			// rafraissement de toute la page si erreur Ajax
			//document.location.reload(true);
		}
	});
}