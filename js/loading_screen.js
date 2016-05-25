
/* Display a small Loading animation */

var box = document.getElementById("box");
box.innerHTML = "Loading"
box.style.display = "inline";
box.style.left = "-10px";

var dot1 = document.createElement('div');
var dot2 = document.createElement('div');
var dot3 = document.createElement('div');

dot1.innerHTML = ".";
dot2.innerHTML = ".";
dot3.innerHTML = ".";

dot2.style.fontSize = "1.5em"

box.appendChild(dot1);
box.appendChild(dot2);
box.appendChild(dot3);

function loading() {
	if (dot3.style.fontSize == "1.5em") {
		dot2.style.fontSize = "1.5em";
		dot3.style.fontSize = "1em";
	} else if (dot2.style.fontSize == "1.5em") {
		dot1.style.fontSize = "1.5em";
		dot2.style.fontSize = "1em";
	} else if (dot1.style.fontSize == "1.5em") {
		dot3.style.fontSize = "1.5em";
		dot1.style.fontSize = "1em";
	}
}

setInterval(loading, 200)



