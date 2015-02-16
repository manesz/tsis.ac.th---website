<?php
if (!current_user_can('edit_post')) {
 wp_redirect($rootpath.'wp-login.php'); exit;
}
$title_contact = isset($_REQUEST['title_contact'])?$_REQUEST['title_contact']:false;
$description_contact = isset($_REQUEST['description_contact'])?$_REQUEST['description_contact']:false;
$address_contact = isset($_REQUEST['address_contact'])?$_REQUEST['address_contact']:false;
$email_contact = isset($_REQUEST['email_contact'])?$_REQUEST['email_contact']:false;
$tel_contact = isset($_REQUEST['tel_contact'])?$_REQUEST['tel_contact']:false;
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
if($rel){
	wp_redirect($rel); exit;
}
