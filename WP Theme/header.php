<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/library/css/bootstrap.min.css';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/library/css/style.css';?>" />
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link href="<?php echo $themeLib;?>css/animate.css" rel="stylesheet" type="text/css" media="all">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<!--Header-->
<div class="header">
    <div class="container">
        <div class="logo">
            <a href="index.html"><img src="<?php echo $themeLib;?>images/logo.png" class="img-responsive" alt="" style="max-width: 300px;"/></a>
            <div class="clearfix"> </div>
        </div>
        <div class="header-right">
            <div class="navigation">
                <span class="menu"> </span>
                <ul>
                    <li><a href="page.html" class="" title="ABOUT US"><span>ABOUT US</span></a></li>
                    <li><a href="page.html" class="active" title="offerings"><span>OFFERINGS</span></a></li>
                    <li><a href="page.html" class="" title="Levels"><span>LEVELS</span></a></li>
                    <li><a href="category.html" class="" title="Gallery"><span>GALLERY</span></a></li>
                    <li><a href="page.html" class="" title="Facilities"><span>FACILITIES</span></a></li>
                    <!--<li><a class="scroll" href="#achievements" title="Achievements"><span>ACHIEVEMENTS</span></a></li>-->
                    <li><a href="contact.html" class="" title="CONTACT US"><span>CONTACT US</span></a></li>
                </ul>
            </div>
            
            <div class="clearfix"> </div>
            <!-- /script-nav -->
            <div class="top-icons">
                <span class="icon1"> </span>
                <span class="icon2"> </span>
                <span class="icon3"> </span>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--/Header Ends Here-->
<!--upcoming camps Start Here-->
<div id="camps" class="upcoming">