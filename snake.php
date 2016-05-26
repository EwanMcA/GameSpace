<?php
session_start();
?>
<!DOCTYPE html>
<!-- saved from url=(0133)https://learn.uq.edu.au/bbcswebdav/pid-1944929-dt-content-rid-9133879_1/courses/INFS3202S_6620_20698/personal_portfolio_template.html -->
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
			<a href="index.html" >
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
			<a href="snake.html">
				<img src="img/blockSnake.png" alt="BlockSnake">
			</a>
			<figCaption>
				<a href="snake.html">
					 Block Snake - by Real Games 
				</a>
			</figCaption>
		</figure>
		<br>
		<figure>
			<a href="splash.html">
				<img src="img/cuber.jpg" alt="Splash">
			</a>
			<figCaption>
				<a href="splash.html">
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
			<ul>
				<li> Sarah: This game is great! </li>
				<li> James: Nahhh, cuber is way better... </li>
			</ul>
		</div> 
		<div class="commentForm">
		<? if (!isset($_SESSION['user'])){
					echo '<style type="text/css">
				        #commentForm {
				            display: None;
				        }
				        </style>';
				    echo "You Must Be Logged in to comment";
				} 
			else { 
				echo '<style type="text/css">
				        #commentForm {
				            display: Block;
				        }
				        </style>';
			}
				?>
		<form action="addComments.php" method="post">
		<input type="text" name="comment" placeholder="Leave a comment" style="width: 85%;"/>
		<input type="submit"/>
		</form> 
		</div>
	</div>


<script src="js/game.js"></script>

</body>
</html>
