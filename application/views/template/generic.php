<?php /*?><!DOCTYPE HTML>
<html lang="<?php echo substr(I18n::$lang, 0, 2); ?>"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="description" content="A short phrase that describes the content of the page" />
<meta name="keywords" content="list of words, separated by, comma" />
<meta name="abstract" content="Short description of page" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo URL::base(); ?>favicon.ico">
<link rel="apple-touch-icon" href="<?php echo URL::base(); ?>touch-icon-iphone.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL::base(); ?>touch-icon-ipad.png" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL::base(); ?>touch-icon-iphone4.png" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<title><?php echo $title ?></title>
<?php foreach ($styles as $file => $type) echo HTML::style($file, array('media' => $type)), PHP_EOL ?>
<?php foreach ($scripts as $file) echo HTML::script($file), PHP_EOL ?>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js">IE7_PNG_SUFFIX=".png";</script>
<![endif]-->
</head>
<body>
<div id="content">
<div id="header">
<?php include Kohana::find_file('views', 'header'); ?>
</div>
<?php echo $content ?>
</div>
<?php //echo View::factory('profiler/stats') ?>
</body>
</html><?php */?>
<!doctype html>
<html lang="<?php echo substr(I18n::$lang, 0, 2); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="grey" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>assets/css/style.css">
        <!--========================tab=============================-->

        <link type="text/css" rel="stylesheet" href="<?php echo URL::base(); ?>assets/css/easy-responsive-tabs.css" />
        
        <!--=====================menu==============================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>assets/css/slimmenu.css">
        <!--===================onclickslider========================-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>assets/css/contentstyle.css">
        
        <script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/jquery-1.8.2.min.js"></script>
    </head>

    <body>
        <div id="main">
            <!--==================headerstart=========================-->
            <header>
                <div id="header">
                    <div class="header-inner">
                        <div id="logo"><a href="<?php echo URL::base(); ?>"><img src="<?php echo URL::base(); ?>assets/images/Logo.png" alt="logo"></a></div>
                        <!--===righthead=======-->
<!--=================topdropdown======================-->
<script type="text/javascript">
$(function(){
	$('.dropdown').mouseenter(function(){
		$('.sublinks').stop(false, true).hide();
	
		var submenu = $(this).parent().next();

		submenu.css({
			position:'absolute',
			top: $(this).offset().top + $(this).height() + 'px',
			left: $(this).offset().left + 'px',
			zIndex:1000
		});
		
		submenu.stop().slideDown(300);
		
		submenu.mouseleave(function(){
			$(this).slideUp(300);
		});
	});
});
</script>
                        
                        <div class="head-right">
                              <?php if(isset($loged)) { ?> 
                             <div class="user-div">
                                <div class="drop">
                                    <ul>
                                      <li><span><img src="<?php echo URL::base(); ?>assets/images/user-pic.jpg" class="view-user-pic" alt=""></span><?php echo HTML::anchor('dashboard', Auth::instance()->get_user()->fullname, array('class'=>'dropdown')); ?></li>
                                      <li class="sublinks"> <a href="#">Link 1</a> <a href="#">Link 2</a> <?php echo HTML::anchor('dashboard/logout', __('Logout')); ?> </li>
                                    </ul>
                                    <!-- First Menu End --> 
                                 </div>
                            </div> 
                             <?php } ?>     
                            <div class="top-link">
                                <ul class="slimmenu">
                                    <?php if(!isset($loged)) { ?>                                    
                                    <li><a href="<?php echo URL::site('account/login'); ?>">Log in</a></li>
                                    <li><a href="<?php echo URL::site('account/create'); ?>">Sign up</a></li>
                                    <?php } ?>
                                    <li><a href="<?php echo URL::base(); ?>">Blog / Artikler</a></li>
                                    <li><a href="<?php echo URL::base(); ?>">Help</a></li>
                                    <li><a href="<?php echo URL::base(); ?>">Opret Behandler<span><img src="<?php echo URL::base(); ?>assets/images/plus-icon.png" alt=""></span></a></li>

                                </ul>
                            </div>
                        </div>
                        <!--===righthead=======-->

                        <?php if(isset($search)) echo $search; ?>
                        <!--===topsearcbar=====-->

                    </div>
                </div>
            </header>
            <!--==================headerend=========================-->

            <?php echo $content; ?>

            <!--=================footerstart========================-->
            <footer>
                <div id="footer">
                    <div class="footer-inner">
                        <div class="foot-link">
                            <h3>Firma</h3>
                            <ul>
                                <li><a href="#">Om</a></li>
                                <li><a href="#">Mission</a></li>
                                <li><a href="#">Legal Terms</a></li>
                                <li><a href="#">Presse</a></li>
                            </ul>
                        </div>
                        <div class="foot-link">
                            <h3>Firma</h3>
                            <ul>
                                <li><a href="#">Om</a></li>
                                <li><a href="#">Mission</a></li>
                                <li><a href="#">Legal Terms</a></li>
                                <li><a href="#">Presse</a></li>
                            </ul>
                        </div>
                        <div class="foot-link">
                            <h3>Firma</h3>
                            <ul>
                                <li><a href="#">Om</a></li>
                                <li><a href="#">Mission</a></li>
                                <li><a href="#">Legal Terms</a></li>
                                <li><a href="#">Presse</a></li>
                            </ul>
                        </div>
                        <div class="foot-link">
                            <h3>Firma</h3>
                            <ul>
                                <li><a href="#">Om</a></li>
                                <li><a href="#">Mission</a></li>
                                <li><a href="#">Legal Terms</a></li>
                                <li><a href="#">Presse</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!--=================footerstart========================-->

        </div>


<script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/easyResponsiveTabs.js" ></script>
<script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/jquery.contentcarousel.js"></script>
<script type="text/javascript">$('#ca-container').contentcarousel();</script>

<script src="<?php echo URL::base(); ?>assets/js/jquery.slimmenu.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> 

<script type="text/javascript"src="<?php echo URL::base(); ?>assets/js/extra.js"></script>

<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script');
	ga.type = 'text/javascript';
	ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(ga, s);
})();
</script>
        
    </body>
</html>