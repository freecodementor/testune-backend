<?php 
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();



$name = $_POST['course'];
$description = $_POST['editor1'];
$duration = $_POST['duration'];
$author = $_POST['editor2'];
$price = $_POST['price'];




if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    { $tmp_name='';
        //New Img with new name upload
        $target_dir = "";
        
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(isset($_POST["submit"])) {
            
            
                
                            if ($_FILES["fileToUpload"]["name"]==''){
                                $tmp_name=$_POST['fileToUpload']; 
                            }
                            else {
                                $tmp_name = $name."_".rand(1,100).".".$FileType; 
                                   }
                            
                            
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {
                                
                            } else {
                                echo "";
                            }
                        }
        //Data update
               
                $video_id=$_POST['id'];
                
                
                if ($_FILES["fileToUpload"]["name"]=""){
                    $tmp_name=$_POST['fileToUpload'];
                    
                    
                }
                else {
                   
                }
               
                $ebk_up = "UPDATE  ebook SET name = '$name', description='$description',duration='$duration',author='$author',ebook_file='$ebook_file',price='$price' where video_id= '$video_id'";
                $conn->query($ebk_up);
                echo "Published";
        
     }


    else if ($_POST['action']=='publish')
    {  
        $title = $_POST['course']; //check for existing vendor
        $check="SELECT * FROM video WHERE title = '$title'";
        $result1 = $conn->query($check);
        $num_rows = mysqli_num_rows($result1);
    
        if ($num_rows>=1) 
        {        
        echo "Video Already Exists";        
         } 
    
        else 
        {
                                //File upload
                            $target_dir = "";
                            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

                            $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                           

                           
                           
                            
                                $tmp_name = $_POST['course']."_".rand(1,100).".".$FileType;     
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {        
                                } else {
                            echo "No video file uploaded.";
                        }
                     
                            //Data Upload
                            $sql = "INSERT INTO video  (title,description_line,duration,price,learning,vendor_id,video_file) VALUES ('$title','$description_detail','$duration','$price','$learning','$vendor_id','$tmp_name');";
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
                                                
                                                $video_id = "vid_".$var."";
                                                $sqli = "UPDATE  video SET video_id = '$video_id' where sno= $var";         
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













