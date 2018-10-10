<?php 
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();


$name = $_POST['institute_name'];
$phone_number = $_POST['phone'];
$email_id = $_POST['email'];
$qualification = $_POST['qual'];
$experience = $_POST['exp'];
$phone_no2 = $_POST['phone2'];
$sec_email_id = $_POST['secemail'];
$dob = $_POST['datepicker'];
$address = $_POST['address'];
$nationality = $_POST['country'];



if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    {
        //New Img with new name upload
        $target_dir = "../img/cont_mgr/";
        
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
                
                } 
                else {
                            if ($_FILES["fileToUpload"]["name"]==''){
                                $tmp_name=$_POST['photo']; 
                            }
                            else {
                                $tmp_name = $_POST['institute_name']."_".$_POST['datepicker']."_".rand(1,100).".jpg"; 
                                   }
                            
                            
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {
                                
                            } else {
                                echo "";
                            }
                     }
        //Data update
               
                $content_manager_id=$_POST['content_manager_id'];
                
                if ($_FILES["fileToUpload"]["name"]=""){
                    $tmp_name=$_POST['photo'];
                    
                    
                }
                else {
                   
                }
                
                $cont_mgr__up = "UPDATE  content_manager SET name = '$name', phone_number='$phone_number',dob='$dob',address='$address',photo='$tmp_name',email_id='$email_id',nationality='$nationality',qualification='$qualification',experience='$experience',phone_no2='$phone_no2',sec_email_id='$sec_email_id',username='$email_id' where content_manager_id= '$content_manager_id'";
                $conn->query($cont_mgr__up);
                echo "updated";
        
     }


    else if ($_POST['action']=='add')
    {  
        $email_id = $_POST['email']; //check for existing vendor
        $check="SELECT * FROM content_manager WHERE email_id = '$email_id'";
        $result1 = $conn->query($check);
        $num_rows = mysqli_num_rows($result1);
    
        if ($num_rows>=1) 
        {        
        echo "exists";        
         } 
    
        else 
        {
                                //File upload
                            $target_dir = "../img/cont_mgr/";
                            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                            if(isset($_POST["submit"])) 
                            {
                        
                                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                    if($check !== false) {
                                    echo "File is an image - " . $check["mime"] . ".";
                                    $uploadOk = 1;
                                    }
                                    else
                                    {
                                    echo "File is not an image.";
                                    $uploadOk = 0;
                                    }
                            }

                            if ($uploadOk == 0) 
                            {
                                echo "Sorry, your file was not uploaded.";
                            } 
                            else
                            {
                                $tmp_name = $_POST['institute_name']."_".$_POST['datepicker']."_".rand(1,100).".jpg";     
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $tmp_name)) {        
                                } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }  
                            //Data Upload
                            $sql = "INSERT INTO content_manager (name,dob,address,phone_number,email_id,nationality,qualification,experience,photo,phone_no2,sec_email_id,username) VALUES ('$name','$dob','$address','$phone_number','$email_id','$nationality','$qualification','$experience','$tmp_name','$phone_no2','$sec_email_id','$email_id');";
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
                                                
                                                $cont_id = "inst_".$var."";
                                                $sqli = "UPDATE  content_manager SET content_manager_id = '$cont_id' where sno= $var";         
                                                $conn->query($sqli);
                                                echo "success";
                                                $result->free();
                                    
                                            }      
                                    }
                                    while ($conn->next_result());
                            }

       }
       
    }
} 


$conn->close();

?>













