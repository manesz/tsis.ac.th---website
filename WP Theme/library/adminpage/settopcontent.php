<?php
if (!current_user_can('edit_post')) {
 wp_redirect($rootpath.'wp-login.php'); exit;
}
$post_id = isset($_REQUEST['post_id'])?$_REQUEST['post_id']:false;
if($post_id){
update_option('top_content',$post_id);
header('Content-Type: application/json');
echo json_encode(array('error'=>'none'));
exit();
}