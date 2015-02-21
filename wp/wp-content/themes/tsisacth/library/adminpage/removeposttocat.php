<?php
if (!current_user_can('edit_post')) {
 wp_redirect($rootpath.'wp-login.php'); exit;
}
$post_id = isset($_REQUEST['post_id'])?$_REQUEST['post_id']:false;
$catid = isset($_REQUEST['catid'])?array($_REQUEST['catid']):false;
if($post_id){
$post_categories = wp_get_post_categories( $post_id );
if($post_categories){
	for($i=0;$i<count($post_categories);$i++){
		if($post_categories[$i]==$catid[0]){
			unset($post_categories[$i]);
		}
	}
	$catarrid = $post_categories;
}else{
	$catarrid = $catid;
}
if(count($post_categories)<1){
	$catarrid = array(0);
}
$contentkey = isset($_REQUEST['contentkey'])?$_REQUEST['contentkey']:false;
$myvar = get_option($contentkey);
if($contentkey&&($myvar!=false)){
if ($myvar != false) {
$myindex = (array)json_decode(stripslashes($myvar));
$myindexlist = NULL;
for($i=0;$i<count($myindex);$i++){
	if($myindex[$i]!=$post_id){
	$myindexlist[]=$myindex[$i];
	}
}
update_option($contentkey,json_encode($myindexlist));	
}
}

wp_set_post_categories($post_id,$catarrid,true);
//$term_taxonomy_ids = wp_set_object_terms($post_id,$catarrid,'category',true );
header('Content-Type: application/json');
echo json_encode(array('error'=>'none'));
exit();
}