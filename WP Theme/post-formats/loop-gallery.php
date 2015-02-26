<?php
$mysite = get_option('siteurl').'/';
$args = array(
	'post_type' => array('post','page'),
	'post_status' =>'publish',
	'category_name' => 'gallery',
	'posts_per_page' => -1,
	'orderby'=>'meta_value_num',
	'meta_key'=>'order_gall',
	'order'=>'DESC'
);
global $posts,$post,$wp_query;
query_posts( $args );
if(!$wp_query->found_posts){
	$args = array(
	'post_type' => array('post','page'),
	'post_status' =>'publish',
	'category_name' => 'gallery',
	'posts_per_page' => -1
);
query_posts( $args );
} 
?>
<div class="container">
<div class="row" id="container-gall">
<?php
while(have_posts()):the_post();
$imagethumb = get_the_post_thumbnail($post->ID,'medium');
	$gallimage = $imagethumb?str_replace('','',$imagethumb):get_first_inserted_image();
	$myimages = $post->post_title;
	$mylink = get_permalink($post->ID);
	?>
    <div class="col-md-3 camps">
                <a href="<?php echo $mylink;?>"><?php echo $gallimage?></a>
                <ul class="product_title titlelast">
                    <li class="s_head"><h3><?php echo str_replace(array('_','-'),' ',$post->post_title);?></h3></li>
                </ul>
                <div class="clearfix"> </div>
            </div>
    <?php
endwhile;?>
</div></div><div class="clearfix"> </div><div class="ngg-navigation"></div>
<style type="text/css">
.col-md-3.camps{margin-bottom:10px;overflow:hidden}.col-md-3.camps ul.product_title li.s_head h3{font-size:18px}
</style>
<script type="text/javascript" src="<?php echo 
get_stylesheet_directory_uri().'/library/js/masonry.pkgd.min.js';?>"></script>
<script type="text/javascript">
var container = document.querySelector('#container-gall');
var msnry = new Masonry( container, {
  itemSelector: '.camps'
});
</script>