<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testune";
$activity_name = $_POST['activity_name'];
$desc = $_POST['desc'];
$conn = new mysqli($servername, $username, $password, $dbname);
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
            $act_id = "inst_".$var."";
            $sqli = "UPDATE  activities SET activities_id = '$act_id' where sno= $var";
         
            $conn->query($sqli);
            echo "Data Saved";
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