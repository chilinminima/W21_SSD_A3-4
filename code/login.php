<?php include("templates/page_header.php");?>
<?php
    function token_generate()
    {
        $salt = "hello".date("h:i:s");
        $token = md5($salt);
        return $token;
    }
    $token = token_generate();
    $_SESSION["user_token"] = $token;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && check_csrf()) {
  $_POST['password'] = hash('sha256', $_POST['password']);
	$result = authenticate_user($dbconn, $_POST['username'], $_POST['password']);
	if (pg_num_rows($result) == 1) {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['authenticated'] = True;
		$_SESSION['id'] = pg_fetch_array($result)['id'];
		//Redirect to admin area

    //----log login
    $content = "username: " . $_SESSION['username'] . " log in";
    //echo $content;
    addLog($dbconn, "login Successful", $content);
    
		header("Location: /admin.php");
	}else{

    //----log failed
    $content = "username: " . $_POST['username'] . "  tries to log in";
    addLog($dbconn, "login Failed", $content);
  }	
}
?>
<!doctype html>
<html lang="en">
<head>
	<title>Login</title>
	<?php include("templates/header.php"); ?>
<style>

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}

.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}

.form-signin .form-control:focus {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
</head>

<body>
	<?php include("templates/nav.php"); ?>
	<?php include("templates/contentstart.php"); ?>

<form class="form-signin" action='#' method='POST'>
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus name='username'>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name='password'>
          <input type="hidden" name="user_token" value="<?php echo $token;?>">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
<br>
	<?php include("templates/contentstop.php"); ?>
	<?php include("templates/footer.php"); ?>
</body>
</html>
