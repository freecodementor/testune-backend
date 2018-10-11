<?php
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $art_up = "SELECT article.name, article.description, article.duration, article.author, article.mrp_price,article.school_price,article.class_applicable_for, article.article_file,vendor.vendor_name,
    vendor.vendor_icon,activities.icon from article  INNER JOIN vendor ON 
    article.vendor_id =   vendor.vendor_id  INNER JOIN activities ON activities.page_name LIKE 'article.php' where article_id= '$id'";
    $result = $conn->query($art_up);
    while($row = $result->fetch_array())
    {
     $art_file =$row['name'];
     $description = $row['description'];
     $duration =$row['duration'];
     $author = $row['author'];
     $price =$row['mrp_price'];
     $class = explode(",",$row['class_applicable_for']);
     $article_file=$row['article_file'];
     $vendor_id = $row['vendor_name'];
     $ven_icon = $row['vendor_icon'];
     $act_icon = $row['icon'];    
    }
}
else{
    echo "<script>alert('No Article Selected, Please go back and select a Article to view it...')</script>";
    die;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>


<body>
    <div class="navigationBar">
        <div class="logoBox">
            <h1 class="logoBox-header">SPACEDTIMES
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
    <div class="banner">
        <div class="page-container">
            <div class="banner--text">Article Details :</div>
        </div>
    </div>
    <div class="page-container">
        <div class="div-gap">
            <div class="title-wrap">
                <h1 class="title-head">Article
                </h1>
                <img src="../assets/vendor/<?php if(isset($ven_icon)){echo $ven_icon;}else{}?>" alt="" class="img-main">
                <img src="../assets/activity/<?php if(isset($act_icon)){echo $act_icon;}else{}?>" alt="" class="img-main">
            </div>
        </div>
        <div class="div-gap">
            <div class="desc-wrap">
                <h1 class="desc-head"><?php if(isset($name)){echo $name;}else{}?>
                </h1>
                <div style="overflow-x:auto;overflow-y: auto;max-height: 200px;">
                    <div class="desc-para"><?php if(isset($description)){echo $description;}else{}?>

                    </div>
                </div>
                <div class="float-wrap">
                    <h1 class="desc-text" style="float:left;margin-left: 15px;">Author : <?php if(isset($author)){echo $author;}else{}?></h1>
                    <h1 class="desc-text" style="float:right;margin-right: 15px;">Duration : <?php if(isset($duration)){echo $duration;}else{}?> Days</h1>
                </div>

            </div>
        </div>
    <form id="approve" method="POST" action="">
        <div class="div-gap">
            <h1 class="desc-head">Webinar Is Applicable For Class</h1>
            <div class="class-wrap">
            <?php if(!empty($class) && isset($class) ){foreach($class as $key => $val){if($val!==''){echo '<div class="card-class-main effect">
                    <h1 class="class-head">Class '.$val.'</h1>
                    <input type="hidden" name="class'.$val.'" value="'.$val.'">
                </div>';}else{echo '<div class="card-class-main effect">
                    <h1 class="class-head">No Class</h1>
                </div>';}}} else{}?>
            </div>
        </div>

        <div class="div-gap">
            <h1 class="desc-head"><?php if(isset($art_file)){echo $art_file;}else{}?></h1>           
            <div id="ebookfile"></div>           
        </div>
        <div class="div-gap">
            <div class="last-wrap">
                <h1 class="last-text">Vendor : <?php if(isset($vendor_id)){echo $vendor_id;}else{}?></h1>
                <h1 class="last-text">Price : Rs <?php if(isset($price)){echo $price;}else{}?></h1>
            </div>
        </div>
    </div>
          <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}else{}?>">
           <input type="hidden" name="type" value="article">
           <button class="p__btn" type="submit" onclick="ajaxbackend()">Approve</button>
    </form>
    <div class="footer">
        <div class="footerInner">
            <h1>SPACEDTIMES</h1>
        </div>
    </div>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css " integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg "
        crossorigin="anonymous ">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.0.201604172/pdfobject.min.js"></script>
        <script>PDFObject.embed("../assets/article/<?php if(isset($article_file)){echo $article_file;}else{}?>", "#ebookfile");</script>
            <script language="javascript">
    function ajaxbackend(){   
                        event.preventDefault();                 
                        var form = $('#approve')[0];           
                        var data = new FormData(form);                                                      
                        $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: "approve.php",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function (data) {   
                            console.log(data);                          
                            if (data=='approved')
                        {alert('Approved Successfully !');
                        location.reload(true); 
                        }else if(data=='error')
                        {alert('Error Approving !');}                                                                       
                        },
                        error: function (e) {           
                            console.log(e);
                        }
                    });      
                    
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
</body>
</html>