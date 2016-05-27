<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>GameSpace</title>
	<link href="https://fonts.googleapis.com/css?family=Nova+Mono" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/main2.css">
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
			<ul class="navbar">
				<li> <a href="index.php"> Arcade </a> </li>
				<li> <a href="index.php"> Strategy </a> </li>
				<li> <a href="index.php"> Puzzle </a> </li>
				<li> <a href="index.php"> Multiplayer </a> </li>
				<li> <a href="index.php"> Top Games </a> </li>
			</ul>
		</nav>
		<div id="loginModal" class="modal">
			<div class="loginContent">
				<span class="close">x</span> 
				<br>
				<img id="loginIcon" alt="titleIcon" src="./images/titleIcon.png">
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
				<span class="closeAdd">x</span> 
				<br>
				<img id="loginIcon" alt="titleIcon" src="./images/titleIcon.png">
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

	<div id="main_content">

		<div id="game_container">
			<h1>Block Snake</h1>
			<div id="game_window">
				<div id="box">
				</div>
			</div>
			<div id="my_score">
			Current Score: 0
			</div>
			<div class="social">
				Share your score
				<img src="images/facebook.png" alt="facebook">
				<img src="images/twitter.png" alt="twitter">
				<img src="images/googleplus.png" alt="twitter">
			</div>
		</div>

		<div class="scores">
			<h2> High Scores </h2>
			<ul id="high_scores">
				<li><strong>The Triumphant Top 20:</strong></li>
				<li> 1: Alex - 1050 </li>
				<li> 2:   evilmorty - 750 </li>
				<li> 3: joe - 600 </li>
				<li> 4:   rickjames - 100 </li>
				<li> 5:   Unclaimed - 000 </li>
				<li> 6:   Unclaimed - 000 </li>
				<li> 7:   Unclaimed - 000 </li>
				<li> 8:   Unclaimed - 000 </li>
				<li> 9:   Unclaimed - 000 </li>
				<li> 9:   Unclaimed - 000 </li>
				<li> 10: Unclaimed - 000 </li>
				<li> 11: Unclaimed - 000 </li>
				<li> 12: Unclaimed - 000 </li>
				<li> 13: Unclaimed - 000 </li>
				<li> 14: Unclaimed - 000 </li>
				<li> 15: Unclaimed - 000 </li>
				<li> 16: Unclaimed - 000 </li>
				<li> 17: Unclaimed - 000 </li>
				<li> 18: Unclaimed - 000 </li>
				<li> 19: Unclaimed - 000 </li>
				<li> 20: Unclaimed - 000 </li>
				
			</ul>
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
			
		<div class="comment_section">
			<div id="comForm">
				<form id="commentForm" action="addComments.php" method="POST">
					<textarea name="comment" form="commentForm">Enter comment here...</textarea>
					<input type="submit" value="Post">
				</form>  
			</div>
			
			<div id="comments">
				<table>
					<col width="60">
					<col width="120">
					<thead>
						<tr>
							<td>Time</td>
							<td>By</td>
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
			<a href="index.php">Home</a> | <a href="index.php">Arcade</a> | <a href="index.php">Strategy</a> | <a href="index.php">Puzzle</a> | <a href="index.php">Multiplayer</a><br/><br/>
			<a href="index.php">Top Games</a>  | website by <a href="index.php">GameSpace.inc</a>
	</footer>


<script src="js/game.js"></script> 
<script src="js/jquery-1.12.3.min.js"></script> 
<script src="js/comments.js"></script>
<script src="js/login.js"></script>
</body>
</html>
