<?php
session_start();
if(isset($_POST['uname']) && isset($_POST['pwd'])){

	$conn = mysqli_connect('localhost','root','','test');
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];

	$sql = "SELECT * FROM users WHERE username='$uname' and pass='$pwd';";
	// echo $sql;
	$res = @mysqli_query($conn, $sql);
	$count = @mysqli_num_rows($res);
	$rows = @mysqli_fetch_array($res);
	if($count > 0) {
		$_SESSION['islogin'] = 1;
		$_SESSION['username'] = $rows['username'];
		header("Location: profile.php");
	}else{
		echo "<script>alert('Username/Password is invalid.')</script>";
	}
}
?>
<html>
  <head>
    <title>Books Library</title>
    <link rel="stylesheet" type="text/css" href="../style/css.css">
  </head>
  <body id="bodyId">
    <div class="header">
      <a href="index.php" class="logo">Books Library</a>
      <div class="header-right">
        <a href="index.php">Home</a>
        <a href="search.php">Search</a>
        <a href="profile.php">Profile</a>
        <a class="active" href="login.php">Login</a>
      </div>
    </div>
    <div><br><br>
    	<center>
    	<form method="POST">
    		<input type="text" id="uname" name="uname" placeholder="Username" autocomplete="off"><br>
    		<input type="password" id="pwd" name="pwd" placeholder="Password" autocomplete="off"><br>
    		<input type="submit" value="Login" style="background-color: dodgerblue;">
    	</form>
    	</center>
    </div>
  </body>
</html>