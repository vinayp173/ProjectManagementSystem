<?php session_start();
	if(empty($_SESSION["id"])||strlen($_SESSION["id"])!=5){
		header("Location: /Project/restrict.php");
	}
?>
<?php
	if(isset($_POST['submit'])){
		foreach($_POST['chk'] as $selected){
			$_SESSION["emp_list"]=$selected;
		}
		$_SESSION["emp_list"] = filter_var($_SESSION["emp_list"], FILTER_SANITIZE_NUMBER_INT);
		echo '<script language="javascript">';
		echo 'alert("emp_list '.$_SESSION["emp_list"].'")';
		echo '</script>';
		header("Location: /Project/EmployeeDesk.php");
	}
	function displayAllData(){
		
		include 'Mysql_connect.php';
		$emp_id=$_SESSION["id"];
		$sql = "select t1.project_name , t2.module_name,t2.emp_list from projectall t1,project_instance t2 where t1.pid=t2.pid and t2.emp_list in (select emp_list from employee_list where emp_id=".$emp_id.")";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<table>";
			echo "<tr>";
			echo "<th> Check </th>";
			echo "<th> Project Name </th>";
			echo "<th> Module Name </th>";
			echo "</tr>";
			$flag=true;
			while($row = $result->fetch_assoc()) {
				if($flag==false){
					echo "<tr><td align='center' ><input type='radio' name='chk[]' value='".$row["emp_list"]." onmouseover='></td>";
				}else{
					echo "<tr><td align='center'><input type='radio' name='chk[]' value='".$row["emp_list"]."' checked></td>";
					$flag=false;
				}
				echo "<td align='center'>".$row["project_name"]."</td><td align='center'>".$row["module_name"]."</td></tr>";
			}
			echo "</table>";
		}
	}

?>
<html>
<head>
<style>
div{
	position:static;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	border-radius: 5px;
}

/*td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}*/
th{
  background: steelblue;
  height: 54px;
  width: 25%;
  font-weight: lighter;
  text-shadow: 0 1px 0 #38678f;
  color: white;
  border: 1px solid #38678f;
  box-shadow: inset 0px 1px 2px #568ebd;
  transition: all 0.2s;
}
td{
	align:right;
	height: 54px;
  width: 25%;
  font-weight: lighter;
  text-shadow: 0 1px 0 #38678f;
  color:black;
  border: 1px solid #38678f;
  box-shadow: inset 0px 1px 2px #568ebd;
  transition: all 0.2s;
	
}

tr:hover{
    background-color: #dddddd;
}
input[type='submit']{
	margin-top:20px;
	position:relative;
	border: none;
	color:white;
	background-color:steelblue;
	/*margin-left:430px;*/
	border-radius:40px;
	width:13%;
	height:8%;
}
/*input[type='submit']:hover{
	width:13%;
	height:8%;
	font-size:25;
	transition: all 0.6s;
}*/

</style>
</head>
<body>
	
	<div>
	<form action="selectorWindow.php" method="post">
		<?php displayAllData(); ?>
		<div align="center">
		<input type="submit" name="submit" value="Submit"></div>
	</form>
	</div>
</body>
</html>