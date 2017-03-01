<?php
session_start();
?>
<?php
if(empty($_SESSION["id"])){
	header("Location: /Project/index.php");
}
echo $_SESSION["id"]."   is setted at the time of login";
if (isset($_POST['signout'])) {
        signout();
    }
if (isset($_POST['updateEmail'])) {
        updateEmail();
    }
function signout() {
	session_unset(); 
	// destroy the session 
	session_destroy(); 
	header("Location: /Project/index.php");
}
function updateEmail(){
    include 'Mysql_connect.php';
        $emailId=$_POST['emailid'];
        $id=$_SESSION["id"];
        $sql = "update user set email='".$emailId."' where id=".$id;
        if($conn->query($sql)==true){
        echo '<script language="javascript">';
		echo 'alert("email id added")';
		echo '</script>';
        }
}
?>
<html>
<body>
<form action="signOut.php" method="POST">
Email :- <input type="email" name="emailid">
<input type="submit" value="Update Email" name="updateEmail">
    <br>
<input type="submit" value="Sign out" name="signout" > 
</form>
</body>
</html>