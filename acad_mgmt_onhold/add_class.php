<script type="text/javascript" src="../Home/fancybox/jquery.min.js"></script>
<?php
    session_start();
     if(isset($_SESSION['course']))
      {
          $course=$_SESSION['course'];
      }
    else
      {
        echo "<h3 align='center'>No Course Selected</h3>";
        exit();
      } 
/*include("../Home/assets/php/database.php"); 
include("../Home/assets/php/class.acl.php");
include_once "../Home/admin/class_admin.php";
include_once "../Home/Users.php";*/
include_once "../assets/Users.php"; //TEMPORARY
//$user = new User();
//$uid = $_SESSION['Userid'];
$uid = "inst_1";
if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
  $form = array();
  foreach($_POST as $key=>$value) {
	  $form[$key] = $value;	  
   }
   //$academic_manager=new academic_manager(); 
   //$run_query=$academic_manager->insertData_class($form);
   $database = new Database();
   $conn = $database->getConnection();
   $f1=$form['class'];
   $f2=$form['class_detail'];
   $f3=$form['institute_id'];
   $f4=$form['course_id'];
   $f5 = "class_".$f1;
   $run_query = $conn->query("insert into gen_course_class (class_name,class_details,institute_id,course_id,class_id) values ('$f1','$f2','$f3','$f4','$f5')");
	 if($run_query)
	 { 
             $class_name=$form['class'];
        ?>
	<script language='javascript'> window.parent.class_add('<?php echo $f1; ?>','<?php  echo $f5 ?>'); alert('Data Inserted into The DB');</script> 
<?php	 }
	 else
	 {
	     echo "<script language='javascript'>alert('Error in the system. Please try it later.');</script>";
	 }	 
}
?>
<link rel="stylesheet" href="../website/assets3/css/main.css" />
<section class="wrapper style5">
                                                           <div class="inner">
                                                           <h4>Add Class</h4>
									<form method="post" action="">
									    <div class="row uniform">
                                                                               <div class="12u 12u$(xsmall)">
        <input type="hidden" name="course_id" id="course_id" required value="<?php echo $course; ?>"/>
</div>
											<div class="12u 12u$(xsmall)">
												<input type="text" name="class" id="class"  placeholder="Class/Level" required />
											</div>
											<div class="12u$ 12u$(xsmall)">
												<textarea name="class_detail" required id="class_detail" placeholder="Class Detail- Enter your message" rows="6"></textarea>
											</div>
											 
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" id="sub" name="sub"  value="Add Class" class="special" /></li>
												</ul>
											</div>
										</div>
                                                                            <input type="hidden" id="institute_id" name="institute_id" value="<?php echo $uid; ?>" />
									</form>
</section>