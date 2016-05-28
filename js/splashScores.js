$(document).ready(function(){
	$.get("getSplashScores.php", function(result){
		var table = $("#scoresBox");
		console.log(result);
		var json_result = JSON.parse(result);
		for(var i in json_result) {
			var scores = json_result[i]; 
			var th = $("<tr></tr>");
			th.append($("<td class='user'>" + scores.userName + "</td>"));
			th.append($("<td class='highScore'>" + scores.highScore + "</td>")); 
			table.append(th);
		}; 
	});
});