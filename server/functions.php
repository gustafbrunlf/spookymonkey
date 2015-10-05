<?php  
	
	require_once('secret.php');

	function connectToDB () {

		$connect = mysqli_connect (DBSERVER, DBUSER, DBPASS, DB);

		if (!$connect) {

			print "<script> alert('You have failed to connect!'); </script>";

		} else {

			return $connect;

		}
	}

	function getDBcontent ($table) {

		$db = connectToDB();

		$array = array();

		$result = mysqli_query($db, "SELECT * FROM $table ORDER BY id DESC");

		while ($results = mysqli_fetch_assoc($result)) {
			
			$array[] = $results;

		}

		return $array;

	}

	function validateEmail ($email) {

		$validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

		if (!$validEmail) {

			return false;

		} else {

			return true;

		}

	}

	function savePost ($name, $email, $message) {

		$db = connectToDB();

		$name = mysqli_real_escape_string($db, $name);
		$email = mysqli_real_escape_string($db, $email);
		$message = mysqli_real_escape_string($db, $message);

		mysqli_query($db, "INSERT INTO `guestbook` (`name`, `email`, `message`) VALUES ('$name','$email','$message')");

		if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {

				$_POST['name'] 	  = "";
				$_POST['email']   = "";
				$_POST['message'] = "";
		}

	}

	function printDBcontent ($result) {

		foreach ($result as $post ){

			print "\t\t\t\t\t".'<div class="result">';

				print "\n\t\t\t\t\t".'<div class="name"><h1>' .$post['name']. '</h1></div>'."\n";

				if ($post['email']) {
					
					print "\t\t\t\t\t".'<div class="email"><a href="mailto:' .$post['email']. '"><i class="fa fa-paper-plane-o icon"></i></a></div>'."\n";

				}

				print "\t\t\t\t\t".'<div class="message"><p>' .$post['message']. '</p></div>'."\n";

			print "\t\t\t\t\t".'</div>'."\n\n";

		}
		
	}








