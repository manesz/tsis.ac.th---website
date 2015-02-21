<?php
$rootpath = get_option('siteurl').'/';
include_once('pagination.class.php');
function tsis_add_pages() {
    add_menu_page(__('Manage TSIS Theme'), __('Manage TSIS Theme'), 'manage_options', 'manage-tsis', 'tsis_toplevel_page','dashicons-admin-settings',6);
	add_submenu_page('manage-tsis', __('Top Content'), __('Top Content'), 'manage_options', 'managetop-content', 'tsis_sublevel_topcontent');
	add_submenu_page('manage-tsis', __('Contact'), __('Contact'), 'manage_options', 'manage-contact', 'tsis_sublevel_contact');
	add_submenu_page('manage-tsis', __('Highlight'), __('Highlight'), 'manage_options', 'manage-highlight', 'tsis_sublevel_highlight');
	add_submenu_page('manage-tsis', __('Onfocus'), __('Onfocus'), 'manage_options', 'manage-onfocus', 'tsis_sublevel_onfocus');
	add_submenu_page('manage-tsis', __('Achievements'), __('Achievements'), 'manage_options', 'manage-achievements', 'tsis_sublevel_achievements');
    add_submenu_page('manage-tsis', __('Video Manage'), __('Video Manage'), 'manage_options', 'video-mange', 'tsis_sublevel_vdo');
}
function getconfigscript(){
?>
<script type="text/javascript">var rootpath = '<?php echo $rootpath;?>';</script>
<?php	
}
function tsis_sublevel_highlight(){
	include_once(get_template_directory().'/library/adminpage/theme_highlight.php');
}
function tsis_sublevel_onfocus(){
	include_once(get_template_directory().'/library/adminpage/theme_onfocus.php');
}
function tsis_sublevel_achievements(){
	include_once(get_template_directory().'/library/adminpage/theme_achievements.php');
}
function tsis_toplevel_page() {
    include_once(get_template_directory().'/library/adminpage/theme_manage.php');
}
function tsis_sublevel_topcontent() {
    include_once(get_template_directory().'/library/adminpage/topcontent.php');
}
function tsis_sublevel_contact() {
    include_once(get_template_directory().'/library/adminpage/contact.php');
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