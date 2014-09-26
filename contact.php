<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	
	if (isset($_POST['submit']))
	{
		if (isset($_POST['name']) && !empty($_POST['name']))
		{
			if (preg_match("/^[A-Z\-' ]+$/i", $_POST['name']))
			{
				$name = $_POST['name'];
			}
			else { $name = false; }
		}
		else { $name = false; }
		
		if (isset($_POST['email']) && !empty($_POST['email']))
		{
			if (preg_match("/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i", $_POST['email']))
			{
				$email = $_POST['email'];
			}
			else { $email = false; }
		}
		else { $email = false; }
		
		$message = htmlentities(trim($_POST['message']), ENT_QUOTES, "utf-8");
		$message = "Email Address of user: $email<br /><br />Message:<br />$message";
		
		$headers = 'From: mail@majorproductionsnh.com' . "\r\n" .
						'Reply-To: mail@majorproductionsnh.com' . "\r\n";
		
		if ($name && $email)
		{
			if (mail("kevinmajor1@gmail.com", "Major Productions Inquery From $email", $message, $headers))
			{
				header("Location: success.html");
				exit;
			}
			else
			{ 
				header("Location: failure.html");
				exit;
			}
		}
		else
		{
			header("Location: failure.html");
			exit;
		}
	}
	else
	{
		header("Location: home.html");
		exit;
	}
?>