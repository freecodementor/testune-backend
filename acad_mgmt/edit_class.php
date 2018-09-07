<script type="text/javascript" src="../Home/fancybox/jquery.min.js"></script>
<?php
    session_start();
     if(isset($_GET['id']))
      {
          $class_id=$_GET['id'];
      }
    else
      {
        echo "<h3 align='center'>No Class Selected</h3>";
        exit();
      } 
include("../Home/assets/php/database.php"); 
include("../Home/assets/php/class.acl.php");
include_once "../Home/admin/class_admin.php";
include_once "../Home/Users.php";
$user = new User();
$rc=mysql_query("select * from inst_class where class_id='$class_id'");
$rg=mysql_fetch_array($rc); 

if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
  $form = array();
  foreach($_POST as $key=>$value) {
	  $form[$key] = $value;
   }
   $academic_manager=new academic_manager(); 
   $run_query=$academic_manager->updateData_class($form);
	 if($run_query)
	 { 
             $class_name=$form['class'];
        ?>
	<script language='javascript'> window.parent.class_update('<?php echo $class_name; ?>','<?php  echo $run_query ?>'); alert('Data Updated');</script> 
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
                                                           <h4>Update Class</h4>
									<form method="post" action="">
									    <div class="row uniform">
                                                                                      <div class="12u 12u$(xsmall)">
                                                                                                <input type="hidden" name="class_id" id="class_id" required value="<?php echo $class_id; ?>" readonly/>
                                                                                       </div>
											<div class="12u 12u$(xsmall)">
												<input type="text" name="class" id="class" value="<?php echo $rg['class']; ?>" placeholder="Class/Level" required />
											</div>
											<div class="12u$ 12u$(xsmall)">
												<textarea name="class_detail" required id="class_detail" placeholder="Class Detail- Enter your message" rows="6"><?php echo $rg['class_detail']; ?></textarea>
											</div>
											 
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" id="sub" name="sub"  value="Update Class" class="special" /></li>
												</ul>
											</div>
										</div>
                                                                            <input type="hidden" id="institute_id" name="institute_id" value="<?php echo $uid; ?>" />
									</form>
</section>