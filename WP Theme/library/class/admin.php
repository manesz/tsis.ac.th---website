<?php
$rootpath = get_option('siteurl').'/';
include_once('pagination.class.php');
function tsis_add_pages() {
    add_menu_page(__('Manage TSIS Theme'), __('Manage TSIS Theme'), 'manage_options', 'manage-tsis', 'tsis_toplevel_page' );
	add_submenu_page('manage-tsis', __('Top Content'), __('Top Content'), 'manage_options', 'managetop-content', 'tsis_sublevel_topcontent');
    add_submenu_page('manage-tsis', __('Video Manage'), __('Video Manage'), 'manage_options', 'video-mange', 'tsis_sublevel_vdo');
}
function getconfigscript(){
?>
<script type="text/javascript">var rootpath = '<?php echo $rootpath;?>';</script>
<?php	
}
function tsis_toplevel_page() {
    echo "<h2>" . __( 'Theme Manage', 'menu-test' ) . "</h2>";
}
function tsis_sublevel_announcements() {
    echo "<h2>" . __( 'Announcements Manage', 'menu-test' ) . "</h2>";
}
function tsis_sublevel_topcontent() {
    include_once(get_template_directory().'/library/adminpage/topcontent.php');
}
function tsis_sublevel_vdo() {
    include_once(get_template_directory().'/library/adminpage/vdo.php');
}
function tsis_sublevel_page2() {
    echo "<h2>" . __( 'Test Sublevel2', 'menu-test' ) . "</h2>";
}
$feedAction = isset($_GET['feedaction'])?$_GET['feedaction']:false;
if($feedAction){	
	include_once(get_template_directory().'/library/adminpage/'.$feedAction.'.php');
	exit();
}