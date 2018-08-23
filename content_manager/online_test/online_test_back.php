<?php 
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();



$test_name = $_POST['course'];
$test_data = $_POST['editor1'];
$duration = $_POST['duration'];
$test_creator = $_POST['author'];
$price = $_POST['price'];




if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    { 
        //New Img with new name upload
       /* $target_dir = "";        
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);        
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $ebk_file=$_POST['ebk_file'];            
                            if ($_FILES["fileToUpload"]["name"]==''){
                                $tmp_name=$ebk_file; 
                            }
                            else {
                                $tmp_name = $test_name."_".rand(1,100).".".$FileType; 
                                   }
                            
                            
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {
                                echo 'File Uploaded\n';
                            } else {
                                echo 'File not Uploaded\n';
                            }*/
                      
                $test_id=$_POST['id'];
                /*$ebk_up = "UPDATE  ebook SET name = '$name', description='$description',duration='$duration',author='$author',ebook_file='$tmp_name',price='$price' where book_id= '$book_id'";*/
                $test_up = "UPDATE  online_test SET test_name = '$test_name', test_data='$test_data',duration='$duration',test_creator='$test_creator',price='$price' where test_id= '$test_id'";

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
                                //File upload
                            /*$target_dir = "";
                            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                            $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));                   
                            $tmp_name = $name."_".rand(1,100).".".$FileType;     
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {  
                                    echo "file uploaded <br>";      
                                } else {
                            echo "No ebook file uploaded.<br>";
                                }
                                */
                            //Data Upload
                            echo $test_name.$test_data.$duration.$test_creator.$price;
                            $sql = "INSERT INTO online_test  (test_name,test_data,duration,test_creator,price) VALUES ('$test_name','$test_data','$duration','$test_creator','$price');";
                            $sql .= "SELECT LAST_INSERT_ID()"; 
                            
                            if ($conn->multi_query($sql))
                            {       echo "helloa";
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













