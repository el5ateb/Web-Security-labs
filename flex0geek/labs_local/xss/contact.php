<?php

if(!isset($_GET['lang'])){
  header("Location: contact.php?lang=en");
}

$conn = mysqli_connect('localhost', 'root', '', 'test');

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['msg'])){
  
  $name = addslashes($_POST['name']);
  $email = addslashes($_POST['email']);
  $msg = addslashes($_POST['msg']);
  $user_agent = addslashes($_SERVER['HTTP_USER_AGENT']);

  $sql = "INSERT INTO contact values('$name','$email','$msg','$user_agent')";

  $execute = mysqli_query($conn, $sql);

  echo "<script>alert('Your message sent to Admin.')</script>";
}
?>

<html>
  <head>
    <title>Books Library</title>
    <script src="https://code.angularjs.org/1.1.5/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../style/css.css">
    <!-- <link rel="stylesheet" type="text/css" href="../style/<?php echo @$_GET['lang'];?>.lang"> -->
  </head>
  <body id="bodyId">
    <div class="header">
      <a href="index.php" class="logo">Books Library</a>
      <div class="header-right">
        <a href="index.php">Home</a>
        <a href="search.php">Search</a>
        <a class="active" href="contact.php">Contact</a>
        <a href="about.php#about">About</a>
        <a href="profile.php">Profile</a>
        <a href="login.php">Login</a>
      </div>
    </div>
    <div><br><br><br><br>
    <center>
        <form method="post" action="contact.php?lang=en">

        	<input id="fname" type="text" name="name" autocomplete="off" placeholder="Your Name"><br>

        	<input id="email" type="email" name="email" autocomplete="off" placeholder="Email"><br>

        	<textarea id="msg" name="msg" autocomplete="off" placeholder="Message"></textarea><br>
        	<input id="send" type="submit" value="Send">

        </form>
    </center>
    </div>
    <script type="text/javascript">
        var lang = <?php echo '"'.@$_GET['lang'].'";';?>
    </script>
  </body>
</html>