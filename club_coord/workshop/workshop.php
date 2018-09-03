
<?php
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $art_up = "SELECT title,description,no_of_classes,class_applicable_for,subscription_level,learning,vendor_id,prerequisites,price,primary_image,secondary_image,course_icon from workshop where workshop_id= '$id'";
    $result = $conn->query($art_up);

    while($row = $result->fetch_array())
    {
     $title =$row['title'];
     $class_applicable_for = $row['class_applicable_for'];
     $description =$row['description'];
     $no_of_classes = $row['no_of_classes'];
     $learning =$row['learning'];
     $subscription_level=$row['subscription_level'];
     $prerequisites =$row['prerequisites'];
     $vendor_id = $row['vendor_id'];
     $price =$row['price'];
     $primary_image =$row['primary_image'];
     $secondary_image =$row['secondary_image'];    
     $course_icon =$row['course_icon'];


  
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
    <link rel="stylesheet" href="http://www.testune.com/spacedtimes/club_coordinator/main.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
</head>
<style>
.work_img{
    margin:1em; height:10em;
}
</style>
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
                <input type="text"  value="<?php if(isset($title)){echo $title;}else{}?>" name="course" id="" placeholder="Course Name" class="course__field">
            </div>
            <a href="#" class="change-course">Change</a>
        </div>
        <div class="description__section">
            <!-- <div class="first-section">

            </div> -->
            <div class="second-section">
                <textarea name="editor1" class="description_textarea"><?php if(isset($description)){echo $description;}else{}?></textarea>
            </div>
        </div>
        <div class="text-section">
            <div class="inner_text" style="margin:10px">
                <input type="text"   value="<?php if(isset($no_of_classes)){echo $no_of_classes;}else{}?>" name="no_of_classes" id="" placeholder="No Of Classes" class="course__field">
            </div>
            <div class="inner_text-sub" style="margin:10px ">
                <input type="text" value="<?php if(isset($price)){echo $price;}else{}?>" name="price" id="" placeholder="Price" class="course__field">
            </div>
        </div>
        <div class="vendor_wrapper">
            <select class="vendor__select" style="width:auto;margin:20px 35px;">
                <option value="0">Class Is Applicable For</option>
                <option value="1">Class 6 <sup>th</sup></option>
                <option value="1">Class 7 <sup>th</sup></option>
                <option value="1">Class 8 <sup>th</sup></option>
                <option value="1">Class 9 <sup>th</sup></option>
                <option value="1">Class 10 <sup>th</sup></option>
                <option value="1">Class 11 <sup>th</sup></option>
                <option value="1">Class 12 <sup>th</sup></option>
            </select>
            <select class="vendor__select" style="width:auto;">
                <option value="0">Subscription Level</option>
                <option value="1">SILVER</option>
                <option value="1">GOLD</option>
                <option value="1">PLATINUM</option>
            </select>
        </div>
        <div class="select-section">
            <h5>What Will I Get ?
            </h5>
            <div class="second-section">
                <textarea name="editor2" class="description_textarea"><?php if(isset($learning)){echo $learning;}else{}?></textarea>
            </div>
        </div><br>
        <h5>Prerequisite
        </h5>
        <div class="second-section">
            <textarea name="editor3" class=""><?php if(isset($prerequisites)){echo $prerequisites;}else{}?></textarea>
        </div>
        <div class="vendor_wrapper">
        <div>
            <h6>Primary Image</h6>
            <img class="work_img" src="<?php if(isset($primary_image)){echo '../../assets/workshop/'.$primary_image;}else{}?>" alt="" >
        </div>
        <div >
            <h6>Secondary Image</h6>
                <img class="work_img" src="<?php if(isset($secondary_image)){echo '../../assets/workshop/'.$secondary_image;}else{}?>" alt="" >
                    </div>
                    <div >
            <h6>Course Icon</h6>
                    <img class="work_img" src="<?php if(isset($course_icon)){echo '../../assets/workshop/'.$course_icon;}else{}?>" alt="" >
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
                            <h5 class="modal-title" id="exampleModalLabel">Upload Your File</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#">
                                <label for="">Upload Primary Image</label>
                                <input type="file" name="" id=""><br><br>
                                <label for="">Upload Secondary Image</label>
                                <input type="file" name="" id=""><br><br>
                                <label for="">Upload Icon</label><br>
                                <input type="file" name="" id="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="vendor_wrapper">
            <select class="vendor__select" style="width:auto;margin:20px 35px;">
                <option value="0">Vendor </option>
                <option value="1">Vendor 1</option>
                <option value="1">Vendor 2</option>
            </select>
        </div>
        <div class="deploy-wrapper">
            <button class="p__btn">Publish</button>
        </div>
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