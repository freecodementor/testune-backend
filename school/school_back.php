<?php
include_once "../assets/Users.php";
$conn = $database->getConnection();
$database = new Database();


$name = $_POST['institute_name'];
$phone = $_POST['phone'];
$prom = $_POST['prom'];
$desc = $_POST['desc'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$check="SELECT * FROM school WHERE email_id = '$email'";
$result1 = $conn->query($check);
$num_rows = mysqli_num_rows($result1);

if ($num_rows>=1) {
    
    echo "Email Id already exists";
    
} 

else {
   
   
    $sql = "INSERT INTO school (institute_name, details,promoters,address,phone_no,email_id,username,password)
VALUES ('$name','$desc','$prom','$address','$phone','$email','$email','$password');";
 $sql .= "SELECT LAST_INSERT_ID()"; 

 if ($conn->multi_query($sql)) {
    do { 
        /* store first result set */
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_row()) {
               
                $var = (string) $row[0];
            }
            $inst_id = "inst_".$var."";
            $sqli = "UPDATE  school SET institute_id = '$inst_id' where sno= $var";
            echo "Data Saved";
          
            $conn->query($sqli);
            $result->free();
            
        }
       
    } while ($conn->next_result());
}
else{
    echo "Failed";
}

//$result = $conn->multi_query($sql);
$conn->close();
//var_dump($result);
}

?>