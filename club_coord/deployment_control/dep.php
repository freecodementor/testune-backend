    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    <h1 class="header-main">Deployment Controls</h1><br>
    <form id="dep_form">
    <div class="body__wrapper">
        <div class="my-container">
            <h1 class="body-header">Class</h1>
            <div class="first-half-wrapper">
                <h1 class="first-half__header">Primary</h1>
                <input type="checkbox" id="primary" class="first-half__check primary_master">
            </div>
            <div class='row '>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class1"  id='class1' class="demo_check primary"> <br>
                    <label for='class1'>Class 1</label>
                </div>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class2"  id="class2" class="demo_check primary"> <br>
                    <label for='class2'>Class 2</label>
                </div>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class3"  id='class3' class="demo_check primary"> <br>
                    <label for='class3'>Class 3</label>
                </div>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class4"  id='class4' class="demo_check primary"> <br>
                    <label for='class4'>Class 4</label>
                </div>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class5"  id='class5' class="demo_check primary"> <br>
                    <label for='class5'>Class 5</label>
                </div>
            </div><br>
            <div class="first-half-wrapper">
                <h1 class="first-half__header">Secondary</h1>
                <input type="checkbox"  id="secondary" class="first-half__check secondary_master">
            </div>
            <div class='row '>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class6" id='class6' class="demo_check secondary secondary"> <br>
                    <label for='class1'>Class 6</label>
                </div>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class7"  id="class7" class="demo_check secondary"> <br>
                    <label for='class2'>Class 7</label>
                </div>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class8"  id='class8' class="demo_check secondary"> <br>
                    <label for='class3'>Class 8</label>
                </div>
            </div><br>
            <div class="first-half-wrapper">
                <h1 class="first-half__header">Senior Secondary</h1>
                <input type="checkbox"  id="sen_secondary" class="first-half__check sen_secondary_master">
            </div>
            <div class='row '>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class9" id='class9' class="demo_check sen_secondary"> <br>
                    <label for='class1'>Class 9</label>
                </div>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class10"  id="class10" class="demo_check sen_secondary"> <br>
                    <label for='class2'>Class 10</label>
                </div>
            </div><br>
            <div class="first-half-wrapper">
                <h1 class="first-half__header">Senior</h1>
                <input type="checkbox"  id="senior" class="first-half__check senior_master">
            </div>
            <div class='row '>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class11" id='class11' class="demo_check senior"> <br>
                    <label for='class1'>Class 11</label>
                </div>
                <div class='col-sm-1'>
                    <input type="checkbox" name="class12"  id="class12" class="demo_check senior"> <br>
                    <label for='class2'>Class 12</label>
                </div>
            </div><br>
            <h1 class="body-header">Gender</h1>
            <div class="first-half-wrapper">
                <h1 class="first-header">Boy</h1>
                <input type="radio" name="gender" value="boy"  id="" class="first-radio">
                <h1 class="first-header">Girl</h1>
                <input type="radio" name="gender" id=""  value="girl" class="first-radio">
            </div><br>
            <h1 class="body-header">Open Time</h1>
            <h1 class="row-header">Weekly</h1>
            <div class="row justify-content-start main-row" style="margin-left:50px;">
                <div class="col-2">
                    Monday
                </div>
                <div class="col-1">
                    <input type="checkbox" name="mon" id="">
                </div>
                <div class="col-3">
                    <input type="text" name="start" class="datepicker" id="start" value="" placeholder="Pick Relevant Date" required>
                </div>
                <div class="col-3">
                    <input type="text" name="end" class="datepicker" id="end" value="" placeholder="Pick Relevant Date" required>
                </div>
            </div>
            <div class="gap"></div>
            <div class="row justify-content-start main-row" style="margin-left:50px;">
                <div class="col-2">
                    Tuesday
                </div>
                <div class="col-1">
                    <input type="checkbox" name="tue" id="">
                </div>

            </div>
            <div class="gap"></div>

            <div class="row justify-content-start main-row" style="margin-left:50px;">
                <div class="col-2">
                    Wednesday
                </div>
                <div class="col-1">
                    <input type="checkbox" name="wed" id="">
                </div>
                
            </div>
            <div class="gap"></div>

            <div class="row justify-content-start main-row" style="margin-left:50px;">
                <div class="col-2">
                    Thursday
                </div>
                <div class="col-1">
                    <input type="checkbox" name="thu" id="">
                </div>
                
            </div>
            <div class="gap"></div>

            <div class="row justify-content-start main-row" style="margin-left:50px;">
                <div class="col-2">
                    Friday
                </div>
                <div class="col-1">
                    <input type="checkbox" name="fri" id="">
                </div>
                
            </div>
            <div class="gap"></div>

            <div class="row justify-content-start main-row" style="margin-left:50px;">
                <div class="col-2">
                    Saturday
                </div>
                <div class="col-1">
                    <input type="checkbox" name="sat" id="">
                </div>
                
            </div>
            <div class="gap"></div>
            <div class="row justify-content-start main-row" style="margin-left:50px;">
                <div class="col-2">
                    Sunday
                </div>
                <div class="col-1">
                    <input type="checkbox" name="sun" id="">
                </div>
                
            </div><br>
            <div class="student_price">
                <h1 class="body-header">Price</h1>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <h1 class="price-head">MRP</h1>
                        <h1 class="price-sub">₹ 3000</h1>
                    </div>
                    <div class="col-4">
                        <h1 class="price-head">School Offer</h1>
                        <h1 class="price-sub">₹ 2500</h1>
                    </div>
                    <div class="col-4">
                        <h1 class="price-head">Student Price</h1>
                        <input type="text" name="" id="" class="price__input" placeholder="Price">
                    </div>
                </div>
            </div>
            <div class="button-wrap">
            <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
                    <input type="hidden" name="type" value="<?php echo $_POST['type'];?>">
                <button class="submit__btn" onclick="ajaxbackend()">Submit</button>
            </div>
        </div>
    </div>
    </form>
    <div class="footer ">
        <div class="footerInner ">
            <h1>&copy; SPACEDTIMES</h1>
        </div>
    </div>
    <script>  
    $( "#start,#end" ).datepicker({
  dateFormat: "yy-mm-dd"
});
   
  </script>
    <script>
        var primary_master = $('.primary_master');
        var secondary_master = $('.secondary_master');
        var sen_secondary_master = $('.sen_secondary_master');
        var senior_master = $('.senior_master');
        var primary = $('.primary');
        var secondary = $('.secondary');
        var sen_secondary = $('.sen_secondary');
        var senior = $('.senior');
        primary_master.on('change', function(){
        primary.prop('checked',this.checked);
        });
        secondary_master.on('change', function(){
            secondary.prop('checked',this.checked);
        });
        sen_secondary_master.on('change', function(){
            sen_secondary.prop('checked',this.checked);
        });
        senior_master.on('change', function(){
            senior.prop('checked',this.checked);
        });

    </script>
    <script language="javascript">



function ajaxbackend(){  
    var start =  $('#start').val();
    var end =  $('#end').val(); 
    if (start === '' || end === '' ){alert ("fill necessary fields !");}
    else {
//stop submit the form, we will post it manually.   
event.preventDefault();
// Get form
var form = $('#dep_form')[0];
// Create an FormData object 
var data = new FormData(form);
// If you want to add an extra field for the FormData
data.append("CustomField", "This is some extra data, testing");
// disabled the submit button
$("#sub").prop("disabled", true);
$.ajax({
    type: "POST",
    enctype: 'multipart/form-data',
    url: "dep_back.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,
    success: function (data) {       
        console.log(data);
        $("#sub").prop("disabled", false);},
    error: function (e) {
        $("#result").text(e.responseText);
        document.getElementById('msg').innerHTML = 'Rename File or upload smaller file!';
        $("#sub").prop("disabled", false);}});}}
</script>
    <link rel="stylesheet " href="https://use.fontawesome.com/releases/v5.0.10/css/all.css " integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg "
        crossorigin="anonymous ">
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <script>
        $(function () {
            $(".datepicker").datepicker();
        });
    </script>
</body>

</html>