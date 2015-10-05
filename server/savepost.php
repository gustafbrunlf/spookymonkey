<?php  

	$error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		require_once('functions.php');

		$name 		= filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
		$message 	= filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS);
		$email 		= $_POST['email'];

		$validName    = false;
		$validEmail   = false;
		$validMessage = false;

		if ($name == "" || $message == "") {

			$error = '<div class="error"><p>Please fill in your name and write a message</p></div>';

		} else {

			$validName    = true;

			if (strlen($message) > 200) {

				$error .= '<div class="error"><p>Maximum 200 characters</p></div>';

			} else {

				$validMessage = true;

			}

		}

		if ($email == "") {

			$validEmail = true;

		} else {

			$validEmail = validateEmail($email);

			if (!$validEmail) {

				$error .= '<div class="error"><p>Invalid email</p></div>';

			} else {

				$validateEmail = true;

			}

		}

		if ($validName && $validEmail && $validMessage) {
			
			savePost($name, $email, $message);

		}

	}


	