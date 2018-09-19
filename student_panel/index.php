<?php
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
    $spanel="select club_name,features,club_description,image, launch_date from clubs where 1";
    $result = $conn->query($spanel);
    
    $i=0;
    while($club[$i] = mysqli_fetch_row($result))
    { $j=0;
        //print_r($club[$i]);
       // echo '<br>';
        foreach($club[$i] as $c ){
            $row[$i][$j]=$c;
            $j++;
        }
        $i++;     
    }
    //print_r($row);   
   
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
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="assets/css/template-purple.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="http://www.wingxp.com/favicon.ico" type="image/gif" sizes="16x16">
    <link rel="icon" href="http://www.wingxp.com/favicon.ico" type="image/gif" sizes="16x16">
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
        <div class="modcontent" style="float:right;">
            <div class="page-container">
                <div class="head">Student Login</div>
                <div class="form">
                    <input type="text" placeholder="your username" />
                    <input type="text" placeholder="your password" />
                    <div class="btn-subcribe">Login <i class="fas fa-sign-in-alt"></i></div>
                </div>
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
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: -2px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="assets/images/banner1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/images/banner2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/images/banner3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
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
            <?php $i=$j=0; while(isset($row[$i][0])){?>
            <div class="common">
                <div class="img-section">
                    <img src="assets/images/<?php if(isset($row[$i][3])){echo $row[$i][3];}else{} ?>" height="180px;">
                </div>
                <div class="section-info">
                    <h1 class="section--header"><?php if(isset($row[$i][0])){echo $row[$i][0];}else{} ?></h1>
                    <h2 class="section-sub-first"><?php if(isset($row[$i][1])){ $feature = explode(",",$row[$i][1]); echo $feature[0];}else{} ?></h2>
                    <h2 class="section-sub-first"><?php if(isset($row[$i][1])){  echo $feature[1];}else{} ?></h2>
                    <h2 class="section-sub-first"><?php if(isset($row[$i][1])){  echo $feature[2];}else{} ?></h2>
                    <div class="section-link-wrapper">
                        <a href="#" class="section--link" data-toggle="modal" data-target="#exampleModalCenter-N1<?php echo 'a'.$j;?>">Enter</a>
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
                                <form action="" class="login__form">
                                    <input type="text" name="" id="" placeholder="Type your username" class="form-field">
                                    <input type="password" name="" id="" placeholder="Type your password" class="form-field">
                                    <button class="login_btn">Login</button>
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
    </div><?php $i++;}?><br><br></div>
        <div class="loading_wrapper ">
            <div class="inner_loading">
                <div class="loading-header">
                    <h1>Wing XP Clubs</h1>
                </div>
            </div>
        </div>
        <div class="inner-info-wrapper">
            <div class="sections-div gap-top">
                <h1 class="div-head">Science</h1>
                <div class="sections-img">
                    <img src="assets/images/img_main.jpeg" alt="">
                </div>
            </div>
            <div class="sections-div gap-top">
                <h1 class="div-head">Mathematics</h1>
                <div class="sections-img">
                    <img src="assets/images/img_main.jpeg" alt="">
                </div>
            </div>
            <div class="sections-div gap-bottom">
                <h1 class="div-head">History</h1>
                <div class="sections-img">
                    <img src="assets/images/img_main.jpeg" alt="">
                </div>
            </div>
            <div class="sections-div">
                <h1 class="div-head">Geography</h1>
                <div class="sections-img gap-bottom">
                    <img src="assets/images/img_main.jpeg" alt="">
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
    <div class="modal fade" id="exampleModalCenter-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #82024f;">
                    <h5 class="mod-title" id="exampleModalLabel">Launch Club</h5>
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
                    <h5 class="mod-title" id="exampleModalLabel">Choose Plan</h5>
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

    <div class="modal fade" id="exampleModalCenter-N2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis perferendis,
                                    voluptatum nesciunt quod officia quam laborum vitae quo aliquam eos nam repellendus
                                    recusandae modi error dicta aliquid distinctio asperiores deleniti.
                                </p>
                            </div>
                            <div class="col-md-6 border-left">
                                <h1 class="mod-title-new">Login Here</h1><br>
                                <form action="" class="login__form">
                                    <input type="text" name="" id="" placeholder="Type your username" class="form-field">
                                    <input type="password" name="" id="" placeholder="Type your password" class="form-field">
                                    <button class="login_btn">Login</button>
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
    <div class="modal fade" id="exampleModalCenter-N3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis perferendis,
                                    voluptatum nesciunt quod officia quam laborum vitae quo aliquam eos nam repellendus
                                    recusandae modi error dicta aliquid distinctio asperiores deleniti.
                                </p>
                            </div>
                            <div class="col-md-6 border-left">
                                <h1 class="mod-title-new">Login Here</h1><br>
                                <form action="" class="login__form">
                                    <input type="text" name="" id="" placeholder="Type your username" class="form-field">
                                    <input type="password" name="" id="" placeholder="Type your password" class="form-field">
                                    <button class="login_btn">Login</button>
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
    <div class="modal fade" id="exampleModalCenter-N4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis perferendis,
                                    voluptatum nesciunt quod officia quam laborum vitae quo aliquam eos nam repellendus
                                    recusandae modi error dicta aliquid distinctio asperiores deleniti.
                                </p>
                            </div>
                            <div class="col-md-6 border-left">
                                <h1 class="mod-title-new">Login Here</h1><br>
                                <form action="" class="login__form">
                                    <input type="text" name="" id="" placeholder="Type your username" class="form-field">
                                    <input type="password" name="" id="" placeholder="Type your password" class="form-field">
                                    <button class="login_btn">Login</button>
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
    <div class="modal fade" id="exampleModalCenter-N5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis perferendis,
                                    voluptatum nesciunt quod officia quam laborum vitae quo aliquam eos nam repellendus
                                    recusandae modi error dicta aliquid distinctio asperiores deleniti.
                                </p>
                            </div>
                            <div class="col-md-6 border-left">
                                <h1 class="mod-title-new">Login Here</h1><br>
                                <form action="" class="login__form">
                                    <input type="text" name="" id="" placeholder="Type your username" class="form-field">
                                    <input type="password" name="" id="" placeholder="Type your password" class="form-field">
                                    <button class="login_btn">Login</button>
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
    <div class="modal fade" id="exampleModalCenter-N6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis perferendis,
                                    voluptatum nesciunt quod officia quam laborum vitae quo aliquam eos nam repellendus
                                    recusandae modi error dicta aliquid distinctio asperiores deleniti.
                                </p>
                            </div>
                            <div class="col-md-6 border-left">
                                <h1 class="mod-title-new">Login Here</h1><br>
                                <form action="" class="login__form">
                                    <input type="text" name="" id="" placeholder="Type your username" class="form-field">
                                    <input type="password" name="" id="" placeholder="Type your password" class="form-field">
                                    <button class="login_btn">Login</button>
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
    <div class="modal fade" id="exampleModalCenter-N7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis perferendis,
                                    voluptatum nesciunt quod officia quam laborum vitae quo aliquam eos nam repellendus
                                    recusandae modi error dicta aliquid distinctio asperiores deleniti.
                                </p>
                            </div>
                            <div class="col-md-6 border-left">
                                <h1 class="mod-title-new">Login Here</h1><br>
                                <form action="" class="login__form">
                                    <input type="text" name="" id="" placeholder="Type your username" class="form-field">
                                    <input type="password" name="" id="" placeholder="Type your password" class="form-field">
                                    <button class="login_btn">Login</button>
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
    <div class="modal fade" id="exampleModalCenter-N8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis perferendis,
                                    voluptatum nesciunt quod officia quam laborum vitae quo aliquam eos nam repellendus
                                    recusandae modi error dicta aliquid distinctio asperiores deleniti.
                                </p>
                            </div>
                            <div class="col-md-6 border-left">
                                <h1 class="mod-title-new">Login Here</h1><br>
                                <form action="" class="login__form">
                                    <input type="text" name="" id="" placeholder="Type your username" class="form-field">
                                    <input type="password" name="" id="" placeholder="Type your password" class="form-field">
                                    <button class="login_btn">Login</button>
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
</body>

</html>
</body>

</html>