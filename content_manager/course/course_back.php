<?php 
session_start();
$club_id = $_SESSION['club_id'];
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();

$description_line = $_POST['course'];
$description = $_POST['editor1'];
$learning = $_POST['editor2'];
$price = $_POST['price'];
$vendor = $_POST['vendor'];
$duration = $_POST['duration'];

if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    {                            //File update
                                    
                                    $str_p='primary';
                                    $srt_s='secondary';
                                    $str_i='icon';                    
                                    function ren_save($id){
                                        $target_dir = "../../assets/course/";
                                        $f =basename($_FILES[$id]["name"]);
                                        $filetype = strtolower(pathinfo($f,PATHINFO_EXTENSION));
                                        $file = $_POST['course']."_".rand(1,100).".".$filetype;
                                        move_uploaded_file($_FILES[$id]["tmp_name"], $target_dir . $file);  
                                        return $file;                                     
                                    }
                                    $p=ren_save($str_p);
                                    $s=ren_save($srt_s);
                                    $i=ren_save($str_i);

                                                 
                             //Data update
                            $course_id=$_POST['id'];                                   
                            $work_up = "UPDATE  live_course SET description_line = '$description_line', description='$description',
                            price='$price',duration='$duration',learning='$learning',";
                            if ($_FILES['primary']['name']==''){}else{ $work_up .= "primary_image='$p',";}
                            if ($_FILES['secondary']['name']==''){}else{ $work_up .= "secondary_image='$s',";}
                            if ($_FILES['icon']['name']==''){}else{ $work_up .= "course_icon='$i',";}
                            $work_up .= "vendor_id='$vendor',club_id='$club_id' where course_id= '$course_id'";
                            echo $work_up;
                            $conn->query($work_up);
                            echo "Data Updated";
                            }

    else if ($_POST['action']=='publish')
    {  
        
        $check="SELECT * FROM live_course WHERE description_line = '$description_line'";
        $result1 = $conn->query($check);
        $num_rows = mysqli_num_rows($result1);
    
        if ($num_rows>=1) 
        {        
        echo "Course Already Exists";        
         } 
    
        else 
        {
                             //File upload
                             $str_p='primary';
                             $srt_s='secondary';
                             $str_i='icon';                    
                             function ren_save($id){
                                 $target_dir = "../../assets/course/";
                                 $f = basename($_FILES[$id]["name"]);
                                 $filetype = strtolower(pathinfo($f,PATHINFO_EXTENSION));
                                 $file = $_POST['course']."_".rand(1,100).".".$filetype;
                                 move_uploaded_file($_FILES[$id]["tmp_name"], $target_dir.$file);  
                                 return $file;                                     
                             }
                             $p=ren_save($str_p);
                             $s=ren_save($srt_s);
                             $i=ren_save($str_i);
                            //Data Upload                             
                            $sql = "INSERT INTO live_course  (description_line,description,price,duration,learning,";
                            if ($_FILES['primary']['name']==''){}else{ $sql .= "primary_image,";}
                            if ($_FILES['secondary']['name']==''){}else{ $sql .= "secondary_image,";}
                            if ($_FILES['icon']['name']==''){}else{ $sql .= "course_icon,";}
                             $sql .= "vendor_id,club_id) VALUES ('$description_line','$description','$price','$duration','$learning',";
                             if ($_FILES['primary']['name']==''){}else{ $sql .= "'$p',";}
                             if ($_FILES['secondary']['name']==''){}else{ $sql .= "'$s',";}
                             if ($_FILES['icon']['name']==''){}else{ $sql .= "'$i',";} 
                             $sql .= "'$vendor','$club_id');";
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
                                                
                                                $course_id = "course_".$var."";
                                                $sqli = "UPDATE  live_course SET course_id = '$course_id' where sno= $var";         
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




