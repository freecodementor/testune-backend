
<?php
session_start();
$_SESSION['club_id']="app";
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $test_up = "SELECT test_name, test_data, duration, test_creator, price from online_test where test_id= '$id'";
    $result = $conn->query($test_up);

    while($row = $result->fetch_array())
    {
     $name =$row['test_name'];
     $description = $row['test_data'];
     $duration =$row['duration'];
     $author = $row['test_creator'];
     $price =$row['price'];
     
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
            <form id="fileUploadForm" enctype="multipart/form-data" method="post">
                <input type="text" value="<?php if(isset($name)){echo $name;}else{}?>" name="course" id="course" placeholder="TEST" class="course__field">
            </div>
            <a href="#" class="change-course">Change</a>
        </div>

        <div class="title-section">
            <h1 style="margin:5px;font-size: 26px;letter-spacing: 1px;color: #363636;">Title</h1>
            <textarea name="editor1" class="description_textarea"><?php if(isset($description)){echo $description;}else{}?></textarea>
        </div>

        <div class="text-section">
            <input type="text" value="<?php if(isset($duration)){echo $duration;}else{}?>" name="duration" id="duration" placeholder="Duration" class="field__1">
            <input type="text" value="<?php if(isset($author)){echo $author;}else{}?>" name="author" id="author" placeholder="Author" class="field__2">
        </div>
        <div class="info-section">
        <h1 class="description-header">Type Of Test</h1>
            <p class="section-para">Choose a topic that interests you enough to focus on it for at least a week or two. If
                your topic is broad, narrow it. Instead of writing about how to decorate your home, try covering how to decorate
                your home in country style on a shoestring budget. That’s more specific and, as such, easier to tackle.</p>
        </div>
        <br>
        
        <div class="test-section">
            <h1 class="test-header">Start Test</h1>
            <i class="fas fa-play secondary-icons"></i>
        </div><div class="price-wrapper">
            <input type="text" value="<?php if(isset($price)){echo $price;}else{}?>" name="price" id="price" placeholder="Price" class="price_field">
        </div><br>
        <div class="deploy-wrapper">
        <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}else{}?>">
            <input type="hidden" name="action" <?php if(isset($id)){echo 'value="update"';}else{echo 'value="publish"';}?>>
            <button name="submit" value="submit" onclick="ajaxbackend()" class="p__btn">Publish</button>
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
    var author= $('#author').val(); 
    var editor1= $('#editor1').val(); 
    var price= $('#price').val(); 
     
    if(course == '' || duration == '' || author == '' || editor1 == '' || price == '' )
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
    url: "online_test_back.php",
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
    