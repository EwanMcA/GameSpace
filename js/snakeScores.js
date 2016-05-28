$(document).ready(function(){
	$.get("getSnakeScores.php", function(result){
		var table = $("#scoresBox");
		var json_result = JSON.parse(result);
		for(var i in json_result) {
			var comments = json_result[i];
			var th = $("<tr></tr>");
			th.append($("<td class='user'>" + comments.userName + "</td>"));
			th.append($("<td class='score'>" + comments.score + "</td>")); 
			table.append(th);
		}; 
	});
});
