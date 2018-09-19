<?php
//echo $_POST['username'];
//echo $_POST['password'];
$club_id= $_POST['club_id'];
//$inst_id=$SESSION['institute_id'];
$inst_id = 'inst_1';
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
    $spanel="select clubs.club_name,inst_club_coordinator.name,inst_club_coordinator.photo,inst_club_coordinator.detail from cc_club_assign
     INNER JOIN clubs ON cc_club_assign.club_id=clubs.club_id  INNER JOIN inst_club_coordinator ON inst_club_coordinator.club_coordinator_id
      = cc_club_assign.club_coordinator_id LIKE '$club_id' AND  inst_club_coordinator.institute_id = '$inst_id' ";
    $up_workshop = "select title from workshop where club_id='$club_id' order by date DESC LIMIT 1"; 
    $up_webinar = "select title from webinar where club_id='$club_id' order by date DESC LIMIT 1";
    $result = $conn->query($spanel);       
    $result1 = $conn->query($up_workshop); 
    $result2 = $conn->query($up_webinar);
    if(1==1){
        while($row = $result->fetch_array())
        {
         $club_name =$row['club_name'];
         $coord_name = $row['name'];
         $photo =$row['photo'];
         $detail = $row['detail'];   
        }unset($row); 
        while($row = $result1->fetch_array())
        {
         $work_title =$row['title'];           
        }unset($row);
        while($row = $result2->fetch_array())
        {
         $web_title =$row['title'];           
        }unset($row);
    }
    else{}
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
<link rel="shortcut icon" href="http://www.testune.com/spacedtimes/student_panel/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://www.testune.com/spacedtimes/student_panel/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="assets/css/template-purple.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/moduletabs.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive_2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.css" type="text/css">
    <style>
        .owl-prev {
            height: 54px;
            position: absolute;
            top: 50%;
            width: 27px;
            z-index: 1000;
            left: 2%;
            cursor: pointer;
            color: transparent;
            margin-top: -10px;
            margin-left: -20px;
            color: #000;
            margin-right: -50px;
        }
        .owl-prev span,
        .owl-next span {
            font-size: 40px;
            border: none !important;
            color: #fff;
            outline: none !important;
        }
        .owl-next {
            height: 60px;
            position: absolute;
            top: 50%;
            width: 30px;
            z-index: 1000;
            right: 2%;
            cursor: pointer;
            color: transparent;
            margin-top: -10px;
            margin-right: -20px;
            color: #000;
        }
        .owl-prev:hover,
        .owl-next:hover {
            opacity: 0.5;
        }
        @media screen and (max-width:900px) and (min-width:100px){
            .owl-prev {
                margin-top: -10px;
                margin-left: -10px;
                color: #000;
                margin-right: -20px;
            }
            .owl-next {
                margin-top: -10px;
                margin-left: -10px;
                color: #000;
                margin-right: -10px;
            }
        }
    </style>

</head>

<body>
    <div class="time-wrapper">
        <div class="page-container">
            <div class="inner-time">
                <p id="name" class="element"></p>
            </div>
        </div>
    </div>
    <section id="yt_wrapper" class="page-container">
        <div class="span6 ">
            <h1 class="club-header" style="margin-left: -10px;"><?php if(isset($club_name)){echo $club_name;}else{}?></h1>
        </div>
        <div class="module subcribe">
            <div class="modcontent" style="width:400px;right:0px;height: 150px; ">
                <div class="page-container">
                    <div class="head" style="padding-top: 2px;font-size: 14px;text-align: center;letter-spacing: 2px;">Change
                        Your Club From Here!
                    </div>
                    <section class="main">
                        <div class="wrapper-demo">
                            <div id="dd" class="wrapper-dropdown-3" tabindex="1">
                                <span>Change Club</span>
                                <ul class="dropdown">
                                    <li><a href="#"> <i class="fas fa-school icon-large"></i>Academic Club</a></li>
                                    <li><a href="#"><i class="fas fa-calculator icon-large"></i>Smarter Minds</a></li>
                                    <li><a href="#"><i class="fas fa-laptop-code icon-large"></i>Technology Club</a></li>
                                    <li><a href="#"><i class="fas fa-chess icon-large"></i>Chess Club</a></li>
                                    <li><a href="#"><i class="fas fa-futbol icon-large"></i>Sports Club</a></li>
                                    <li><a href="#"><i class="fab fa-facebook icon-large"></i>Social Club</a></li>
                                    <li><a href="#"><i class="fas fa-language icon-large"></i>Language Club</a></li>
                                    <li><a href="#"><i class="fas fa-atom icon-large"></i>Science Club</a></li>
                                    <li><a href="#"><i class="fas fa-calculator icon-large"></i>Mathematics Club</a></li>
                                    <li><a href="#"><i class="fas fa-monument icon-large"></i>History Club</a></li>
                                    <li><a href="#"><i class="fas fa-globe-americas icon-large"></i>Geography Club</a></li>
                                </ul>
                            </div>
                            ​
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <header id="yt_header2" class="block">
        <div class="yt-main">
            <div class="yt-main-in1 container">
                <div class="yt-main-in2 row-fluid">

                    <div class="school section">
                    </div>

                    <div id="head-4" class="span2">

                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="topnav" id="myTopnav">
        <div class="page-container">
            <a href="#contact" style="font-weight: 900;font-size: 15px;background-color: #82024f;color: #fff;"><i class="fas fa-home"></i></a>
            <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">My Profile </a>
            <div class="mydropdown">
                <button class="mydropbtn" style="font-weight: 900">Dashboard</button>
                <div class="
                    my-dropdown-content">
                    <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">Reports </a>
                    <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">My Courses</a>
                    <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">My Uploads</a>
                    <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">My Workshops</a>
                    <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">My Downloads</a>

                </div>
            </div>
            <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">FAQs</a>
            <a href="#" style="font-size: 15px;font-weight: 900" class="webinar">Contact</a>

            <!--   <a href="#" style="font-weight: 900;font-size: 15px;background-color: #82024f;color: #fff;border-radius: 5px">Logout<i
                    class="fas fa-sign-out-alt"></i></a> -->
        </div>
    </div>


    <div class="page-container new-row">
        <div class="row justify-content-center" style="margin-left:0">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 color">
                <div class="clearfix">
                    <img class="wrapper-image" src="assets/images/<?php if(isset($photo)){echo $photo;}else{}?>" alt="" width="120" height="120">
                    <h1 class="club-head">Club Coordinator</h1>
                    <h1 class="club-head-sub"><?php if(isset($coord_name)){echo $coord_name;}else{}?></h1>
                    <p class="club-desc"><?php if(isset($detail)){echo $detail;}else{}?></p>
                    <div class="two-div">
                        <div class="first-div">
                            <div class="clearfix">
                                <i class="far fa-calendar wrapper-image" style="font-size:100px"></i>
                                <h1 class="club-head" style="margin-top: 50px;"> Workshop</h1>
                                <h1 class="club-head-sub"><?php if(isset($work_title)){echo $work_title;}else{}?></h1>
                            </div>
                            <p class="div-description">Disclaimer:This electronic message
                                (e-mail) including any les transmitted
                                as its attachment, is for the sole use of</p>
                        </div>
                        <div class="second-div">
                            <div class="clearfix">
                                <i class="far fa-calendar wrapper-image" style="font-size:100px"></i>
                                <h1 class="club-head" style="margin-top: 50px;"> Webinar</h1>
                                <h1 class="club-head-sub"><?php if(isset($web_title)){echo $web_title;}else{}?></h1>
                            </div>
                            <p class="div-description">Disclaimer:This electronic message
                                (e-mail) including any les transmitted
                                as its attachment, is for the sole use of</p>
                        </div>
                    </div>
                    <a href="#" class="upcoming-link">All Upcoming Events<i class="fas fa-hand-point-right secondary-icons"></i></a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                <h6 class="two-wrapper-second-header">Pin Board</h6>
                <ul class="two-wrapper-list color" style="margin: 0;padding: 0">
                    <li class="two-list-items" style="color:#777;font-size: 18px;">Submission of Hook 1
                        <span style="display: block;padding: 5px 0;font-size: 16px;">Images of Night Sky</span>
                        <span style="font-size: 16px;">Last Date: 24 April 2018</span>
                    </li><br>
                    <li class="two-list-items" style="color:#777;font-size:18px;">Submission of Hook 1
                        <span style="display: block;padding: 5px 0;font-size: 16px;">Images of Night Sky</span>
                        <span style="font-size: 16px;">Last Date: 24 April 2018</span>
                    </li><br>
                    <li class="two-list-items" style="color:#777;font-size: 18px;">Submission of Hook 1
                        <span style="display: block;padding: 5px 0;font-size: 16px;">Images of Night Sky</span>
                        <span style="font-size: 16px;">Last Date: 24 April 2018</span>
                    </li><br>
                    <li class="two-list-items" style="color:#777;font-size: 18px;">Submission of Hook 1
                        <span style="display: block;padding: 5px 0;font-size: 16px;">Images of Night Sky</span>
                        <span style="font-size: 16px;">Last Date: 24 April 2018</span>
                    </li><br>
                    <li class="two-list-items" style="color:#777;font-size: 18px;">Submission of Hook 1
                        <span style="display: block;padding: 5px 0;font-size: 16px;">Images of Night Sky</span>
                        <span style="font-size: 16px;">Last Date: 24 April 2018</span>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <section id="yt_spotlight1 " class="block ">
            <div class="yt-main ">
                <div class="yt-main-in1">
                    <div class="yt-main-in2 row-fluid ">
                        <div id="spotlight1 " class="span12 ">
                            <div class="module blank tabs-spotlight1 ">
                                <div class="modcontent clearfix ">


                                    <div id="moduletabs_469587721535195993 " class="moduletabs top-position clearfix ">

                                        <div class="tabs-content-wrap ">
                                            <div class="tabs-content ">
                                                <div class="tabs-content-inner ">
                                                    <div class="tab-content selected ">
                                                        <div id="k2ModuleBox234 " class="k2ItemsBlock zoom-image ">
                                                            <ul>
                                                                <li class="span6 first ">

                                                                    <div class="moduleItemIntrotext ">
                                                                        <a class="moduleItemImage " href="https://www.techrepublic.com/article/internet-of-things-iot-cheat-sheet/"
                                                                            title="Continue reading &quot;Nire mase ruma pola kita sire&quot; ">
                                                                            <img src="assets/images/first.jpeg" style="height:120px;">
                                                                        </a>

                                                                        <div class="title ">
                                                                            <a class="moduleItemTitle " href="/templates/joomla3/sj-flat-news/index.php/component/k2/item/426-nire-mase-ruma-pola-kita-sire ">Internet
                                                                                of Things (IoT): Cheat sheet</a>
                                                                        </div>

                                                                        <span class="moduleItemDateCreated ">
                                                                            <i class="far fa-calendar"></i>
                                                                            12.Nov.2013 </span>

                                                                        <div>Suspendisse at libero porttitor
                                                                            nisi
                                                                            aliquet vulputate vitae at velit.
                                                                            Aliquam
                                                                            eget&#8230;</div>

                                                                        <a class="moduleItemReadMore " href="#"
                                                                            data-toggle="modal" data-target="#exampleModalCenter-1">
                                                                            <i class="fas fa-angle-right"></i>
                                                                        </a>
                                                                        <!--    <a href="#" style="float: right;margin-top: 15px;">More
                                                                            Info <i class="fas fa-angle-right"></i></a> -->
                                                                    </div>

                                                                    <div class="clr "></div>

                                                                    <div class="clr "></div>

                                                                    <div class="clr "></div>
                                                                </li>
                                                                <li class="span6 ">

                                                                    <div class="moduleItemIntrotext ">
                                                                        <a class="moduleItemImage " href="https://www.wired.co.uk/article/internet-of-things-what-is-explained-iot"
                                                                            title="Continue reading &quot;Nire haze duma kote gace bika&quot; ">
                                                                            <img src="assets/images/first.jpeg" style="height:120px;">
                                                                        </a>

                                                                        <div class="title ">
                                                                            <a class="moduleItemTitle " href="/templates/joomla3/sj-flat-news/index.php/component/k2/item/425-nire-haze-duma-kote-gace-bika ">
                                                                                What is the Internet of Things?</a>
                                                                        </div>

                                                                        <span class="moduleItemDateCreated ">
                                                                            <i class="far fa-calendar"></i>
                                                                            12.Nov.2013 </span>

                                                                        <div>In the broadest sense, the term
                                                                            IoT
                                                                            encompasses everything connected to
                                                                            the
                                                                            internet.</div>

                                                                        <a class="moduleItemReadMore " href="#"
                                                                            data-toggle="modal" data-target="#exampleModalCenter-2">
                                                                            <i class="fas fa-angle-right"></i>
                                                                        </a>
                                                                        <!-- <a href="#" style="float: right;margin-top: 15px;">More
                                                                            Info <i class="fas fa-angle-right"></i></a> -->
                                                                    </div>
                                                                    <div class="clr "></div>
                                                                    <div class="clr "></div>
                                                                    <div class="clr "></div>
                                                                </li>
                                                                <div class="clear "></div>
                                                                <li class="span6 first ">
                                                                    <div class="moduleItemIntrotext ">
                                                                        <a class="moduleItemImage " href="https://www.cloudwards.net/what-is-the-internet-of-things/"
                                                                            title="Continue reading &quot;Karun maso poka nace vire nase&quot; ">
                                                                            <img src="assets/images/first.jpeg" style="height:120px;">
                                                                        </a>

                                                                        <div class="title ">
                                                                            <a class="moduleItemTitle " href="/templates/joomla3/sj-flat-news/index.php/component/k2/item/424-karun-maso-poka-nace-vire-nase ">What
                                                                                Is the Internet of Things?</a>
                                                                        </div>

                                                                        <span class="moduleItemDateCreated ">
                                                                            <i class="far fa-calendar"></i>
                                                                            12.Nov.2013 </span>

                                                                        <div> Nis nulla interdum et. Cursus
                                                                            senectus
                                                                            aliquet pretium at tristique hac
                                                                            ullamcorper&#8230;</div>

                                                                        <a class="moduleItemReadMore " href="#"
                                                                            data-toggle="modal" data-target="#exampleModalCenter-3">
                                                                            <i class="fas fa-angle-right"></i>
                                                                        </a>
                                                                        <!-- <a href="#" style="float: right;margin-top: 15px;">More
                                                                            Info <i class="fas fa-angle-right"></i></a> -->
                                                                    </div>

                                                                    <div class="clr "></div>
                                                                    <div class="clr "></div>
                                                                    <div class="clr "></div>
                                                                </li>
                                                                <li class="span6 lastItem ">
                                                                    <div class="moduleItemIntrotext ">
                                                                        <a class="moduleItemImage " href="/templates/joomla3/sj-flat-news/index.php/component/k2/item/423-gamu-poza-sima-kite-rima-cola "
                                                                            title="Continue reading &quot;Gamu poza sima kite rima cola&quot; ">
                                                                            <img src="assets/images/first.jpeg" style="height:120px;">
                                                                        </a>

                                                                        <div class="title ">
                                                                            <a class="moduleItemTitle " href="/templates/joomla3/sj-flat-news/index.php/component/k2/item/423-gamu-poza-sima-kite-rima-cola ">Gamu
                                                                                poza sima kite rima cola</a>
                                                                        </div>

                                                                        <span class="moduleItemDateCreated ">
                                                                            <i class="far fa-calendar"></i>
                                                                            12.Nov.2013 </span>

                                                                        <div>Guzasu mako nica at libero
                                                                            porttitor nisi
                                                                            aliquet vulputate vitae at
                                                                            velit.&#8230;</div>

                                                                        <a class="moduleItemReadMore " href="#"
                                                                            data-toggle="modal" data-target="#exampleModalCenter-4">
                                                                            <i class="fas fa-angle-right"></i>
                                                                        </a>
                                                                        <!-- <a href="#" style="float: right;margin-top: 15px;">More
                                                                            Info <i class="fas fa-angle-right"></i></a> -->
                                                                    </div>
                                                                    <div class="clr "></div>
                                                                    <div class="clr "></div>
                                                                    <div class="clr "></div>
                                                                </li>
                                                                <div class="clear "></div>
                                                                <li class="clearList "></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="view-more">
                                            <span><a href="# " style="color:#fff; ">More Info
                                                    <i class="fas fa-long-arrow-alt-right "></i>
                                                </a> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <div class="owl-carousel inner-color">
            <div class="itemInner">
                <img src="assets/images/mqdefault_1.jpg" alt="">
                <div class="video-icon">
                    <a href="#" data-toggle="modal" data-target="#videoModal" data-theVideo="https://www.youtube.com/embed/QSIPNhOiMoE">
                        <i class="fa fa-play icon-play"></i>
                    </a>
                </div>
                <div class=" innerItem-description ">
                    <h1 class="video-title ">App Development

                    </h1>

                    <i class="far fa-calendar" style="color:#cccccc;font-size:12px;letter-spacing:
                                            1px; ">
                        <span>
                            15th.Nov.2018
                        </span></i>
                    <a href="# " style="font-size:12px;color: #cccccc;float: right;margin-bottom: -15px ">
                        <i class="far fa-comments "></i>
                        Be The First One To Comment
                    </a>
                </div>
            </div>
            <div class="itemInner ">
                <img src="assets/images/mqdefault.jpg" alt="">
                <div class="video-icon">
                    <a href="#" data-toggle="modal" data-target="#videoModal" data-theVideo="https://www.youtube.com/embed/NjYTzvAVozo">
                        <i class="fa fa-play icon-play"></i>
                    </a>
                </div>
                <div class="innerItem-description ">
                    <h1 class="video-title ">Web Development

                    </h1>
                    <i class="far fa-calendar " style="color:#cccccc;font-size: 12px;letter-spacing:
                                            1px; ">
                        <span>
                            15th.Nov.2018
                        </span></i>
                    <a href="# " style="font-size:12px;color: #cccccc;float: right;margin-bottom: -15px ">
                        <i class="far fa-comments "></i>
                        Be The First One To Comment
                    </a>
                </div>
            </div>
            <div class="itemInner ">
                <img src="assets/images/mqdefault_3.jpg" alt="">
                <div class="video-icon">
                    <a href="#" data-toggle="modal" data-target="#videoModal" data-theVideo="https://www.youtube.com/embed/QL-6PdiDTeo">
                        <i class="fa fa-play icon-play"></i>
                    </a>
                </div>
                <div class="innerItem-description ">
                    <h1 class="video-title ">Design Expression

                    </h1>
                    <i class="far fa-calendar " style="color:#cccccc;font-size: 12px;letter-spacing:1px; ">
                        <span>
                            15th.Nov.2018
                        </span></i>
                    <a href="# " style="font-size:12px;color: #cccccc;float: right;margin-bottom: -15px ">
                        <i class="far fa-comments "></i>
                        Be The First One To Comment
                    </a>
                </div>
                </a>
            </div>
            <div class="itemInner ">
                <video src="assets/video/wingxp.mp4 " class="carousel-video"></video>
                <div class="video-icon ">
                    <a href="#">
                        <i class="fa fa-play icon-play"></i>
                    </a>
                </div>

                <div class="innerItem-description ">
                    <h1 class="video-title ">Smarter Minds
                        <span>
                            <a href="#" class="more-link">More
                                Info <i class="fas fa-angle-right"></i></a>
                        </span>
                    </h1>
                    <i class="far fa-calendar " style="color:#cccccc;font-size: 12px;letter-spacing:
                                            1px; ">
                        <span>
                            15th.Nov.2018
                        </span></i>
                    <a href="# " style="font-size:12px;color: #cccccc;float: right;margin-bottom: -15px ">
                        <i class="far fa-comments "></i>
                        Be The First One To Comment
                    </a>
                </div>
                </a>
            </div>
            <div class="itemInner">
                <video src="assets/video/wingxp.mp4 " class="carousel-video"></video>
                <div class="video-icon ">
                    <a>
                        <i class="fa fa-play icon-play"></i>
                    </a>
                </div>

                <div class="innerItem-description ">
                    <h1 class="video-title ">English Expression
                    </h1>
                    <i class="far fa-calendar " style="color:#cccccc;font-size: 12px;letter-spacing:
                                            1px; ">
                        <span>
                            15th.Nov.2018
                        </span></i>
                    <a href="# " style="font-size:12px;color: #cccccc;float: right;margin-bottom: -15px ">
                        <i class="far fa-comments "></i>
                        Be The First One To Comment
                    </a>
                </div>
                </a>
            </div>
        </div>
        <div class="view-more ">
            <span>More Info <a href="# " style="color:#fff; "> <i class="fas fa-long-arrow-alt-right "></i>
                </a> </span>
        </div>
    </div>
    <section id="yt_spotlight5 " class="block ">
        <div class="yt-main ">
            <div class="yt-main-in1 container ">
                <div class="yt-main-in2 row-fluid ">
                    <div id="banner3 " class="span6 ">
                        <div class="module blank zoom-image ">
                            <div class="modcontent clearfix ">
                                <div class="bannergroup blank zoom-image ">
                                    <div class="banneritem ">
                                      <div class="apester-media" data-media-id="5b9f5c37d4b9a935cd6fb9ae" height="434"></div><script async src="https://static.apester.com/js/sdk/latest/apester-sdk.js"></script>
                                        <div class="clr "></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="banner4 " class="span6 ">
                        <div class="module blank zoom-image ">
                            <div class="modcontent clearfix ">
                                <div class="bannergroup blank zoom-image ">
                                    <div class="banneritem ">
                                        <div class="apester-media" data-media-id="5b9f6fd005710b61254d10dc" height="386"></div><script async src="https://static.apester.com/js/sdk/latest/apester-sdk.js"></script>
                                        <div class="clr "></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  <section id="yt_spotlight9 " class="block ">
        <div class="yt-main ">
            <div class="yt-main-in1 container ">
                <div class="yt-main-in2 row-fluid ">
                    <div id="position11 " class="span12 ">
                        <div class="module blank tit-benefit ">
                            <h3 class="modtitle ">Community with Benefits</h3>
                            <div class="modcontent clearfix ">
                                Adding Disqus to your site turns comments into a community.
                                Comments are no longer a costly burden, they’re an active asset
                                to your site.
                            </div>
                        </div>
                    </div>
                    <div id="position12 " class="span2 first ">
                        <div class="module benefit ">
                            <div class="modcontent clearfix ">
                                <i class="fas fa-user "></i>
                                <a class="title " href="# ">Audience</a>
                            </div>
                        </div>
                    </div>
                    <div id="position13 " class="span2 ">
                        <div class="module benefit ">
                            <div class="modcontent clearfix ">
                                <i class="far fa-money-bill-alt "></i>
                                <a class="title " href="# ">Revenue</a>
                            </div>
                        </div>
                    </div>
                    <div id="position14 " class="span4 ">
                        <div class="module benefit ">
                            <div class="modcontent clearfix ">
                                <i class="fas fa-random "></i>
                                <a class="title " href="# ">Buy Traffic</a>
                                <p>You can also use Promoted Discovery to capture the right
                                    audience
                                    from across Disqus to your premium content. Learn more about</p>
                                <a href="# ">Promoted Discovery</a>
                            </div>
                        </div>
                    </div>
                    <div id="position15 " class="span2 ">
                        <div class="module benefit ">
                            <div class="modcontent clearfix ">
                                <i class="fas fa-sync-alt "></i>
                                <a class="title " href="# ">Recirculate</a>
                            </div>
                        </div>
                    </div>
                    <div id="position16 " class="span2 ">
                        <div class="module benefit ">
                            <div class="modcontent clearfix ">
                                <i class="fas fa-mobile-alt "></i>
                                <a class="title " href="# ">Go Mobile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <div class="page-container">
        <div class="community-wrapper">
            <h1 class="community-header">SPACED TIMES CONNECT</h1>
            <p class="community-desc">Get Access to peers from other schools, cities and countries to get the exposure
                and
                power to collaborate meaningfully </p>
        </div>
        <div class="community-div">
            <div class="first-community commons-div">
                <div class="inner-community">
                    <img src="assets/images/fav-1.png" alt="" class="community-img">
                    <h1 class="inner-community-header">SHOWCASE</h1>
                </div>
            </div>
            <div class="second-community commons-div">
                <div class="inner-community">
                    <img src="assets/images/fav-2.png" alt="" class="community-img">
                    <h1 class="inner-community-header">Compete</h1>
                </div>
            </div>
            <div class="third-community commons-div big">
                <div class="inner-community">
                    <p>I Have Wings</p>
                </div>

            </div>
            <div class="fourth-community commons-div">
                <div class="inner-community">
                    <img src="assets/images/fav-3.png" alt="" class="community-img">
                    <h1 class="inner-community-header">EXPOSURE</h1>
                </div>
            </div>
            <div class="fifth-community commons-div">
                <div class="inner-community">
                    <img src="assets/images/fav-4.png" alt="" class="community-img">
                    <h1 class="inner-community-header">COLLABORATE</h1>
                </div>
            </div>
        </div>

    </div>
    <section style="background-color:#363636;height: 60px">
        <h1 class="footer-inner"> Powered by <span style="color:#2abfd4"> <a href="www.wingxp.com" class="footer-link">
                    wingxp.com </a></span>
            - xplore ◼
            xperience ◼
            xpress</h1>
    </section>
    <div class="modal fade" id="exampleModalCenter-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #82024f;">
                    <h5 class="mod-title" id="exampleModalLabel">Why Clubs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                       "><i class="fas fa-times-circle"
                                style="margin-top: 15px;  color: #fff;"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <p class="mod-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo quo
                            soluta
                            possimus nemo maxime officiis necessitatibus magni, veritatis modi earum doloribus
                            accusantium
                            obcaecati reprehenderit. Cumque et repudiandae ratione temporibus odit.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #82024f;">
                    <h5 class="mod-title" id="exampleModalLabel">Internet of things
                        or
                        Things on the internet?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                       "><i class="fas fa-times-circle"
                                style="margin-top: 15px;  color: #fff;"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="banner3 " class="span6 ">
                        <div class="module blank zoom-image ">
                            <div class="modcontent clearfix ">
                                <div class="bannergroup blank zoom-image ">
                                    <div class="banneritem ">
                                        <div class="apester-media" data-media-id="5b9f5c37d4b9a935cd6fb9ae" height="234"></div>
                                        <script async src="https://static.apester.com/js/sdk/latest/apester-sdk.js"></script>
                                        <div class="clr "></div>
                                    </div>
                                </div>
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
    <div class="modal fade" id="exampleModalCenter_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #82024f;">
                    <h5 class="mod-title" id="exampleModalLabel">The Internet of Things in 10 questions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                       "><i class="fas fa-times-circle"
                                style="margin-top: 15px;color: #fff;"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <div class="apester-media" data-media-id="5b9f6fd005710b61254d10dc" height="386"></div>
                        <script async src="https://static.apester.com/js/sdk/latest/apester-sdk.js"></script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #82024f;">
                    <h5 class="mod-title" id="exampleModalLabel">Internet Of Things 2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                       "><i class="fas fa-times-circle"
                                style="margin-top: 15px;  color: #fff;"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <p class="mod-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo quo
                            soluta
                            possimus nemo maxime officiis necessitatibus magni, veritatis modi earum doloribus
                            accusantium
                            obcaecati reprehenderit. Cumque et repudiandae ratione temporibus odit.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #82024f;">
                    <h5 class="mod-title" id="exampleModalLabel">Internet Of Things 3</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                       "><i class="fas fa-times-circle"
                                style="margin-top: 15px;  color: #fff;"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <p class="mod-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo quo
                            soluta
                            possimus nemo maxime officiis necessitatibus magni, veritatis modi earum doloribus
                            accusantium
                            obcaecati reprehenderit. Cumque et repudiandae ratione temporibus odit.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #82024f;">
                    <h5 class="mod-title" id="exampleModalLabel">Internet Of Things 4</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                       "><i class="fas fa-times-circle"
                                style="margin-top: 15px;  color: #fff;"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <p class="mod-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo quo
                            soluta
                            possimus nemo maxime officiis necessitatibus magni, veritatis modi earum doloribus
                            accusantium
                            obcaecati reprehenderit. Cumque et repudiandae ratione temporibus odit.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #82024f;border-bottom: none">
                    <h5 class="mod-title" id="exampleModalLabel">Internet Of Things</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                               "><i class="fas fa-times-circle"
                                style="margin-top: 15px;  color: #fff;"></i></span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 0;background-color: #000">
                    <div>
                        <iframe width="100%" height="350px" src="https://www.youtube.com/embed/QSIPNhOiMoE" frameborder="0"
                            encrypted-media" allowfullscreen allow="autoplay" ;></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="videoModal_2" tabindex="-1" role="dialog" aria-labelledby="videoModal_2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #82024f;border-bottom: none">
                    <h5 class="mod-title" id="exampleModalLabel">Internet Of Things -2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                                       "><i
                                class="fas fa-times-circle" style="margin-top: 15px;  color: #fff;"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <iframe width="100%" height="350" src="https://www.youtube.com/embed/NjYTzvAVozo" frameborder="0"
                            allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="videoModal_2" tabindex="-1" role="dialog" aria-labelledby="videoModal_2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #82024f;border-bottom: none">
                    <h5 class="mod-title" id="exampleModalLabel">Internet Of Things 3</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                                       "><i
                                class="fas fa-times-circle" style="margin-top: 15px;  color: #fff;"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <iframe width="100" height="350" src="https://www.youtube.com/embed/QL-6PdiDTeo" frameborder="0"
                            allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet " href="https://use.fontawesome.com/releases/v5.3.1/css/all.css " integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU "
        crossorigin="anonymous ">
    <script src="https://code.jquery.com/jquery-3.3.1.js " integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js " integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 "
        crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js " integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy "
        crossorigin="anonymous "></script>
    <script src="assets/js/script.js "></script>
    <script src="OwlCarousel2-2.3.4/dist/owl.carousel.js "></script>
    <script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>

    <script>
        /* $(document).ready(function () {
            $('#videoModal').on('shown.bs.modal', function () {
                $('#video1')[0].play();
            })
            $('#videoModal').on('hidden.bs.modal', function () {
                $('#video1')[0].pause();
            })
        }); */

        autoPlayYouTubeModal();

        function autoPlayYouTubeModal() {
            var trigger = $("body").find('[data-toggle="modal"]');
            trigger.click(function () {
                var theModal = $(this).data("target"),
                    videoSRC = $(this).attr("data-theVideo"),
                    videoSRCauto = videoSRC + "?autoplay=1";
                $(theModal + ' iframe').attr('src', videoSRCauto);
                $(theModal + ' button.close').click(function () {
                    $(theModal + ' iframe').attr('src', videoSRC);
                });
            });
        }
    </script>
    <script>
        $(document).ready(function () {
            $(".selLabel ").click(function () {
                $(".dropdownSelect ").toggleClass("active ");
            });
            $(".dropdown-list li ").click(function () {
                $(".selLabel ").text($(this).text());
                $(".dropdownSelect ").removeClass("active ");
                $(".selected-item p span ").text($(".selLabel ").text());
            });
        });
        $(".owl-carousel ").owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            nav: true,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                526: {
                    items: 1
                },
                527: {
                    items: 2
                },
                900: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
        setInterval(function () {
            var time = new Date();
            var hh = time.getHours();
            var mm = time.getMinutes();
            var ss = time.getSeconds();
            var days = ["Sunday ", "Monday ", "Tuesday ", "Wednesday ", "Thursday ", "Friday ", "Saturday "];
            var day = days[time.getDay()];
            var months = ["Jan ", "Feb ", "Mar ", "Apr ", "May ", "Jun ", "Jul ", "Aug ", "Sep ", "Oct ",
                "Nov ", "Dec "
            ];
            var month = months[time.getMonth()];
            var date = time.getDate();
            var year = time.getFullYear();
            $('#current_time').html(month + " " + date + ", " + year + " " + hh + ": " + mm + ": " + ss);
        }, 1000);
    </script>
    <script type="text/javascript">

        function DropDown(el) {
            this.dd = el;
            this.placeholder = this.dd.children('span');
            this.opts = this.dd.find('ul.dropdown > li');
            this.val = '';
            this.index = -1;
            this.initEvents();
        }
        DropDown.prototype = {
            initEvents: function () {
                var obj = this;

                obj.dd.on('click', function (event) {
                    $(this).toggleClass('active');
                    return false;
                });

                obj.opts.on('click', function () {
                    var opt = $(this);
                    obj.val = opt.text();
                    obj.index = opt.index();
                    obj.placeholder.text(obj.val);
                });
            },
            getValue: function () {
                return this.val;
            },
            getIndex: function () {
                return this.index;
            }
        }

        $(function () {

            var dd = new DropDown($('#dd'));

            $(document).click(function () {
                // all dropdowns
                $('.wrapper-dropdown-3').removeClass('active');
            });

        });
        var typed = new Typed('.element', {
            strings: ["Hi Ankush Aggarwal "],
            typeSpeed: 75
        });

    </script>
</body>

</html>