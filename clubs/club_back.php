<?php
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
$club_name = $_POST['club_name'];
$desc = $_POST['desc'];
$features=$_POST['features'];
$date=$_POST['datepicker'];
$club_id =$_POST['club_id'];
$club_cat =$_POST['club_category_id'];
function ren_save($id = 'fileToUpload'){
    $target_dir = "../assets/club/";
    $f = $target_dir . basename($_FILES[$id]["name"]);
    $filetype = strtolower(pathinfo($f,PATHINFO_EXTENSION));
    $file = date("hisa").rand(0,10).rand(0,10).".".$filetype;
    move_uploaded_file($_FILES[$id]["tmp_name"], $target_dir . $file);  
    return $file; }
if(isset($_POST['action']))
{   
    if ($_POST['action']=='update'){
        $f=ren_save();        
        $club_up = "UPDATE  clubs SET club_category_id='$club_cat',club_name = '$club_name', club_description='$desc',";
        if($_FILES['fileToUpload']['name']==''){}else{$club_up .= "image='$f',";}
        $club_up .= "features='$features',launch_date='$date' where club_id= '$club_id'";
        $conn->query($club_up);
        echo "Updated";
        echo $club_up;        
    }
    else if ($_POST['action']=='add'){
        $check="SELECT * FROM clubs WHERE club_name = '$club_name'";
        $result1 = $conn->query($check);
        $num_rows = mysqli_num_rows($result1);
    
    if ($num_rows>=1) {        
        echo "club already exists";        
    } 
    
    else {       
        $f=ren_save();        
        $sql = "INSERT INTO clubs (club_category_id,club_name, club_description,features,image,launch_date)
    VALUES ('$club_cat','$club_name','$desc','$features','$f','$date');";
     $sql .= "SELECT LAST_INSERT_ID()"; 
     
     if ($conn->multi_query($sql)) {
        do {
            if ($result = $conn->store_result()) {
                while ($row = $result->fetch_row()) {                   
                    $var = (string) $row[0];
                }
                $club_id = "club_".$var."";
                $sqli = "UPDATE  clubs SET club_id = '$club_id' where sno= $var";             
                $conn->query($sqli);
                echo "Data Saved";
                $result->free();
            }    
        } while ($conn->next_result());
    }
    }
} 
}
$conn->close();

?>