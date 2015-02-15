<?php
if (!current_user_can('edit_post')) {
 wp_redirect($rootpath.'wp-login.php'); exit;
}
$vdoid = isset($_REQUEST['vdoid'])?htmlspecialchars($_REQUEST['vdoid']):false;
$vdourl = isset($_POST['vdourl'])?htmlspecialchars($_POST['vdourl']):false;
$vdo_desc = isset($_POST['vdo_desc'])?esc_textarea($_POST['vdo_desc']):false;
$vdo_title = isset($_POST['vdo_title'])?esc_textarea($_POST['vdo_title']):false;
$vdo_duration = isset($_POST['vdo_duration'])?esc_textarea($_POST['vdo_duration']):'0';
$vdo_order_id = isset($_POST['vdo_order_id'])?esc_textarea($_POST['vdo_order_id']):false;
if($vdoid){
	if($vdo_order_id!==false){
		$post_id = $wpdb->update( 
		'wp_videos', 
		array('order_id' => $vdo_order_id), 
		array( 'ID' => $vdoid), 
		array('%d'), 
		array('%d') 
		);
	}
}else{ // add vdo
$post_id = false;
if($vdourl){
$post_id = $wpdb->insert( 
	'wp_videos', 
	array( 
		'vdourl' => $vdourl, 
		'vdo_desc' => $vdo_desc,
		'vdo_title' => $vdo_title,
		'duration' => $vdo_duration
	), 
	array( 
		'%s', 
		'%s',
		'%s',
		'%d' 
	) 
);
}
}
header('Content-type: application/json');
if($post_id){
	echo json_encode(array('post_id'=>$post_id));
}else{
	echo json_encode(array('error'=>'error'));	
}