<?php
if (!current_user_can('edit_post')) {
 wp_redirect($rootpath.'wp-login.php'); exit;
}
$vdoid = isset($_REQUEST['vdoid'])?htmlspecialchars($_REQUEST['vdoid']):false;
$wpdb->delete( 'wp_videos', array( 'ID' => $vdoid), array( '%d' ) );
header('Content-type: application/json');
echo json_encode(array('error'=>'none'));