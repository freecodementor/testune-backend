<?php 
 include("../Home/assets/php/database.php"); 
 include("../Home/admin/class_admin.php"); 
 include_once "../Home/Users.php";
 $user = new User();
 $uid = $_SESSION['Userid'];
 if(isset($_GET['class_id']))
   {
      $class_id=$_GET['class_id'];
      $_SESSION['class_id']=$class_id;
   }
$r=mysql_query("select subject_id,subject_name from inst_subject where class_id like '%$class_id%'");
$num_row=mysql_num_rows($r);
if($num_row == '0')
{
   echo "<tr id='no_subject'><td>No Subject</td></tr>";
}
else
{
 while($r1=mysql_fetch_array($r))
  { ?>
     <tr><td id="<?php echo $r1[0]; ?>" class="subject_row" name="<?php echo $r1[0]; ?>"><?php echo $r1[1]; ?> <p align='right' style='margin: 0px;
    display: inline; float: right; cursor:pointer;'>&nbsp;&nbsp; <i class="fas fa-times" style='cursor:pointer;' onclick="delete_subject('<?php echo $r1[0]; ?>')"></i> &nbsp;&nbsp;<a href="edit_subject.php?id=<?php echo $r1[0]; ?>" class="pop"><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;<i class="fas fa-caret-right" onclick='get_topic("<?php echo $r1[0]; ?>")' style='cursor:pointer;'></i></p></td><tr>
 <?php }  
}
?>