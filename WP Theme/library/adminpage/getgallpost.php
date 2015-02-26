<?php
$actiontget = isset($_REQUEST['cat_show'])?$_REQUEST['cat_show']:'gallery';
$cat_show = get_option($actiontget);
if($actiontget&&($cat_show!=false)){
$myindex = json_decode(stripslashes($cat_show));
$myarr = NULL;
global $posts,$post;
for($i=0;$i<count($myindex);$i++){	
$post = get_post($myindex[$i]); 
$imagethumb = get_the_post_thumbnail( $post->ID );
$imagethumb = $imagethumb?str_replace('','',$imagethumb):get_first_inserted_image();
$mypotarr = array('post_title'=>$post->post_title,'ID'=>$post->ID,'image'=>$imagethumb,'shortpost'=>$post->post_content);
$myarr['data'][] = $mypotarr;
}
header('Content-Type: application/json');
echo json_encode($myarr);
exit();
}
$s = isset($_REQUEST['s'])?$_REQUEST['s']:false;
$catslug = isset($_REQUEST['catslug'])?$_REQUEST['catslug']:false;
if(!function_exists('spd_pagination')){
function spd_pagination($echo=false,$catid=NULL,$prev = '«', $next = '»') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	$formatxx = '?paged=%#%';
    $pagination = array(
        //'base' => @add_query_arg('paged','%#%'),
        'format' => $formatxx,
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => "&lt; Previous",
        'next_text' => "Next &gt;",
        'type' => 'plain'
);
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . '?paged=%#%', 'paged' );
	
    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
    if(!$echo){
        echo paginate_links( $pagination );
    }else{
        return paginate_links( $pagination );
    }
};	
}
$
$paged = isset($_REQUEST['paged'])?$_REQUEST['paged']:1;
$myarr = NULL;
$args = array(
	'post_type' => array('post','page'),
	'post_status' =>'publish',
	'category_name' => $catslug,
	'posts_per_page' => -1,
	'orderby'=>'meta_value_num',
	'meta_key'=>'order_gall',
	'order'=>'DESC'
);
if($s){
	$args['s']=$s;
}
global $posts,$post;
query_posts( $args );
if(!$posts){
	$args = array(
	'post_type' => array('post','page'),
	'post_status' =>'publish',
	'category_name' => $catslug,
	'posts_per_page' => -1
);
query_posts( $args );
}
$i =1;
$myarr['pagination']=str_replace($paged.'/',$paged,spd_pagination(true,$catid));
while(have_posts()):the_post();
$imagethumb = get_the_post_thumbnail( $post->ID,'thumbnail' );
$imagethumb = $imagethumb?str_replace('','',$imagethumb):get_first_inserted_image();
$mypotarr = array('post_title'=>$post->post_title,'ID'=>$post->ID,'image'=>$imagethumb,'shortpost'=>$post->post_content);
$myarr['data'][] = $mypotarr;
endwhile;
header('Content-Type: application/json');
echo json_encode($myarr);
exit();