<?php
if (!current_user_can('edit_post')) {
 wp_redirect($rootpath.'wp-login.php'); exit;
}
$idsort = isset($_POST['sortid'])?$_POST['sortid']:false;
$mycategory = get_category_by_slug('gallery');
$catid = $mycategory->term_id;
if($idsort){
$max = count($idsort);
for($i=0;$i<count($idsort);$i++){
if ( ! update_post_meta ($idsort[$i],'order_gall',$max) ) { 
	add_post_meta($idsort[$i],'order_gall',$max, true );
	$post_categories = wp_get_post_categories( $post_id );
	if($post_categories){
		$catarrid = array_merge($post_categories,$catid);
	}else{
		$catarrid = $catid;
	}
	wp_set_post_categories($idsort[$i],$catarrid);	
}
//echo $i.':max='.$max.'postid='.$idsort[$i];
$max--;
}
}
$post_id = 'all';
header('Content-type: application/json');
if($post_id){
	echo json_encode(array('post_id'=>$post_id));
}else{
	echo json_encode(array('error'=>'error'));	
}