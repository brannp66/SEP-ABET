<?php
	session_start();
	if (isset($_POST['submit'])) {
		if (!$_POST['username'] | !$_POST['password']) {
			echo "<script type='text/javascript'>alert('You did not complete all the 
						required fields');</script>";
		}

		$m = new MongoClient(); //connect
		$db = $m->selectDB("ABET");
		$users = new MongoCollection($db, 'Users');
		$conditions = array('$and' => array(array('name' => $_POST['username']), 
									array('password' => $_POST['password'])));

		if($conditions.count() === 1) {
			if($_POST['username'] == "admin") {
				header("Location: admin.php");
			}
			else {
				header("Location: chooseSemester.php");
			}
		}
		else{ 
			echo "<script type='text/javascript'>alert('Incorect Credentials');
						</script>";
		}
		

		if($_POST['username'] == "admin") {
			header("Location: admin.php");
		}
		else {
			$_SESSION['instructor'] = $_POST['username'];
			header("Location: chooseSemester.php");
		}
	}
?>

<!doctype html>
<html>
  <head>
    <title>ABET Accredidation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>
  </head>
	<body>
		<div class='login'>
			<h1>Login</h1>
			<form method="POST" action="index.php">
				<p>
					<input type="text" name="username" value placeholder="Username">
				</p>
				<p>
					<input type="password" name="password" value placeholder="Password">
				</p>
				<input type="submit" value="Login" name='submit' class='button'>
			</form>
		</div>
	</body>
</html>