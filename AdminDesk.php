<?php
session_start();
if(empty($_SESSION["id"])||strlen($_SESSION["id"])!=1){
		header("Location: /Project/restrict.php");
	}
?>
<html>
<style>

body {
    font-family: "Lato", sans-serif;
}

th{background-color:steelblue;;
color:white;
font-size:25px;

}
tr{
	border-bottom: 1px solid steelblue;
}
tr:hover{
	background-color:lightgrey;

}
td{
	padding-left:100px;
}

table{
	border-collapse: collapse;
    border: 1px solid steelblue;
	width:50%;
	height:2%;
}
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav p {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}

.sidenav p:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
	text-decoration:none;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#sa1{
	margin-left:90px;
	margin-top:20px;
	border:none;
	color:white;
	background-color:steelblue;
	border-radius:40px;
	width:15%;
	height:5%;
	font-size:15px;
}
#main {
    transition: margin-left .5s;
    padding: 16px;
}
</style>
<script>
function f1(){

	document.getElementById('container').innerHTML=document.getElementById('addUser').innerHTML;
}function f2(){

	document.getElementById('container').innerHTML=document.getElementById('delUser').innerHTML;
}
function f3(){
	document.getElementById('container').innerHTML=document.getElementById('ChangePost').innerHTML;
	closeNav();
}
</script>
<body>

<div id="mySidenav" class="sidenav">
  <a   href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color:white;">&times;</a>
  <p>Admin</p>
  <p onclick="f1();closeNav()">Add User</p>
  <p  onclick="f2();closeNav()">Delete User</p>
  <p onclick="f3();closeNav()" >Change Post</p>
  <p><a  style="text-decoration:none; color:white;" href="profilePage.php">Profile</a></p>
  <p><a  style="text-decoration:none; color:white;" href=" /Project/doLogout.php"> Logout</a><p>

</div>

<span style="font-size:30px;cursor:pointer" id="main" onclick="openClose()">&#9776;Admin
</span>
<span>
  <div style="margin-left:18%;padding:50px 16px;height:1000px;" id="container">
	This is a conatianer
	</div>
</span>
<div id="addUser" style="visibility:hidden;">
	<h1 style="margin-left:100px; font-family:Times New Roman;color:steelblue;"> Add User </h1>
	<form action="AdminDesk.php" method="post" >
		 Enter Employee Name <input type="text" name="empName" placeholder="Employee Name"  style="margin-left:10px;" required><br><br>
		 Enter Employee EmailID <input type="text" name="empEID" placeholder="Employee EmailID"  style="margin-left:10px;" required><br><br>
		 Designation:<select id="dest1" onchange="if (this.selectedIndex) changeDest(this);"  style="margin-left:100px;" required><br>
		<option value="">Select Designation</option>
		<option value="1">Admin</option>
		<option value="2">Manager</option>
		<option value="4">Team Leader</option>
		<option value="5">Developer</option>
		<input type="hidden" name="newDest" id="newDest" >
		<input type="hidden" name="newLength" id="newLength">
		</select><br><br>
		<input type="submit" id="sa1" name="ADD" value="Add User" >
		<input type="hidden" name="storedID" id="storedID">
	    <br><br>
	<input type="submit" name="signOut" value="Sign Out"  id="sa1">
	</form>
</div>
<div id="delUser" style="visibility:hidden;">

	<h1 style="margin-left:100px; font-family:Times New Roman;color:steelblue;">Delete User</h1>
	<form method="POST" action="AdminDesk.php">
	Employee ID:- <input type="number" name="idDEL" placeholder="ID" style="margin-left:27px;" required><br>
	<br>Enter Admin Password<input type="password" name="pw" placeholder="Password" style="margin-left:27px;" required>
	<br><input type="submit" name="DEL" value="DELETE" id="sa1">
	    <br><br>
	<input type="submit" name="signOut" value="Sign Out" id="sa1">
	</form>
</div>
<div id="ChangePost" style="visibility:hidden;">
	<form action="AdminDesk.php" method="post" >
			<h1 style="margin-left:100px; font-family:Times New Roman;color:steelblue;"> Change Designation </h1>
			 Enter Employee ID <input type="number" name="empID" placeholder="Employee ID"  style="margin-left:10px;" required>
			<input type="submit" name="fetchData" value="Fetch Data" style="margin-left:30px; background-color:steelblue;color:white;";></form>
		<table id="table1">
	<tr>
		<th colspan="2">Employee Details</th>
	</tr>
	</table>
	<br><br>
	<form action="AdminDesk.php" method="post" >
	Designation:<select id="dest" onchange="if (this.selectedIndex) changeDest(this);"  style="margin-left:100px;" required>
		<option value="">Select Designation</option>
		<option value="1">Admin</option>
		<option value="2">Manager</option>
		<option value="4">Team Leader</option>
		<option value="5">Developer</option>
		</select>
		<input type="hidden" name="newDest" id="newDest" >
		<input type="hidden" name="newLength" id="newLength">
		<div>
		<script>
		function changeDest(selTag){
			var e=document.getElementById('dest');
			document.getElementById('newLength').value=e.value;
			var x = selTag.options[selTag.selectedIndex].text;
			document.getElementById("newDest").value = x;
		}
		</script>

		<br>Enter Admin Password<input type="password" name="password" placeholder="Password" style="margin-left:27px;" required>
		</div>

		<input type="submit" id="sa1" name="changeSubmit" value="Change Designation" >
		<input type="hidden" name="storedID" id="storedID">
		</form>
		<script>
		function setId(id){
			document.getElementById("storedID").value = id;
		}
			function myFunction(name,value) {
				var table = document.getElementById("table1");
				var x = document.getElementById("table1").rows.length;
				var row = table.insertRow(x);
				var cell1 = row.insertCell(0);
				var cell2 = row.insertCell(1);
				cell1.innerHTML = name;
				cell2.innerHTML = value;
			}
			function show(){
				document.getElementById('container').innerHTML=document.getElementById('ChangePost').innerHTML;
			}
		</script>
		<?php
			$id=0;
			$name="";
			$number=0;
			$email="";
			$post="";
			if(isset($_POST['fetchData'])){
				include 'Mysql_connect.php';
				$sql = "select * from user where id=".$_POST['empID'];
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$id=$row['id'];
					$name=$row['Username'];
					$number=$row['number'];
					$email=$row['email'];
					$post=$row['post'];
					echo '<script type="text/javascript">',
				 'setId("'.$id.'");',
				 '</script>';
					echo '<script type="text/javascript">',
				 'myFunction("id","'.$id.'");',
				 '</script>';
				 echo '<script type="text/javascript">',
				 'myFunction("name","'.$name.'");',
				 '</script>';
				 echo '<script type="text/javascript">',
				 'myFunction("number","'.$number.'");',
				 '</script>';
				 echo '<script type="text/javascript">',
				 'myFunction("email","'.$email.'");',
				 '</script>';
				 echo '<script type="text/javascript">',
				 'myFunction("post","'.$post.'");',
				 '</script>';
				  echo '<script type="text/javascript">',
				 'show();',
				 '</script>';
				}else{
					echo '<script language="javascript">';
					echo 'alert("not able to employee with this id")';
					echo '</script>';
				}
			}
		?>

		<?php
		if(empty($_SESSION["id"])){
			header("Location: /Project/index.php");
		}
		if (isset($_POST['DEL'])) {
		        delUser();
		    }
		if(isset($_POST['signOut'])){
		    signout1();
		}
		function delUser() {
			include 'Mysql_connect.php';


			$id=$_POST['idDEL'];
			$sql = " delete from user where id=".$_POST['idDEL'];
			$result = $conn->query($sql);
			echo '<script language="javascript">';
	echo 'alert("User deleted")';
	echo '</script>';

	}
		function signout1() {
			session_unset();
			// destroy the session
			session_destroy();
			header("Location: /Project/index.php");
		}
		?>

		<!--Add User-->
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

			$id=0;
			$post="";
			$username=$_POST['empName'];
			$pass = bin2hex(openssl_random_pseudo_bytes(8));
			$eid = $_POST['empEID'];
			$type="";
			if(isset($_POST['ADD'])){
				include 'Mysql_connect.php';

				switch($_POST['newDest']){
					case "Admin":
						$type="admin";
						break;
					case "Manager":
						$type="manager";
						break;
					case "Team Leader":
						$type="TLeader";
						break;
					case "Developer":
						$type="developer";
						break;
				}
								$sql = "select * from user where post ='".$type."' order by id desc limit 1";

				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$id=$row['id'];
					$post=$row['post'];
					echo '<script type="text/javascript">',
				 'myFunction("id","'.$id.'");',
				 '</script>';
				 echo '<script type="text/javascript">',
				'myFunction("post","'.$post.'");',
				'</script>';
				}else{
					echo '<script language="javascript">';
					echo 'alert("not able to employee with this id")';
					echo '</script>';
				}
			}
		include 'Mysql_connect.php';
						++$id;
		        $sql = "insert into user values(".$id.",'".$_POST['empName']."','".md5($password)."','".$_POST['empEID']."' ,'".$type."',0,'')";
						echo $sql;
		        $result = $conn->query($sql);
		        echo '<script language="javascript">';
				echo 'alert("User added")';
				echo '</script>';

				require_once "PHPMailer_5.2.4/class.phpmailer.php";
				$msg="congratulations,<br> your account is activited <br>New Employee Id assigned to you is:- ".$id."<br>Password".$pass."";
				$mail = new PHPMailer(); // create a new object
				$mail->IsSMTP(); // enable SMTP
				$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = true; // authentication enabled
				$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 465; // or 587
				$mail->IsHTML(true);
				$mail->Username = "avsdev847@gmail.com";
				$mail->Password = "avsdev847@tempEmail";
				$mail->SetFrom("avsdev847@gmail.com");
				$mail->Subject = "Designation Changed";
				$mail->Body =$msg;
				$mail->AddAddress($_POST['empEID']);
		}
		function signout() {
			session_unset();
			// destroy the session
			session_destroy();
			header("Location: /Project/index.php");
		}
		?>
		<?php
		if(isset($_POST['changeSubmit'])){
			include 'Mysql_connect.php';
			$sql = "select email from user where id=".$_POST["storedID"];
			$result = $conn->query($sql);
			$sendToEmail="";
			$row=$result->fetch_assoc();
			$sendToEmail=$row['email'];
			if(!empty($sendToEmail)){

				$sql = "select * from user where password='".md5($_POST['password'])."' and LENGTH(id)=1 and id=".$_SESSION["id"];
				$result = $conn->query($sql);
				if($result->num_rows>0){
					$sql = "select id from user where LENGTH(id)=".$_POST['newLength']." order by id desc";
					$result = $conn->query($sql);
					if($result->num_rows>0){
						$row=$result->fetch_assoc();
					}
					$num=$row['id'];
					$num=$num+1;
					$type="uk";
					switch($_POST['newDest']){
						case "Admin":
							$type="admin";
							break;
						case "Manager":
							$type="manager";
							break;
						case "Team Leader":
							$type="TLeader";
							break;
						case "Developer":
							$type="developer";
							break;
					}

					require_once "PHPMailer_5.2.4/class.phpmailer.php";
					$msg="congratulations,<br> your designation is changed to ".$type.".<br>New Employee Id assigned to you is:- ".$num."<br> Please try login now with new id and old password";
					$mail = new PHPMailer(); // create a new object
					$mail->IsSMTP(); // enable SMTP
					$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
					$mail->SMTPAuth = true; // authentication enabled
					$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
					$mail->Host = "smtp.gmail.com";
					$mail->Port = 465; // or 587
					$mail->IsHTML(true);
					$mail->Username = "avsdev847@gmail.com";
					$mail->Password = "avsdev847@tempEmail";
					$mail->SetFrom("avsdev847@gmail.com");
					$mail->Subject = "Designation Changed";
					$mail->Body =$msg;
					$mail->AddAddress($sendToEmail);

					if($mail->Send()) {
						$sql="update user set id=".$num." , post='".$type."' where id=".$_POST['storedID'];
						echo $sql;
						$result = $conn->query($sql);

						echo '<script language="javascript">';
						echo 'alert("new employee id send through email.")';
						echo '</script>';
					}else{
						echo '<script language="javascript">';
						echo 'alert("not able to send the mail")';
						echo '</script>';
					}
				}
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("no Email id found for this user.\n can not perform given operation \n 0 row affected\n Note:- update Email id for this user and try again.")';
				echo '</script>';
			}

		}
		?>
</div>

<script>
var i=0;
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
function openClose(){
	if(i==0){
		document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	i=1;
	}else{
		document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
	i=0;
	}
}
</script>



</body>
</html>
