<script type="text/javascript" src="../Home/fancybox/jquery.min.js"></script>
<?php
    session_start();
     if(isset($_GET['id']))
      {
          $topic_id=$_GET['id'];
      }
     else
      {
        echo "<h3 align='center'>No Topic Selected</h3>";
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
   $run_query=$academic_manager->updateData_topic($form);
	 if($run_query)
	 { 
            $topic_name=$form['topic_name'];
        ?>
	      <script language='javascript'> window.parent.topic_update('<?php echo $topic_name; ?>','<?php  echo $run_query ?>'); alert('Data Updated');</script> 
<?php	 }
	 else
	 {
	     echo "<script language='javascript'>alert('Error in the system. Please try it later.');</script>";
	 }	 
}
$rc=mysql_query("select * from inst_topic where topic_id='$topic_id'");
$rg=mysql_fetch_array($rc); 
?>
<link rel="stylesheet" href="../website/assets3/css/main.css" />
<section class="wrapper style5">
                                                           <div class="inner">
                                                           <h4>Update Topic</h4>
									<form method="post" action="">
									       <div class="row uniform">
                                                                                        <div class="12u 12u$(xsmall)">
                                                                                              <input type="hidden" name="topic_id" id="topic_id" required value="<?php echo $topic_id; ?>" readonly />
                                                                                        </div>
											<div class="12u 12u$(xsmall)">
												<input type="text" name="topic_name" id="topic_name"  placeholder="Topic Name" required value="<?php echo $rg['topic_name']; ?>" />
											</div>
											 
											</div>
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" id="sub" name="sub"  value="Update Topic" class="special" /></li>
												</ul>
											</div>
										</div>
									</form>
</section>