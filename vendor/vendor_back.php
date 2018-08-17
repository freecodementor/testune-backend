<?php
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
     $tmp_name = $_POST['institute_name'].$_POST['phone'].".jpg";
     
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testune";
$name = $_POST['institute_name'];
$qual = $_POST['qual'];
$phone = $_POST['phone'];
$phone2 = $_POST['phone2'];
$exp = $_POST['exp'];
$email = $_POST['email'];
$secemail = $_POST['secemail'];

$dob = $_POST['datepicker'];
$address = $_POST['address'];
$country = $_POST['country'];

 $result = "";


$conn = new mysqli($servername, $username, $password, $dbname);
$check="SELECT * FROM content_manager WHERE email_id = '$email'";
$result1 = $conn->query($check);
$num_rows = mysqli_num_rows($result1);

if ($num_rows>=1) {
    
    echo "Email Id already exists";
    
} 

else {
   
   
    $sql = "INSERT INTO content_manager (name, dob,address,phone_number,email_id,nationality,qualification,experience,photo,phone_no2,sec_email_id,username)
VALUES ('$name','$dob','$address','$phone','$email','$country','$qual','$exp','$tmp_name','$phone2','$secemail','$email');";
 $sql .= "SELECT LAST_INSERT_ID()"; 
 
 if ($conn->multi_query($sql)) {
    do {
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s\n", $row[0]);
                $var = (string) $row[0];
            }
            $cont_id = "inst_".$var."";
            $sqli = "UPDATE  content_manager SET content_manager_id = '$cont_id' where sno= $var";
          
            $conn->query($sqli);
            $result->free();
            
        }
        /* print divider */
       
    } while ($conn->next_result());
}

//$result = $conn->multi_query($sql);
$conn->close();
//var_dump($result);
}

?>