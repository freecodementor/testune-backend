<?php
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $web_up = "SELECT title,description_line,no_of_classes,price,class_applicable_for,subscription_level,learning,prerequisites, primary_image,secondary_image, course_icon, vendor_id from workshop where workshop_id= '$id'";
    $result = $conn->query($web_up);

    while($row = $result->fetch_array())
    {
     $course =$row['title'];
     $editor1 = $row['description_line'];
     $classes =$row['no_of_classes'];
     $price = $row['price'];
     $cls_lvl =$row['class_applicable_for'];
     $sub_lvl =$row['subscription_level'];
     $editor2 =$row['learning'];
     $editor3 =$row['prerequisites'];

     $vendor =$row['vendor_id'];
     
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
    <link rel="stylesheet" href="http://www.testune.com/spacedtimes/content_manager/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
</head>

<body>

    <div class="navigationBar">
        <div class="logoBox">
            <h1 class="logoBox-header">SPACETIMES
        </div>
        <div class="menu-wrapper">
            <i class="fas fa-bars" onclick="openNav()"></i>
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
                <input type="text" value="<?php if(isset($course)){echo $course;}else{}?>" name="course" id="course" placeholder="Course Name" class="course__field">
            </div>
            <a href="#" class="change-course">Change</a>
        </div>
        <div class="description__section">
            <!-- <div class="first-section">

            </div> -->
            <div class="second-section">
                <textarea name="editor1" id="editor1" class="description_textarea"><?php if(isset($editor1)){echo $editor1;}else{}?></textarea>
            </div>
        </div>
        <div class="text-section">
            <div class="inner_text" style="margin:10px">
                <input type="text"  value="<?php if(isset($classes)){echo $classes;}else{}?>" name="classes" id="classes" placeholder="No Of Classes" class="course__field">
            </div>
            <div class="inner_text-sub" style="margin:10px ">
                <input type="text"  value="<?php if(isset($price)){echo $price;}else{}?>" name="price" id="price" placeholder="Price" class="course__field">
            </div>
        </div>
        <div class="vendor_wrapper">
            <select class="vendor__select" name="cls_lvl" id="cls_lvl" style="width:auto;margin:20px 35px;">
                <option value="">Class Is Applicable For</option>
                <option value="1">Class 6 <sup>th</sup></option>
                <option value="2">Class 7 <sup>th</sup></option>
                <option value="3">Class 8 <sup>th</sup></option>
                <option value="4">Class 9 <sup>th</sup></option>
                <option value="5">Class 10 <sup>th</sup></option>
                <option value="6">Class 11 <sup>th</sup></option>
                <option value="7">Class 12 <sup>th</sup></option>
            </select>
            <select class="vendor__select" id="sub_lvl" name="sub_lvl" style="width:auto;">
                <option value="">Subscription Level</option>
                <option value="1">SILVER</option>
                <option value="2">GOLD</option>
                <option value="3">PLATINUM</option>
            </select>
        </div>
        <div class="select-section">
            <h5>What Will I Get ?
            </h5>
            <div class="second-section">
                <textarea name="editor2" id="editor2" class="description_textarea"> <?php if(isset($editor2)){echo $editor2;}else{}?></textarea>
            </div>
        </div><br>
        <h5>Prerequisite
        </h5>
        <div class="second-section">
            <textarea name="editor3" id="editor3" class=""> <?php if(isset($editor3)){echo $editor3;}else{}?></textarea>
        </div>
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
                            
                                <label for="">Upload Primary Image</label>
                                <input type="file" name="primary" id="primary"><br><br>                                 
                                <label for="">Upload Secondary Image</label>
                                <input type="file" name="secondary" id="secondary"><br><br>                                
                                <label for="">Upload Icon</label><br>
                                <input type="file" name="icon" id="icon">              
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="vendor_wrapper">
            <select class="vendor__select" name="vendor" id="vendor" style="width:auto;margin:20px 35px;">
                <option value="">Vendor </option>
                <option value="inst_1">Vendor 1</option>
                <option value="inst_2">Vendor 2</option>
            </select>
        </div>
        <div class="deploy-wrapper">
        <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}else{}?>"> 
            <input type="hidden" name="action" <?php if(isset($id)){echo 'value="update"';}else{echo 'value="publish"';}?>>
            <button name="submit" value="submit" type="submit" onclick="ajaxbackend()" class="p__btn">Publish</button>
        </div>              <p id="msg"></p>
        </form>
    </div>
    <div class="footer ">
        <div class="footerInner ">
            <h1>TESTUNE TECHNOLOGY PVT LTD</h1>
        </div>
    </div>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css " integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg "
        crossorigin="anonymous ">
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
            var editor3= $('#editor3').val(); 
            var classes= $('#classes').val();
            var editor1= $('#editor1').val(); 
            var editor2= $('#editor2').val(); 
            var sub_lvl= $('#sub_lvl').val();
            var cls_lvl= $('#cls_lvl').val(); 
            var vendor= $('#vendor').val();  
            var price= $('#price').val(); 
                        
                
            
            
                  
                   if(course == '' || editor3 == '' || editor1 == '' || editor2 == '' || vendor == ''  || classes == '' || sub_lvl == '' || cls_lvl == '' || price == '' )
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
            url: "workshop_back.php",
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
        CKEDITOR.replace('editor1');
    </script>
    <script>
        CKEDITOR.replace('editor2');
    </script>
    <script>
        CKEDITOR.replace('editor3');
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>