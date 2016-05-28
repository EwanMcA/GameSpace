$(document).ready(function(){
	$.get("getSplashScores.php", function(result){
		var table = $("#scoresBox");
		var json_result = JSON.parse(result);
		for(var i in json_result) {
			var comments = json_result[i];
			var th = $("<tr></tr>"); 
			var s = comments.score; 
			scoreSting = s.toString();
			th.append($("<td class='user'>" + comments.userName + "</td>"));
			th.append($("<td class='score'>" + scoreString + "</td>")); 
			table.append(th);
		}; 
	});
});