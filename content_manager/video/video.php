
<?php
session_start();
$_SESSION['club_id']="web";
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $vid_up = "SELECT title, description_line, duration, learning, vendor_id, price, video_file from video where video_id= '$id'";
    $result = $conn->query($vid_up);

    while($row = $result->fetch_array())
    {
     $title =$row['title'];
     $description_line = $row['description_line'];
     $duration =$row['duration'];
     $learning = $row['learning'];
     $vendor_id =$row['vendor_id'];
     $price =$row['price'];
     $video_file =$row['video_file'];
    }
}
else{

}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link href="http://www.testune.com/spacedtimes/content_manager/css/main.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"        crossorigin="anonymous"> 
</head>
<body>
   <div class="navigationBar">
        <div class="logoBox">
            <h1 class="logoBox-header"><a href="index.php" style="color:#fff; text-decoration:none">SPACEDTIMES</a></h1>
        </div>
        <div class="menu-wrapper">
            <i class="fas fa-bars"></i>
        </div>
         <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="button-wrapper">
                <a href="#">Logout</a>
            </div>
        </div>
    </div>
	 
    <div class="page">
        <div class="course-section">
            <div class="course__input">
            <form id="fileUploadForm" enctype="multipart/form-data" >
                <input type="text" value="<?php if(isset($title)){echo $title;}else{}?>" name="course" id="course" placeholder="VIDEO" class="course__field">
            </div>
            <a href="#" class="change-course">Change</a>
        </div>
        <div class="description__section">
            <div class="first-section">
                <h4 style="color: #000">First Section
                </h4>
            </div>
            <div class="second-section">
                <textarea name="editor1" id="editor1" class="description_textarea"> <?php if(isset($description_line)){echo $description_line;}else{}?></textarea>
            </div>
        </div>
        <div class="duration">
            <input type="text" id="duration" name="duration" value="<?php if(isset($duration)){echo $duration;}else{}?>" id="" placeholder="Duration" class="duration_field">
        </div>
        <div class="select-section">
            <h5>What Will I Get?
            </h5>
            <div class="second-section">
                <textarea name="editor2" id="editor2" class="description_textarea"> <?php if(isset($learning)){echo $learning;}else{}?></textarea>
            </div>
        </div>
        <div class="upload-wrapper">
            <button type="button" class="upload__btn" data-toggle="modal" data-target="#exampleModal">
                UPLOAD FILE <i class="fas fa-cloud-upload-alt"></i>
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                                <input id="fileToUpload" type="file" name="fileToUpload">                                               
                        </div>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="vendor_wrapper">
            <select name="vendor" class="vendor__select" required>                
                <option value="inst_1">Ven 1</option>
                <option value="inst_2">Ven 2</option>
            </select>
        </div>
        <div class="price-wrapper">
            <input type="text" name="price" value="<?php if(isset($price)){echo $price;}else{}?>" id="price" placeholder="Price" class="price_field">
        </div>
        <div class="deploy-wrapper">
            <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}else{}?>"> 
            <input type="hidden" name="action" <?php if(isset($id)){echo 'value="update"';}else{echo 'value="publish"';}?>>
            <button name="submit" value="submit" type="submit" onclick="ajaxbackend()" class="p__btn">Publish</button>
        </div>              <p id="msg"></p>
        </form>
    </div>
    
 
  <div class="footer">
        <div class="footerInner">
            <h1>SPACEDTIMES</h1>
        </div>
    </div>

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"  crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
   
<script language="javascript">



function ajaxbackend(){
    for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement(); }
    var course= $('#course').val(); 
    var duration= $('#duration').val(); 
    var editor1= $('#editor1').val(); 
    var editor2= $('#editor2').val(); 
    var vendor= $('#vendor').val(); 
                
	    
    
    
          
           if(course == '' || duration == '' || editor1 == '' || editor2 == '' || vendor == '' )
                  {
		        alert('Please make sure all fields are filled.');
                event.preventDefault();
		  } else {
               //stop submit the form, we will post it manually.   
               event.preventDefault();
            // Get form
            var form = $('#fileUploadForm')[0];
// Create an FormData object 
var data = new FormData(form);

// If you want to add an extra field for the FormData
data.append("CustomField", "This is some extra data, testing");

// disabled the submit button
$("#sub").prop("disabled", true);

$.ajax({
    type: "POST",
    enctype: 'multipart/form-data',
    url: "video_back.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,
    success: function (data) {

        
        console.log(data);
        $("#sub").prop("disabled", false);

    },
    error: function (e) {

        $("#result").text(e.responseText);
        document.getElementById('msg').innerHTML = 'Rename File or upload smaller file!';
        $("#sub").prop("disabled", false);

    }


});

}



          }
  
    

   
</script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

<script>
        CKEDITOR.replace('editor1');
    </script>
    <script>
        CKEDITOR.replace('editor2');
    </script>		