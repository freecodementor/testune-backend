<?php 
session_start();
$club_id = $_SESSION['club_id'];
//$club_id = "club_web";
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
$title = $_POST['course'];
$description_line = $_POST['editor1'];
$duration = $_POST['duration'];
$learning = $_POST['editor2'];
$vendor_id = $_POST['vendor'];
$price = $_POST['price'];
$class = $_POST['class'];
$sub=$_POST['sub'];
function ren_save(){
    $target_dir = "../../assets/video/";
    $f = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $filetype = strtolower(pathinfo($f,PATHINFO_EXTENSION));
    $file = date("hisa").rand(0,10).rand(0,10).".".$filetype;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $file);  
    return $file;                                     
}




if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    {             
        $f=ren_save();        
                $video_id=$_POST['id'];
                $vid_up = "SELECT video_file from video where video_id = '$video_id'; ";
                $vid_up .= "UPDATE  video SET title = '$title', description_line='$description_line',duration='$duration',learning='$learning',class_applicable_for='$class',subscription_level='$sub',";
                if($_FILES['fileToUpload']['name']==''){}else{$vid_up .= "video_file='$f',";}
                $vid_up .= "vendor_id='$vendor_id',price='$price',club_id='$club_id' where video_id= '$video_id'";
                if ($conn->multi_query($vid_up))
                {       
                    do {
                        
                                if ($result = $conn->store_result()) 
                                {
                                    while ($row = $result->fetch_row()) 
                                    {               
                                    $var = (string) $row[0];
                                    unlink('../../assets/video/'.$var);
                                    echo 'Updated !';
                                    }                                    
                                    

                        
                                }  
                                
                else{               
                    echo 'update failed !';             
                }
                        }
                        while ($conn->next_result());
                }
                else{               
                    echo 'update failed !';             
                }
        
     }


    else if ($_POST['action']=='publish')
    {  
        //check for existing vendor
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
                               
                                $f=ren_save();
                     
                            //Data Upload
                            $sql = "INSERT INTO video  (title,description_line,duration,price,learning,vendor_id,club_id,class_applicable_for,subscription_level";
                            if($_FILES['fileToUpload']['name']==''){}else{$sql .= ",video_file";}
                            $sql .= ") VALUES ('$title','$description_line','$duration','$price','$learning','$vendor_id','$club_id','$class','$sub'";
                            if($_FILES['fileToUpload']['name']==''){}else{ $sql .= " ,'$f'";}
                            $sql .= ");";
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













