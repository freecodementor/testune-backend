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
        $art_file=$_POST['art_file'];            
                            if ($_FILES["fileToUpload"]["name"]==''){
                                $tmp_name=$art_file; 
                            }
                            else {
                                $tmp_name = $name."_".rand(1,100).".".$FileType; 
                                   }
                            
                            
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {
                                echo 'File Uploaded\n';
                            } else {
                                echo 'File not Uploaded\n';
                            }
                      
                $article_id=$_POST['id'];
                $art_up = "UPDATE  article SET name = '$name', description='$description',duration='$duration',author='$author',article_file='$tmp_name',price='$price' where article_id= '$article_id'";
                $conn->query($art_up);
                echo "Published";
        
     }


    else if ($_POST['action']=='publish')
    {  
        
        $check="SELECT * FROM article WHERE name = '$name'";
        $result1 = $conn->query($check);
        $num_rows = mysqli_num_rows($result1);
    
        if ($num_rows>=1) 
        {        
        echo "Article Already Exists";        
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
                            echo "No article file uploaded.<br>";
                                }
                     
                            //Data Upload
                            
                            $sql = "INSERT INTO article  (name,description,duration,author,article_file,price) VALUES ('$name','$description','$duration','$author','$tmp_name','$price');";
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
                                                
                                                $article_id = "art_".$var."";
                                                $sqli = "UPDATE  article SET article_id = '$article_id' where sno= $var";         
                                                $conn->query($sqli);
                                                echo "Data Saved";
                                                $result->free();
                                    
                                            }  
                                    }
                                    while ($conn->next_result());
                            }
                            else{
                                echo "Data Not Saved";
                                
                            }

       }
       
    }
} 


$conn->close();

?>













