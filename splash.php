<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>GameSpace</title>
	<link href="https://fonts.googleapis.com/css?family=Nova+Mono" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" type="text/css" href="styles/snake.css">
	<link rel="icon" href="img/gs.png" type="image/x-icon">
	<script src="js/phaser.min.js"></script>
</head>
<body>
	<header>
		<div id="banner">
			<a href="index.php" >
				<img id="titleIcon" alt="titleIcon" src="./img/titleIcon.png">
			</a> 
				<img id="bannerBG" alt="bannerImg" src="./img/banner.png" >
		</div>

		<div id="nav">
			<ul class="navbar">
				<li> <a href="shooters.html"> Shooters </a> </li>
				<li> <a href="driving.html"> Driving </a> </li>
				<li> <a href="index.php"> Strategy </a> </li>
				<li> <a href="multiplayer.html"> Multiplayer </a> </li>
				<li> <a href="strategy"> Top Games </a> </li>
			</ul>
		</div>
				
		<div>
			<a href="index.php"> Log In </a>
		</div>
	</header>

	<div id="left_menu">
		<figure>
			<a href="snake.php">
				<img src="img/blockSnake.png" alt="BlockSnake">
			</a>
			<figCaption>
				<a href="snake.php">
					 Block Snake - by Real Games 
				</a>
			</figCaption>
		</figure>
		<br>
		<figure>
			<a href="splash.php">
				<img src="img/cuber.jpg" alt="Splash">
			</a>
			<figCaption>
				<a href="splash.php">
					 Splash - by PuzzleWorld 
				</a>
			</figCaption>
		</figure>
	</div>

	<div id="game_container">
		<div id="my_score">
		Current Score: 0
		</div>
		<div id="game_window">
		</div>
		<div class="social">
			Share your score
			<img src="img/fb.png" alt="facebook">
			<img src="img/twitter.png" alt="twitter">
		</div>
	</div>

	<div class="scores">
		<strong> High Scores </strong>
		<ul id="high_scores">
			<li> Alex: 1050 </li>
			<li> Sarah: 850 </li>
		</ul>
	</div>
	
		
	<div class="comment_section">
		<div id="comments">
			<ul>
				<li> a </li>
				<li> b </li>
			</ul>
		</div>
		<form action="index.php" method="post">
		<input type="text" name="comment" placeholder="Leave a comment" style="width: 85%;"/>
		<input type="submit"/>
		</form>
	</div>


<script src="js/splash.js"></script>
</body>
</html>
