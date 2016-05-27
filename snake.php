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
				<li> <a href="index.php"> Shooters </a> </li>
				<li> <a href="index.php"> Driving </a> </li>
				<li> <a href="index.php"> Strategy </a> </li>
				<li> <a href="index.php"> Multiplayer </a> </li>
				<li> <a href="index.php"> Top Games </a> </li>
			</ul>
		</div>
		<div id="buttons">
			<button id="login"> Log In </button><button id="addUser">New User</button>
			<div id="user"><?php
				if (isset($_SESSION['user'])){ 
					echo "Hello ".$_SESSION['user']."!";
				}
				?></div>
		</div> 
		<div id="loginModal" class="modal">
			<div class="loginContent">
				<span class="close">x</span> 
				<br>
				<img id="loginIcon" alt="titleIcon" src="./img/titleIcon.png">
				<h1>LOGIN</h1>
				<form name="login" action="login.php" method="POST"> 
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
				<img id="loginIcon" alt="titleIcon" src="./img/titleIcon.png">
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
			<div id="box">
			</div>
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
			<table>
				<thead>
					<tr>
						<td>Time</td>
						<td>User</td>
						<td>Comment</td>
					</tr>
				</thead>
				<tbody id="commentBox">

				</tbody> 
			</table>
		</div> 
		<div id="comForm">
		<form id="commentForm" action="addComments.php" method="POST">
		<textarea name="comment" form="commentForm">Enter comment here...</textarea> 
		<br>
		<input type="submit" value="Submit">
		</form>  
		</div>
	</div>


<script src="js/game.js"></script> 
<script src="js/jquery-1.12.3.min.js"></script> 
<script src="js/comments.js"></script>

</body>
</html>
