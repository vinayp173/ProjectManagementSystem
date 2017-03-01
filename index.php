<?php
// Start the session
session_start();
?>
<?php
include 'Mysql_connect.php';

if(!empty($_SESSION["id"])){
	switch(strlen($_SESSION["id"])){
			case 1:
				header("Location: /Project/AdminDesk.php");
                break;
			case 2:
				header("Location: /Project/ManagerDesk.php");
                break;
            case 4:
				header("Location: /Project/leaderDesk.php");
                break;
            case 5:
				header("Location: /Project/selectorWindow.php");
                break;
            
		}
}
 if(isset($_POST['username'])&&!empty($_POST['username'])&&isset($_POST['password'])&&!empty($_POST['password'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql = "SELECT id,username, password FROM User where id='".$username."' and password='".md5($password)."'";
	$result = $conn->query($sql);
	$num=$result->num_rows;
	if ( $num> 0) {
		$row = $result->fetch_assoc();
		echo '<script language="javascript">';
		echo 'alert("Login success';
		$type="uk";
		switch(strlen($row["id"])){
			case 1:
				$type="Admin";             
                echo '\n                       :-'.$type;
                echo '")';
                echo '</script>';
               
                    $_SESSION["id"] = $row["id"];
            
                header("Location: /Project/AdminDesk.php");
                break;
			case 2:
				$type="manager";
				echo '\n                       :-'.$type;
                echo '")';
                echo '</script>';
                $_SESSION["id"] = $row["id"];
                header("Location: /Project/ManagerDesk.php");
                break;
            case 4:
                $type="TLeader";
				echo '\n                       :-'.$type;
                echo '")';
                echo '</script>';
                $_SESSION["id"] = $row["id"];
				header("Location: /Project/leaderDesk.php");
   
	// destroy the session 
                break;
            case 5:
                $type="Employee";
				echo '\n                       :-'.$type;
                echo '")';
                echo '</script>';
                $_SESSION["id"] = $row["id"];
				header("Location: /Project/selectorWindow.php");
                break;
            
		}
    		
	}else{
		echo '<script language="javascript">';
		echo 'alert("Login Failed")';
		echo '</script>';
	}
}
?>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="css/styleIndex.css">
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login to Web App</h1>
      <form method="post" action="index.php">
        <p><input type="number" name="username" value="" placeholder="Employee id"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Forgot your password? <a href="ForgetPassword.php">Click here to reset it</a>.</p>
    </div>
  </section>

</body>
</html>
