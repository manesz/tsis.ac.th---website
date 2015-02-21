<?php
if (!current_user_can('edit_post')) {
 wp_redirect($rootpath.'wp-login.php'); exit;
}
$post_id = isset($_REQUEST['post_id'])?$_REQUEST['post_id']:false;
$catid = isset($_REQUEST['catid'])?array($_REQUEST['catid']):false;
if($post_id){
$post_categories = wp_get_post_categories( $post_id );
if($post_categories){
	$catarrid = array_merge($post_categories,$catid);
}else{
	$catarrid = $catid;
}
$contentkey = isset($_REQUEST['contentkey'])?$_REQUEST['contentkey']:false; 
$myvar = get_option($contentkey);
if ($myvar == false) {
	add_option($contentkey,json_encode(array($post_id)), '', 'yes');
}else{
	$myindex = json_decode(stripslashes($myvar));
	$dataset[] = $post_id;
	for($i=0;$i<count($myindex);$i++){
		if($myindex[$i]!=$post_id){
			$dataset[]=$myindex[$i];
		}
	}
	update_option($contentkey,json_encode($dataset));
}
wp_set_post_categories($post_id,$catarrid);

header('Content-Type: application/json');
echo json_encode(array('error'=>'none'));
exit();
}