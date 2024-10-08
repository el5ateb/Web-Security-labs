<?php
session_start();

if($_SESSION['islogin'] != 1){
    header("Location: login.php");
    die();
}
$msg="";
if( isset( $_FILES[ 'upload' ] ) ) {

    $target_dir  = __DIR__ . "/userfiles/";
    $target_file = basename( $_FILES[ 'upload' ][ 'name' ] );
    $target_ext  = substr( $target_file, strrpos( $target_file, '.' ) + 1);
    $target_path = $target_dir . $target_file;

    $blocked = array('php','html','jsp','shtml','exe');

    if( in_array($target_ext, $blocked) ){
        
        $msg .= "Not allowd Extension.";

    }else{
        if(!file_exists($target_path)){
            if( !move_uploaded_file( $_FILES[ 'upload' ][ 'tmp_name' ], $target_path ) ) {
            // No
                $msg .= 'Your image was not uploaded.';
            }
            else {
                // Yes!
                $msg .= "{$target_file} succesfully uploaded!";
            }
        }else{
            $msg .= "File already exists.";
        }
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
        <a class="active" href="profile.php">Profile</a>
        <a href="login.php">Login</a>
      </div>
    </div>
    <center>
    <div class="container">
        <form class="form-block" method="post" enctype="multipart/form-data">
            <input type="file" name="upload">
            <input type="submit" value="upload">
        </form>
        <pre><?php echo htmlentities($msg);?></pre>
    </div>
    </center>
    </div>
  </body>
</html>