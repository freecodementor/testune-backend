<?php
    session_start();
    include_once "../assets/Users.php"; //TEMPORARY
$database = new Database();
$conn = $database->getConnection();
     if(isset($_GET['class_id']) || isset($_SESSION['class_id']))
      {
         $class_id=$_GET['class_id'];
      }
     else
      {
        echo "<h3 align='center'>No Class Selected</h3>";
        exit();
      } 
/*include("../Home/assets/php/database.php"); 
include("../Home/assets/php/class.acl.php");
include_once "../Home/admin/class_admin.php";*/
if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
  $form = array();
  foreach($_POST as $key=>$value) {
	  $form[$key] = $value;
   }
   //$academic_manager=new academic_manager(); 
   //$run_query=$academic_manager->deleteClass_id($class_id);
   $cid=$_POST['class_id'];
   
   $run_query = $conn->query("delete  from gen_course_class where class_id ='$cid' ");
	 if($run_query)
	 { 
            echo $cid;
            
 	 }
	 else
	 {
	     echo "<script language='javascript'>alert('Error in the system. Please try it later.');</script>";
	 }	 
}
?>
 