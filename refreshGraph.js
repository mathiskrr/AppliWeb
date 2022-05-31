/*function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }*/

 // rafraîssement du graph toutes les 60s
function refreshGraph() {
	console.log('refreshGraph');
	$.ajax({
		type: 'GET', // type de requête (POST ou GET)
		url: 'http://localhost/appliwebold/tableauws.php',
		dataType: 'json',
		success : function(res) {

			console.log(res);
			constuctGraph(res['DateTemp'], res['Temp'], res['DateElec'], res['Elec'], res['DateHumid'], res['Humid']);
			console.log('Test');
		},
			/*$('#id_graph').html(escapeHtml(res));
				window.setTimeout( function(){ refreshGraph(); }, 10000); // 10000: en millisecondes
			},*/
		error: function (res) {
			console.log('error',res);
			// rafraissement de toute la page si erreur Ajax
			//document.location.reload(true);
		}
	});
}
