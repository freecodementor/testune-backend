
<!DOCTYPE HTML>
<html>
	<head>
		<title>School Dashboard Panel</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="main.css">
		<script type="text/javascript" src="http://www.testune.com/spacedtimes/fancybox/jquery.min.js"></script>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
                <script type="text/javascript" src="http://www.testune.com/spacedtimes/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
                <script type="text/javascript" src="http://www.testune.com/spacedtimes/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
                <link rel="stylesheet" type="text/css" href="http://www.testune.com/spacedtimes/fancybox/jquery.fancybox-1.3.4.css" />
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
				//'transitionOut'	: 'elastic',
                                 'onComplete': function() {
                                 // $("#fancybox-wrap").css({'left':'700px','right':'auto'});
                                 }
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
                        
                       $("a.teacher_login_form").fancybox({
			        'type':'iframe',
				'width' :750,
                                'height':530,
                                'href':this.href,
                                'showCloseButton'   : true,
                                'hideOnOverlayClick': false,
                                'hideOnContentClick' :   false,
				});   
                    });                                     
</script>
        </head>
	<body>
             <!-- Page Wrapper -->
		
<div class="navigationBar">
        <div class="logoBox">
            <h1 class="logoBox-header"><a href="inst_dashboard.php">SPACED<span>TIMES</span></a></h1>
        </div>
        <div class="menu-wrapper" style="margin-right:30px;">
           <a href="?q=logout" class="logout">Logout</a>
        </div>
</div>