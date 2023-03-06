<?php
// Start the session
session_start();

$type = "";

?>

<!DOCTYPE html> 
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="description" content="A website">
		<meta name="viewport" content="width=device-width, initial scale=1">
		<title>Stephanie</title>
		<link rel="stylesheet" href="css/index.css">
		
	</head>
	
	
	<body>
		<div id="header">
			<?php
				include "inc/header.php"
			?>
		</div>
		<div class="menu">
			<ul>
				<li><a href="?pg=home">Home</a></li>
				
					<?php
						if(!isset($_SESSION['admin']))
						{
						  echo '';
						} else {
						  echo '<li><a href="?pg=db">Users</a><br/></li>';
						}

						if (!isset($_SESSION['student'])){
							echo '';
						} else {
						 	echo '<li><a href="?pg=profile">Profile</a><br/></li>';
						}
					?>
				<li>
					<?php
					if(!isset($_SESSION['logged_in']))
					  {
						echo '<a href="?pg=login">Login</a><br/>';
					  } else {
						echo '<a href="?pg=logout">Logout</a><br/>';
					  }
					?>
				</li>
				
			</ul>
		</div>
		<div id="content">
			<?php

				$intpg="";

				if (!isset ($_GET['pg'])) {
					$pg = "home";
				} else {
					$pg = $_GET['pg'];
					if($pg>0) {
						$intpg=$pg;
					}
				}
					
				if (!isset($_SESSION['logged_in'])) {
					switch ($pg) {
						case "home":
							include "inc/home.php";
							break;
						case "signup":
							include "inc/signup.php";
							break;
						default:
							include "inc/login.php";
							break;
					} 
				} else {

					switch ($pg) {
						case 'curriculum':
							include 'inc/curriculum.php';
							break;
						case 'login':
							include 'inc/login.php';
							break;
						case 'logout':
							include 'inc/logout.php';
							break;
						case "home":
							include "inc/home.php";
							break;
						case "profile":
							include "inc/profile.php";
							break;
						case "db":
							include "fn/connect.php";
							break;
						case "insert":
							include "fn/insert.php";
							break;
						case "delete":
							include "fn/delete.php";
							break;
						case "$intpg":
							include "fn/update.php";
						}
				}
			?>
		</div>
		<div id="footer">
			<?php
				include "inc/footer.php"
			?>
		</div>
	</div>
		
	</body>

</html> 