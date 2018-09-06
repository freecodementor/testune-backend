<?php 
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
$type = $_POST['type'];

    $dep="INSERT INTO deployment_control (for_page,";
    for ($i=1;$i<=12;$i++)
    {
        $k='class'.$i;
        if(isset($_POST[$k])){$dep .= "$k,";}
    }    
    if(isset($_POST['mon'])){$dep .= "mon,";}
    if(isset($_POST['tue'])){$dep .= "tue,";}
    if(isset($_POST['wed'])){$dep .= "wed,";}
    if(isset($_POST['thu'])){$dep .= "thu,";}
    if(isset($_POST['fri'])){$dep .= "fri,";}
    if(isset($_POST['sat'])){$dep .= "sat,";}
    if(isset($_POST['sun'])){$dep .= "sun,";}
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
   

    if(isset($_POST['mon'])){$dep .= "'1',";}
    if(isset($_POST['tue'])){$dep .= "'1',";}
    if(isset($_POST['wed'])){$dep .= "'1',";}
    if(isset($_POST['thu'])){$dep .= "'1',";}
    if(isset($_POST['fri'])){$dep .= "'1',";}
    if(isset($_POST['sat'])){$dep .= "'1',";}
    if(isset($_POST['sun'])){$dep .= "'1',";}
    if($_POST['start'] !== ''){$dep .= "'$start',";}    
    if(isset($_POST['gender'])){if($_POST['gender']=='boy'){$dep .= "'m',";}else{$dep .= "'f',";}}
    if($_POST['end'] !== ''){$dep .= "'$end'";}
    $dep .= ");";
    echo $dep;
    if ($conn->query($dep))
        { echo 'success';}
        else {echo 'fail';}

        $conn->close();
        ?>