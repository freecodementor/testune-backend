<?php 
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();

$course = $_POST['course'];
$editor1 = $_POST['editor1'];
$editor2 = $_POST['editor2'];
$editor3 = $_POST['editor3'];
$classes = $_POST['classes'];
$price = $_POST['price'];
$vendor = $_POST['vendor'];
$sub_lvl = $_POST['sub_lvl'];
$cls_lvl = $_POST['cls_lvl'];

if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    {                            //File update
                                    $target_dir = "";                    
                                    $primaryf = $target_dir . basename($_FILES["primary"]["name"]);
                                    $filetype = strtolower(pathinfo($primaryf,PATHINFO_EXTENSION));
                                    $p = $course."_".rand(1,100).".".$filetype;
                                    $s = $course."_".rand(1,100).".".$filetype;
                                    $i = $course."_".rand(1,100).".".$filetype;
                                    if (move_uploaded_file($_FILES["primary"]["tmp_name"], $target_dir . $p) AND
                                    move_uploaded_file($_FILES["secondary"]["tmp_name"], $target_dir . $s) AND
                                    move_uploaded_file($_FILES["icon"]["tmp_name"], $target_dir . $i) ) 
                                    {
                                        echo 'All files saved';
                                    }
                                    else {
                                        echo 'Error uploading some files';
                                    }                
                             //Data update
                            $workshop_id=$_POST['id'];                                   
                            $work_up = "UPDATE  workshop SET title = '$course', description_line='$editor1',no_of_classes='$classes',price='$price',class_applicable_for='$cls_lvl',subscription_level='$sub_lvl',learning='$editor3',primary_image='$p',secondary_image='$s',course_icon='$i',prerequisites='$editor3',vendor_id='$vendor' where workshop_id= '$workshop_id'";
                            $conn->query($work_up);
                            echo "Data Updated";
                            }

    else if ($_POST['action']=='publish')
    {  
        
        $check="SELECT * FROM workshop WHERE title = '$course'";
        $result1 = $conn->query($check);
        $num_rows = mysqli_num_rows($result1);
    
        if ($num_rows>=1) 
        {        
        echo "Workshop Already Exists";        
         } 
    
        else 
        {
                             //File upload
                            $target_dir = "";                    
                            $primaryf = $target_dir . basename($_FILES["primary"]["name"]);
                            $filetype = strtolower(pathinfo($primaryf,PATHINFO_EXTENSION));
                            $p = $course."_".rand(1,100).".".$filetype;
                            $s = $course."_".rand(1,100).".".$filetype;
                            $i = $course."_".rand(1,100).".".$filetype;
                            if (move_uploaded_file($_FILES["primary"]["tmp_name"], $target_dir . $p) AND
                            move_uploaded_file($_FILES["secondary"]["tmp_name"], $target_dir . $s) AND
                            move_uploaded_file($_FILES["icon"]["tmp_name"], $target_dir . $i) ) 
                            {
                                echo 'All files saved';
                            }
                            else {
                                echo 'Error uploading some files';
                            }                           
                            //Data Upload 
                            echo $p.' '.$s.' '.$i;
                            $sql = "INSERT INTO workshop  (title,description_line,no_of_classes,price,class_applicable_for,subscription_level,learning, primary_image,secondary_image, course_icon, prerequisites,vendor_id) VALUES ('$course','$editor1','$classes','$price','$cls_lvl','$sub_lvl','$editor2','$p','$s','$i','$editor3','$vendor');";
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
                                                
                                                $workshop_id = "work_".$var."";
                                                $sqli = "UPDATE  workshop SET workshop_id = '$workshop_id' where sno= $var";         
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













