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
                                    
                                    $str_p='primary';
                                    $srt_s='secondary';
                                    $str_i='icon';                    
                                    function ren_save($id){
                                        $target_dir = "";
                                        $f = $target_dir . basename($_FILES[$id]["name"]);
                                        $filetype = strtolower(pathinfo($f,PATHINFO_EXTENSION));
                                        $file = $_POST['course']."_".rand(1,100).".".$filetype;
                                        move_uploaded_file($_FILES[$id]["tmp_name"], $target_dir . $file);  
                                        return $file;                                     
                                    }
                                    $p=ren_save($str_p);
                                    $s=ren_save($srt_s);
                                    $i=ren_save($str_i);

                                                 
                             //Data update
                            $workshop_id=$_POST['id'];                                   
                            $work_up = "UPDATE  workshop SET title = '$course', description_line='$editor1',no_of_classes='$classes',price='$price',class_applicable_for='$cls_lvl',subscription_level='$sub_lvl',learning='$editor3',";
                            if ($_FILES['primary']['name']==''){}else{ $work_up .= "primary_image='$p',";}
                            if ($_FILES['secondary']['name']==''){}else{ $work_up .= "secondary_image='$s',";}
                            if ($_FILES['icon']['name']==''){}else{ $work_up .= "course_icon='$i',";}
                            $work_up .= "prerequisites='$editor3',vendor_id='$vendor' where workshop_id= '$workshop_id'";
                            echo $work_up;
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
                             $str_p='primary';
                             $srt_s='secondary';
                             $str_i='icon';                    
                             function ren_save($id){
                                 $target_dir = "";
                                 $f = $target_dir . basename($_FILES[$id]["name"]);
                                 $filetype = strtolower(pathinfo($f,PATHINFO_EXTENSION));
                                 $file = $_POST['course']."_".rand(1,100).".".$filetype;
                                 move_uploaded_file($_FILES[$id]["tmp_name"], $target_dir . $file);  
                                 return $file;                                     
                             }
                             $p=ren_save($str_p);
                             $s=ren_save($srt_s);
                             $i=ren_save($str_i);
                            //Data Upload                             
                            $sql = "INSERT INTO workshop  (title,description_line,no_of_classes,price,class_applicable_for,subscription_level,learning,";
                            if ($_FILES['primary']['name']==''){}else{ $sql .= "primary_image,";}
                            if ($_FILES['secondary']['name']==''){}else{ $sql .= "secondary_image,";}
                            if ($_FILES['icon']['name']==''){}else{ $sql .= "course_icon,";}
                             $sql .= "prerequisites,vendor_id) VALUES ('$course','$editor1','$classes','$price','$cls_lvl','$sub_lvl','$editor2',";
                             if ($_FILES['primary']['name']==''){}else{ $sql .= "'$p',";}
                             if ($_FILES['secondary']['name']==''){}else{ $sql .= "'$s',";}
                             if ($_FILES['icon']['name']==''){}else{ $sql .= "'$i',";} 
                             $sql .= "'$editor3','$vendor');";
                            $sql .= "SELECT LAST_INSERT_ID()"; 
                            echo $sql;
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













