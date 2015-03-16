<?php 
	session_start();
	// if(@$_SESSION['cover_display']):$_SESSION['cover_display'] = 0;endif;
?>
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

<body class='body-bg'<?php //body_class();
$mysite = get_option('siteurl') . '/'; ?> itemscope itemtype="http://schema.org/WebPage">
<!--Header-->
<div class="header" style="background: #fff; border-bottom: 1px #ddd solid; ">
    <div class="fluid-container clearfix">
        <div class="logo col-md-12 text-center">
            <a href="<?php echo $mysite ?>"><img src="<?php echo $themeLib; ?>images/logo.png" class="" alt="" style="width: 600px; max-width: 100%; height: auto;"/></a>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-12" style='margin-top: 30px; padding: 0px !important;'>
            <div class="navigation">
                <span class="menu"> </span>
                <?php
                if (has_nav_menu('top-menu')) {
                    // wp_nav_menu(array('menu' => 'Main'));
					
					$defaults = array(
						'theme_location'  => '',
						'menu'            => 'Main',
						'container'       => 'div',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					);

					wp_nav_menu( $defaults );
					
					// $menu_name = 'top-menu';

					// if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
					// $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

					// $menu_items = wp_get_nav_menu_items($menu->term_id);

					// $menu_list = '<ul id="menu-' . $menu_name . '">';

					// foreach ( (array) $menu_items as $key => $menu_item ) {
						// $title = $menu_item->title;
						// $url = $menu_item->url;
						// $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
					// }
					// $menu_list .= '</ul>';
					// } else {
					// $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
					// }
					// // $menu_list now ready to output
					
					// echo $menu_list;
					
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
				
				
				<div class='col-md-12 text-center' style='background-color: rgba(79,185,225,1); padding: 10px 0 10px 0; color: #fff;'>
					<img src="http://demo.ideacorners.com/tsis/wp-content/themes/tsisacth/library/images/ion3.png" alt="" style='width: auto; height: 25px;'>  +66 2 710 5900
					<img src="http://demo.ideacorners.com/tsis/wp-content/themes/tsisacth/library/images/ion2.png" alt="" style='width: auto; height: 20px;'>  info@tsis.ac.th
				</div>
            </div>
			

            <div class="clearfix"></div>
        </div>
		
    </div>
</div>
<!--/Header Ends Here-->
<!--upcoming camps Start Here-->
