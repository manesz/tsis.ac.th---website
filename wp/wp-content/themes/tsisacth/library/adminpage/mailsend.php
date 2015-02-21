<?php
$email_quote = isset($_REQUEST['email_quote'])?$_REQUEST['email_quote']:false;
$phone_quote = isset($_REQUEST['phone_quote'])?$_REQUEST['phone_quote']:'-';
$message_quote = isset($_REQUEST['message_quote'])?esc_html(strip_tags($_REQUEST['message_quote'])):false;
$email_contact = get_option('email_contact');
header('Content-type: application/json');
if(($email_quote!==false)&&($message_quote!==false)){
	wp_mail( 'kangana512@gmail.com,'.$email_contact,'Request a Quote', '<img src="http://tsis.th/i/wp-content/themes/tsis.ac.th-website/WP%20Theme/library/images/logo.png" title="" alt="" /><br/>
	<strong>Email :</strong>'.$email_quote.'<br/>
	<strong>Phonenumber :</strong>'.$phone_quote.'<br/>
	<strong>Message :</strong><br/>
	'.$message_quote.'
	' );
	echo json_encode(array('error'=>'none'));	
	exit();
}
echo json_encode(array('error'=>'error'));	
exit();