<?php 
session_start();
$club_id = $_SESSION['club_id'];
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();



$test_name = $_POST['course'];
$test_data = $_POST['editor1'];
$duration = $_POST['duration'];
$test_creator = $_POST['author'];
$price = $_POST['price'];
$vendor = $_POST['vendor'];



if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    { 
    
                $test_id=$_POST['id'];
                $test_up = "UPDATE  online_test SET test_name = '$test_name', test_data='$test_data',duration='$duration',test_creator='$test_creator',price='$price',club_id='$club_id',vendor_id='$vendor' where test_id= '$test_id'";

                $conn->query($test_up);
                echo "Published";
        
     }


    else if ($_POST['action']=='publish')
    {  
        $name = $_POST['course']; //check for existing vendor
        $check="SELECT * FROM online_test WHERE test_name = '$test_name'";
        $result1 = $conn->query($check);
        $num_rows = mysqli_num_rows($result1);
    
        if ($num_rows>=1) 
        {        
        echo "Test Already Exists";        
         } 
    
        else 
        {
         
                            
                            $sql = "INSERT INTO online_test  (test_name,test_data,duration,test_creator,price,club_id,vendor_id) VALUES ('$test_name','$test_data','$duration','$test_creator','$price','$club_id','$vendor');";
                            $sql .= "SELECT LAST_INSERT_ID()"; 
                            
                            if ($conn->multi_query($sql))
                            {       
                                do {
                                    
                                            if ($result = $conn->store_result()) 
                                            {
                                                while ($row = $result->fetch_row()) 
                                                {               
                                                $var = (string) $row[0];
                                                }
                                                
                                                $test_id = "test_".$var."";
                                                $sqli = "UPDATE  online_test SET test_id = '$test_id' where sno= $var";         
                                                $conn->query($sqli);
                                                echo "Data Saved";
                                                $result->free();
                                    
                                            }  
                                    }
                                    while ($conn->next_result());
                            }
                            else{
                                
                            }

       }
       
    }
} 


$conn->close();

?>













