// rafraîssement du graph toutes les 60s
function refreshGraph() {
	$.ajax({
		type: 'GET', // type de requête (POST ou GET)
		url: 'http://192.168.0.80/graphs.php',
		dataType: 'html',
		success : function(res) {
			$('#id_graph').html(res);
				window.setTimeout( function(){ refreshGraph(); }, 10000); // 10000: en millisecondes
			},
		error: function (res) {
			// rafraissement de toute la page si erreur Ajax
			document.location.reload(true);
		}
	});
}
