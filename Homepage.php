<!--/*Home Page
Navigation Bar with Logo , For Work,Login
	1.Image->Describing PMS
	2.Divide and work->Leader and Developer->select Project
	3.Work Progess->Flowcharts
	4.Assign Task
*/-->
<?php
	if(isset($_POST['start'])){
		header("Location: /Project/index.php");
	}
?>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: steelblue;
}

li {
    float: right;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #2e5cb8;
	height:4%;
}
li a:focus{
	background-color: #1f3d7a;
	height:4%;
}
.Logo_l{
	float:left;
}

/*.active {
    background-color: #4CAF50;
}*/
</style>
</head>
<body>

<ul>
  <li><a href="index.php">Login</a></li>
  <li><a href="Forwork.html">Work For</a></li>
  <li class='logo_l'><img src='HomePage Image/p_logo.ico' height:'17%' width='17%'></li>
</ul>
<br>
<div>
<img src='HomePage Image/m-1.jpg' width='100%' height=60%>
</div>
<br><br>
<div>
<p align='center' style='font-family:"Times New Roman", Times, serif;font-size:30;'>Selecting Project</p>
<p align='center' style='font-family:"Times New Roman", Times, serif;font-size:16;margin-top:-1;'>Manager can select the project from multiple projects</p>
<div align="center"><img src='HomePage Image/select window.png' height='25%' width='90%' ></div>
</div>
<!--Task Distribution And Team work-->
<div>
<p align='center' style='font-family:"Times New Roman", Times, serif;font-size:30;'>Task Distribution And Team work</p>
<div style="width:100%" align='center'>
  <img class="mySlides" src="HomePage Image/hp-4.jpg" style="width:80%;borber:solid red;" >
  <img class="mySlides" src="HomePage Image/hp-4-1.jpg" style="width:80%">
  <img class="mySlides" src="HomePage Image/hp-5.jpg" style="width:80%">
  <img class="mySlides" src="HomePage Image/hp-6.jpg" style="width:80%">
  <img class="mySlides" src="HomePage Image/hp-7.jpg" style="width:80%">
  <img class="mySlides" src="HomePage Image/team-1.png" style="width:80%">
</div>
</div>
<div>
<p align='center' style='font-family:"Times New Roman", Times, serif;font-size:30;'>Tasks and Achivements</p>
<p align='center' style='font-family:"Times New Roman", Times, serif;font-size:16';>Modules or Tasks assign to Developer and Leader completion Each They wil unlock the Achivements</p>
<div align='center'>
<img src='HomePage Image/progress-3.png' style='display:inline;' width=50%>
</div>
</div>
<div align='center'>
<form action="Homepage.php" method="post">
<button style='margin-top:20px;width:10%; height:10%;background-color:#ff4d4d' name="start" >Get Started</button>
</form>
</div>
</body>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>

</html>

