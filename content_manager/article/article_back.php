<?php 
session_start();
$club_id = $_SESSION['club_id'];
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
$name = $_POST['course'];
$description = $_POST['editor1'];
$duration = $_POST['duration'];
$author = $_POST['author'];
$price = $_POST['price'];
$vendor_id =$_POST['vendor'];
function ren_save($id = 'fileToUpload'){
    $target_dir = "../../assets/article/";
    $f = $target_dir . basename($_FILES[$id]["name"]);
    $filetype = strtolower(pathinfo($f,PATHINFO_EXTENSION));
    $file = date("hisa").rand(0,10).rand(0,10).".".$filetype;
    move_uploaded_file($_FILES[$id]["tmp_name"], $target_dir . $file);  
    return $file;                                     
}



if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    { 
        //New Img with new name upload
       
        $f=ren_save();
          
        //Data Upload
                $article_id=$_POST['id'];
                $art_up = "SELECT article_file from article where article_id = '$article_id'; ";
                $art_up .= "UPDATE  article SET name = '$name', description='$description',duration='$duration',author='$author',";
                if($_FILES['fileToUpload']['name']==''){}else{$art_up .= "article_file='$f',";}
                $art_up .= "price='$price', club_id='$club_id',vendor_id='$vendor_id' where article_id= '$article_id'";
                if ($conn->multi_query($art_up))
                {       
                    do {
                        
                                if ($result = $conn->store_result()) 
                                { 
                                    while ($row = $result->fetch_row()) 
                                    {       
                                        for ($i=0;$i<3;$i++){
                                        $var = (string) $row[$i];
                                        unlink('../../assets/article/'.$var);                                       
                                        }                             
                                    }    
                                    echo 'Updated !';                       
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
                
                $f=ren_save();
                     
                            //Data Upload
                            
                            $sql = "INSERT INTO article  (name,description,duration,author,";
                            if($_FILES['fileToUpload']['name']==''){}else{$sql .= "article_file,";}
                            $sql .= "price,club_id,vendor_id) VALUES ('$name','$description','$duration','$author',";
                            if($_FILES['fileToUpload']['name']==''){}else{$sql .= "'$f',";}
                            $sql .= "'$price','$club_id','$vendor_id');";
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













