<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testune";
$activity_name = $_POST['activity_name'];
$desc = $_POST['desc'];


$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['action']))
{
    if ($_POST['action']=='update'){
        $activity_id=$_POST['activity_id'];
        $activity_up = "UPDATE  activities SET activities_name = '$activity_name', activities_description='$desc' where activities_id= '$activity_id'";
        $conn->query($activity_up);
        echo "Updated";
        
    }
    else if ($_POST['action']=='add'){
        $check="SELECT * FROM activities WHERE activities_name = '$activity_name'";
    $result1 = $conn->query($check);
    $num_rows = mysqli_num_rows($result1);
    
    if ($num_rows>=1) {
        
        echo "Activity already exists";
        
    } 
    
    else {
       
       
        $sql = "INSERT INTO activities (activities_name, activities_description)
    VALUES ('$activity_name','$desc');";
     $sql .= "SELECT LAST_INSERT_ID()"; 
     
     if ($conn->multi_query($sql)) {
        do {
            if ($result = $conn->store_result()) {
                while ($row = $result->fetch_row()) {
                   
                    $var = (string) $row[0];
                }
                $activity_id = "inst_".$var."";
                $sqli = "UPDATE  activities SET activities_id = '$activity_id' where sno= $var";
             
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