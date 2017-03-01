<?php
session_start();
?>
<?php
			$image="images/".$_SESSION["id"].".jpg";
			if (file_exists($image)) {
				
			}else{
				$image="images/".$_SESSION["id"].".png";
				if (file_exists($image)) {
					
				}else{
					$image="images/".$_SESSION["id"].".jpeg";
					if (file_exists($image)) {
						
					}else{
						$image="images/avatar.png";
					}
				}
			}
			if(isset($_POST['uploadSubmit'])){
				$image_name=$_FILES['fileToUpload']['name'];
				$image_type=$_FILES['fileToUpload']['type'];
				$image_size=$_FILES['fileToUpload']['size'];
				$image_tmp_name=$_FILES['fileToUpload']['tmp_name'];
				$ext = end((explode(".", $image_name)));
				if($image_name==' '){
					echo '<script language="javascript">';
					echo 'alert("no File selected")';
					echo '</script>';
					exit();
				}else{
					if($ext != "jpg" && $ext != "png" && $ext != "jpeg" ){
								echo '<script language="javascript">';
								echo 'alert("file must be .jpg .jpeg .png only")';
								echo '</script>';
					}
					else{
						if ($image_size > 500000) {
								echo '<script language="javascript">';
								echo 'alert("Sorry, your file is too large.")';
								echo '</script>';
						}else{
							$image="images/".$_SESSION["id"].".jpg";
							if (file_exists($image)) {
								unlink($image);
							}
							$image="images/".$_SESSION["id"].".png";
							if (file_exists($image)) {
								unlink($image);
							}
							$image="images/".$_SESSION["id"].".jpeg";
							if (file_exists($image)) {
								unlink($image);
							}
							move_uploaded_file($image_tmp_name,"images/".$_SESSION["id"].".".$ext);
							$image="images/".$_SESSION["id"].".".$ext;
								echo '<script language="javascript">';
								echo 'alert("avatar updated")';
								echo '</script>';
						}
					}
				}
			}
		?>
<?php
if(empty($_SESSION["id"])){
	header("Location: /Project/restrict.php");
}
if(isset($_POST['submit'])){
addUser();
}
function addUser() {
    if(isset($_POST['username'])&&!empty($_POST['username'])){
		include 'Mysql_connect.php';
        $sql = "update user set Username='".$_POST['username']."',language='".$_POST['lang']."',number=".$_POST['pnumber'].",email='".$_POST['email']."' where id = ".$_SESSION['id'];
		$result = $conn->query($sql);
        echo '<script language="javascript">';
		echo 'alert("User updated")';
		echo '</script>';
    }
}
		include 'Mysql_connect.php';
        $username="";
        $post="";
        $no=0;
        $id="";
        $lang="";
        $email="";

        $sql = "select * from user where id=".$_SESSION['id'];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $username=$row['Username'];
		  $post=$row['post'];
          $no=$row['number'];
          $id=$row['id'];
          $lang=$row['language'];
          $email=$row['email'];
        }


?>

<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">

  <link rel="shortcut icon" href="http://designshack.net/favicon.ico">
  <link rel="icon" href="http://designshack.net/favicon.ico">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>
<style>

table{
	border-collapse: collapse;
    border: 1px solid steelblue;
	width:80%;
	height:20%;
}
th{background-color:steelblue;
align:center;
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
	width:40%;
}
span{
	font-size:20px;
	color:black;
	text-shadow: 0 1px 0 #38678f;
	border-left: 6px solid steelblue;
	
}
</style>
<body>

  <div id="w">
    <div id="content" class="clearfix">
      <div id="userphoto"><img src="<?php echo $image ?>" alt="default avatar" width="150" height="150"></div>
      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#activity">Projects</a></li>
          <li><a href="#settings">Settings</a></li>
		  <li><a href="#password">Manage Password</a></li>
		  <li><a href="#avtar">Change Avatar</a></li>
        </ul>
      </nav>

	 <section id="password" class="hidden">
	<?php 
		if(isset($_POST['changeSubmit'])){
			include 'Mysql_connect.php';
			$emp_id=$_SESSION['id'];
			$sql = "select password from user where id=".$_SESSION["id"] ." and password ='".md5($_POST['oldPass'])."'";
			$result = $conn->query($sql);
			echo $sql;
			if ($result->num_rows> 0) {
					if(!empty($_POST['newPass'])){
						if($_POST['newPass']==$_POST['reNewPass']){
							$sql = "update user set password='".md5($_POST['newPass'])."' where id=".$_SESSION["id"];
							if($conn->query($sql)){
								echo '<script language="javascript">';
								echo 'alert("password updated")';
								echo '</script>';
								
							}else{
								echo '<script language="javascript">';
								echo 'alert("password not updated")';
								echo '</script>';
							}	
						}else{
								echo '<script language="javascript">';
								echo 'alert("new password not same")';
								echo '</script>';
						}
					}else{
								echo '<script language="javascript">';
								echo 'alert("new password empty")';
								echo '</script>';
					}
				}
			else{
				echo '<script language="javascript">';
				echo 'alert("old password not same")';
				echo '</script>';
				
			}
			//select password
		}
	?>
	 <form action="profilePage.php" method="post">
	 
		<p>Enter old password <input type="password" name="oldPass" style="margin-left:29px;"><p>
		 <p>Enter New password <input type="password" name="newPass" style="margin-left:22px;"><p>
		 <p>Re-Enter New password:<input type="password" name="reNewPass"><p>
		 <p><input type="submit" name="changeSubmit" value="Change Password" style="margin-left:100px; border-radius:5px; height:25%; width:25%;"><p>
	</form>
	</section>
	<section id="avtar" class="hidden">
		
		<form action="profilePage.php" method="post" enctype="multipart/form-data">
		<h1>Select an Image</h1><input type="file" name="fileToUpload" id="fileToUpload"><br>
		<input type="submit" value="Upload Image" name="uploadSubmit" >
		</form>
	</section>
      <section id="activity" class="hidden">
		<?php
			switch(strlen($_SESSION["id"])){
			case 1:
				echo "<h1> Admin </h1>";
				echo '<script type="text/javascript">',
				'var i=1;',
				'</script>';
                break;
			case 2:
				echo "<h1> Manager:- </h1>";
				echo '<script type="text/javascript">',
				'var i=0;',
				'</script>';
                break;
            case 4:
				echo "<h1> Tead Lead:- </h1>";
				echo '<script type="text/javascript">',
				'var i=0;',
				'</script>';
                break;
            case 5:
				echo "<h1> Developer:- </h1>";
				echo '<script type="text/javascript">',
				'var i=0;',
				'</script>';
                break;
            
			}
		?>
		<table id="AllProjects" style="height:100%; width:70%;">
		<tr>
		<th height="10gmail0%" id='dis'>Project Name</th>
		<th>Module Name</th>
		</tr>
		<script>
		if(i==1){
			 function dis(){
			 document.getElementById("AllProjects").style.display="none";
			 }
			 dis();
		}
		function addOneProject(ProName,ModName) {
			var table = document.getElementById("AllProjects");
			var x = document.getElementById("AllProjects").rows.length;
			var row = table.insertRow(x);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			cell1.innerHTML = ProName;
			cell2.innerHTML = ModName;
		}
	</script>
	</table>
        <?php
			function developer(){
			
				include 'Mysql_connect.php';
				$emp_id=$_SESSION['id'];
				$sql = "select t1.project_name , t2.module_name,t2.emp_list from projectall t1,project_instance t2 where t1.pid=t2.pid and t2.emp_list in (select emp_list from employee_list where emp_id=".$emp_id.")";
				$result = $conn->query($sql);
				$proName=""; 
				$ModName="";
				if ($result->num_rows> 0) {
					while($row = $result->fetch_assoc()) {
					$proName=$row['project_name'];
					$ModName=$row['module_name'];
					echo '<script type="text/javascript">',
					 'addOneProject("'.$proName.'","'.$ModName.'");',
					 '</script>';
					}
				} else {
					echo "0 results";
				}
				$conn->close();
			}
			function teadL(){
				include 'Mysql_connect.php';
				$emp_id=$_SESSION['id'];
				$sql = "select t1.project_name , t2.module_name from projectall t1,project_instance t2 where t1.pid=t2.pid and t2.leaderID =".$emp_id;
				$result = $conn->query($sql);
				$proName=""; 
				$ModName="";
				if ($result->num_rows> 0) {
					while($row = $result->fetch_assoc()) {
					$proName=$row['project_name'];
					$ModName=$row['module_name'];
					echo '<script type="text/javascript">',
					 'addOneProject("'.$proName.'","'.$ModName.'");',
					 '</script>';
					}
				} else {
					echo "0 results";
				}
				$conn->close();
			}
			function mamager(){
				include 'Mysql_connect.php';
				//echo "<h2> Project Name </h2>";
				$emp_id=$_SESSION['id'];
				$sql = "select project_name from projectall where managerID=".$emp_id;
				$result = $conn->query($sql);
				$proName=""; 
				$ModName="";
				if ($result->num_rows> 0) {
					while($row = $result->fetch_assoc()) {
					$proName=$row['project_name'];
					//echo "<h2>".$proName."</h2>"; AllProjects h2
					echo '<script type="text/javascript">',
					 'addOneProject("'.$proName.'","&nbsp");',
					 '</script>';
					}
				} else {
					echo "0 results";
				}
				$conn->close();
			}
			function admin(){
				include 'Mysql_connect.php';
				echo "<div style='float:left;'>";
				echo "<h2 style='background-color:steelblue;color:white;'>Roles</h2>";
				echo "<h2 style=''>Add User</h2>";
				echo "<h2 style=''>Change Post</h2>";
				echo "<h2 style=''>Delete User</h2><br>";
				echo "</div>";
				
			}
			switch(strlen($_SESSION["id"])){
			case 1:
				admin();
                break;
			case 2:
				mamager();
                break;
            case 4:
				teadL();
                break;
            case 5:
				developer();
                break;
            
			}
		?>
      </section>
      <form action="profilePage.php" method="post">
      <section id="settings" class="hidden">
        <p>Edit your user settings:</p>

        <p class="setting">Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" value="<?php echo $username;?>"></p>

        <p class="setting">Employee ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="id" value="<?php echo $id;?>" onkeydown="Check(event);"></p>

        <p class="setting">Designation:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="post" value="<?php echo $post;?>" onkeydown="Check(event);"></p>

        <p class="setting">Language:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lang" value="<?php echo $lang;?>"></p>

        <p class="setting">Phone Number:&nbsp;&nbsp;<input type="text" name="pnumber" value="<?php echo $no;?>"></p>

        <p class="setting">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" value="<?php echo $email;?>"></p>

        <center><input type="submit" name="submit" value="Update"></center>
      </section>
	  <script>
		function Check(e) {
			var keyCode = (e.keyCode ? e.keyCode : e.which);		
				e.preventDefault();
		}
		</script>
      </form>
    </div>
  </div>
<h1><a href="index.php">Back to Main Page</a></h1>
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');

    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');

    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });

    $(newcontent).removeClass('hidden');
  });
});
</script>
</body>
</html>
