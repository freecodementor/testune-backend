<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Admin Panel - SpacedTimes</title>
<!--style sheet-->
<script language="javascript" src="http://www.testune.com/spacedtimes/fancybox/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" media="screen" href="http://www.testune.com/spacedtimes/store_manager/css/main.css"/>
<script type="text/javascript" src="http://www.testune.com/spacedtimes/fancybox/jquery.min.js"></script>
<script type="text/javascript" src="http://www.testune.com/spacedtimes/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="http://www.testune.com/spacedtimes/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="http://www.testune.com/spacedtimes/fancybox/jquery.fancybox-1.3.4.css" />
<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<link rel="stylesheet" href="http://www.testune.com/spacedtimes/fancybox/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>var $j = jQuery.noConflict(true);</script>
  <script>
  $j( function() {
    dateFormat: "yy-mm-dd"
    $j( "#datepicker" ).datepicker({
  dateFormat: "yy-mm-dd"
});
  } );
  </script>

<script type="text/javascript">
		$(document).ready(function() {
				$("a.pop2").fancybox({
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});
			$("a.pop").fancybox({
			      'type': 'iframe',
				   'autoScale': true,
				'autoDimensions': true,
					//'title'	  : 'By domain E',
					'fitToView' : true,
				 //  'width'	: 'auto',
			      //'height'	: 'auto',
				//  'overlayShow'	: true,
				//'transitionIn'	: 'elastic',
				//'transitionOut'	: 'elastic'
			});
                        $("a.view_faculty_detail").fancybox({
				    'type':'iframe',
			       'width' :1200,
                                'height':800,
                                'href':this.href,
                                'showCloseButton'   : true,
                                 'hideOnOverlayClick': false,
                                  'hideOnContentClick' :   false,
				});
                             $("a.view_comment").fancybox({
				    'type':'iframe',
			       'width' : 570,
                                'height':100,
                                'href':this.href,
                                'showCloseButton'   : true,
                                 'hideOnOverlayClick': false,
                                  'hideOnContentClick' :   false,
				});     
                               $("a.preview").fancybox({
				    'type':'iframe',
			            'width' : 700,
                                   'height':700,
                                   'href':this.href,
                                   'showCloseButton'   : true,
                                   'hideOnOverlayClick': false,
                                  'hideOnContentClick' :   false,
				});     
			});
			</script>
      <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>

<!DOCTYPE html>
<html lang="en">
<body>
   <nav>
        <ul class="nav__main">
            <li class="logo-list"><a href="index.php" style="text-decoration:none;color:#fff;"> SPACEDTIMES </a></li>
            <li><a href="?q=logout" class="logout-link">Logout</a></li>
        </ul>
    </nav>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Admin Panel - SpacedTimes</title>
<!--style sheet-->
<script language="javascript" src="http://www.testune.com/spacedtimes/fancybox/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" media="screen" href="http://www.testune.com/spacedtimes/store_manager/css/style.css"/>
<link rel="stylesheet" media="screen" href="http://www.testune.com/spacedtimes/store_manager/css/navigation.css"/>
<link href="http://www.testune.com/spacedtimes/faculty/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://www.testune.com/spacedtimes/fancybox/jquery.min.js"></script>
<script type="text/javascript" src="http://www.testune.com/spacedtimes/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="http://www.testune.com/spacedtimes/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="http://www.testune.com/spacedtimes/fancybox/jquery.fancybox-1.3.4.css" />
<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<script src="http://www.testune.com/spacedtimes/fancybox/jquery-ui.js" type="text/javascript"></script>
 <link rel="stylesheet" href="http://www.testune.com/spacedtimes/fancybox/jquery-ui.css" />

  <script>var $j = jQuery.noConflict(true);</script>
  <script>
  $j( function() {
    dateFormat: "yy-mm-dd"
    $j( "#datepicker" ).datepicker({
  dateFormat: "yy-mm-dd"
});
  } );
  </script>

 <style>
                       select {
	-moz-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
	-webkit-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
	-ms-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
	transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
	border: 1px solid #00897B;
	display: block;
	text-decoration: none;
	width: 100%;
	outline: 0;
	font-size: 15px;
	border-radius: 5px;
	padding: 5px;
	margin-top: 10px;
}

input[type="text"],
input[type="password"],
input[type="email"],
textarea {
	-moz-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
	-webkit-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
	-ms-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
	transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
	-moz-appearance: none;
	-webkit-appearance: none;
	-ms-appearance: none;
	appearance: none;
	color: black;
	display: block;
	text-decoration: none;
	width: 100%;
	outline: 0;
	border: 1px solid #00897B;
	font-size: 15px;
	margin-top: 10px;
}
 </style>  <script type="text/javascript">
		$(document).ready(function() {
				$("a.pop2").fancybox({
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});
			$("a.pop").fancybox({
			      'type': 'iframe',
				   'autoScale': true,
				'autoDimensions': true,
					//'title'	  : 'By domain E',
					'fitToView' : true,
				 //  'width'	: 'auto',
			      //'height'	: 'auto',
				//  'overlayShow'	: true,
				//'transitionIn'	: 'elastic',
				//'transitionOut'	: 'elastic'
			});
                        $("a.view_faculty_detail").fancybox({
				    'type':'iframe',
			       'width' :1200,
                                'height':800,
                                'href':this.href,
                                'showCloseButton'   : true,
                                 'hideOnOverlayClick': false,
                                  'hideOnContentClick' :   false,
				});
                             $("a.view_comment").fancybox({
				    'type':'iframe',
			       'width' : 570,
                                'height':100,
                                'href':this.href,
                                'showCloseButton'   : true,
                                 'hideOnOverlayClick': false,
                                  'hideOnContentClick' :   false,
				});     
                               $("a.preview").fancybox({
				    'type':'iframe',
			            'width' : 700,
                                   'height':700,
                                   'href':this.href,
                                   'showCloseButton'   : true,
                                   'hideOnOverlayClick': false,
                                  'hideOnContentClick' :   false,
				});     
			});
			</script>
</head>
<body>
<!--top starts-->
<div id="top">
  <div class="container clearfix">
    <div class="grid_12">
      <p>Welcome to SpacedTimes!</p>
      <p class="call">Admin Name <span class="color">Abhi    </span></p>
    </div>
  </div>
</div>
<!--top ends--> 
<!--header starts-->
<div id="header">
  <div class="container  header_inner clearfix">
    <div class="grid_12"> 
        <!--logo here--> 
         <h1 class="logoBox-header"><a href="index.php" style="color: #ffb400;">SPACED<span>TIMES</span></a></h1> 
       <!--menu / navigation starts-->
      <ul class="sf-menu">
         <li class="login_link"> 
           <!--login_wrapper starts-->
          <div class="login_wrapper"> <a href="?q=logout" class="login_out"><span>Log Out</span></a>
            </div>
          <!--login_wrapper ends--> 
         </li>
      </ul>
      <!--menu ends-->
       <div class="clear"></div>
    </div>
  </div>
</div>
<!--header ends--> <!--section for intro text and button starts-->
<div class="section">
  <div class="container clearfix">
    <div class="grid_12 action3">
    <table>
                                <tbody><tr>  
                                  <td style="padding: 0em 0em;">
					<section class="wrapper special popup ">
                                                     <header class="mb-4">
              <h2 class="text-grey " style=" line-height:1.25em;"><strong>NEW CONTENT MANAGER</strong></h2>
              
              <p id="msg"></p>
						      </header>
							    <div class="content">
                                                                  <div class="container">
                                                                  
                                                                  <form class="col-md-offset-4 col-md-3 col-md-offset-4  " id="fileUploadForm" enctype="multipart/form-data">
                                                                                        <div class="10u -1u" style="padding: 20px 0 0 20px;">
                                        
												<input type="text" placeholder="Name" name="institute_name" id="institute_name" class="padding-popup radius03" required="">
											</div>
                      <div class="10u -1u" style="padding: 20px 0 0 20px;">
                                        
												<input type="email" placeholder="Email Id" name="email" id="email" class="padding-popup radius03" required="">
											</div>
                      <div class="10u -1u" style="padding: 20px 0 0 20px;">
                                        
												<input type="email" placeholder="Secondary Email Id" name="secemail" id="secemail" class="padding-popup radius03" required="">
											</div>
                      <div class="10u -1u" style="padding: 20px 0 0 20px;">
                                        
                      <input placeholder="DOB" type="text" name="datepicker" id="datepicker">									</div>
                      <div class="10u -1u" style="padding: 20px 0 0 20px;">
                                                                                         <select style="min-height:30px;" name="qual" id="qual" required="" placeholder="Country *" autocomplete="off" onchange="change_country()">
  
    <option value="ae">Post Graduate</option>
    <option value="ad">Graduate</option>
  <option value="af">Matriculation</option>
  </select>
  </div>
                      
                      <div class="10u -1u" style="padding: 20px 0 0 20px;">
                                        
												<input type="text" placeholder="Phone No 1" name="phone" id="phone" class="padding-popup radius03" required="">
											</div>
                      <div class="10u -1u" style="padding: 20px 0 0 20px;">
                                        
												<input type="text" placeholder="Phone No 2" name="phone2" id="phone2" class="padding-popup radius03" required="">
											</div>
                      
                       
										 	
                                                                                        <div class="10u -1u" style="padding: 20px 0 0 20px;">
                                                                                         <select style="min-height:30px;" name="country" id="country" required="" placeholder="Country *" autocomplete="off" onchange="change_country()">
  <option value="ad">Andorra</option>
  <option value="ae">United Arab Emirates</option>
  <option value="af">Afghanistan</option>
  <option value="ag">Antigua and Barbuda</option>
  <option value="ai" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ai" data-title="Anguilla">Anguilla</option>
  <option value="al" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag al" data-title="Albania">Albania</option>
  <option value="am" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag am" data-title="Armenia">Armenia</option>
  <option value="an" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag an" data-title="Netherlands Antilles">Netherlands Antilles</option>
  <option value="ao" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ao" data-title="Angola">Angola</option>
  <option value="aq" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag aq" data-title="Antarctica">Antarctica</option>
  <option value="ar" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ar" data-title="Argentina">Argentina</option>

  <option value="as" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag as" data-title="American Samoa">American Samoa</option>
  <option value="at" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag at" data-title="Austria">Austria</option>
  <option value="au" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag au" data-title="Australia">Australia</option>
  <option value="aw" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag aw" data-title="Aruba">Aruba</option>
  <option value="ax" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ax" data-title="Aland Islands">Aland Islands</option>
  <option value="az" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag az" data-title="Azerbaijan">Azerbaijan</option>
  <option value="ba" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ba" data-title="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
  <option value="bb" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bb" data-title="Barbados">Barbados</option>
  <option value="bd" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bd" data-title="Bangladesh">Bangladesh</option>
  <option value="be" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag be" data-title="Belgium">Belgium</option>
  <option value="bf" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bf" data-title="Burkina Faso">Burkina Faso</option>
  <option value="bg" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bg" data-title="Bulgaria">Bulgaria</option>
  <option value="bh" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bh" data-title="Bahrain">Bahrain</option>
  <option value="bi" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bi" data-title="Burundi">Burundi</option>
  <option value="bj" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bj" data-title="Benin">Benin</option>
  <option value="bm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bm" data-title="Bermuda">Bermuda</option>
  <option value="bn" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bn" data-title="Brunei Darussalam">Brunei Darussalam</option>
  <option value="bo" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bo" data-title="Bolivia">Bolivia</option>
  <option value="br" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag br" data-title="Brazil">Brazil</option>
  <option value="bs" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bs" data-title="Bahamas">Bahamas</option>
  <option value="bt" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bt" data-title="Bhutan">Bhutan</option>
  <option value="bv" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bv" data-title="Bouvet Island">Bouvet Island</option>
  <option value="bw" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bw" data-title="Botswana">Botswana</option>
  <option value="by" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag by" data-title="Belarus">Belarus</option>
  <option value="bz" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bz" data-title="Belize">Belize</option>
  <option value="ca" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ca" data-title="Canada">Canada</option>
  <option value="cc" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cc" data-title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
  <option value="cd" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cd" data-title="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
  <option value="cf" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cf" data-title="Central African Republic">Central African Republic</option>
  <option value="cg" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cg" data-title="Congo">Congo</option>
  <option value="ch" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ch" data-title="Switzerland">Switzerland</option>
  <option value="ci" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ci" data-title="Cote D'Ivoire (Ivory Coast)">Cote D'Ivoire (Ivory Coast)</option>
  <option value="ck" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ck" data-title="Cook Islands">Cook Islands</option>
  <option value="cl" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cl" data-title="Chile">Chile</option>
  <option value="cm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cm" data-title="Cameroon">Cameroon</option>
  <option value="cn" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cn" data-title="China">China</option>
  <option value="co" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag co" data-title="Colombia">Colombia</option>
  <option value="cr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cr" data-title="Costa Rica">Costa Rica</option>
  <option value="cs" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cs" data-title="Serbia and Montenegro">Serbia and Montenegro</option>
  <option value="cu" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cu" data-title="Cuba">Cuba</option>
  <option value="cv" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cv" data-title="Cape Verde">Cape Verde</option>
  <option value="cx" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cx" data-title="Christmas Island">Christmas Island</option>
  <option value="cy" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cy" data-title="Cyprus">Cyprus</option>
  <option value="cz" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cz" data-title="Czech Republic">Czech Republic</option>
  <option value="de" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag de" data-title="Germany">Germany</option>
  <option value="dj" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag dj" data-title="Djibouti">Djibouti</option>
  <option value="dk" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag dk" data-title="Denmark">Denmark</option>
  <option value="dm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag dm" data-title="Dominica">Dominica</option>
  <option value="do" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag do" data-title="Dominican Republic">Dominican Republic</option>
  <option value="dz" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag dz" data-title="Algeria">Algeria</option>
  <option value="ec" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ec" data-title="Ecuador">Ecuador</option>
  <option value="ee" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ee" data-title="Estonia">Estonia</option>
  <option value="eg" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag eg" data-title="Egypt">Egypt</option>
  <option value="eh" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag eh" data-title="Western Sahara">Western Sahara</option>
  <option value="er" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag er" data-title="Eritrea">Eritrea</option>
  <option value="es" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag es" data-title="Spain">Spain</option>
  <option value="et" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag et" data-title="Ethiopia">Ethiopia</option>
  <option value="fi" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fi" data-title="Finland">Finland</option>
  <option value="fj" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fj" data-title="Fiji">Fiji</option>
  <option value="fk" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fk" data-title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
  <option value="fm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fm" data-title="Federated States of Micronesia">Federated States of Micronesia</option>
  <option value="fo" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fo" data-title="Faroe Islands">Faroe Islands</option>
  <option value="fr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fr" data-title="France">France</option>
  <option value="fx" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fx" data-title="France, Metropolitan">France, Metropolitan</option>
  <option value="ga" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ga" data-title="Gabon">Gabon</option>
  <option value="gb" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gb" data-title="Great Britain (UK)">Great Britain (UK)</option>
  <option value="gd" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gd" data-title="Grenada">Grenada</option>
  <option value="ge" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ge" data-title="Georgia">Georgia</option>
  <option value="gf" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gf" data-title="French Guiana">French Guiana</option>
  <option value="gh" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gh" data-title="Ghana">Ghana</option>
  <option value="gi" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gi" data-title="Gibraltar">Gibraltar</option>
  <option value="gl" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gl" data-title="Greenland">Greenland</option>
  <option value="gm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gm" data-title="Gambia">Gambia</option>
  <option value="gn" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gn" data-title="Guinea">Guinea</option>
  <option value="gp" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gp" data-title="Guadeloupe">Guadeloupe</option>
  <option value="gq" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gq" data-title="Equatorial Guinea">Equatorial Guinea</option>
  <option value="gr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gr" data-title="Greece">Greece</option>
  <option value="gs" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gs" data-title="S. Georgia and S. Sandwich Islands">S. Georgia and S. Sandwich Islands</option>
  <option value="gt" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gt" data-title="Guatemala">Guatemala</option>
  <option value="gu" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gu" data-title="Guam">Guam</option>
  <option value="gw" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gw" data-title="Guinea-Bissau">Guinea-Bissau</option>
  <option value="gy" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gy" data-title="Guyana">Guyana</option>
  <option value="hk" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag hk" data-title="Hong Kong">Hong Kong</option>
  <option value="hm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag hm" data-title="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
  <option value="hn" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag hn" data-title="Honduras">Honduras</option>
  <option value="hr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag hr" data-title="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
  <option value="ht" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ht" data-title="Haiti">Haiti</option>
  <option value="hu" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag hu" data-title="Hungary">Hungary</option>
  <option value="id" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag id" data-title="Indonesia">Indonesia</option>
  <option value="ie" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ie" data-title="Ireland">Ireland</option>
  <option value="il" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag il" data-title="Israel">Israel</option>
  <option value="in" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag in" data-title="India" selected="selected">India</option>
  <option value="io" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag io" data-title="British Indian Ocean Territory">British Indian Ocean Territory</option>
  <option value="iq" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag iq" data-title="Iraq">Iraq</option>
  <option value="ir" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ir" data-title="Iran">Iran</option>
  <option value="is" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag is" data-title="Iceland">Iceland</option>
  <option value="it" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag it" data-title="Italy">Italy</option>
  <option value="jm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag jm" data-title="Jamaica">Jamaica</option>
  <option value="jo" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag jo" data-title="Jordan">Jordan</option>
  <option value="jp" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag jp" data-title="Japan">Japan</option>
  <option value="ke" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ke" data-title="Kenya">Kenya</option>
  <option value="kg" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kg" data-title="Kyrgyzstan">Kyrgyzstan</option>
  <option value="kh" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kh" data-title="Cambodia">Cambodia</option>
  <option value="ki" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ki" data-title="Kiribati">Kiribati</option>
  <option value="km" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag km" data-title="Comoros">Comoros</option>
  <option value="kn" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kn" data-title="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
  <option value="kp" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kp" data-title="Korea (North)">Korea (North)</option>
  <option value="kr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kr" data-title="Korea (South)">Korea (South)</option>
  <option value="kw" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kw" data-title="Kuwait">Kuwait</option>
  <option value="ky" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ky" data-title="Cayman Islands">Cayman Islands</option>
  <option value="kz" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kz" data-title="Kazakhstan">Kazakhstan</option>
  <option value="la" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag la" data-title="Laos">Laos</option>
  <option value="lb" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lb" data-title="Lebanon">Lebanon</option>
  <option value="lc" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lc" data-title="Saint Lucia">Saint Lucia</option>
  <option value="li" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag li" data-title="Liechtenstein">Liechtenstein</option>
  <option value="lk" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lk" data-title="Sri Lanka">Sri Lanka</option>
  <option value="lr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lr" data-title="Liberia">Liberia</option>
  <option value="ls" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ls" data-title="Lesotho">Lesotho</option>
  <option value="lt" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lt" data-title="Lithuania">Lithuania</option>
  <option value="lu" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lu" data-title="Luxembourg">Luxembourg</option>
  <option value="lv" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lv" data-title="Latvia">Latvia</option>
  <option value="ly" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ly" data-title="Libya">Libya</option>
  <option value="ma" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ma" data-title="Morocco">Morocco</option>
  <option value="mc" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mc" data-title="Monaco">Monaco</option>
  <option value="md" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag md" data-title="Moldova">Moldova</option>
  <option value="mg" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mg" data-title="Madagascar">Madagascar</option>
  <option value="mh" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mh" data-title="Marshall Islands">Marshall Islands</option>
  <option value="mk" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mk" data-title="Macedonia">Macedonia</option>
  <option value="ml" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ml" data-title="Mali">Mali</option>
  <option value="mm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mm" data-title="Myanmar">Myanmar</option>
  <option value="mn" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mn" data-title="Mongolia">Mongolia</option>
  <option value="mo" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mo" data-title="Macao">Macao</option>
  <option value="mp" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mp" data-title="Northern Mariana Islands">Northern Mariana Islands</option>
  <option value="mq" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mq" data-title="Martinique">Martinique</option>
  <option value="mr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mr" data-title="Mauritania">Mauritania</option>
  <option value="ms" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ms" data-title="Montserrat">Montserrat</option>
  <option value="mt" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mt" data-title="Malta">Malta</option>
  <option value="mu" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mu" data-title="Mauritius">Mauritius</option>
  <option value="mv" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mv" data-title="Maldives">Maldives</option>
  <option value="mw" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mw" data-title="Malawi">Malawi</option>
  <option value="mx" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mx" data-title="Mexico">Mexico</option>
  <option value="my" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag my" data-title="Malaysia">Malaysia</option>
  <option value="mz" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mz" data-title="Mozambique">Mozambique</option>
  <option value="na" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag na" data-title="Namibia">Namibia</option>
  <option value="nc" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nc" data-title="New Caledonia">New Caledonia</option>
  <option value="ne" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ne" data-title="Niger">Niger</option>
  <option value="nf" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nf" data-title="Norfolk Island">Norfolk Island</option>
  <option value="ng" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ng" data-title="Nigeria">Nigeria</option>
  <option value="ni" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ni" data-title="Nicaragua">Nicaragua</option>
  <option value="nl" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nl" data-title="Netherlands">Netherlands</option>
  <option value="no" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag no" data-title="Norway">Norway</option>
  <option value="np" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag np" data-title="Nepal">Nepal</option>
  <option value="nr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nr" data-title="Nauru">Nauru</option>
  <option value="nu" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nu" data-title="Niue">Niue</option>
  <option value="nz" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nz" data-title="New Zealand (Aotearoa)">New Zealand (Aotearoa)</option>
  <option value="om" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag om" data-title="Oman">Oman</option>
  <option value="pa" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pa" data-title="Panama">Panama</option>
  <option value="pe" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pe" data-title="Peru">Peru</option>
  <option value="pf" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pf" data-title="French Polynesia">French Polynesia</option>
  <option value="pg" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pg" data-title="Papua New Guinea">Papua New Guinea</option>
  <option value="ph" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ph" data-title="Philippines">Philippines</option>
  <option value="pk" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pk" data-title="Pakistan">Pakistan</option>
  <option value="pl" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pl" data-title="Poland">Poland</option>
  <option value="pm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pm" data-title="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
  <option value="pn" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pn" data-title="Pitcairn">Pitcairn</option>
  <option value="pr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pr" data-title="Puerto Rico">Puerto Rico</option>
  <option value="ps" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ps" data-title="Palestinian Territory">Palestinian Territory</option>
  <option value="pt" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pt" data-title="Portugal">Portugal</option>
  <option value="pw" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pw" data-title="Palau">Palau</option>
  <option value="py" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag py" data-title="Paraguay">Paraguay</option>
  <option value="qa" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag qa" data-title="Qatar">Qatar</option>
  <option value="re" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag re" data-title="Reunion">Reunion</option>
  <option value="ro" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ro" data-title="Romania">Romania</option>
  <option value="ru" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ru" data-title="Russian Federation">Russian Federation</option>
  <option value="rw" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag rw" data-title="Rwanda">Rwanda</option>
  <option value="sa" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sa" data-title="Saudi Arabia">Saudi Arabia</option>
  <option value="sb" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sb" data-title="Solomon Islands">Solomon Islands</option>
  <option value="sc" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sc" data-title="Seychelles">Seychelles</option>
  <option value="sd" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sd" data-title="Sudan">Sudan</option>
  <option value="se" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag se" data-title="Sweden">Sweden</option>
  <option value="sg" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sg" data-title="Singapore">Singapore</option>
  <option value="sh" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sh" data-title="Saint Helena">Saint Helena</option>
  <option value="si" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag si" data-title="Slovenia">Slovenia</option>
  <option value="sj" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sj" data-title="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
  <option value="sk" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sk" data-title="Slovakia">Slovakia</option>
  <option value="sl" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sl" data-title="Sierra Leone">Sierra Leone</option>
  <option value="sm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sm" data-title="San Marino">San Marino</option>
  <option value="sn" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sn" data-title="Senegal">Senegal</option>
  <option value="so" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag so" data-title="Somalia">Somalia</option>
  <option value="sr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sr" data-title="Suriname">Suriname</option>
  <option value="st" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag st" data-title="Sao Tome and Principe">Sao Tome and Principe</option>
  <option value="su" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag su" data-title="USSR (former)">USSR (former)</option>
  <option value="sv" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sv" data-title="El Salvador">El Salvador</option>
  <option value="sy" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sy" data-title="Syria">Syria</option>
  <option value="sz" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sz" data-title="Swaziland">Swaziland</option>
  <option value="tc" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tc" data-title="Turks and Caicos Islands">Turks and Caicos Islands</option>
  <option value="td" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag td" data-title="Chad">Chad</option>
  <option value="tf" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tf" data-title="French Southern Territories">French Southern Territories</option>
  <option value="tg" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tg" data-title="Togo">Togo</option>
  <option value="th" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag th" data-title="Thailand">Thailand</option>
  <option value="tj" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tj" data-title="Tajikistan">Tajikistan</option>
  <option value="tk" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tk" data-title="Tokelau">Tokelau</option>
  <option value="tl" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tl" data-title="Timor-Leste">Timor-Leste</option>
  <option value="tm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tm" data-title="Turkmenistan">Turkmenistan</option>
  <option value="tn" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tn" data-title="Tunisia">Tunisia</option>
  <option value="to" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag to" data-title="Tonga">Tonga</option>
  <option value="tp" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tp" data-title="East Timor">East Timor</option>
  <option value="tr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tr" data-title="Turkey">Turkey</option>
  <option value="tt" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tt" data-title="Trinidad and Tobago">Trinidad and Tobago</option>
  <option value="tv" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tv" data-title="Tuvalu">Tuvalu</option>
  <option value="tw" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tw" data-title="Taiwan">Taiwan</option>
  <option value="tz" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tz" data-title="Tanzania">Tanzania</option>
  <option value="ua" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ua" data-title="Ukraine">Ukraine</option>
  <option value="ug" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ug" data-title="Uganda">Uganda</option>
  <option value="uk" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag uk" data-title="United Kingdom">United Kingdom</option>
  <option value="um" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag um" data-title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
  <option value="us" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag us" data-title="United States">United States</option>
  <option value="uy" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag uy" data-title="Uruguay">Uruguay</option>
  <option value="uz" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag uz" data-title="Uzbekistan">Uzbekistan</option>
  <option value="va" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag va" data-title="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
  <option value="vc" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag vc" data-title="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
  <option value="ve" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ve" data-title="Venezuela">Venezuela</option>
  <option value="vg" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag vg" data-title="Virgin Islands (British)">Virgin Islands (British)</option>
  <option value="vi" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag vi" data-title="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
  <option value="vn" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag vn" data-title="Viet Nam">Viet Nam</option>
  <option value="vu" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag vu" data-title="Vanuatu">Vanuatu</option>
  <option value="wf" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag wf" data-title="Wallis and Futuna">Wallis and Futuna</option>
  <option value="ws" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ws" data-title="Samoa">Samoa</option>
  <option value="ye" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ye" data-title="Yemen">Yemen</option>
  <option value="yt" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag yt" data-title="Mayotte">Mayotte</option>
  <option value="yu" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag yu" data-title="Yugoslavia (former)">Yugoslavia (former)</option>
  <option value="za" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag za" data-title="South Africa">South Africa</option>
  <option value="zm" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag zm" data-title="Zambia">Zambia</option>
  <option value="zr" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag zr" data-title="Zaire (former)">Zaire (former)</option>
  <option value="zw" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag zw" data-title="Zimbabwe">Zimbabwe</option>
</select>
</div>
<div class="10u -1u" style="padding: 20px 0 0 20px;">
												<textarea type="text" placeholder="Experience" name="exp" id="exp" class="padding-popup radius03" required=""></textarea>
											</div> 

<div class="10u -1u" style="padding: 20px 0 0 20px;">
												<textarea type="text" placeholder="Address" name="address" id="address" class="padding-popup radius03" required=""></textarea>
											</div> 
                      <div class="10u -1u" style="padding: 20px 0 0 20px;">
											
   
                      Upload Photo: <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                                            <input name="fileToUpload" type="file" /><br>
											</div>
											
                      
                      <input type="hidden" name="action" value="add">

											<div class="10u -1u" style="padding: 20px 0 0 20px; ">
												<input style="min-height:30px;" type="button" name="submit" value="SUBMIT" class="special-orange popup-big button-popup" id="sub" name="sub" onclick="check_form()" >  
                                            </div><br>
                                            
                                            
                                        </form>
										</div>  
                                      	 </div>
                 </section> </td></tr>
</tbody></table>
       

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script language="javascript">
$(function(){
$("#password").keyup(function(event){
    if(event.keyCode == 13){
        login();
    }
});
});

function login()
    {
          var user=$.trim($('#username').val());
  	  var pass=$.trim($('#password').val());
           if(user == '' || pass == '')
           { 
               alert('Please enter the username & password'); 
           }
           else
           {  
               // alert(user+pass);
                  $.ajax({
			  type: 'POST',
			  url: '../Home/login_check.php',
			  data: { username:user, password:pass, logintype:'institute' },
			  beforeSend: function() {
			  },
			  success: function (data) {
            console.log(data);
            if(data=='success'){               
            alert('Content Manager Added Successfully');
            location.reload(true); 
            }
            if(data=='exists')
            {
                alert('Content Manager Name Already Exists');  
            }           
        },
        error: function (e) {
            console.log(e);
            alert('Error ! Check console for error !');
        }
			 }); 
}  }


function validateEmail(email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if(!emailReg.test(email)) {
    return false;
  } else {
    return true;
  }
}

function check_form()
   {
           var institute_name= $('#institute_name').val();    
	   
     var country= $('#country').val(); 
     var qual= $('#qual').val(); 
     var dob= $('#datepicker').val(); 

	   var phone= $('#phone').val();  
     var phone2= $('#phone2').val(); 
     var address= $('#address').val(); 
     var exp= $('#exp').val(); 
           var username=$('#username').val();      
	   var email= $('#email').val();    
     var secemail= $('#secemail').val(); 
	  
          
           if(institute_name === '' || address === '' )
                  {
		        alert('Please make sure all fields are filled.');
		  }
           
           
	    else
		 {          
           
                  ajaxbackend();
                 } 
   }

function close_popup(p)
{
     alert('Thankyou for registering with Testune. We have sent you verification link to your registered email id. Kindly verify your account.');
     parent.$.fancybox.close();
    //window.location.href='Home/select_exam.php?id='+p;
} 
function ajaxbackend(){
  

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
        url: "cont_mgr_back.php",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {

            $("#result").text(data);
            document.getElementById('msg').innerHTML = data;
            $("#sub").prop("disabled", false);

        },
        error: function (e) {

            $("#result").text(e.responseText);
            document.getElementById('msg').innerHTML = 'Rename File or upload smaller file!';
            $("#sub").prop("disabled", false);

        }
  

});

}

 
</script>
<script>
   
</script>

    </div>
  </div>
</div>
<!--section for intro text and button ends--> 
<!--section for features starts-->
<div class="section colored">
  <div class="container clearfix"> 
     <!--features starts-->
     
</div> 

<br /> <br /> 
<!--copyright starts-->
<div id="copyright">
  <div class="container clearfix"> 
      <!--copyright text and general links-->
    <div class="grid_12">
     Copyright 2018. All the respective rights reserved. SpacedTimes
     </div>
     <div class="clear"></div>
  </div>
</div><!--copyright ends--> 
</body>
</html>