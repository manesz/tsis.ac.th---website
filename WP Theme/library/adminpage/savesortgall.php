<?php
if (!current_user_can('edit_post')) {
 wp_redirect($rootpath.'wp-login.php'); exit;
}
$idsort = isset($_POST['sortid'])?$_POST['sortid']:false;
if($idsort){
$max = count($idsort);
for($i=0;$i<count($idsort);$i++){
if ( ! update_post_meta ($idsort[$i],'order_gall',$max) ) { 
	add_post_meta($idsort[$i],'order_gall',$max, true );	
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