<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );
require_once( 'library/class/admin.php');
add_action('admin_menu', 'tsis_add_pages');
// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function unload_fonts() {
          wp_dequeue_style( 'googleFonts');
       }

add_action('wp_print_styles', 'unload_fonts', 11);

function bones_ahoy() {

  //Allow editor style.
  //add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  //require_once( 'library/custom-post-type.php' );
  require_once('library/custom-announcement.php');
require_once('library/custom-parent.php');
  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  //add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!
/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );
$themeLib = get_stylesheet_directory_uri().'/library/';
$calEvent = isset($_REQUEST['calevent'])?$_REQUEST['calevent']:false;
if($calEvent){
	header('Content-Type: application/json');
	echo "[{title:'All Day Event',start:'2014-11-01'},{title:'Long Event',start:'2014-11-07',end:'2014-11-10'},{id:999,title:'Repeating Event',start:'2014-11-09T16:00:00'},{id:999,title:'Repeating Event',start:'2014-11-16T16:00:00'},{title:'Conference',start:'2014-11-11',end:'2014-11-13'},{title:'Meeting',start:'2014-11-12T10:30:00',end:'2014-11-12T12:30:00'},{title:'Lunch',start:'2014-11-12T12:00:00'},{title:'Meeting',start:'2014-11-12T14:30:00'},{title:'Happy Hour',start:'2014-11-12T17:30:00'},{title:'Dinner',start:'2014-11-12T20:00:00'},{title:'Birthday Party',start:'2014-11-13T07:00:00'},{title:'Click for Google',url:'http://google.com/',start:'2014-11-28'}]";
	exit();
}
function getPostGallMeta($post_id){
	$gallinpost = get_post_meta($post_id, 'gallinpost', true);
	$gallinpostid = get_post_meta($post_id, 'gallinpostid', true);
	$mytext = '';
	if($gallinpostid){
	$p1 = explode(',',$gallinpost);
	$p2 = explode(',',$gallinpostid);
	for($i=0;$i<count($p2);$i++){
		$mytext .= '<li><img id="gall-'.$p2[$i].'" class="mygallsrc" src="'.$p1[$i].'"></li>';
	}
	}
	return $mytext;
}
function getPostGallMeta_rotation($post_id){
	$gallinpost = get_post_meta($post_id, 'gallinpost_rotation', true);
	$gallinpostid = get_post_meta($post_id, 'gallinpostid_rotation', true);
	$mytext = '';
	if($gallinpostid){
	$p1 = explode(',',$gallinpost);
	$p2 = explode(',',$gallinpostid);
	for($i=0;$i<count($p2);$i++){
		$mytext .= '<li><img id="gall_rotation-'.$p2[$i].'" class="mygallsrc_rotation" src="'.$p1[$i].'"></li>';
	}
	}
	return $mytext;
}
function arrGetPostGallery($post_id){
    $gallinpost = get_post_meta($post_id, 'gallinpost', true);
    $gallinpostid = get_post_meta($post_id, 'gallinpostid', true);
    $mytext = '';
    if($gallinpostid){
        $p1 = explode(',',$gallinpost);
        $p2 = explode(',',$gallinpostid);
        for($i=0;$i<count($p2);$i++){
            $arrGallery[] = array($p2[$i],$p1[$i]);
        }
    }
    return $arrGallery;
}
function arrGetPostGallery_rotation($post_id){
    $gallinpost = get_post_meta($post_id, 'gallinpost_rotation', true);
    $gallinpostid = get_post_meta($post_id, 'gallinpostid_rotation', true);
    $mytext = '';
    if($gallinpostid){
        $p1 = explode(',',$gallinpost);
        $p2 = explode(',',$gallinpostid);
        for($i=0;$i<count($p2);$i++){
            $arrGallery[] = array($p2[$i],$p1[$i]);
        }
    }
    return $arrGallery;
}
class inittheme{
	private $def_post = array(
		  'post_title' => 'My post',
		  'post_content'  => 'This is my post.',
		  'post_status'=> 'publish',
		  'post_author'=> 1
	);
	private function createPage($postarr){
		$my_post = array_merge($this->def_post,$postarr);
		// Insert the post into the database
		wp_insert_post($my_post);
		return false;
	}
	public function firstInit($firstarrs){
		global $wpdb;
    if(!function_exists('dbDelta')){
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    }
    $sql = "CREATE TABLE IF NOT EXISTS `wp_videos` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vdourl` text NOT NULL,
  `vdo_desc` text NOT NULL,
  `vdo_title` varchar(255) NOT NULL,
  `post_id` bigint(20) NOT NULL DEFAULT '0',
  `duration` bigint(20) NOT NULL DEFAULT '0',
  `order_id` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
 dbDelta($sql);
		foreach($firstarrs as $firstarr){
			$this->createPage($firstarr);
		}
	}
}
function get_first_inserted_image() {
    global $post, $posts;
	$pccont = str_replace('src="http://tsis.ac.th/i/wp-content/uploads/2013/02/copy-header1.png"','',$post->post_content);
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$pccont, $matches);
	if($matches [1] [0]){
    $first_img = $matches [1] [0];
	}else{
	$first_img = 'http://tsis.ac.th/i/wp-content/uploads/2013/02/copy-header1.png';
	}
    // Spew it out as an imege
	
    $first_img = '<img alt="'.$post->post_title.'" width="100%" src="' . $first_img . '" />';
    return $first_img;
}
$is_inittm = get_option( 'is_first_setup' );
if($is_inittm==false){
$inittm = new inittheme();
$init_page = array(
	array(
		  'post_title' => 'About us',
		  'post_content'  => '',
		  'post_status'=> 'publish',
		  'post_type'=>'page',
		  'post_author'=> 1
	),
	array(
		  'post_title' => 'News',
		  'post_content'  => '',
		  'post_status'=> 'publish',
		  'post_type'=>'page',
		  'post_author'=> 1
	),
	array(
		  'post_title' => 'Facilities',
		  'post_content'  => '',
		  'post_status'=> 'publish',
		  'post_type'=>'page',
		  'post_author'=> 1
	),
	array(
		  'post_title' => 'Videos',
		  'post_content'  => '',
		  'post_status'=> 'publish',
		  'post_type'=>'page',
		  'post_author'=> 1
	),
);
$inittm->firstInit($init_page);
add_option( 'is_first_setup', '1', '', 'yes' );
}
register_nav_menus(array(
	'top-menu'         => __('Top Menu', 'responsive'),
	'header-menu'      => __('Header Menu', 'responsive'),
	'sub-header-menu'  => __('Sub-Header Menu', 'responsive'),
	'footer-menu'      => __('Footer Menu', 'responsive')
	)
);
add_filter( 'wp_mail_content_type', 'set_html_content_type' ); 
function set_html_content_type() {
return 'text/html';
}
function getCarouselList($postid,$arrRotationimage){
?>
<div id="carousel-example-generic-<?php echo $postid;?>" class="carousel slide" data-ride="carousel">
<?php $i=1;if(!empty($arrRotationimage)):?><ol class="carousel-indicators"><?php $i=1;foreach( $arrRotationimage as $key => $value ):?><li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>" class="<?php if($key==0):echo 'active'; endif; ?>"></li><?php if($i==5){break;}$i++; endforeach;?></ol><div class="carousel-inner" role="listbox"><?php $i=1;foreach( $arrRotationimage as $key => $value ):?><div class="item <?php if($key==0):echo 'active'; endif; ?> img-frame"> <img src='<?php echo $value[1]; ?>'/> </div><?php if($i==5){break;}$i++; endforeach; ?></div><a class="left carousel-control" href="#carousel-example-generic-<?php echo $postid;?>" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-example-generic-<?php echo $postid;?>" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a><?php endif;?></div><?php	
}
function in_levelparent($term_id,$parent=false){
	$category = get_term_by('name','level','category');
$termchildren = get_term_children($category->term_id,'category');
$lv1 = false;
$lv2 = 1;
	foreach ( $termchildren as $child ) {
	if($child==$term_id){
		$lv1 = true;
	}
	if($parent!=$category->term_id){
		$lv2 = 2;
	}
	}
	return array($lv1,$lv2);
}
function getChildClassList(){
	$category = get_term_by('name','class','category');
$termchildren = get_term_children($category->term_id,'category');
return $termchildren;
}