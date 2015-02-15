<?php
$s = isset($_REQUEST['s'])?$_REQUEST['s']:false;
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
$paged = isset($_REQUEST['paged'])?$_REQUEST['paged']:1;
$myarr = NULL;
$args = array(
	'post_type' => 'post',
	'post_status' =>'publish',
	'paged' =>$paged
);
if($s){
	$args['s']=$s;
}
global $posts,$post;
query_posts( $args );
$i =1;
$myarr['pagination']=str_replace($paged.'/',$paged,spd_pagination(true,$catid));
while(have_posts()):the_post();
$imagethumb = get_the_post_thumbnail( $post->ID );
$imagethumb = $imagethumb?'<img alt="'.$post->post_title.'" width="100%" src="' .$imagethumb. '" />':get_first_inserted_image();
$mypotarr = array('post_title'=>$post->post_title,'ID'=>$post->ID,'image'=>$imagethumb,'shortpost'=>$post->post_content);
$myarr['data'][] = $mypotarr;
endwhile;
header('Content-Type: application/json');
echo json_encode($myarr);
exit();