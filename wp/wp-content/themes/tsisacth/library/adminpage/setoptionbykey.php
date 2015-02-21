<?php
if (!current_user_can('edit_post')) {
 wp_redirect($rootpath.'wp-login.php'); exit;
}
$contentkey = isset($_REQUEST['contentkey'])?$_REQUEST['contentkey']:false; 
$dataset = isset($_REQUEST['dataset'])?$_REQUEST['dataset']:false;
if($dataset){
$myvar = get_option($contentkey);
if ($myvar == false) {
	add_option($contentkey, $dataset, '', 'yes');
}else{
	update_option($contentkey,$dataset);
}
header('Content-Type: application/json');
echo json_encode(array('error'=>'none'));
exit();
}