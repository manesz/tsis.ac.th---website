<?php include_once('header.php');?>
<div class="container">
        <div class="top-p1">
            <h3>CATEGORY : <?php printf( __( '%s'), single_cat_title( '', false ) ); ?></h3>
            <?php if ( category_description() ) :?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
        </div>
<div class="bootstrap-grids">
<?php while ( have_posts() ) : the_post();
$contentDescription = apply_filters('the_content', $post->post_content);
$imagethumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
$imagethumb = $imagethumb?'<img alt="'.$post->post_title.'" width="100%" src="' .$imagethumb. '" />':get_first_inserted_image();
$mylink = get_permalink();
?>

            <div class="col-md-4 camps">
                <a href="<?php echo $mylink;?>"><?php echo str_replace('src',' class="img-responsive" src',$imagethumb);?></a>
                <ul class="product_title titlelast">
                    <li class="s_head col-md-12"><h3 class='text-center'><?php echo $post->post_title;?></h3>
					<p style='height: 200px; overflow: hidden; color: #eee;'><?php echo $contentDescription; ?></p></li>
                </ul>
                <div class="clearfix"> </div>
                <div class="Proin">
                    <p>
                    <?php 
					$my_excerpt = get_the_excerpt();
if ( $my_excerpt != '' ) {
	echo iconv_substr(strip_tags($post->post_content),0,320, "UTF-8");
}else{
echo $my_excerpt;
}
					?>
                    </p>
                    <a class="button wow swing col-md-12 text-center" data-wow-delay= "0.4s" href="<?php echo $mylink;?>">READ MORE</a>
                </div>
            </div> 
<?php  endwhile;?></div></div><?php include_once('footer.php');exit();