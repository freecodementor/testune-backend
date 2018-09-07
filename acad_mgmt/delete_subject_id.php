<?php
    session_start();
     if(isset($_GET['subject_id']) || isset($_SESSION['subject_id']))
      {
         $subject_id=$_GET['subject_id'];
      }
     else
      {
        echo "<h3 align='center'>No Subject Selected</h3>";
        exit();
      } 
include("../Home/assets/php/database.php"); 
include("../Home/assets/php/class.acl.php");
include_once "../Home/admin/class_admin.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
  $form = array();
  foreach($_POST as $key=>$value) {
	  $form[$key] = $value;
   }
   $academic_manager=new academic_manager(); 
   $run_query=$academic_manager->deleteSubject_id($subject_id);
	 if($run_query)
	 { 
             echo $run_query;  
 	 }
	 else
	 {
	     echo "<script language='javascript'>alert('Error in the system. Please try it later.');</script>";
	 }	 
}
?>
 