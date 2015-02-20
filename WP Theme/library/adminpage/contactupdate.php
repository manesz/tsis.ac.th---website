<?php
if (!current_user_can('edit_post')) {
 wp_redirect($rootpath.'wp-login.php'); exit;
}
$title_contact = isset($_REQUEST['title_contact'])?$_REQUEST['title_contact']:false;
$description_contact = isset($_REQUEST['description_contact'])?$_REQUEST['description_contact']:false;
$address_contact = isset($_REQUEST['address_contact'])?$_REQUEST['address_contact']:false;
$email_contact = isset($_REQUEST['email_contact'])?$_REQUEST['email_contact']:false;
$tel_contact = isset($_REQUEST['tel_contact'])?$_REQUEST['tel_contact']:false;
$fb_contact = isset($_REQUEST['fb_contact'])?$_REQUEST['fb_contact']:false;
$tw_contact = isset($_REQUEST['tw_contact'])?$_REQUEST['tw_contact']:false;
$gp_conteact = isset($_REQUEST['gp_conteact'])?$_REQUEST['gp_conteact']:false;
$rel = isset($_REQUEST['rel'])?$_REQUEST['rel']:false;
if ($title_contact !== false) {
	update_option('title_contact',$title_contact);
}
if ($description_contact !== false) {
	update_option('description_contact',$description_contact);
}
if ($address_contact !== false) {
	update_option('address_contact',$address_contact);
}
if ($email_contact !== false) {
	update_option('email_contact',$email_contact);
}
if ($tel_contact !== false) {
	update_option('tel_contact',$tel_contact);
}
if ($fb_contact !== false) {
	update_option('fb_contact',$fb_contact);
}
if ($tw_contact !== false) {
	update_option('tw_contact',$tw_contact);
}
if ($gp_conteact !== false) {
	update_option('gp_conteact',$gp_conteact);
}

if($rel){
	wp_redirect($rel); exit;
}
