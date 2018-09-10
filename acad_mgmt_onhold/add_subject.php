 <script type="text/javascript" src="../Home/fancybox/jquery.min.js"></script>
<?php
    session_start();
     if(isset($_GET['class_id']) || isset($_SESSION['class_id']))
      {
          $class_id=$_SESSION['class_id'];
          $_SESSION['class_id']=$class_id;
      }
     else
      {
          echo "<h3 align='center'>No Class Selected</h3>";
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
   $run_query=$academic_manager->insertData_subject($form);
	 if($run_query)
	 { 
            $subject_name=$form['subject_name'];
        ?>
	      <script language='javascript'> window.parent.subject_add('<?php echo $subject_name; ?>','<?php  echo $run_query ?>'); alert('Data Inserted into The DB');</script> 
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
                                                           <h4>Add Subject</h4>
									<form method="post" action="">
									    <div class="row uniform">
                                                                               <div class="12u 12u$(xsmall)">
        <input type="hidden" name="class_id" id="class_id" required value="<?php echo $class_id; ?>"/>
</div>
											<div class="12u 12u$(xsmall)">
												<input type="text" name="subject_name" id="subject_name"  placeholder="Subject Name" required />
											</div>
											<div class="12u$ 12u$(xsmall)">
												<textarea name="subject_detail" required id="subject_detail" placeholder="Subject Detail- Enter your message" rows="6"></textarea>
											</div>
											 
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" id="sub" name="sub"  value="Add Subject" class="special" /></li>
												</ul>
											</div>
										</div>
									</form>
</section>