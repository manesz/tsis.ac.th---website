<?php include_once('header.php');?>
<div class="container">
        <div class="top-p1">
            <h3><?php printf( __( '%s'), single_cat_title( '', false ) ); ?></h3>
            <?php if ( category_description() ) :?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
        </div>
<div class="bootstrap-grids">
<?php while ( have_posts() ) : the_post();
$imagethumb = get_the_post_thumbnail( $post->ID );
$imagethumb = $imagethumb?'<img alt="'.$post->post_title.'" width="190" src="' .$imagethumb. '" />':get_first_inserted_image();
$mylink = get_permalink();
?>

            <div class="col-md-4 camps">
                <a href="<?php echo $mylink;?>"><?php echo str_replace('src',' class="img-responsive" src',$imagethumb);?></a>
                <ul class="product_title titlelast">
                    <li class="s_head"><h3><?php echo $post->post_title;?></h3><p><?php $time = strtotime($post->post_date);

$newformat = date('dS F Y',$time);

echo $newformat;?></p></li>
                    <li> <a href="<?php echo $mylink;?>" class="fa-btn1 btn-2 btn-1e1"> </a>
                    </li>
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
                    <a class="button wow swing" data-wow-delay= "0.4s" href="<?php echo $mylink;?>">ENROLL TODAY</a>
                </div>
            </div> 
<?php  endwhile;?></div></div><?php include_once('footer.php');exit();