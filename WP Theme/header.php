<!doctype html>

<!--[if lt IE 7]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

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
    <meta name="msapplication-TileImage"
          content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
    <meta name="theme-color" content="#121212">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link type="text/css" rel="stylesheet"
          href="<?php echo get_stylesheet_directory_uri() . '/library/css/bootstrap.min.css'; ?>"/>
    <link type="text/css" rel="stylesheet"
          href="<?php echo get_stylesheet_directory_uri() . '/library/css/style.css'; ?>"/>
<!--    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>-->
<!--    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>-->

    <link href="<?php echo $themeLib; ?>css/animate.css" rel="stylesheet" type="text/css" media="all">
    <?php wp_head(); ?>
</head>

<body <?php body_class();
$mysite = get_option('siteurl') . '/'; ?> itemscope itemtype="http://schema.org/WebPage">

<!--Header-->
<div class="header" style="border-bottom: 1px #ddd solid; ">
    <div class="fluid-container clearfix">
        <div class="logo col-md-12 text-center">
            <a href="<?php echo $mysite ?>"><img src="<?php echo $themeLib; ?>images/logo.png" class="" alt="" style="width: 700px; max-width: 100%; height: auto;"/></a>
            <div class="clearfix"></div>
        </div>
        <div class="header-right col-md-12">
            <div class="navigation">
                <span class="menu"> </span>
                <?php
                if (has_nav_menu('top-menu')) {
                    wp_nav_menu(array('menu' => 'Main'));
                } else {

                    ?>
                    <ul>
                        <li><a href="<?php echo $mysite; ?>about-the-school/"
                               class="<?php if (is_page('about-the-school')) { ?>active<?php } ?>"
                               title="ABOUT US"><span>ABOUT US</span></a></li>
                        <li><a href="<?php echo $mysite; ?>" class="<?php if (is_page('offering')) { ?>active<?php } ?>"
                               title="offerings"><span>OFFERINGS</span></a></li>
                        <li><a href="<?php echo $mysite; ?>levels/"
                               class="<?php if (is_page('levels')) { ?>active<?php } ?>"
                               title="Levels"><span>LEVELS</span></a></li>
                        <li><a href="<?php echo $mysite; ?>gallery/"
                               class="<?php if (is_page('gallery')) { ?>active<?php } ?>"
                               title="Gallery"><span>GALLERY</span></a></li>
                        <li><a href="<?php echo $mysite; ?>facilities-3/"
                               class="<?php if (is_page('facilities-3')) { ?>active<?php } ?>" title="Facilities"><span>FACILITIES</span></a>
                        </li>
                        <!--<li><a class="scroll" href="#achievements" title="Achievements"><span>ACHIEVEMENTS</span></a></li>-->
                        <li><a href="<?php echo $mysite; ?>contact-us/"
                               class="<?php if (is_page('contact-us')) { ?>active<?php } ?>" title="CONTACT US"><span>CONTACT US</span></a>
                        </li>
                    </ul>
                <?php } ?>
            </div>

            <div class="clearfix"></div>
            <!-- /script-nav -->
<!--            <div class="top-icons">-->
<!--                --><?php
//                $fb_contact = get_option('fb_contact');
//                $tw_contact = get_option('tw_contact');
//                $gp_conteact = get_option('gp_conteact');
//                if ($fb_contact) {
//                    ?><!--<a href="--><?php //echo $fb_contact; ?><!--"><span class="icon1"> </span></a>--><?php //}
//                if ($tw_contact) { ?><!--<a href="--><?php //echo $tw_contact; ?><!--"><span class="icon2"> </span></a>--><?php //}
//                if ($gp_conteact) { ?><!--<a href="--><?php //echo $gp_conteact; ?><!--"><span class="icon3"> </span></a>--><?php //} ?>
<!--            </div>-->
<!--            <div class="clearfix"></div>-->
        </div>
    </div>
</div>
<!--/Header Ends Here-->
<!--upcoming camps Start Here-->
