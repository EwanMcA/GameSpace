$(document).ready(function(){
	$.get("getCommentsSplash.php", function(result){  
		
		var table = $("#commentBox");
		var json_result = JSON.parse(result);
		for(var i in json_result) {
			var comments = json_result[i];
			var th = $("<tr></tr>");
			th.append($("<td class='timestamp'>" + comments.timestamp + "</td>"));
			th.append($("<td class='user'>" + comments.userName + "</td>"));
			th.append($("<td class='comment'>" + comments.comment + "</td>")); 
			table.append(th);
		}; 
	});
});

setInterval(function(){
	$.get("getCommentsSplash.php", function(result){
		var table = $("#commentBox");
		table.empty();
		var json_result = JSON.parse(result);
		for(var i in json_result) {
			var comments = json_result[i];
			var th = $("<tr></tr>");
			th.append($("<td class='timestamp'>" + comments.timestamp + "</td>"));
			th.append($("<td class='user'>" + comments.userName + "</td>"));
			th.append($("<td class='comment'>" + comments.comment + "</td>")); 
			table.append(th);
		}; 
})}, 1500);

function eraseText() {
	
	if (document.getElementById("commentTextbox").value === "Enter comment here...") {
        document.getElementById("commentTextbox").value = "";
    }
}