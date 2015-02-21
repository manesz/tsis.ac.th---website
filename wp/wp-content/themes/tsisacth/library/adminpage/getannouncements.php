<?php
$limit = isset($_REQUEST['limit'])?intval($_REQUEST['limit']):-1;
$args = array('post_type' => 'announcements');
$myarr = NULL;
if($limit){
	$args['posts_per_page'] = $limit;
}
$posts = get_posts( $args );
if($posts){
foreach($posts as $post){
	$mydata = NULL;
	$mydata['title'] = $post->post_title;
	$mydata['url'] = get_permalink($posts->ID);
	$mydata['start'] = get_post_meta($post->ID, 'ann_start_date', true);
	$mydata['end'] = get_post_meta($post->ID, 'ann_end_date', true);
	$myarr['data'][] = (object)$mydata;
}
}else{
$myarr['error'] = 'error';	
}
header('Content-type: application/json');
echo json_encode($myarr);
exit();

