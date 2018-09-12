<?php 
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();

    /*$dep="INSERT INTO deployment_control (for_page,";
    for ($i=1;$i<=12;$i++)
    {
        $k='class'.$i;
        if(isset($_POST[$k])){$dep .= "$k,";}
    }    
    if($_POST['start'] !== ''){$dep .= "start,";}    
    if(isset($_POST['gender'])){$dep .= "gender,";}
    if($_POST['end'] !== ''){$dep .= "end";}
    $dep .= ") VALUES ('$type',";
    for ($i=1;$i<=12;$i++)
    {
        $k='class'.$i;
        if(isset($_POST[$k])){$dep .= "'1',";}
    }   
    $start = $_POST['start']; 
    $end = $_POST['end'];

    if($_POST['start'] !== ''){$dep .= "'$start',";}    
    if(isset($_POST['gender'])){if($_POST['gender']=='boy'){$dep .= "'m',";}else{$dep .= "'f',";}}
    if($_POST['end'] !== ''){$dep .= "'$end'";}
    $dep .= ");";*/
    $activity_id=$_POST['id'];
    $class = $_POST['class'];
    $gender=$_POST['gender'];
    $from =date('Y-m-d',strtotime($_POST['from']));
    $to=date('Y-m-d',strtotime($_POST['to']));
    $student_price = $_POST['student_price'];
    //$cc_id=$_SESSION['uid'];
    $cc_id="cc_1";
    $inst_fetch = $conn->query("select institute_id from inst_club_coordinator where club_coordinator_id = '$cc_id'");
    $row = $inst_fetch->fetch_array();
    $inst_id=$row['institute_id'];
   
    $dep="insert into deployment_control (activity_id, class, gender, from_date, to_date, student_price,cc_id,institute_id)
    values ('$activity_id','$class','$gender','$from','$to','$student_price','$cc_id','$inst_id');";
    $dep .= "SELECT LAST_INSERT_ID()";
    if ($conn->multi_query($dep))
                            {       
                                do {
                                    
                                            if ($result = $conn->store_result()) 
                                            {
                                                while ($row = $result->fetch_row()) 
                                                {               
                                                $var = (string) $row[0];
                                                }
                                                
                                                $deploy_id = "dep_".$var."";
                                                $sqli = "UPDATE  deployment_control SET deploy_id = '$deploy_id' where sno= $var";         
                                                $conn->query($sqli);
                                                echo "Deployed";
                                                $result->free();
                                    
                                            }  
                                    }
                                    while ($conn->next_result());
                            }
                            else{
                                echo "Error ! Not deployed";
                                
                            }
    echo $dep;
 

        $conn->close();
        ?>