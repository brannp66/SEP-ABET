<?php
	if (isset($_POST['submit'])) {
		if (!$_POST['username'] | !$_POST['password']) {
			echo "<script type='text/javascript'>alert('You did not complete all the required fields');</script>";
		}

		$m = new MongoClient(); //connect
		$db = $m->selectDB("ABET");
		$users = new MongoCollection($db, 'Users');
		$conditions = array('$and' => array(array('name' => $_POST['username']), array('password' => $_POST['password'])));

		if($conditions.count() === 1) {
			if($_POST['username'] == "admin") {
				header("Location: admin.php");
			}
			else {
				header("Location: chooseSemester.php");
			}
		}
		else{ 
			echo "<script type='text/javascript'>alert('Incorect Credentials');</script>";
		}
		

		if($_POST['username'] == "admin") {
			header("Location: admin.php");
		}
		else {
			header("Location: chooseSemester.php");
		}
	}
?>

<!doctype html>
<html>
  <head>
    <title>ABET Accredidation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </head>
	<body>
		<form method="POST" action="index.php">
			Username: <input type="text" name="username">
			<br>
			Password: <input type="password" name="password">
			<br>
			<input type="submit" value="Login" name='submit'>
		</form>
	</body>
</html>