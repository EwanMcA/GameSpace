<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>GameSpace</title>
	<link href="https://fonts.googleapis.com/css?family=Nova+Mono" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" type="text/css" href="styles/snake.css">
	<link rel="icon" href="images/gs.png" type="image/x-icon">
</head>

<body>
	<header>
		
		<div id="header_logo">
			<a href="index.php" >
				<img id="logo" alt="GameSpace Logo" src="./images/headerLogo.png">
			</a>
		</div>
		
		<div id="header_top">
			<div id="buttons">
				<button id="login" class="account_button"> Log In </button>
				<button id="addUser" class="account_button">New User</button>
				<div id="user">
					<?php
						if (isset($_SESSION['user'])){ 
							echo "Hello ".$_SESSION['user']."!";
						}
					?>
				</div>
			</div> 
		</div>
		
		<nav>
			<ul id="navbar">
				<li> <a href="arcade.php"> Arcade </a> </li>
				<li> <a href="strategy.php"> Strategy </a> </li>
				<li> <a href="puzzle.php"> Puzzle </a> </li>
				<li> <a href="multiplayer.php"> Multiplayer </a> </li>
				<li> <a href="topGames.php"> Top Games </a> </li>
			</ul>
		</nav>
		
		<div id="loginModal" class="modal">
			<div class="loginContent">
				<span class="close">x</span> 
				<br>
				<img alt="titleIcon" src="./images/titleIcon.png">
				<h1>LOGIN</h1>
				<form name="login" action="login.php" method="POST"> 
				Username:<br>
				<input type="text" name="userName"><br> 
				Password:<br> 
				<input type="password" name="password"><br> 
				<br>
				<input type="submit" value="Login"> 
				</form>  
					<?php
						if (isset($_SESSION['errors'])){
							echo '<style type="text/css">
								#loginModal {
									display: Block;
								}
								</style>';
							echo "Username or Password is Incorrect";
							unset($_SESSION['errors']);
						}
					?>
			</div>
		</div> 
		
		<div id="addModal" class="modal">
			<div class="addContent">
				<span class="close">x</span> 
				<br>
				<img alt="titleIcon" src="./images/titleIcon.png">
				<h1>New User</h1>
				<form name="addUser" action="add_user.php" method="POST"> 
				Username:<br>
				<input type="text" name="userName"><br> 
				Password:<br> 
				<input type="password" name="password"><br> 
				<br>
				<input type="submit" value="Submit"> 
				</form>
					<?php
						if (isset($_SESSION['errors'])){
							echo '<style type="text/css">
								#addModal {
									display: Block;
								}
								</style>';
							echo "Name not available.";
							unset($_SESSION['errors']);
						}
					?>
			</div>
		</div>
	</header>

	<div id="game_content">

		<div id="game_container">
			<h1>Block Snake</h1>
			<div id="game_window">
				<div id="box">
				</div>
			</div>
			<div id="my_score">
			Current Score: 0
			</div>
			<div id="social">
				Share your score
				<a href="http://www.facebook.com" target="_blank">
					<img src="images/facebook.png" alt="facebook">
				</a>
				<a href="http://twitter.com" target="_blank">
					<img src="images/twitter.png" alt="twitter">
				</a>
				<a href="http://plus.google.com/" target="_blank">
					<img src="images/googleplus.png" alt="google plus">
				</a>
			</div>
		</div>

		<div id="scores"> 
				<table>
					<thead>
						<tr>
							<td style="width:120px">User</td>
							<td>Score</td>
						</tr>
					</thead>
					<tbody id="scoresBox">

					</tbody> 
				</table>
		</div>
		
		<div id="more_games">
			
			<figure>
				<a href="snake.php">
					<img src="images/blockSnake.png" alt="BlockSnake">
				</a>
				<figCaption>
					<a href="snake.php">
						 Block Snake
					</a>
				</figCaption>
			</figure>
			
			<figure>
				<a href="splash.php">
					<img src="images/cuber.jpg" alt="Splash">
				</a>
				<figCaption>
					<a href="splash.php">
						 Splash 
					</a>
				</figCaption>
			</figure>
			
			<figure>
				<a href="snake.php">
					<img src="images/blockSnake.png" alt="BlockSnake">
				</a>
				<figCaption>
					<a href="snake.php">
						 Block Snake
					</a>
				</figCaption>
			</figure>
			
			<figure>
				<a href="splash.php">
					<img src="images/cuber.jpg" alt="Splash">
				</a>
				<figCaption>
					<a href="splash.php">
						 Splash 
					</a>
				</figCaption>
			</figure>
			
			<figure>
				<a href="snake.php">
					<img src="images/blockSnake.png" alt="BlockSnake">
				</a>
				<figCaption>
					<a href="snake.php">
						 Block Snake
					</a>
				</figCaption>
			</figure>
			
			<figure>
				<a href="splash.php">
					<img src="images/cuber.jpg" alt="Splash">
				</a>
				<figCaption>
					<a href="splash.php">
						 Splash 
					</a>
				</figCaption>
			</figure>
			
		</div>
	</div>
	
	<div id="comment_wrapper">
		<div id="comment_section">
			
			<div id="comForm">
				<form id="commentForm" action="addComments.php" method="POST">
					<textarea id="commentTextbox" name="comment" form="commentForm" onclick = "eraseText()">Enter comment here...</textarea>
					<input type="submit" value="Post">
				</form>  
			</div>
			
			<div id="comments">
				<table>
					<thead>
						<tr>
							<td style="width:60px">Time</td>
							<td style="width:120px">By</td>
							<td>Comment</td>
						</tr>
					</thead>
					<tbody id="commentBox">

					</tbody> 
				</table>
			</div>
			
		</div>
	</div>
	
	<footer>
			<a href="index.php">Home</a> | <a href="arcade.php">Arcade</a> | <a href="strategy.php">Strategy</a> | <a href="puzzle.php">Puzzle</a> | <a href="multiplayer.php">Multiplayer</a><br/><br/>
			<a href="topGames.php">Top Games</a>  | website by <a href="index.php">GameSpace.inc</a>
	</footer>

	<script src="js/game.js"></script> 
	<script src="js/jquery-1.12.3.min.js"></script> 
	<script src="js/comments.js"></script>
	<script src="js/login.js"></script>  
	<script src="js/snakeScores.js"></script>
</body>

</html>
