var loginModal = document.getElementById('loginModal');
var login = document.getElementById("login"); 
var loginButton = document.getElementById("loginBtn");
var addModal = document.getElementById('addModal');
var addUser = document.getElementById("addUser"); 
var span = document.getElementsByClassName("close")[0];
var spanTwo = document.getElementsByClassName("close")[1];

login.onclick = function() {
	if (login.innerHTML === 'Logout') {
		$.ajax({
                type: 'POST',
                url: 'logout.php',
                success: function() {
					location.reload();
                }
            });
	} else {
		loginModal.style.display = "block";
	}
}
 
addUser.onclick = function() {
    addModal.style.display = "block";
}

span.onclick = function() {
    loginModal.style.display = "none"; 
	
} 

spanTwo.onclick = function() {  
	addModal.style.display = "none";
 }
 
window.onclick = function(event) {
    if (event.target == loginModal) {
        loginModal.style.display = "none";
    } 
	if (event.target == addModal) {
        addModal.style.display = "none";
    }
}

function updateBtnLogout() {
	document.getElementById("login").innerHTML = 'Logout';
	document.getElementById("user").style.border = "3px solid #0070a3";
}