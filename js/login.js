
var loginModal = document.getElementById('loginModal');
var login = document.getElementById("login");  
var addModal = document.getElementById('addModal');
var addUser = document.getElementById("addUser"); 
var span = document.getElementsByClassName("close")[0]; 
//var spanAdd = document.getElementsByClassName("closeAdd")[0];
login.onclick = function() {
    loginModal.style.display = "block";
} 
addUser.onclick = function() {
    addModal.style.display = "block";
}
span.onclick = function() {
    loginModal.style.display = "none"; 
	addModal.style.display = "none";
} 
// spanAdd.onclick = function() { 
// }
window.onclick = function(event) {
    if (event.target == loginModal) {
        loginModal.style.display = "none";
    } 
	if (event.target == addModal) {
        addModal.style.display = "none";
    }
}