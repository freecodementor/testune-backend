<?php 
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();



$name = $_POST['course'];
$description = $_POST['editor1'];
$duration = $_POST['duration'];
$author = $_POST['author'];
$price = $_POST['price'];




if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    { 
        //New Img with new name upload
        $target_dir = "";        
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);        
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $ebk_file=$_POST['ebk_file'];            
                            if ($_FILES["fileToUpload"]["name"]==''){
                                $tmp_name=$ebk_file; 
                            }
                            else {
                                $tmp_name = $name."_".rand(1,100).".".$FileType; 
                                   }
                            
                            
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {
                                echo 'File Uploaded\n';
                            } else {
                                echo 'File not Uploaded\n';
                            }
                      
                $book_id=$_POST['id'];
                $ebk_up = "UPDATE  ebook SET name = '$name', description='$description',duration='$duration',author='$author',ebook_file='$tmp_name',price='$price' where book_id= '$book_id'";
                $conn->query($ebk_up);
                echo "Published";
        
     }


    else if ($_POST['action']=='publish')
    {  
        $name = $_POST['course']; //check for existing vendor
        $check="SELECT * FROM ebook WHERE name = '$name'";
        $result1 = $conn->query($check);
        $num_rows = mysqli_num_rows($result1);
    
        if ($num_rows>=1) 
        {        
        echo "Ebook Already Exists";        
         } 
    
        else 
        {
                                //File upload
                            $target_dir = "";
                            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                            $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));                   
                            $tmp_name = $name."_".rand(1,100).".".$FileType;     
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {  
                                    echo "file uploaded <br>";      
                                } else {
                            echo "No ebook file uploaded.<br>";
                                }
                     
                            //Data Upload
                            
                            $sql = "INSERT INTO ebook  (name,description,duration,author,ebook_file,price) VALUES ('$name','$description','$duration','$author','$tmp_name','$price');";
                            $sql .= "SELECT LAST_INSERT_ID()"; 
                            echo "hello1";
                            if ($conn->multi_query($sql))
                            {       echo "hello2";
                                do {
                                    
                                            if ($result = $conn->store_result()) 
                                            {
                                                while ($row = $result->fetch_row()) 
                                                {               
                                                $var = (string) $row[0];
                                                }
                                                
                                                $book_id = "ebk_".$var."";
                                                $sqli = "UPDATE  ebook SET book_id = '$book_id' where sno= $var";         
                                                $conn->query($sqli);
                                                echo "Data Saved";
                                                $result->free();
                                    
                                            }  
                                    }
                                    while ($conn->next_result());
                            }
                            else{
                                echo "hello1";
                                
                            }

       }
       
    }
} 


$conn->close();

?>













