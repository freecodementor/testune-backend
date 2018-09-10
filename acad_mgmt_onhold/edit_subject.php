<script type="text/javascript" src="../Home/fancybox/jquery.min.js"></script>
<?php
    session_start();
     if(isset($_GET['id']))
      {
          $subject_id=$_GET['id'];
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
   $run_query=$academic_manager->updateData_subject($form);
	 if($run_query)
	 { 
            $subject_name=$form['subject_name'];
        ?>
	      <script language='javascript'> window.parent.subject_update('<?php echo $subject_name; ?>','<?php  echo $run_query ?>'); alert('Data Updated');</script> 
<?php	 }
	 else
	 {
	     echo "<script language='javascript'>alert('Error in the system. Please try it later.');</script>";
	 }	 
}
$rc=mysql_query("select * from inst_subject where subject_id='$subject_id'");
$rg=mysql_fetch_array($rc); 
?>
<link rel="stylesheet" href="../website/assets3/css/main.css" />
<section class="wrapper style5">
                                                           <div class="inner">
                                                           <h4>Update Topic</h4>
									<form method="post" action="">
									    <div class="row uniform">
                                                                                        <div class="12u 12u$(xsmall)">
                                                                                              <input type="hidden" name="subject_id" id="subject_id" required value="<?php echo $subject_id; ?>" readonly />
                                                                                        </div>
											<div class="12u 12u$(xsmall)">
												<input type="text" name="subject_name" id="subject_name"  value="<?php echo $rg['subject_name']; ?>" placeholder="Subject Name" required />
											</div>
											<div class="12u$ 12u$(xsmall)">
												<textarea name="subject_detail" required id="subject_detail" placeholder="Subject Detail- Enter your message" rows="6"><?php echo $rg['subject_detail']; ?></textarea>
											</div>
											 
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" id="sub" name="sub"  value="Update Subject" class="special" /></li>
												</ul>
											</div>
										</div>
</section>