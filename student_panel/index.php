<?php
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
    $nonacademic="select club_name,features,club_description,image, launch_date,club_id from clubs where club_category_id='club_nonacademic'";
    $academic="select club_name,features,club_description,image, launch_date,club_id from clubs where club_category_id='club_academic'";
    $result_nonacad = $conn->query($nonacademic);
    $result_acad = $conn->query($academic);    
    $i=0;
    while($club[$i] = mysqli_fetch_row($result_nonacad))
    { $j=0;      
        foreach($club[$i] as $c ){
            $row[$i][$j]=$c;
            $j++;
        }
        $i++;     
    } 
    $j=$i=0;   
    while($acad[$i] = mysqli_fetch_row($result_acad))
    { $j=0;      
        foreach($acad[$i] as $a ){
            $row_acad[$i][$j]=$a;
            $j++;
        }
        $i++;     
    }
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="template-purple.css">
    <link rel="stylesheet" href="w3.css">

    <!--     <link rel="stylesheet" href="owl.carousel.min.css">
 -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link href="assets/css/template-purple.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="http://www.wingxp.com/favicon.ico" type="image/gif" sizes="16x16">
    <link rel="icon" href="http://www.wingxp.com/favicon.ico" type="image/gif" sizes="16x16">

    <script language='javascript'>
        $(function () {
            $("#password").keyup(function (event) {
                if (event.keyCode == 13) {
                    login();
                }
            });
        });

        function login() {
            var user = $.trim($('#username').val());
            var pass = $.trim($('#password').val());
            if (user == '' || pass == '') {
                alert('Please enter the username & password');
            }
            else {
                $.ajax({
                    type: 'POST',
                    url: '../assets/login_check.php',
                    data: { username: user, password: pass, institute_id: 'Institute_1200', logintype: 'inst_student' },
                    beforeSend: function () {
                    },
                    success: function (response) {
                        if (response == 'inst_student') {
                            window.location = "student_dashboard_final.php";
                        }
                        else {
                            alert("Incorrect username & password");
                        }
                    }
                });
            }
        }
    </script>
</head>

<body>

    <div class="time-wrapper">
        <div class="page-container">
            <div class="inner-time">
                <i class="far fa-clock secondary-icons time-icon" style="color:#fff;"> <span id="current_time">
                    </span></i>
            </div>
        </div>
    </div>
    <div class="module subcribe">
        <div class="modcontent" style="float:right;background-color: #ce1f36">
            <div class="page-container">
                <div class="head login-header">Student Login</div>
                <form id="main" method="POST" action="student_dashboard.php" class="student_form">
                    <input type="text" id="username" name="username" placeholder="your username" autocomplete="email"
                        required="">
                    <input type="text" id="password" name="password" placeholder="your password" autocomplete="password"
                        required="">
                    <input type="hidden" name="club_id" value="club_web">
                    <div class="btn-subcribe" onclick="login();">Login <i class="fas fa-sign-in-alt"></i></div>
                </form>
            </div>
        </div>
    </div>
    <div class="topnav" id="myTopnav">
        <div class="page-container">
            <a href="#contact" style="font-weight: 900;font-size: 15px;background-color: #82024f;color: #fff;"><i class="fas fa-home"></i></a>
            <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">Admission</a>
            <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">About Us</a>
            <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">Academic</a>
            <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">Contact Us</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fas fa-bars" style="color:#82024f;font-size: 18px;"></i></a>
        </div>
    </div>
    <div class="w3-content w3-display-container">
        <div class="w3-display-container mySlides">
            <img src="slider-1_NF-min.png" style="width:100%;height: 100%;">
            <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
                <div class="slide-inner">
                    <h1 class="slide-head">Showcase <br> your Projects</h1>
                    <a href="#" class="slide-link">Know More</a>
                </div>
            </div>
        </div>

        <div class="w3-display-container mySlides">
            <img src="slider-5F-min.png" style="width:100%;height: 100%;">
            <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
                <div class="slide-inner-right">
                    <h1 class="slide-head slide-right">Get<br>certifed</h1>
                    <a href="#" class="slide-link-right">Know More</a>
                </div>
            </div>
        </div>

        <div class="w3-display-container mySlides">
            <img src="slider_4_NF.jpg" style="width:100%;height: 100%;">
            <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
                <div class="slide-inner">
                    <h1 class="slide-head">Expand your <br> horizons through <br> Webinars</h1>
                    <a href="#" class="slide-link">Know More</a>
                </div>
            </div>
        </div>

        <div class="w3-display-container mySlides">
            <img src="slider-3_NF-min.png" style="width:100%;height: 100%;">
            <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
                <div class="slide-inner">
                    <h1 class="slide-head slide-right">..from <br> the comfort <br>of your home</h1>
                    <a href="#" class="slide-link-right">Know More</a>
                </div>
            </div>
        </div>

        <div class="w3-display-container mySlides">
            <img src="slider-2_NF-min.png" style="width:100%;height: 100%;">
            <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
                <div class="slide-inner">
                    <h1 class="slide-head">Learn with <br>your peers</h1>
                    <a href="#" class="slide-link">Know More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-container">
        <div class="button-wrapper">
            <div class="first-button flex-bttn">
                <a href="#" class="bttn-dark" data-toggle="modal" data-target="#exampleModalCenter-1">Why Clubs</a>
            </div>
            <div class="second-button flex-bttn">
                <a href="#" class="bttn-dark bttn" data-toggle="modal" data-target="#exampleModalCenter-2">Launch Plan</a>
            </div>
            <div class="third-button flex-bttn">
                <a href="#" class="bttn-dark bttn " data-toggle="modal" data-target="#exampleModalCenter-3">Choose Club</a>
            </div>
        </div>
        <div class="loading_wrapper ">
            <div class="inner_loading">
                <div class="loading-header">
                    <h1>Wing XP Clubs</h1>
                </div>
                <div class="loading-list">
                    <ul class="inner_list">
                        <li>Academic</li>
                        <li>Sports</li>
                        <li>Technology</li>
                        <li>Social</li>
                        <li>Smarter Minds</li>
                        <li>Language</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sections">
        <?php $i=$j=$inc1=0; $inc2=50; while(isset($row[$i][0])){?>
            <div class="common">
                <div class="img-section">
                    <img src="./assets/images/<?php if(isset($row[$i][3])){echo $row[$i][3];}else{} ?>" height="180px;">
                </div>
                <div class="section-info">
                    <h1 class="section--header"><?php if(isset($row[$i][0])){echo $row[$i][0];}else{} ?></h1>
                    <h2 class="section-sub-first"><?php if(isset($row[$i][1])){ $feature = explode(",",$row[$i][1]); echo $feature[0];}else{} ?></h2>
                    <h2 class="section-sub-first"><?php if(isset($row[$i][1])){  echo $feature[1];}else{} ?></h2>
                    <h2 class="section-sub-first"><?php if(isset($row[$i][1])){  echo $feature[2];}else{} ?></h2>
                    <div class="section-link-wrapper">
                        <a href="#" class="section--link" data-toggle="modal" data-target="#exampleModalCenter-N1<?php echo 'a'.$j;?>" onclick="(this)">
                        <?php if(isset($row[$i][4])){if ($row[$i][4]<=date("Y-m-d")){echo 'Enter';}else{echo 'Coming Soon';}}else{} ?></a>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalCenter-N1<?php echo 'a'.$j++;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="mod-title-new">Club Info</h1>
                                <p class="mod-info">
                                <?php if(isset($row[$i][2])){echo $row[$i][2];}else{} ?>                                
                                </p>
                            </div>
                            <div class="col-md-6 border-left">
                                <h1 class="mod-title-new">Login Here</h1><br>
                                <form id='<?php echo $inc1;?>' method="POST" action="student_dashboard.php">
                                    <input type="text" name="username" placeholder="Type your username" class="form-field" autocomplete="email" required>
                                    <input type="password" name="password" placeholder="Type your password" class="form-field" autocomplete="password" required>
                                    <input type="hidden" name="club_id" value="<?php if(isset($row[$i][5])){echo $row[$i][5];}else{} ?>">
                                    <button type="submit" class="login_btn" onclick="open_club('<?php echo$inc1;$inc1++;?>')">Login</button>    
                                </form>                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>   
        </div>
    </div><?php $i++;}?>
        </div>
        <div class="loading_wrapper ">
            <div class="inner_loading">
                <div class="loading-header">
                    <h1>Wing XP Clubs</h1>
                </div>
            </div>
        </div>
        <div class="inner-info-wrapper">
            <?php $i=$j=0; while(isset($row_acad[$i][0])){?>
            <div class="sections-div gap-top">
                <h1 class="div-head"><?php if(isset($row_acad[$i][0])){echo $row_acad[$i][0];}else{} ?></h1>
                <div class="sections-img">
                    <img src="assets/images/<?php if(isset($row_acad[$i][3])){echo $row_acad[$i][3];}else{} ?>"  data-toggle="modal" data-target="#exampleModalCenter-N1<?php echo 'b'.$j;?>" onclick="(this)">
            </div>  
        </div>
    <div class="modal fade" id="exampleModalCenter-N1<?php echo 'b'.$j++;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="mod-title-new">Club Info</h1>
                                <p class="mod-info">
                                <?php if(isset($row_acad[$i][2])){echo $row_acad[$i][2];}else{} ?>
                                </p>
                            </div>
                            <div class="col-md-6 border-left">
                                <h1 class="mod-title-new">Login Here</h1><br>      
                                <form id='<?php echo $inc2;?>' method="POST" action="student_dashboard.php">                          
                                    <input type="text" name="username" placeholder="Type your username" class="form-field" autocomplete="email" required>
                                    <input type="password" name="password" placeholder="Type your password" class="form-field" autocomplete="password" required>
                                    <input type="hidden" name="club_id" value="<?php if(isset($row_acad[$i][5])){echo $row_acad[$i][5];}else{} ?>">
                                    <button type="submit" class="login_btn" onclick="open_club('<?php echo$inc2;$inc2++;?>')">Login</button>        
                                </form>                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
            <?php $i++;}?>
        </div>
    <section style="background-color:#363636;height: 60px">
        <h1 class="footer-inner"> Powered by <span style="color:#2abfd4"> <a href="www.wingxp.com" class="footer-link">
                    wingxp.com </a></span></h1>
    </section>
    <div class="modal fade" id="exampleModalCenter-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #ce1f36;">
                    <h1 class="xplore-head modal-title">XPLORE the world of knowledge</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                       "><i class="fas fa-times-circle close-icon"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <div class="col-inner-of-3">
                            <div class="col-one">
                                <div>
                                    <img src="assets/images/xplore-1.png" alt="" class="xplore-fav">
                                </div>
                                <p class="xplore-desc">Get introduced to the topic through the Video / e-Book
                                    library
                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xplore-2.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Take up engaging quizzes and polls
                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xplore-3.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Subscribe to new weekly / monthly articles
                                </p>
                            </div>
                        </div>
                        <p class="div-desc">An age appropriate, curated content platform introducing students
                            to a range of
                            topics relevant in today’s world
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #ce1f36;">
                    <h1 class="xplore-head modal-title">XPERIENCE our new age courses and workshops
                    </h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                   "><i class="fas fa-times-circle close-icon"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <div class="col-inner-of-3">
                            <div class="col-one">
                                <div>
                                    <img src="assets/images/xperience-1.png" alt="" class="xplore-fav">
                                </div>
                                <p class="xplore-desc">Develop deeper into the topic through Webinars by experts
                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xperience-3.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Do-along Workshops
                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xperience-2.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Empower by getting into Courses & learn new age skills

                                </p>
                            </div>
                        </div>
                        <p class="div-desc">Online live courses, workshops, webinars and projects run by experts to
                            give students a headstart in learning a topic

                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #ce1f36;">
                    <h1 class="xplore-head modal-title">XPRESS yourself</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                       "><i class="fas fa-times-circle close-icon"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <div class="col-inner-of-3">
                            <div class="col-one">
                                <div>
                                    <img src="assets/images/xpress-1.png" alt="" class="xplore-fav">
                                </div>
                                <p class="xplore-desc">Connect with your peers and share your learnings
                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xpress-2.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Create and
                                    publish your projects on school community

                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xpress-3.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Intra / Inter-School Contest
                                </p>
                            </div>
                        </div>
                        <p class="div-desc">Inter-school platform to showcase student creations allowing them to
                            learn
                            with their peers

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="bootstrap-carousel-swipe.js"></script>
    <script>
        var club_id;
        $(document).ready(function () {
            $('a').click(function () {
                var club_id = $(this).attr("id")
            });
        });
    /*function open_club(id){    
    var username= $('#username').val(); 
    var password= $('#password').val();     
           if(username == '' || password == '')
                {
                        alert('Please make sure all fields are filled.');
                        event.preventDefault();
		         } 
            else {               
                        event.preventDefault();    
                        var form = $('#'+id)[0];                        
                        var data = new FormData(form);
                        //data.append(club_id);
                        $.ajax({
                                    type: "POST",
                                    url: "student_dashboard.php",
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
    }*/
    </script>
    <!-- <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                500: {
                    items: 2,
                    nav: true
                },
                800: {
                    items: 3,
                    nav: true,
                    loop: false
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false
                }
            }
        })
    </script> -->
    <script>
        setInterval(function () {
            var time = new Date();
            var hh = time.getHours();
            var mm = time.getMinutes();
            var ss = time.getSeconds();
            var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var day = days[time.getDay()];
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var month = months[time.getMonth()];
            var date = time.getDate();
            var year = time.getFullYear();
            $('#current_time').html(month + " " + date + ", " + year + " " + hh + ":" + mm + ":" + ss);
        }, 1000);
        /*  $('.owl-carousel').owlCarousel({
             loop: true,
             margin: 10,
             responsiveClass: true,
             responsive: {
                 0: {
                     items: 1,
                     nav: true
                 },
                 500: {
                     items: 2,
                     nav: true
                 },
                 800: {
                     items: 3,
                     nav: true,
                     loop: false
                 },
                 1000: {
                     items: 4,
                     nav: true,
                     loop: false
                 }
             }
         }); */
    </script>

    <script>
        setInterval(function () {
            var time = new Date();
            var hh = time.getHours();
            var mm = time.getMinutes();
            var ss = time.getSeconds();
            var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var day = days[time.getDay()];
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var month = months[time.getMonth()];
            var date = time.getDate();
            var year = time.getFullYear();
            $('#current_time').html(month + " " + date + ", " + year + " " + hh + ":" + mm);
        }, 1000);
        $(document).ready(function () {
            $(".trigger").on("click", function () {
                $(".modal-wrapper").toggleClass("open");
                $(".page-wrapper").toggleClass("blur-it");
                return false;
            });
        });
        $(document).ready(function () {
            $(".trigger").on("click", function () {
                $(".modal-wrapper_2").toggleClass("open");
                $(".page-wrapper").toggleClass("blur-it");
                return false;
            });
        });
    </script>
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = x.length }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }

        var slideIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > x.length) { slideIndex = 1 }
            x[slideIndex - 1].style.display = "block";
            setTimeout(carousel, 4000);
        }
    </script>
</body>

</html>
</body>

</html>