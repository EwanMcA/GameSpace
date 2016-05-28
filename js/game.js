
/* Block Snake game logic and colour-changing background */

var r = 255, g = 255, b = 255;
var next_r = 255, next_g = 255, next_b = 255;
var game = document.getElementById("game_window");


function getColour() {
		next_r = Math.floor(Math.random()*256);
		next_g = Math.floor(Math.random()*256);
		next_b = Math.floor(Math.random()*256);
}

function inc() {
	r += Math.sign(next_r - r); 
	g += Math.sign(next_g - g);
	b += Math.sign(next_b - b);
	game.style.backgroundColor = 'rgb(' + r + ',' + g + ',' + b + ')';
	if (r == next_r && g == next_g && b==next_b) {
		getColour();
	}
}

setInterval(inc, 100);

window.addEventListener("keydown", function(e) {
    switch(e.keyCode) {
    	//case 32:
    	case 37:
    	case 38:
    	case 39:
    	case 40:
       		e.preventDefault();
			break;
    }
}, false);

// game

var half_width = 250;
var half_height = 250;
var x = half_width;
var y = half_height;
var dir = 0;
var food_x = 0;
var food_y = 0;
var tail = [];
var xhttp = new XMLHttpRequest();
var box = document.getElementById("box");

function move_box() {
	if (tail.length > 0) {
		for (i = tail.length-1; i > 0 ; i--) {
			tail[i].style.left = tail[i-1].style.left;
			tail[i].style.bottom = tail[i-1].style.bottom;
		}
		tail[0].style.left = box.style.left;
		tail[0].style.bottom = box.style.bottom;
	}
    switch(dir) {
    	case 0:
    		x -= 20;
    		break;
    	case 1:
    		y += 20;
    		break;
    	case 2:
    		x += 20;
    		break;
    	case 3:
    		y -= 20;
    		break;
    }
    if (x >= 500 || x < 0 || y >= 500 || y < 0) {
    	box_death();
    }
    x = Math.floor(x/20)*20;
    y = Math.floor(y/20)*20;
    box.style.left = x.toString()+"px";
    box.style.bottom = y.toString()+"px";
	//console.log(x + " "+ document.getElementById("box").style.left);
    if (Math.abs(x - food_x) < 20 && Math.abs(y - food_y) < 20) {
    	var current_food = document.getElementById("food");
    	current_food.removeAttribute("id");
    	current_food.className = "tail";
    	tail.push(current_food);
    	place_food();
    	document.getElementById("my_score").innerHTML = "Current Score: " + tail.length*50;
    } else if (tail.length > 0) {
		for (i = 0; i < tail.length ; i++) {
			if (Math.abs(x - parseInt(tail[i].style.left)) == 0 && Math.abs(y - parseInt(tail[i].style.bottom)) == 0) {
				box_death();
			}
		}
	}
}

function box_death() {
	if (tail.length > 1) {
		xhttp.open("GET", "addHighScore.php", false); 
		xhttp.send();
	}
	x = half_width;
	y = half_height;
	tail = [];
	var tail_parts = document.getElementsByClassName('tail');
	while(tail_parts[0]) {
	    tail_parts[0].parentNode.removeChild(tail_parts[0]);
	}
	document.getElementById("my_score").innerHTML = "Current Score: " + tail.length*50;
}

function place_food() {
	food_x = Math.floor(Math.random()*500/20)*20;
	food_y = Math.floor(Math.random()*500/20)*20;
	var div = document.createElement('div');
	div.id = "food";
	div.style.left = food_x.toString()+"px";
	div.style.bottom = food_y.toString()+"px";
	document.getElementById("game_window").appendChild(div);
}

document.addEventListener("keydown", function(event) {
    switch(event.keyCode) {
    	case 37:
    		dir = 0;
    		break;
		case 38:
			dir = 1;
			break;
		case 39:
			dir = 2;
			break;
		case 40:
			dir = 3;
			break;
    }
});

setInterval(move_box, 150);
place_food();