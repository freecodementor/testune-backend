<?php
$target_dir = "../img/vendor/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
     $tmp_name = $_POST['vendor_name']."_".$_POST['datepicker']."_".rand(1,100).".jpg";
     
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testune";
$vendor_name = $_POST['vendor_name'];
$desc = $_POST['desc'];
$form_year = $_POST['datepicker'];
$address = $_POST['address'];
$country = $_POST['country'];


$conn = new mysqli($servername, $username, $password, $dbname);
$check="SELECT * FROM vendor WHERE vendor_name = '$vendor_name'";
$result1 = $conn->query($check);
$num_rows = mysqli_num_rows($result1);

if ($num_rows>=1) {
    
    echo "Vendor already exists";
    
} 

else {
   
   
    $sql = "INSERT INTO vendor (vendor_name, vendor_description,formation_year,country,permanent_address,vendor_icon)
VALUES ('$vendor_name','$desc','$form_year','$country','$address','$tmp_name');";
 $sql .= "SELECT LAST_INSERT_ID()"; 
 
 if ($conn->multi_query($sql)) {
    do {
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_row()) {
               
                $var = (string) $row[0];
            }
            $ven_id = "inst_".$var."";
            $sqli = "UPDATE  vendor SET vendor_id = '$ven_id' where sno= $var";
         
            $conn->query($sqli);
            echo "Data Saved";
            $result->free();
            
        }
        /* print divider */
       
    } while ($conn->next_result());
}

//$result = $conn->multi_query($sql);
$conn->close();
//var_dump($result);
}

?>