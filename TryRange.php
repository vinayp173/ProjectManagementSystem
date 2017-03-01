<?php
// Start the session
session_start();
?>
<html>
<head>
<style>
	input[type=range] {
	  -webkit-appearance: none;
	  margin: 10px 0;
	  width: 50%;
	}
	input[type=range]:focus {
	  outline: none;
	}
	input[type=range]::-webkit-slider-runnable-track {
	  width: 100%;
	  height: 10px;
	  cursor: pointer;
	  animate: 0.2s;
	  box-shadow: 1px 1px 1px #000000;
	  background: #3071A9;
	  border-radius: 5px;
	  border: 1px solid #000000;
	}
	input[type=range]::-webkit-slider-thumb {
	  box-shadow: 1px 1px 1px #000000;
	  border: 1px solid #000000;
	  height: 30px;
	  width: 15px;
	  border-radius: 5px;
	  background: #FFFFFF;
	  cursor: pointer;
	  -webkit-appearance: none;
	  margin-top: -11px;
	}
	input[type=range]:focus::-webkit-slider-runnable-track {
	  background: #3071A9;
	}
	input[type=range]::-moz-range-track {
	  width: 100%;
	  height: 10px;
	  cursor: pointer;
	  animate: 0.2s;
	  box-shadow: 1px 1px 1px #000000;
	  background: #3071A9;
	  border-radius: 5px;
	  border: 1px solid #000000;
	}
	input[type=range]::-moz-range-thumb {
	  box-shadow: 1px 1px 1px #000000;
	  border: 1px solid #000000;
	  height: 30px;
	  width: 15px;
	  border-radius: 5px;
	  background: #FFFFFF;
	  cursor: pointer;
	}
	input[type=range]::-ms-track {
	  width: 100%;
	  height: 10px;
	  cursor: pointer;
	  animate: 0.2s;
	  background: transparent;
	  border-color: transparent;
	  color: transparent;
	}
	input[type=range]::-ms-fill-lower {
	  background: #3071A9;
	  border: 1px solid #000000;
	  border-radius: 10px;
	  box-shadow: 1px 1px 1px #000000;
	}
	input[type=range]::-ms-fill-upper {
	  background: #3071A9;
	  border: 1px solid #000000;
	  border-radius: 10px;
	  box-shadow: 1px 1px 1px #000000;
	}
	input[type=range]::-ms-thumb {
	  box-shadow: 1px 1px 1px #000000;
	  border: 1px solid #000000;
	  height: 30px;
	  width: 15px;
	  border-radius: 5px;
	  background: #FFFFFF;
	  cursor: pointer;
	}
	input[type=range]:focus::-ms-fill-lower {
	  background: #3071A9;
	}
	input[type=range]:focus::-ms-fill-upper {
	  background: #3071A9;
	}
</style>
</head>
<body>
<div id="SelectPer"> 
	<form action="TryRange.php" method="POST">
	<select id="tlID" onchange="if (this.selectedIndex) changeName(this);">
		<option value="">Select Task</option>
		<?php
			include 'Mysql_connect.php';
			$emp_list=10;
			$emp_id=12348;
			$sql = "SELECT * FROM emptask where emp_list=".$emp_list." and emp_id=".$emp_id."";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					echo '<option value="'.$row['task_id'].'">'.$row['task'].'</option>';
				}
			}
		?>
	</select>
		<input type="hidden" name="TID" id="TID">
		<input type="submit" name="submit" value="select">
		</form>
		<form action="TryRange.php" method="POST">
		Task id=> <input type="text" id="taskid" name="taskid">
		Task Name=> <input type="text" id="taskname" >
		<script>
		function changeName(selTag){
			var e=document.getElementById('tlID');
			document.getElementById('taskid').value=e.value;
			document.getElementById('TID').value=e.value ; 
			var x = selTag.options[selTag.selectedIndex].text;
			document.getElementById("taskname").value = x;
			}	
			function setId(id){
				document.getElementById("taskid").value = id;
			}
			function setName(name){
				document.getElementById("taskname").value = name;
			}
		</script>
		<?php
			$pro=50;
			if(isset($_POST['submit'])){
				include 'Mysql_connect.php';
				$sql = "SELECT * FROM emptask where task_id=".$_POST['TID'];
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
						$pro=$row['perComplete'];
						$id=$row['task_id'];
						$name=$row['task'];
						echo '<script type="text/javascript">',
						'setId("'.$id.'");',
						'</script>';
						echo '<script type="text/javascript">',
						'setName("'.$name.'");',
						'</script>';
					}
				}
			}
		?>
			<div id="valBox"  >
				<?php echo "current progress => ".$pro; ?><br>
				<span id="myspan"> New progress => 50 </span>
			</div>
			<input type="range" min="0" max="100" step="5" onchange="showVal(this.value)">
			<input type="hidden" name="newper" id="newper">
			<script>
			function showVal(newVal){
			  document.getElementById("myspan").innerHTML="New progress => "+newVal;
			  document.getElementById('newper').value=newVal ; 
			}
			</script>
			<input type="submit" name="save" value="save Progress">
		<?php
			
			if(isset($_POST['save'])){
					include 'Mysql_connect.php';
					$sql = "update emptask set perComplete=".$_POST['newper']." where task_id=".$_POST['taskid'];
					echo $sql;
					$result = $conn->query($sql);
				}
		?>
		</form>
</div>

</body>
</html>