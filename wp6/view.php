<!DOCTYPE html>
<html>
<head>
	<title>WP6</title>
	<link rel="stylesheet" type="text/css" href="view_style.css">
</head>
<body>
<?php
include "connection.php";
session_start();
$id=$_SESSION['id'];
$result = $conn->query("SELECT * FROM profile WHERE userid='$id'");
unset($_SESSION['id']);
session_destroy();

if($result){
if($obj = $result->fetch_object()) {
	echo '<div class="container">
			<div class="image">
			<img src="./image/'.$obj->files.'"/>	
			</div>
			<div class="username">
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
			<div class="table">
				<br>
				<table class="left-table">	
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
				<table class="right-table">	
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
			<div class="table"	>
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
			<div class="table">
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
			<div class="table">
				<br>
				<p>"	'.$obj->pitch.'"</p>
			</div>
			</div>
	
			
		</div>';
			}
		}
mysqli_close($conn);	
?>
</body>
</html>
