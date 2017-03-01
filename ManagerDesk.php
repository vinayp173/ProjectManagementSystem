<?php
// Start the session
session_start();
?>
<?php 
	if(empty($_SESSION["id"])||strlen($_SESSION["id"])!=2){
		header("Location: /Project/restrict.php");
	}
	function displayProjectName(){
		include 'Mysql_connect.php';
		/*$emp_list=$_SESSION["emp_list"];
		$sql = "select t1.project_name from projectall t1,project_instance t2 where t1.pid=t2.pid and t2.emp_list=".$emp_list."";
		//$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo $row["project_name"];
		}*/
		echo "try";
	}
?>
	
<html>
<head>
<link href="css/styleManager.css" rel="stylesheet" type="text/css" media="all"/>
<script>
function f1(){
	document.getElementById("d1").style.backgroundColor="";
	document.getElementById("l3").style.backgroundColor="";
	document.getElementById("l1").style.backgroundColor="red";
	document.getElementById('container').innerHTML=document.getElementById('showProjects').innerHTML;
}function f3(){
	document.getElementById("d1").style.backgroundColor="";
	document.getElementById("l1").style.backgroundColor="";
	document.getElementById("l3").style.backgroundColor="red";
	document.getElementById('container').innerHTML=document.getElementById('addProject').innerHTML;
}
function f2(){
	document.getElementById("d1").style.backgroundColor="red";
	document.getElementById("l1").style.backgroundColor="";
	document.getElementById("l3").style.backgroundColor="";
	document.getElementById('container').innerHTML=document.getElementById('display').innerHTML;
}

</script>
<!--<style>
div.main{
	width:80%;
	
}
span{
	font-size:20px;
	color:black;
	text-shadow: 0 1px 0 #38678f;
	border-left: 6px solid steelblue;
	
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
span:hover{
	border-left:6px solid red;
}
input[type='checkbox']{
	margin-bottom:10px;
}
table{
	border-collapse: collapse;
    border: 1px solid steelblue;
	width:80%;
	height:20%;
}
input[type='submit']{
	margin-top:20px;
}
h1,h3,h2{
	color: white;
}
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 15%;
    background-color: #0d0d0d;
    position: fixed;
    height: 100%;
    overflow: auto;
}

li a{
	cursor: pointer;
    display: block;
	color: white;
    padding: 8px 16px;
    text-decoration: none;
}


li a:hover:not(.active) {
    background-color: #555;
	text-color: #f1f1f1;
    color: white;
}
li a.selected {
 background-color:red;
}
input[type='submit']{
	margin-top:20px;
	border:none;
	color:white;
	background-color:steelblue;
	border-radius:40px;
	width:15%;
	height:5%;
	font-size:15px;
}
</style>-->
<style>

table{
	border-collapse: collapse;
    border: 1px solid steelblue;
	width:80%;
	height:5%;
}
th{
	background-color:steelblue;
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
	padding-left:150px;
}
body {
    font-family: "Lato", sans-serif;
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
    color: white;
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
.sa1{
	padding-left:10px;
	color:white;
}
 a:hover{
	color:white;}
	#main {
    transition: margin-left .5s;
    padding: 16px;
}

<!--#addP{
  padding: 10px;
  border: none;
  border-bottom: solid 2px #c9c9c9;
  transition: border 0.3s;	
}create
#addP:focus{
	padding: 10px;
	 border: none;
border-bottom: solid 2px steelblue;}-->
</style>
</head>
<body style="background-color:white;">
<div id="mySidenav" class="sidenav">
  <a   href="javascript:void(0)" class="closebtn" style="color:white;"onclick="closeNav()">&times;</a>
  <p>Manager</p>
  <p id="l3" onclick="f3();closeNav()">Add Project</p>
  <p id="l1" onclick="f1();closeNav()">Edit Project</p>
  <p  id="d1" onclick="f2();closeNav()">Display Progress</p>
  <p><a href="profilePage.php" style="text-decoration:none; color:white;">Profile</a></p>
  <p><a  style="text-decoration:none; color:white;" href=" /Project/doLogout.php"> Logout</a><p>
  
  
  
  
</div>
<div id="main">
<span style="font-size:30px;cursor:pointer" onclick="openClose()">&#9776;Manager</span>
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
<!--<ul><center>
  <li><h2><p>Manager</p></h2></li></center>
  <br>
   <li id="l3" onclick="f3()"><a>Add Project</a></li>
  <br>
   <li id="l1" onclick="f1()"><a>Edit Project</a></li>
  <br>
  <li id="d1" onclick="f2()"><a>Display</a></li>
  <hr>
  $nbsp;<font color="white">Accounts</font>
  <br>
  <br>
  <li id="d2"><a href=" /Project/doLogout.php"> Logout</a></li>
</ul>-->
<div style="margin-left:18%;padding:50px 16px;height:1000px;" id="container">
</div>
<div id="list" style="visibility:hidden; margine-top:-1;">
<br>
	
	Project Name:<p style="display:inline; font-weight:bold;"id="ProName">display name</p>
	<br>
	Project ID:<p style="display:inline; font-weight:bold"id="ProSrno">display srno</p>
	<table id="myTable">
	<tr>
		<th>Module Name</th>
		<th>Team Leader Id</th>
		<th>Team Leader Name</th>
	</tr>
	
	
	<?php 
		include 'Mysql_connect.php';
		$sql = "select module_name,leaderID,D.Username from project_instance,user D where pid=".$_SESSION['srno']." and D.id=leaderID";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				echo "<tr><td>";
				echo $row['module_name']."</td><td>".$row['leaderID']."</td><td>".$row['Username']."</td></tr>";
			}
		}
		
	?>
	</table>
	<form id="addModule" method="POST" action="ManagerDesk.php">
	<table  style="margin-left:30px;" class="sa">
	<tr class="sa"><td>Module Name:</td><td><input type="text" name="Mname"></td></tr>
	
	<tr class="sa"><td><select id="tlID" onchange="if (this.selectedIndex) changeName(this);">
	<option value="">Select leader</option>
	<?php
		include 'Mysql_connect.php';
		$sql = "select id,Username from user where post='TLeader'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				echo '<option value="'.$row['Username'].'">'.$row['id'].'</option>';
			}
		}
	?>
	</select></td></tr><br>
	<tr class="sa"><td>Team Leader Name:&nbsp;</td><td><input type="text" name="leaderName" id="leaderName" onkeydown="Check(event);"></td></tr>
	<tr class="sa"><td>Team Leader Id:&nbsp;</td><td><input type="text" name="leaderID" id="leaderID" onkeydown="Check(event);" ></td></tr>
	<script>
		function Check(e) {
			var keyCode = (e.keyCode ? e.keyCode : e.which);		
				e.preventDefault();
		}
	function changeName(selTag){
		var e=document.getElementById('tlID');
		document.getElementById('leaderName').value=e.value;
		var x = selTag.options[selTag.selectedIndex].text;
		document.getElementById("leaderID").value = x;
	}
	//select
	</script>
	<tr class="sa"><td>Start Date</td><td><input type="date" name="startDate" value="2016-10-2" /></td></tr>
	<tr class="sa"><td>End Date</td><td><input type="date" name="endDate" value="2016-10-2" /></td></tr></table>
	<br> <div class="sa" align="center"> <input  type="submit" name="submit" value="add module" ></div>
	</form>
	<script>
		function myFunction(Mname,Lname,Lid,proName,proId) {
			var table = document.getElementById("myTable");
			var x = document.getElementById("myTable").rows.length;
			var row = table.insertRow(x);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			cell1.innerHTML = Mname;
			cell2.innerHTML = Lid;
			cell3.innerHTML = Lname;
			render(proName,proId);
		}
		function render(proName,proId){
			document.getElementById('container').innerHTML=document.getElementById('list').innerHTML;
			document.getElementById('ProName').innerHTML=proName;
			document.getElementById('ProSrno').innerHTML=proId;
		}
	</script>
	
	<?php
		if(isset($_POST['submit'])){
			if(empty($_POST['Mname'])&&empty($_POST['Lname'])&&empty($_POST['leaderID'])&&empty($_POST['leaderName'])){
				echo '<script type="text/javascript">',
				 'alert("please fill details first");',
				 'render("'.$_SESSION['project_name'].'","'.$_SESSION['srno'].'");',
				 '</script>';
			}else{
				include 'Mysql_connect.php';
				$sql = "select emp_list from project_instance order by emp_list desc";
				$result=$conn->query($sql);
				if($result->num_rows>0){
					$row=$result->fetch_assoc();
				}
				$num=$row['emp_list'];
				$num=$num+1;
				$sql = "insert into project_instance values(".$_SESSION['srno'].",'".$_POST['Mname']."',".$num.",".$_POST['leaderID'].",'".$_POST['startDate']."','".$_POST['endDate']."') ";
				$conn->query($sql);
				echo '<script type="text/javascript">',
				 'myFunction("'.$_POST['Mname'].'","'.$_POST['leaderName'].'","'.$_POST['leaderID'].'","'.$_SESSION['project_name'].'","'.$_SESSION['srno'].'");',
				 '</script>';
			}
		}
	?>
</div>
<div id="showProjects" style="visibility:hidden;">
	<form action='ManagerDesk.php' method='post' id='myform'>
	<table id="project">
	<tr>
		<th class="sa1">Select</th>
		<th class="sa1">Project Name</th>
	</tr>
	<script>
		function addOneProject(srno,name) {
			var table = document.getElementById("project");
			var x = document.getElementById("project").rows.length;
			var row = table.insertRow(x);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var checkbox = document.createElement('input');
			checkbox.type = "radio";
			checkbox.name = "srno";
			checkbox.value = srno;
			checkbox.id = "srno";
			cell1.appendChild(checkbox);
			cell2.innerHTML = name;
		}
		function loadSelectedPro(name,srno){
			document.getElementById('ProName').innerHTML=name;
			document.getElementById('ProSrno').innerHTML=srno;
			document.getElementById('container').innerHTML=document.getElementById('list').innerHTML;
		}
	</script>
	</table>
	<?php showProjectAll();?>
	<div class="sa"><button   id="select" name="select"  >select Project</button></div>
	</form>
	
	<?php
	function showProjectAll(){
		include 'Mysql_connect.php';
		$sql = "select * from projectall";
		$result = $conn->query($sql);
		$srno="";
		$name="";
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
			$srno=$row['pid'];
			$name=$row['project_name'];
			echo '<script type="text/javascript">',
			 'addOneProject("'.$srno.'","'.$name.'");',
			 '</script>';
		    }
		} else {
		    echo "0 results";
		}
		$conn->close();
	}
	if(isset($_POST['select'])){
		include 'Mysql_connect.php';
		$sql = "select * from projectall where pid=".$_POST['srno'];
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$_SESSION["srno"] = $row['pid'];
		$_SESSION['project_name']=$row['project_name'];
		echo '<script type="text/javascript">',
			 'loadSelectedPro("'.$row['project_name'].'","'.$row['pid'].'");',
			 '</script>';
	}
	?>
</div>
<div id="addProject" style="visibility:hidden;">
	<form action='ManagerDesk.php' method='post' id='myform'>
	<!--Project name :<input type="text" name="projectName">
	<button id="insert" name="insert"  >add Project</button>-->
	<div class="element">
	<div class="element-main">
		<h1>Create Project</h1>
		<center>
			<input type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Project Name';}" name="projectName" placeholder="Project Name">
			Start Date<br><input type="date" name="startDate" value="2016-10-2" style="font-size: 1em;
    color: #404040;
	margin-top:10px;
    padding: 1em 0.5em;
    display: block;
    width: 95%;
	height: 34px;
    outline: 5px solid #eff4f7;
    margin-bottom: 1em;
    text-align:center;
    border: 1px solid #B9B9B9;
	border-color: #c4c4c4 #d1d1d1 #d4d4d4;
	border-radius: 2px;
			" />
			End Date<input type="date" name="endDate" value="2016-10-2" style="font-size: 1em;
    color: #404040;
	margin-top:10px;
    padding: 1em 0.5em;
    display: block;
    width: 95%;
	height: 34px;
    outline: 5px solid #eff4f7;
    margin-bottom: 1em;
    text-align:center;
    border: 1px solid #B9B9B9;
	border-color: #c4c4c4 #d1d1d1 #d4d4d4;
	border-radius: 2px;
			"/>
			<input type="submit" name="insert" Value="Add Project" > 
		</center>
	</div>
</div>
	</form>
	<!--<script>
function myFunction() {
    location.reload();
}
</script>-->

	<script>
	    function addProjectFunc(name,num) {
			document.getElementById('ProName').innerHTML=name;
			document.getElementById('ProSrno').innerHTML=num;
			document.getElementById('container').innerHTML=document.getElementById('list').innerHTML;
			//myFunction();
		}
	</script>
	<?php
	if(isset($_POST['insert'])){
		include 'Mysql_connect.php';
		$projectname=$_POST['projectName'];
		$sql = "select pid from projectall ORDER BY pid DESC";
		$result = $conn->query($sql);
		if($result->num_rows>0){
			$row=$result->fetch_assoc();
		}
		$num=$row['pid'];
		$num=$num+1;
		$sql = "insert into projectall values(".$num.",'".$projectname."','".$_SESSION[id]."','".$_POST['startDate']."','".$_POST['endDate']."')";
		$_SESSION['srno']=$num;
		$_SESSION['project_name']=$projectname;
		$result = $conn->query($sql);
		echo '<script type="text/javascript">',
			 'addProjectFunc("'.$projectname.'",'.$num.');',
			 '</script>';
	}
	?>
</div>

<div id="display" style="visibility:hidden;">display progress
 
<div id="chart_div"></div>
<?php
	
		include 'Mysql_connect.php';
		$emp_id=$_SESSION["id"];
		$sql = "SELECT * FROM projectall where managerID=".$emp_id;
		$result = $conn->query($sql);
		$str="";
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				list($year, $month, $date) = explode("-", $row['startDate']);
				$startdate="new Date(".$year.",".$month.",".$date.")";
				list($year, $month, $date) = explode("-", $row['endDate']);
				$enddate="new Date(".$year.",".$month.",".$date.")";
				$str=$str."['".$row['pid']."','".$row['project_name']."',null,".$startdate.",".$enddate.",null,45,null],";
				
			}
			$str=substr($str, 0, -1);
		}
	?>	
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>	 
<script type="text/javascript">
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart(str) {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Task ID');
      data.addColumn('string', 'Task Name');
      data.addColumn('string', 'Resource');
      data.addColumn('date', 'Start Date');
      data.addColumn('date', 'End Date');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');
	  var arr=eval("["+<?php echo "\"".$str."\""; ?>+"]");
	  data.addRows(arr);
		
      var options = {
        height: 400,
        gantt: {
          trackHeight: 30
        }
      };

      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>
 


</div>

</body>
</html>
