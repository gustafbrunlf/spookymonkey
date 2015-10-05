<?php 

	require_once('server/savepost.php');
	require_once('server/functions.php'); 

	$result = getDBcontent("guestbook");

 ?>

<!DOCTYPE html>

<html lang="en">

	<head>

		<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" >

		<title>The Spooky Business Inc.</title>

		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>

	</head>

	<body>

		<div id="container">

			<header>
				
				<h1 id="header">The Spooky Business Inc.</h1>

			</header>

			<div class="wrapper">
			
				<div class="send">

					<div class="knugen">

						<form action="index.php" method="POST">
							
							<input type="text" name="name" placeholder="NAME" value="<?php if(isset($_POST['name'])){ print $_POST['name']; } ?>">

							<input type="text" name="email" placeholder="E-MAIL" value="<?php if(isset($_POST['email'])){ print $_POST['email']; } ?>">

							<textarea name="message" placeholder="MESSAGE (Maximum 200 characters)"><?php if (isset($_POST['message'])){ print $_POST['message']; } ?></textarea>

							<button type="submit">POST</button> 

						</form>

					</div>

					<?php 

						print $error;

					?>

				</div>

				<div class="post">

					<div class="wrapperPost">

						<?php

							printDBcontent($result);
							
						?>

					</div>

				</div>

			</div>

		</div>
		
	</body>

</html>






