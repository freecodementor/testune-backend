<?php 
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();



$title = $_POST['course'];
$description_line = $_POST['editor1'];
$duration = $_POST['duration'];
$learning = $_POST['editor2'];
$vendor_id = $_POST['vendor'];
$price = $_POST['price'];




if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    {  
        //New Img with new name upload
      
        $target_dir = "";        
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);        
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $vid_file=$_POST['vid_file'];
                            echo $vid_file;
                            if ($_FILES["fileToUpload"]["name"]==''){
                                $tmp_name=$vid_file; 
                            }
                            else {
                                $tmp_name = $_POST['course']."_".rand(1,100).".".$FileType; 
                                   }                            
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {
                                echo 'File Uploaded\n';
                            } else {
                                echo 'File not Uploaded\n';
                            }
                        
        //Data update
               
                $video_id=$_POST['id'];                                   
                $vid_up = "UPDATE  video SET title = '$title', description_line='$description_line',duration='$duration',learning='$learning',video_file='$tmp_name',vendor_id='$vendor_id',price='$price' where video_id= '$video_id'";
                $conn->query($vid_up);
                echo "Published";
        
     }


    else if ($_POST['action']=='publish')
    {   $tmp_name='';
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
                            $sql = "INSERT INTO video  (title,description_line,duration,price,learning,vendor_id,video_file) VALUES ('$title','$description_line','$duration','$price','$learning','$vendor_id','$tmp_name');";
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













