<script type="text/javascript" src="../Home/fancybox/jquery.min.js"></script>
<?php
    session_start();
     if(isset($_GET['id']))
      {
          $subtopic_id=$_GET['id'];
      }
     else
      {
        echo "<h3 align='center'>No Sub Topic Selected</h3>";
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
   $run_query=$academic_manager->insertData_subtopic($form);
	 if($run_query)
	 { 
            $subtopic_name=$form['subtopic_name'];
        ?>
	      <script language='javascript'> window.parent.subtopic_update('<?php echo $subtopic_name; ?>','<?php  echo $run_query ?>'); alert('Data Inserted into The DB');</script> 
<?php	 }
	 else
	 {
	     echo "<script language='javascript'>alert('Error in the system. Please try it later.');</script>";
	 }	 
}
$rc=mysql_query("select * from inst_subtopic where subtopic_id='$subtopic_id'");
$rg=mysql_fetch_array($rc); 

?>
<link rel="stylesheet" href="../website/assets3/css/main.css" />
<section class="wrapper style5">
                                                           <div class="inner">
                                                           <h4>Update SubTopic</h4>
									<form method="post" action="">
									    <div class="row uniform">
                                                                                        <div class="12u 12u$(xsmall)">
                                                                                               <input type="hidden" name="subtopic_id" id="subtopic_id" required value="<?php echo $subtopic_id; ?>" readonly/>
                                                                                        </div>
											<div class="12u 12u$(xsmall)">
												<input type="text" name="subtopic_name" id="subtopic_name" value="<?php echo $rg['subtopic_name']; ?>"  placeholder="Sub Topic Name" required />
											</div>
											 
											</div>
											 
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" id="sub" name="sub"  value="Update Sub Topic" class="special" /></li>
												</ul>
											</div>
										</div>
									</form>
</section>