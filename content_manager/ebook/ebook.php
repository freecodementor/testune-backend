
<?php
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $vid_up = "SELECT title, description_line, duration, learning, vendor_id, price from video where video_id= '$id'";
    $result = $conn->query($vid_up);

    while($row = $result->fetch_array())
    {
     $title =$row['title'];
     $description_line = $row['description_line'];
     $duration =$row['duration'];
     $learning = $row['learning'];
     $vendor_id =$row['vendor_id'];
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
                <input type="text" name="course" id="" placeholder="EBOOK" class="course__field">
            </div>
            <a href="#" class="change-course">Change</a>
        </div>

        <div class="title-section">
            <h1 style="margin:5px;font-size: 26px;letter-spacing: 1px;color: #363636;">Title</h1>
            <textarea name="editor1" class="description_textarea"></textarea>
        </div>

        <div class="text-section">
            <input type="text" name="" id="" placeholder="Duration" class="field__1">
            <input type="text" name="" id="" placeholder="Author" class="field__2">
        </div>
        <div class="info-section">
            <p class="section-para">Choose a topic that interests you enough to focus on it for at least a week or two. If
                your topic is broad, narrow it. Instead of writing about how to decorate your home, try covering how to.</p>
        </div>
        <br>
        <div class="row headPage justify-content-end">
            <div class='col-sm-4  hi' style="margin:0;font-weight: 900">EVENING CLUB</div>
        </div>
        <div class="full" style="width:100%">
            <div class="page">
                <div class="font row">
                    <div class='col'>NEW ACTIVITY</div>
                </div>
            </div>
            <div class="full" style="width:100%">
                <div class="page">
                    <div class="row justify-content-center">
                        <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                            <table>
                                <tr>
                                    <td class='tableProperty'>LIVE HOBBY</td>
                                    <td>2</td>
                                </tr>
                            </table>
                        </div>
                        <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                            <table>
                                <tr>
                                    <td class='tableProperty'>ARTICLES</td>
                                    <td>2</td>
                                </tr>
                            </table>
                        </div>
                        <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                            <table>
                                <tr>
                                    <td class='tableProperty'>EBOOK</td>
                                    <td>0</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                            <table>
                                <tr>
                                    <td class='tableProperty'>WEBINAR</td>
                                    <td>2</td>
                                </tr>
                            </table>
                        </div>
                        <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                            <table>
                                <tr>
                                    <td class='tableProperty'>ONLINE TESTS</td>
                                    <td>2</td>
                                </tr>
                            </table>
                        </div>
                        <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                            <table>
                                <tr>
                                    <td class='tableProperty'>VIDEO</td>
                                    <td>0</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="page ">
                <div class="font row">
                    <div class='col'>REPOSITORY</div>
                </div>
                <div class='row justify-content-center'>
                    <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                        <table>
                            <tr>
                                <td class='tableProperty'>LIVE HOBBY</td>
                                <td>2</td>
                            </tr>
                        </table>
                    </div>
                    <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                        <table>
                            <tr>
                                <td class='tableProperty'>ARTICLES</td>
                                <td>2</td>
                            </tr>
                        </table>
                    </div>
                    <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                        <table>
                            <tr>
                                <td class='tableProperty'>EBOOK</td>
                                <td>0</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                        <table>
                            <tr>
                                <td class='tableProperty'>WEBINAR</td>
                                <td>2</td>
                            </tr>
                        </table>
                    </div>
                    <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                        <table>
                            <tr>
                                <td class='tableProperty'>ONLINE TESTS</td>
                                <td>2</td>
                            </tr>
                        </table>
                    </div>
                    <div class='col-xs-12 col-sm-4 col-md-4 col-xl-4 col-lg-4' style="margin-bottom: 15px;">
                        <table>
                            <tr>
                                <td class='tableProperty'>VIDEO</td>
                                <td>0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="upload-wrapper">
            <button type="button" class="upload__btn" data-toggle="modal" data-target="#exampleModal">
                UPLOAD FILE <i class="fas fa-cloud-upload-alt"></i>
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Your File</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="price-wrapper">
            <input type="text" name="course" id="" placeholder="Price" class="price_field">
        </div><br>
        <div class="deploy-wrapper">
            <button class="p__btn">Publish</button>
        </div>
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