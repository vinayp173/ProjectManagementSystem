<?php
// Start the session
session_start();
?>
<?php
if(empty($_SESSION["id"])){
	header("Location: /Project/index.php");
}
if (isset($_POST['ADD'])) {
        addUser();
    }
if(isset($_POST['signOut'])){
    signout();
}
function addUser() {
    if(isset($_POST['username'])&&!empty($_POST['username'])&&isset($_POST['password'])&&!empty($_POST['password'])){
include 'Mysql_connect.php';
        $username=$_POST['username'];
        $id=$_POST['id'];
        $password=$_POST['password'];
        $sql = "insert into user values(".$id.",'".$username."','".md5($password)." ',' ' ,' ',0,' ')";
        $result = $conn->query($sql);
        echo '<script language="javascript">';
		echo 'alert("User added")';
		echo '</script>';
    }
}
function signout() {
	session_unset();
	// destroy the session
	session_destroy();
	header("Location: /Project/index.php");
}
?>

<html>
<body>
<form method="POST" action="addUser.php">
id:- <input type="number" name="id">
<br>name:-<input type="text" name="username">
<br>password:-<input type="password" name="password">
<br><input type="submit" name="ADD" value="ADD">
    <br><br>
<input type="submit" name="signOut" value="Sign Out">
</form>
</body>
</html>
