<?php
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
 session_start();
 $_SESSION['fname']=$firstname;
 $_SESSION['lname']=$lastname;

/*Start validating data*/
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
$length = strlen ($phone);  
 
if (!preg_match ("/^[0-9]*$/", $phone) ){  
    echo '<script language="javascript">
                alert("mobile are allowed only alphabets and whitespace.");
                 location.replace("./profile.php");
            </script>';
}  
else if ( $length < 10 && $length > 10) {  
    echo '<script language="javascript">
                alert("Mobile must have 10 digits.");
                 location.replace("./profile.php");
            </script>';  
}
else if (!preg_match ("/^[a-zA-z]*$/", $firstname) ) {  
    echo '<script language="javascript">
                alert("Name are allowed alphabets and whitespace.");
                 location.replace("./profile.php");
            </script>';  
}
else if (!preg_match ("/^[a-zA-z]*$/", $city) ) {  
    echo '<script language="javascript">
                alert("City Name are allowed alphabets and whitespace.");
                 location.replace("./profile.php");
            </script>';  
}
else if (!preg_match ($pattern, $email) ) {  
    echo '<script language="javascript">
                alert("Email is not valid.");
                 location.replace("./profile.php");
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
                 location.replace("./profile.php");
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
                 location.replace("./profile.php");
            </script>';
            }
        }
           
        }
    else {
        array_push($error,"$file_name, ");
    }

}
}
/*end insertion of data*/

 ?>


