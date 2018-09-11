<?php 
session_start();
//$club_id = "club_app";
$club_id = $_SESSION['club_id'];
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
$title = $_POST['course'];
$speaker = $_POST['speaker'];
$description = $_POST['editor1'];
$duration = $_POST['duration'];
$learning = $_POST['editor2'];
$vendor_id = $_POST['vendor'];
$date = $_POST['date'];
$time = $_POST['time'];
$price = $_POST['price'];
$class = $_POST['class'];
$sub=$_POST['sub'];
if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    {  
     
                $webinar_id=$_POST['id'];                                   
                $web_up = "UPDATE  webinar SET title = '$title', speaker = '$speaker',description='$description',duration='$duration',learning='$learning',vendor_id='$vendor_id',price='$price',date='$date',time='$time',class_applicable_for='$class',subscription_level='$sub',club_id='$club_id' where webinar_id= '$webinar_id'";
                $conn->query($web_up);
                echo "Published";
        
     }


    else if ($_POST['action']=='publish') 
      {           
        $check="SELECT * FROM webinar WHERE title = '$title'";
        $result1 = $conn->query($check);
        $num_rows = mysqli_num_rows($result1);
    
        if ($num_rows>=1) 
        {        
        echo "Webinar Already Exists";        
         } 
    
        else 
        {
                                //File upload
                           
                            //Data Upload
                            $sql = "INSERT INTO webinar  (title,description,duration,price,learning,vendor_id,date, time, speaker,class_applicable_for,subscription_level,club_id) VALUES ('$title','$description','$duration','$price','$learning','$vendor_id','$date','$time','$speaker','$class','$sub','$club_id');";
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
                                                
                                                $webinar_id = "web_".$var."";
                                                $sqli = "UPDATE  webinar SET webinar_id = '$webinar_id' where sno= $var";         
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













