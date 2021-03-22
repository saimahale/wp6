<!DOCTYPE html>
<html>
<head>
	<title>WP6</title>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
 
*{
 
  margin: 0;
 
  padding: 0;
 
  box-sizing: border-box;
 
  font-family: 'Poppins',sans-serif;
 
}
 
body{
 
  display: flex;
 
  justify-content: center;
 
  align-items: center;
 
  padding: 10px;
 
background: #fe8100; 
}
 
.container{
 
  max-width: 900px;
 
  width: 100%;
 
  background-color: #fff;
 
  padding: 25px 30px;
 
  border-radius: 5px;
 
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
 
}
.container .image{
	display: block; 
	position:relative; 
	left:350px; 
	border: red;
	margin-bottom:50px;
}
.container .image img{
width:150px; 
height: 150px; 
border:5px solid #ff8100;

}
.personal {
	padding-bottom:150px;
}
.eduction,.pitch{
	padding-bottom: 50px;
}
table tr td{
	padding: 5px 20px;
	text-align: left;
}
table tr td i{
	color: grey;
}
</style>
</head>
<body>
<?php
include "connection.php";
session_start();
$fname=$_SESSION['fname'];
$lname=$_SESSION['lname'];
$result = $conn->query("SELECT * FROM profile WHERE firstname='$fname' AND lastname='$lname'");
unset($_SESSION['fname']);
unset($_SESSION['fname']);
session_destroy();

if($result){
if($obj = $result->fetch_object()) {
	echo '<div class="container">
			<div class="image">
			<img src="./image/'.$obj->files.'"/>	
			</div>
			<div class="username" style="text-align:center; padding: 0px 100px;">
				<h1><b>'.$obj->firstname.' '.$obj->lastname.'</b></h1><br>';
				if ($obj->gender==='Male') {
				echo '<p align="center">Mr. '.$obj->firstname.' did his '.$obj->graduation.' in '.$obj->spec.' From '.$obj->college.' in the year '.$obj->gyear.'.He is highly skilled in '.$obj->preskill.'.He lives in '.$obj->city.' and can be contacted via '.$obj->email.'.</p>';
						
				}
				else{
				echo '<p align="center">Ms. '.$obj->firstname.' did her '.$obj->graduation.' in '.$obj->spec.' From '.$obj->college.' in the year '.$obj->gyear.'.She is highly skilled in '.$obj->preskill.'.She lives in '.$obj->city.' and can be contacted via '.$obj->email.'.</p>';
				}
				
		echo '<br><br>
			</div>
			<div class="personal">
			<h3><b>PERSONAL</b></h3>
			<div class="table" style="border-top: 1px solid black;"	>
				<br>
				<table style="float:left;">	
					<tr>
					
						<td><i>First Name:</i></td>
						<td>'.$obj->firstname.'</td>
					</tr>
	
					<tr>
						<td><i>Last Name:</i></td>
						<td>'.$obj->lastname.'</td>
					</tr>
	
					<tr>
						<td><i>Gender:</i></td>
						<td>'.$obj->gender.'</td>
					</tr>
	
				</table>
				<table style="float: right;">	
					<tr>
						<td><i>Email:</i></td>
						<td>'.$obj->email.'</td>
					</tr>
	
					<tr>
					
						<td><i>Phone:</i></td>
						<td>'.$obj->phone.'</td>
					</tr>
	
					<tr>
						<td><i>Live in:</i></td>
						<td>'.$obj->city.', '.$obj->state.'</td>
					</tr>
	
				</table>
			</div>
			</div>
	
			<div class="eduction">
			<h3><b>EDUCATION</b></h3>
			<div class="table" style="border-top: 1px solid black;"	>
				<br>
				<table>	
					<tr>
						<td><i>Graduation:</i></td>
						<td>'.$obj->graduation.'</td>
					</tr>
	
					<tr>
						<td><i>Pass Out:</i></td>
						<td>'.$obj->grade.'</td>
					</tr>
	
					<tr>
						<td><i>	College/Univ:</i></td>
						<td>'.$obj->college.'</td>
					</tr>
	
				</table>
			</div>
			</div>
			<div class="eduction">
			<h3><b>SKILLS</b></h3>
			<div class="table" style="border-top: 1px solid black;"	>
				<br>
				<table>	

					<tr>
						<td><i>Primary:</i></td>
						<td>'.$obj->preskill.'</td>
					</tr>
	
					<tr>
						<td><i>Secondary:</i></td>
						<td>'.$obj->secskill.'</td>
					</tr>
	
					<tr>
						<td><i>Certification:</i></td>
						<td>'.$obj->certificate.'</td>
					</tr>
	
				</table>
			</div>
			</div>
	
			<div class="pitch">
			<h3><b>PITCH</b></h3>
			<div class="table" style="border-top: 1px solid black;"	>
				<br>
				<p style="font-size:20px; font-weight:10px; text-align:center; padding:10px 50px;">"	'.$obj->pitch.'"</p>
			</div>
			</div>
	
			
		</div>';
			}
		}
mysqli_close($conn);	
?>
</body>
</html>