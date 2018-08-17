<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testune";
$club_name = $_POST['club_name'];
$desc = $_POST['desc'];
$conn = new mysqli($servername, $username, $password, $dbname);
$check="SELECT * FROM clubs WHERE club_name = '$club_name'";
$result1 = $conn->query($check);
$num_rows = mysqli_num_rows($result1);

if ($num_rows>=1) {
    
    echo "club already exists";
    
} 

else {
   
   
    $sql = "INSERT INTO clubs (club_name, club_description)
VALUES ('$club_name','$desc');";
 $sql .= "SELECT LAST_INSERT_ID()"; 
 
 if ($conn->multi_query($sql)) {
    do {
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_row()) {
               
                $var = (string) $row[0];
            }
            $club_id = "inst_".$var."";
            $sqli = "UPDATE  clubs SET club_id = '$club_id' where sno= $var";
         
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