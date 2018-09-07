<script type="text/javascript" src="../Home/fancybox/jquery.min.js"></script>
<?php
    session_start();
     if(isset($_GET['subject_id']) || isset($_SESSION['subject_id']))
      {
          $subject_id=$_SESSION['subject_id'];
          $_SESSION['subject_id']=$subject_id;
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
   $run_query=$academic_manager->insertData_topic($form);
	 if($run_query)
	 { 
            $topic_name=$form['topic_name'];
        ?>
	      <script language='javascript'> window.parent.topic_add('<?php echo $topic_name; ?>','<?php  echo $run_query ?>'); alert('Data Inserted into The DB');</script> 
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
                                                           <h4>Add Topic</h4>
									<form method="post" action="">
									    <div class="row uniform">
                                                                               <div class="12u 12u$(xsmall)">
        <input type="hidden" name="subject_id" id="subject_id" required value="<?php echo $subject_id; ?>"/>
</div>
											<div class="12u 12u$(xsmall)">
												<input type="text" name="topic_name" id="topic_name"  placeholder="Topic Name" required />
											</div>
											 
											</div>
											 
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" id="sub" name="sub"  value="Add Topic" class="special" /></li>
												</ul>
											</div>
										</div>
									</form>
</section>