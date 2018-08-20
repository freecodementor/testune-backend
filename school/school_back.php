<?php
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
$institute_name = $_POST['institute_name'];
$desc = $_POST['desc'];
$promoters = $_POST['prom'];
$address = $_POST['address'];
$email_id = $_POST['email'];
$phone_no = $_POST['phone'];
$password = $_POST['password'];



if(isset($_POST['action']))
{
    if ($_POST['action']=='update'){
        $institute_id=$_POST['institute_id'];
        $school_up = "UPDATE  school SET institute_name = '$institute_name', details='$desc', promoters='$promoters', address='$address', email_id='$email_id', phone_no='$phone_no', password='$password' where institute_id= '$institute_id'";
        $conn->query($school_up);
        echo "Updated";
        
    }
    else if ($_POST['action']=='add'){
        $check="SELECT * FROM school WHERE email_id = '$email_id'";
    $result1 = $conn->query($check);
    $num_rows = mysqli_num_rows($result1);
    
    if ($num_rows>=1) {
        
        echo "Email already exists";
        
    } 
    
    else {
       
       
        $sql = "INSERT INTO school (institute_name, details,promoters, address, email_id, phone_no, password)
    VALUES ('$institute_name','$desc','$promoters','$address','$email_id','$phone_no','$password');";
     $sql .= "SELECT LAST_INSERT_ID()"; 
     
     if ($conn->multi_query($sql)) {
        do {
            if ($result = $conn->store_result()) {
                while ($row = $result->fetch_row()) {
                   
                    $var = (string) $row[0];
                }
                $institute_id = "inst_".$var."";
                $sqli = "UPDATE  school SET institute_id = '$institute_id' where sno= $var";
             
                $conn->query($sqli);
                echo "Data Saved";
                $result->free();
                
            }
            
           
        } while ($conn->next_result());
    }
    }
} 

}
$conn->close();

?>