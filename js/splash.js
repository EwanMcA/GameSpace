
var game_window = document.getElementById("game_window");
game_window.style.padding = '8px';
game_window.style.backgroundColor = "#CCC";

var game_size = 16;
var button1;
var prevKey;

var colours = [255, 77,	 166, 
			   51, 	153, 255,
			   214, 153, 255,
			   255, 128, 128,
			   153, 230, 230,
			   255, 255, 255];

var game = new Phaser.Game(500, 400, Phaser.CANVAS, 'game_window', { preload: preload, create: create, update: update, render: render });
var b0;
var b1;
var b2;
var b3;
var b4;
var b5;
var max_turns = 30;
var turns_left = max_turns;
var level = 0;
var arial;
var turns = '';
var xhttp = new XMLHttpRequest();

function preload() {
}

function create() {
	xhttp.open("GET", "beginSplash.php", false);  // best to wait for server instruction before building the map. 
	xhttp.send();
	var map_string = xhttp.responseText;
	arial = { font: "16px Times New Roman", fill: "#000000", align: "center" };
	game.stage.backgroundColor = "#CCCCCC";
	b0 = game.add.bitmapData(20, 20);
	b0.fill(colours[0],colours[1],colours[2],1);
	b1 = game.add.bitmapData(20, 20);
	b1.fill(colours[3],colours[4],colours[5],1);
	b2 = game.add.bitmapData(20, 20);
	b2.fill(colours[6],colours[7],colours[8],1);
	b3 = game.add.bitmapData(20, 20);
	b3.fill(colours[9],colours[10],colours[11],1);
	b4 = game.add.bitmapData(20, 20);
	b4.fill(colours[12],colours[13],colours[14],1);
	b5 = game.add.bitmapData(20, 20);
	b5.fill(colours[15],colours[16],colours[17],1);
 	squares = game.add.group();
    for (var i = 0; i < game_size; i++) {
    	for (var j = 0; j < game_size; j++) {
			switch(parseInt(map_string.charAt(i*game_size+j))) {
    			case 0:
    				squares.create(10+20*i,10+20*j,b0);
    				break;
    			case 1:
    				squares.create(10+20*i,10+20*j,b1);
    				break;
    			case 2:
    				squares.create(10+20*i,10+20*j,b2);
    				break;
    			case 3:
    				squares.create(10+20*i,10+20*j,b3);
    				break;
    			case 4:
    				squares.create(10+20*i,10+20*j,b4);
    				break;
    			case 5:
    				squares.create(10+20*i,10+20*j,b5);
    				break;

    		}
    	}
    }

    for (var i = 0; i < 6; i++) {
    	var circ = game.add.bitmapData(32,32);
    	circ.fill(colours[i*3],colours[i*3+1],colours[i*3+2],1);
    	game.add.button(game_size*20+50+60*(i%2), 50+60*(i/2), circ, actionOnClick, this);
    }
	turn_text = game.add.text(10, 40+game_size*20,"Turns Left: "+turns_left, arial);
    click_text = game.add.text(50+game_size*20, 18,"Click These", arial);
   	level_text = game.add.text(60+game_size*20, 40+game_size*20,"Level "+level, arial);
}

function update() {

}

function render() {
}

function flood(index, target, replace) {
	var node = squares.children[index];
	node.key.update();
	if (target == replace) { return; }
	if (node.key.key != target.key) { return; }
	node.loadTexture(replace);
	if (index > game_size-1) {
		flood(index-game_size, target, replace);
	}
	if (index%game_size < 15) {
		flood(index+1, target, replace);
	}
	if (index%game_size > 0) {
		flood(index-1, target, replace);
	}
	if (index+game_size < game_size*game_size) {
		flood(index+game_size, target, replace);
	}
}

function all_filled() {
	for (var i = 1; i < squares.children.length; i++) {
		if (squares.children[i].key.key != squares.children[0].key.key) {
			return false;
		}
	}
	return true;
}

function restart() {
	xhttp.open("GET", "beginSplash.php", false); 
	xhttp.send();
	var map_string = xhttp.responseText;
	turns_left = max_turns;
	squares.removeAll();
	for (var i = 0; i < game_size; i++) {
    	for (var j = 0; j < game_size; j++) {
			switch(parseInt(map_string.charAt(i*game_size+j))) {
    			case 0:
    				squares.create(10+20*i,10+20*j,b0);
    				break;
    			case 1:
    				squares.create(10+20*i,10+20*j,b1);
    				break;
    			case 2:
    				squares.create(10+20*i,10+20*j,b2);
    				break;
    			case 3:
    				squares.create(10+20*i,10+20*j,b3);
    				break;
    			case 4:
    				squares.create(10+20*i,10+20*j,b4);
    				break;
    			case 5:
    				squares.create(10+20*i,10+20*j,b5);
    				break;

    		}
    	}
    }
}

// remember to send JSON for validation too..
function actionOnClick(button) {
	var move = ((button.y-50)/60)*2;
	switch(move) {
		case 0:
			if (b0.key == squares.children[0].key.key) { return; }
			flood(0,squares.children[0].key,b0);
			break;
		case 1:
			if (b1.key == squares.children[0].key.key) { return; }
			flood(0,squares.children[0].key,b1);
			break;
		case 2:
			if (b2.key == squares.children[0].key.key) { return; }
			flood(0,squares.children[0].key,b2);
			break;
		case 3:
			if (b3.key == squares.children[0].key.key) { return; }
			flood(0,squares.children[0].key,b3);
			break;
		case 4:
			if (b4.key == squares.children[0].key.key) { return; }
			flood(0,squares.children[0].key,b4);
			break;
		case 5:
			if (b5.key == squares.children[0].key.key) { return; }
			flood(0,squares.children[0].key,b5);
			break;
	}
	turns = turns + move.toString();
	turns_left-=1;
	turn_text.text = "Turns Left: "+turns_left;
	if (all_filled()) {
		xhttp.open("GET", "validateSplash.php?t="+turns, false); 
		xhttp.send();
		$a = xhttp.responseText;
		console.log($a);
		//aaaaaaaa
		level++;
		level_text.text = "Level "+level;
		document.getElementById("my_score").innerHTML = "Current Score: " + level*250;
		restart();
	} else if (turns_left < 1) {
			// php to update high-scores.
		level = 0;
		level_text.text = "Level "+level;
		document.getElementById("my_score").innerHTML = "Current Score: " + level*250;
		restart();
	}
}