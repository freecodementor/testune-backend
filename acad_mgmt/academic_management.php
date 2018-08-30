
<!DOCTYPE HTML>
<html>
	<head>
		<title>School Dashboard Panel</title>
		<meta charset="utf-8" />
        <base href="https://www.testune.com/spacedtimes/">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="main.css">
		<script type="text/javascript" src="fancybox/jquery.min.js"></script>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
                <script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
                <script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
                <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" />
                <script type="text/javascript">
		$(document).ready(function() {
				$("a.pop2").fancybox({
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});
		      	$("a.pop").fancybox({
			           'type': 'iframe',
				   'autoScale': true,
				   'autoDimensions': true,
					//'title'	  : 'By domain E',
				   'fitToView' : true,
			     	 //  'width'	: 'auto',
			      //'height'	: 'auto',
				//  'overlayShow'	: true,
				//'transitionIn'	: 'elastic',
				//'transitionOut'	: 'elastic',
                                 'onComplete': function() {
                                 // $("#fancybox-wrap").css({'left':'700px','right':'auto'});
                                 }
			});
                       $("a.view_comment").fancybox({
				    'type':'iframe',
			       'width' : 570,
                                'height':100,
                                'href':this.href,
                                'showCloseButton'   : true,
                                 'hideOnOverlayClick': false,
                                  'hideOnContentClick' :   false,
				});  
                        
                       $("a.teacher_login_form").fancybox({
			        'type':'iframe',
				'width' :750,
                                'height':530,
                                'href':this.href,
                                'showCloseButton'   : true,
                                'hideOnOverlayClick': false,
                                'hideOnContentClick' :   false,
				});   
                    });                                     
</script>
        </head>
	<body>
             <!-- Page Wrapper -->
		
<div class="navigationBar">
        <div class="logoBox">
            <h1 class="logoBox-header"><a href="inst_dashboard.php">SPACED<span>TIMES</span></a></h1>
        </div>
        <div class="menu-wrapper" style="margin-right:30px;">
           <a href="?q=logout" class="logout">Logout</a>
        </div>
</div>
<div class="middleWrapper_Academic">
        <ul class="academic_list">
            <li>
                <a href="batch_management.php" class="academic_links">BATCH MANAGEMENT</a>
            </li>
            <li>
                <a href="make_test_creator.php" class="academic_links">CREATOR MANAGEMENT</a>
            </li>
            <li>
                <a href="display_management.php" class="academic_links">DISPLAY MANAGEMENT</a>
            </li>
            <li>
                <a href="test_store_management.php" class="academic_links">STORE MANAGEMENT</a>
            </li>
            <li>
                <a href="user_management.php" class="academic_links">USER MANAGEMENT</a>
            </li>
        </ul>
        <div class="academic_header">
            <h1 class="academic_header-text">Academic Management</h1>
            <a href="#" class="academic_header_link">ADD DELETE MODIFY BATCHES AND COURSES</a>
              <form action="#" method="post">
               <select name="" class="academic_course"  id="course" name="course" onchange="change_course()">
                             <option  disabled="disabled" selected>Select Club</option>
                             <option  disabled="disabled" selected>App Development</option>     
                  </select></a>
         </div>
</div>

<div class="container">
        <div style="overflow-x:auto;overflow-y:auto">
            <table class="table table-hover academic_table table-bordered">
                 <thead class="thead-dark academic-table-header">
                    <tr>
                        <th scope="col">Club
                          <a href="add_class.php" class="pop">  <span style="float: right;font-size: 10px;text-align: center;margin:0;">+
                                <br> ADD
                            </span> </a>
                        </th>
                        <th scope="col">SUBJECTS
                           <a href="add_subject.php" class="pop"> <span style="float: right;font-size: 10px;text-align: center;margin: 0;padding: 0">+
                                <br> ADD
                            </span> </a>
                        </th>
                        <th scope="col">Topics
                          <a href="add_topic.php" class="pop">  <span style="float: right;font-size: 10px;text-align: center;margin: 0;padding: 0">+
                                <br> ADD
                            </span></a>
                        </th>
                        <th scope="col">Sub-Topics
                           <a href="add_sub_topic.php" class="pop"> <span style="float: right;font-size: 10px;text-align: center;margin: 0;padding: 0">+
                                <br> ADD
                            </span></a>
                        </th>
						  <th scope="col">Combination
                           <a href="add_combination.php" class="pop"> <span style="float: right;font-size: 10px;text-align: center;margin: 0;padding: 0">+
                                <br> ADD
                            </span></a>
                        </th> 
                    </tr>
                </thead>
				 <tbody>
<tr>
<td>
      <table name="class_table" id="class_table" class="table">
                   </table> 
</td>
<td>
     <table name="subject_table" id="subject_table" class="table">
     </table>
</td> 
<td>
     <table name="topic_table" id="topic_table" class="table">
     </table>
</td>   
<td>
     <table name="subtopic_table" id="subtopic_table" class="table"> 
     </table>
</td> 
<td>
     <table name="combinations" id="combinations" class="table">
     </table>
</td> 
													 
												</tr>
             </tbody>
  </table>
</div>
</div>
                                     <div class="footer" style="
    background-color: #1E252B;
    width: 100%;
    position: absolute;
    left: 0px;
    bottom: 0px;
    height: 100px;">
        <div class="footerInner">
            <h1>
                <i class="far fa-copyright"></i> SpacedTimes</h1>
        </div>
    </div>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
 <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                }
        
                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }
 </script>                        </div>

		<!-- Scripts -->
			<script src="../website/assets3/js/jquery.scrollex.min.js"></script>
			<script src="../website/assets3/js/jquery.scrolly.min.js"></script>
			<script src="../website/assets3/js/skel.min.js"></script>
			<script src="../website/assets3/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets3/js/ie/respond.min.js"></script><![endif]-->
			<script src="../website/assets3/js/main.js"></script>
<script language='javascript'>
var parent_page_url= window.location.pathname;
function add_class()
{
    var course=$('#course').val();
    alert(course);
}

function get_subject(p)
{
             $('.class_row').css("background-color","white");
             $('#'+p).css("background-color","yellow");
                                         $.ajax({
						  type: 'POST',
						  url: 'get_inst_subject.php?class_id='+p,
						  data: '',
						  beforeSend: function() {  
							},
						  success: function(response){
						     $('#subject_table').html(response);
                                                     $('#topic_table').html('');
                                                     $("a.pop").fancybox({
                                                                        'type': 'iframe',
				                                        'autoScale': true,
				                                        'autoDimensions': true,
				                                        'fitToView' : true,
                                                                      });  
                                                       
                                                  }
					      });
}

function get_topic(p)
{
             $('.subject_row').css("background-color","white");
             $('#'+p).css("background-color","yellow");
                                         $.ajax({
						  type: 'POST',
						  url: 'get_inst_topic.php?subject_id='+p,
						  data: '',
						  beforeSend: function() {  
							},
						  success: function(response){
						     $('#topic_table').html(response);
                                                     $('#subtopic_table').html('');
                                                     $("a.pop").fancybox({
                                                                        'type': 'iframe',
				                                        'autoScale': true,
				                                        'autoDimensions': true,
				                                        'fitToView' : true,
                                                                      });  
						  }
					       });
}


function get_subtopic(p)
{
             $('.topic_row').css("background-color","white");
             $('#'+p).css("background-color","yellow");
                                         $.ajax({
						  type: 'POST',
						  url: 'get_inst_subtopic.php?topic_id='+p,
						  data: '',
						  beforeSend: function() {  
							},
						  success: function(response){
						     $('#subtopic_table').html(response);
                                                     $("a.pop").fancybox({
                                                                        'type': 'iframe',
				                                        'autoScale': true,
				                                        'autoDimensions': true,
				                                        'fitToView' : true,
                                                                      });  
						  }
					       });
}

function class_add(p,q)
{
    if($("#no_class").length == 0) {
        }
   else
      { $("#no_class").remove(); }  
   $('#class_table').append("<tr><td id="+q+">"+p+"<p align='right' style='margin: 0px; display: inline; float: right;'>&nbsp;&nbsp;<img src='img/delete.png' onclick='delete_class(\""+q+"\")' width='20px' style='cursor:pointer;'>&nbsp;&nbsp;<a href='edit_class.php?id="+q+"' class='pop'><img src='img/edit.png' width='20px' style='cursor:pointer;'> </a>&nbsp;&nbsp;<img src='img/arrow.png' width='20px' onclick='get_subject(\""+q+"\")' style='cursor:pointer;'></p></td></tr>");
     $("a.pop").fancybox({
                            'type': 'iframe',
			    'autoScale': true,
			    'autoDimensions': true,
			    'fitToView' : true,
                       }); 
}

function subject_add(p,q)
{
   if($("#no_subject").length == 0) {
        }
   else
      { $("#no_subject").remove(); } 

   $('#subject_table').append("<tr><td id="+q+">"+p+"<p align='right' style='margin: 0px; display: inline; float: right;'>&nbsp;&nbsp;<img src='img/delete.png' onclick='delete_subject(\""+q+"\")' width='20px' style='cursor:pointer;'>&nbsp;&nbsp;<a href='edit_subject.php?id="+q+"' class='pop'><img src='img/edit.png' width='20px' style='cursor:pointer;'></a>&nbsp;&nbsp;<img src='img/arrow.png' width='20px' onclick='get_topic(\""+q+"\")' style='cursor:pointer;'></p></td></tr>");
     $("a.pop").fancybox({
                            'type': 'iframe',
			    'autoScale': true,
			    'autoDimensions': true,
			    'fitToView' : true,
                       }); 
}

function topic_add(p,q)
{
    if($("#no_topic").length == 0) {
        }
   else
      { $("#no_topic").remove(); } 
   $('#topic_table').append("<tr><td id="+q+">"+p+"<p align='right' style='margin: 0px; display: inline; float: right;'>&nbsp;&nbsp;<img src='img/delete.png' onclick='delete_topic(\""+q+"\")' width='20px' style='cursor:pointer;'>&nbsp;&nbsp;<a href='edit_topic.php?id="+q+"' class='pop'><img src='img/edit.png' width='20px' style='cursor:pointer;'></a> &nbsp;&nbsp;<img src='img/arrow.png' width='20px' onclick='get_subtopic(\""+q+"\")' style='cursor:pointer;'></p></td></tr>");
     $("a.pop").fancybox({
                            'type': 'iframe',
			    'autoScale': true,
			    'autoDimensions': true,
			    'fitToView' : true,
                       }); 
}

function subtopic_add(p,q)
{
    if($("#no_subtopic").length == 0) {
        }
   else
      { $("#no_subtopic").remove(); } 
   $('#subtopic_table').append("<tr><td id="+q+">"+p+"<p align='right' style='margin: 0px; display: inline; float: right;'>&nbsp;&nbsp;<img src='img/delete.png' onclick='delete_subtopic(\""+q+"\")' width='20px' style='cursor:pointer;'>&nbsp;&nbsp;<a href='edit_subtopic.php?id="+q+"' class='pop'><img src='img/edit.png' width='20px' style='cursor:pointer;'></a>&nbsp;&nbsp;<img src='img/arrow.png' width='20px' onclick='get_subject(\""+q+"\")' style='cursor:pointer;'></p></td></tr>");
       $("a.pop").fancybox({
                            'type': 'iframe',
			    'autoScale': true,
			    'autoDimensions': true,
			    'fitToView' : true,
                       });
}


function class_update(p,q)
{
    $('#'+q).html(p+"<p align='right' style='margin: 0px; display: inline; float: right;'>&nbsp;&nbsp;<img src='img/delete.png' onclick='delete_class(\""+q+"\")' width='20px' style='cursor:pointer;'>&nbsp;&nbsp;<a href='edit_class.php?id="+q+"' class='pop'><img src='img/edit.png' width='20px' style='cursor:pointer;'></a>&nbsp;&nbsp;<img src='img/arrow.png' width='20px' onclick='get_subject(\""+q+"\")' style='cursor:pointer;'></p>");
     $("a.pop").fancybox({
                            'type': 'iframe',
			    'autoScale': true,
			    'autoDimensions': true,
			    'fitToView' : true,
                       });
}

function subject_update(p,q)
{
    $('#'+q).html(p+"<p align='right' style='margin: 0px; display: inline; float: right;'>&nbsp;&nbsp;<img src='img/delete.png' onclick='delete_subject(\""+q+"\")' width='20px' style='cursor:pointer;'>&nbsp;&nbsp;<a href='edit_subject.php?id="+q+"' class='pop'><img src='img/edit.png' width='20px' style='cursor:pointer;'></a>&nbsp;&nbsp;<img src='img/arrow.png' width='20px' onclick='get_subject(\""+q+"\")' style='cursor:pointer;'></p>");
    $("a.pop").fancybox({
                            'type': 'iframe',
			    'autoScale': true,
			    'autoDimensions': true,
			    'fitToView' : true,
                       });
}

function topic_update(p,q)
{
   $('#'+q).html(p+"<p align='right' style='margin: 0px; display: inline; float: right;'>&nbsp;&nbsp;<img src='img/delete.png' onclick='delete_topic(\""+q+"\")' width='20px' style='cursor:pointer;'>&nbsp;&nbsp;<a href='edit_topic.php?id="+q+"' class='pop'><img src='img/edit.png' width='20px' style='cursor:pointer;'></a>&nbsp;&nbsp;<img src='img/arrow.png' width='20px' onclick='get_subject(\""+q+"\")' style='cursor:pointer;'></p>");
   $("a.pop").fancybox({
                            'type': 'iframe',
			    'autoScale': true,
			    'autoDimensions': true,
			    'fitToView' : true,
                       });
}

function subtopic_update(p,q)
{
   $('#'+q).html(p+"<p align='right' style='margin: 0px; display: inline; float: right;'>&nbsp;&nbsp;<img src='img/delete.png' onclick='delete_subtopic(\""+q+"\")' width='20px' style='cursor:pointer;'>&nbsp;&nbsp;<a href='edit_subtopic.php?id="+q+"' class='pop'><img src='img/edit.png' width='20px' style='cursor:pointer;'></a>&nbsp;&nbsp;<img src='img/arrow.png' width='20px' onclick='get_subject(\""+q+"\")' style='cursor:pointer;'></p>");
    $("a.pop").fancybox({
                            'type': 'iframe',
			    'autoScale': true,
			    'autoDimensions': true,
			    'fitToView' : true,
                       });
}


function change_course()
{
    var course=$('#course').val();
    window.location=parent_page_url+"?course_code="+course;
}

function delete_class(p)
{
   var r = confirm("Do you want to delete this class");
   if(r == true) 
   {
                                           $.ajax({
						  type: 'POST',
						  url: 'delete_class_id.php?class_id='+p,
						  data: '',
						  beforeSend: function() {  
							},
						  success: function(response){  
						         $('#'+response).remove(); 
                                                    }
					       });
   } 
   else 
   {
   }
}

function delete_subject(p)
{
   var r = confirm("Do you want to delete this subject");
   if(r == true) 
   {
                                          $.ajax({
						  type: 'POST',
						  url: 'delete_subject_id.php?subject_id='+p,
						  data: '',
						  beforeSend: function() {  
							},
						  success: function(response){
						         $('#'+response).hide(); 
                                                    }
					       });
   } 
   else 
   {
   }
}

function delete_topic(p)
{
   var r = confirm("Do you want to delete this topic");
   if(r == true) 
   {
                                           $.ajax({
						  type: 'POST',
						  url: 'delete_topic_id.php?topic_id='+p,
						  data: '',
						  beforeSend: function() {  
							},
						  success: function(response){
						         $('#'+response).hide(); 
                                                    }
					       });
   } 
   else 
   {
   }
}

function delete_subtopic(p)
{
   var r = confirm("Do you want to delete this subtopic");
   if(r == true) 
   {
                                            $.ajax({
			 			  type: 'POST',
						  url: 'delete_subtopic_id.php?subtopic_id='+p,
						  data: '',
						  beforeSend: function() {  
							},
						  success: function(response){
						         $('#'+response).hide(); 
                                                    }
					       });
   } 
   else 
   {
   }
}


</script>
</body>
</html>