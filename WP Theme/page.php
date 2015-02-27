<?php include_once('header.php');
if(is_page('contact-us')){

?>
<div class="container">
        <div class="bootstrap-grids">
            <div class="col-md-12 camps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3877.1863766141214!2d100.63913199999999!3d13.646424!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2a062a2adb3cf%3A0xc0c58cc3418d0c6d!2sSingapore+International+School+Srinakarin!5e0!3m2!1sth!2sth!4v1421832491175" width="100%" height="450" frameborder="0" style="border:0"></iframe>
                <div class="clearfix"> </div>
                <div class="Proin">
                <?php while ( have_posts() ) : the_post();the_content(); 
				endwhile;	
				?>                        
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<?php
}else{
while ( have_posts() ) : the_post();
$postID = get_the_ID();
$array = arrGetPostGallery($postID);
?>
<div class="container">
        <div class="top-p1 col-md-12" style="text-align: left;">
            <h3 style="text-align: left;"><?php the_title(); ?></h3>
            <p class="s_head" style="text-align: left; margin: 0; margin-bottom: 20px;"><?php $date = date('dS F Y',strtotime($post->post_date)); echo $date;?></p>
        </div>
        <div class="bootstrap-grids">
            <div class="col-md-12 camps">
                <div class="Proin">
                    <?php 
					if(is_page('gallery')){
						include_once('post-formats/loop-gallery.php');
						wp_reset_query();
					}else{
						the_content();
					}?>
                </div>
				
				<?php if(!empty($array)):?>
				<ul id="gallery" class="clearfix">
                    <?php
                        foreach($array as $key=>$value):
                            echo '<li class="gallery-frame col-md-4" style=""><a class="fancybox-thumbs" href="'.$value[1].'" data-fancybox-group="thumb" title=""><img src="'.$value[1].'" class="gallery-thumb" alt="" /></a></li>';
                        endforeach;
                    ?>
                </ul>
				<?php endif; ?>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<?php  endwhile;}$gallpage = true;include_once('footer.php');exit();