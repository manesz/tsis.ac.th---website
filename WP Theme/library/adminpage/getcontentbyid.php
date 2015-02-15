<?php
$post_id = isset($_REQUEST['post_id'])?htmlspecialchars($_REQUEST['post_id']):false;
$myarr = NULL;
global $post,$posts;
$post = get_post($post_id);
$imagethumb = get_the_post_thumbnail( $post->ID );
$imagethumb = $imagethumb?'<img alt="'.$post->post_title.'" width="100%" src="' .$imagethumb. '" />':get_first_inserted_image();
$myarr['data']['image'] = $imagethumb;
$myarr['data']['title'] = $post->post_title;
$myarr['data']['post_content'] = $post->post_content;
header('Content-Type: application/json');
echo json_encode($myarr);
exit();