<?php 
 session_start();

if (isset($_POST['submit']))
 {

	$firstname=$_POST["firstname"];
	$lastname=$_POST["lastname"];
	$gender=$_POST["gender"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$state=$_POST["state"];
	$city=$_POST["city"];
	$graduation=$_POST["graduation"];
	$grade=$_POST["grade"];
	$gyear=$_POST["gyear"];
	$spec=$_POST["spec"];
	$college=$_POST["college"];
	$priskill=$_POST["priskill"];
	$secskill=$_POST["secskill"];
	$certificate=$_POST["certificate"];
	$pitch=$_POST["pitch"];


	/*Start validating data*/
	$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
	$length = strlen($phone);  
 
	if (!preg_match ("/^[0-9]*$/", $phone) ){  
    echo '<script language="javascript">
                alert("mobile are allowed Number.");
                 window.history.back();
            </script>';
	}  
	else if ( $length < 10 || $length > 10) {  
	    echo '<script language="javascript">
	                alert("Mobile must have 10 digits.");
	                 window.history.back();
	            </script>';  
	}
	else if (!preg_match ("/^[a-zA-z]*$/", $firstname) ) {  
	    echo '<script language="javascript">
	                alert("Name are allowed alphabets and whitespace.");
	                 window.history.back();
	            </script>';  
	}
	else if (!preg_match ("/^[a-zA-z]*$/", $city) ) {  
	    echo '<script language="javascript">
	                alert("City Name are allowed alphabets and whitespace.");
	                 window.history.back();
	            </script>';  
	}
	else if (!preg_match ($pattern, $email) ) {  
	    echo '<script language="javascript">
	                alert("Email is not valid.");
	                 window.history.back();
	            </script>';  
	}
/*end validating data*/
/*Start inserting data into database*/
else{
extract($_POST);
$error=array();
$extension=array("jpeg","jpg","png","JPG","JPEG","PNG");
foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
    $file_name=$_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

    if(in_array($ext,$extension)) {
        if(!file_exists("./image/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"./image/".$file_name);

            include "connection.php";   
            $result= $conn->query("INSERT INTO profile(firstname, lastname, gender, email, phone, state, city, files, graduation, grade, gyear, spec, college, preskill, secskill, certificate, pitch) VALUES ('$firstname','$lastname','$gender','$email','$phone','$state','$city','$file_name','$graduation','$grade','$gyear','$spec','$college','$priskill','$secskill','$certificate','$pitch')");
            if ($result) {
            	$_SESSION['id']=$conn->insert_id;

                mysqli_close($conn);
                echo '<script language="javascript">
                alert("Data Submitted Successfully.");
                 location.replace("./view.php");
            </script>';
            }
            else{
                mysqli_close($conn);
                echo '<script language="javascript">
                alert("Data not Successfully.");
                 window.history.back();
            </script>';
            }
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"./image/".$newFileName);
            include "connection.php";
            $result1= $conn->query("INSERT INTO profile(firstname, lastname, gender, email, phone, state, city, files, graduation, grade, gyear, spec, college, preskill, secskill, certificate, pitch) VALUES ('$firstname','$lastname','$gender','$email','$phone','$state','$city','$newFileName','$graduation','$grade','$gyear','$spec','$college','$priskill','$secskill','$certificate','$pitch')");
            if ($result1) {
            	$_SESSION['id']=$conn->insert_id;

                mysqli_close($conn);
                echo '<script language="javascript">
                alert("Data Submitted Successfully.");
                 location.replace("./view.php");
            </script>';
            }
            else{
                mysqli_close($conn);
                echo '<script language="javascript">
                alert("Data not Submitted .");
                 window.history.back();
            </script>';
            }
        }
           
        }
    else {
        array_push($error,"$file_name, ");
    }

}
}
}
/*end insertion of data*/

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>WP6</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		
		<div class="content">

		<!-- Start form -->
			<form method="POST" enctype="multipart/form-data">
			<!-- Start Personal Information -->
			<div class="title">Personal:</div><br>
			<div class="user-details">
				<div class="input-box">
					<span class="details">First Name<i style="color: red">*</i></span>
					<input type="text" name="firstname" placeholder="Enter First Name" required="" />
				</div>
			
			
				<div class="input-box">
					<span class="details">Last Name</span>
					<input type="text" name="lastname" placeholder="Enter Last Name" />
				</div>
			
			
				<div class="gender-details">
 
		          <input type="radio" name="gender" id="dot-1" value="Male" required="">
		 
		          <input type="radio" name="gender" id="dot-2" value="Female" required="">
		  
		          <span class="gender-title">Gender<i style="color: red">*</i></span>
		 
		          <div class="category">
		 
		            <label for="dot-1">
		 
		            <span class="dot one"></span>
		 
		            <span class="gender">Male</span>
		 
		          </label>
		 
		          <label for="dot-2">
		 
		            <span class="dot two"></span>
		 
		            <span class="gender">Female</span>
		 
		          </label>
		 
		          </div>
		 
		        </div>
 
			
			
				<div class="input-box">
					<span class="details">Email ID<i style="color: red">*</i></span>
					<input type="email" name="email" placeholder="Enter your Email" required="" />
				</div>
			
			
				<div class="input-box">
					<span class="details">Phone Number</span>
					<input type="text" name="phone" placeholder="Enter your number" />
				</div>
			
			
				<div class="input-box">
					<span class="details">State</span>
					<select name="state" >
						<option value="Andhra Pradesh">Andhra Pradesh</option>
						<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
						<option value="Arunachal Pradesh">Arunachal Pradesh</option>
						<option value="Assam">Assam</option>
						<option value="Bihar">Bihar</option>
						<option value="Chandigarh">Chandigarh</option>
						<option value="Chhattisgarh">Chhattisgarh</option>
						<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
						<option value="Daman and Diu">Daman and Diu</option>
						<option value="Delhi">Delhi</option>
						<option value="Lakshadweep">Lakshadweep</option>
						<option value="Puducherry">Puducherry</option>
						<option value="Goa">Goa</option>
						<option value="Gujarat">Gujarat</option>
						<option value="Haryana">Haryana</option>
						<option value="Himachal Pradesh">Himachal Pradesh</option>
						<option value="Jammu and Kashmir">Jammu and Kashmir</option>
						<option value="Jharkhand">Jharkhand</option>
						<option value="Karnataka">Karnataka</option>
						<option value="Kerala">Kerala</option>
						<option value="Madhya Pradesh">Madhya Pradesh</option>
						<option value="Maharashtra">Maharashtra</option>
						<option value="Manipur">Manipur</option>
						<option value="Meghalaya">Meghalaya</option>
						<option value="Mizoram">Mizoram</option>
						<option value="Nagaland">Nagaland</option>
						<option value="Odisha">Odisha</option>
						<option value="Punjab">Punjab</option>
						<option value="Rajasthan">Rajasthan</option>
						<option value="Sikkim">Sikkim</option>
						<option value="Tamil Nadu">Tamil Nadu</option>
						<option value="Telangana">Telangana</option>
						<option value="Tripura">Tripura</option>
						<option value="Uttar Pradesh">Uttar Pradesh</option>
						<option value="Uttarakhand">Uttarakhand</option>
						<option value="West Bengal">West Bengal</option>
					</select>
				</div>
			
			
				<div class="input-box">
					<span class="details">City<i style="color: red">*</i></span>
					<input type="text" name="city" placeholder="Enter your City" required="" />
				</div>
			
			
				<div class="input-box">
					<span class="details">Upload Photo<i style="color: red">*</i></span>
					<input type="file" name="files[]" placeholder="" required="" />
				</div>
			</div>
			<!-- End Personal Information -->

			<br><br>
			<!-- Start Educational Information -->
			<div class="title">Education:</div><br>
			<div class="user-details">
				<div class="input-box">
					<span class="details">Graduation<i style="color: red">*</i></span>
					<select name="graduation" required="">
						<option value="BE">BE</option>
						<option value="Btech">Btech</option>
						<option value="BCA">BCA</option>
						<option value="BA">BA</option>
						<option value="BCOM">BCOM</option>
					</select>
				</div>
			
				<div class="input-box">
					<span class="details">Graduation Grade/Percentage</span>
					<input type="text"  name="grade" placeholder="Enter Graduation Grade" />
				</div>
				
				<div class="input-box">
					<span class="details">Graduation Year<i style="color: red">*</i></span>
					<select name="gyear" required="">
						<option value="2020">2020</option>
						<option value="2019">2019</option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>
						<option value="2016">2016</option>
						<option value="2015">2015</option>
					</select>
				</div>
			
			
				<div class="input-box">
					<span class="details">Specialisation<i style="color: red">*</i></span>
					<input type="text" name="spec" placeholder="Enter Specialisation" required="" />
				</div>
			
			
				<div class="input-box">
					<span class="details">College/ University<i style="color: red">*</i></span>
					<input type="text" name="college" placeholder="Enter College/University Name" required="" />
				</div>
			</div>
				<!-- End Educational Information -->

			<br><br>
			<!-- Start Skill -->
			<div class="title">Skill:</div><br>
			<div class="user-details">
			
				<div class="input-box">
					<span class="details">Primary Skills<i style="color: red">*</i></span>
					<input type="text" name="priskill"  required="" />
				</div>
				<div class="input-box">
					<span class="details">Secondary Skills</span>
					<input type="text" name="secskill" />
				</div>
				<div class="input-box">
					<span class="details">Certification</span>
					<input type="text" name="certificate" />
				</div>
			</div>
			<!-- End Skills -->


			<br><br>
			<!-- Start pitch  -->
			<div class="title">Pitch<i style="color: red">*</i> (Why should we consider you?):</div><br>
			<div class="user-details">
				<div class="input-box">
					<textarea rows="5" placeholder="Enter Pitch" name="pitch" required=""></textarea>
				</div>
			</div>
			<!-- End Pitch -->

		<div class="btn">
			<button type="submit" name="submit">Submit</button>
			<button type="reset">reset</button>
		</div>


		</form>
		<!-- End Form -->	
		</div>
	</div>



</body>
</html>
