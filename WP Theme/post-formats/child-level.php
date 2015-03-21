<style type="text/css">#catheader{display:none}</style>
<?php $args = array('posts_per_page'=>1,'cat'=>$this_category->term_id,'orderby'=>'post_date','order'   =>'DESC');
$posts_array = get_posts( $args );
$imagethumb = '';
foreach ($posts_array as $post ) : setup_postdata( $post ); $imagethumb = wp_get_attachment_url( get_post_thumbnail_id($posts_array->ID),'full');
$imagethumb = $imagethumb?'<img class="image-content" alt="'.$query->post_title.'" src="' .$imagethumb. '" style="width:420px"/>':get_first_inserted_image();
endforeach; 
wp_reset_postdata();
$classlists = getChildClassList();
$postLists = NULL;
foreach($classlists as $classlist){
	$myarrayPush = NULL;$classcat=NULL;
	$classcat = get_category($classlist);
	$myarrayPush['catID'] = $classlist;
	$myarrayPush['catName'] = ucfirst($classcat->name);
	$query = new WP_Query(array('category__and' => array( $this_category->term_id,$classlist)));
	while($query->have_posts()){
	$query->the_post();
	$imagethumb = '';
	$imagethumb = wp_get_attachment_url( get_post_thumbnail_id($posts_array->ID),'full');
$imagethumb = $imagethumb?'<img class="image-content" alt="'.$query->post_title.'" src="' .$imagethumb. '" style="width:420px"/>':get_first_inserted_image();
		$myarraypostPush = array('postid'=>$post->ID,'name'=>get_the_title(),'image'=>$imagethumb,'link'=>get_permalink());
		$myarrayPush['posts'][] = $myarraypostPush;
	}
wp_reset_postdata();
	$postLists[] = $myarrayPush;
}
?>
<div class="top-p1">
<div style="width:100%; text-align:center"><?php echo $imagethumb;?></div>
            <h3><?php printf( __( '%s'), single_cat_title( '', false ) ); ?></h3>
            <?php if ( category_description() ) :?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
        </div>
<?php 
foreach($postLists as $poslist){	
if(count($poslist['posts'])){
?>
<div class="blockContent" style="margin-bottom:5px"><h2><?php echo $poslist['catName'];?></h2>
<hr>
<div class="row">
<?php for($i=0;$i<count($poslist['posts']);$i++){
	$plist = $poslist['posts'][$i];
?>
<div class="col-md-4">
	<a href="<?php echo $plist['link'];?>"><?php echo $plist['image'];?></a>
    <h3><?php echo $plist['name'];?></h3>
</div>
<?php }?>
</div>
</div>
<?php 
}
}?>
