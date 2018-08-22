<?php
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();

$club_category_name = $_POST['club_category_name'];
$club_category_description = $_POST['club_category_description'];


if(isset($_POST['action']))
{
    if ($_POST['action']=='update'){
        $club_category_id=$_POST['club_category_id'];
        $club_cat_up = "UPDATE  club_category SET club_category_name = '$club_category_name', club_category_description='$club_category_description' where club_category_id= '$club_category_id'";
        $conn->query($club_cat_up);
        echo "Updated";
        
    }
    else if ($_POST['action']=='add'){
        $check="SELECT * FROM club_category WHERE club_category_name = '$club_category_name'";
    $result1 = $conn->query($check);
    $num_rows = mysqli_num_rows($result1);
    
    if ($num_rows>=1) {
        
        echo "club category already exists";
        
    } 
    
    else {
       
       
        $sql = "INSERT INTO club_category (club_category_name, club_category_description)
    VALUES ('$club_category_name','$club_category_description');";
     $sql .= "SELECT LAST_INSERT_ID()"; 
     
     if ($conn->multi_query($sql)) {
        do {
            if ($result = $conn->store_result()) {
                while ($row = $result->fetch_row()) {
                   
                    $var = (string) $row[0];
                }
                $club_category_id = "club_".$var."";
                $sqli = "UPDATE  club_category SET club_category_id = '$club_category_id' where sno= $var";
             
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