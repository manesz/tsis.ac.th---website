<?php include_once('header.php');
while ( have_posts() ) : the_post();
    $postID = get_the_ID();
    $array = arrGetPostGallery($postID);
//    var_dump($array);
?>
    <style>
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
    </style>
<div class="container">
        <div class="top-p1 col-md-12" style="text-align: left;">
            <h3 style="text-align: left;"><?php the_title(); ?></h3>
            <p class="s_head" style="text-align: left; margin: 0; margin-bottom: 20px;"><?php $date = date('dS F Y',strtotime($post->post_date)); echo $date;?></p>
        </div>
        <div class="bootstrap-grids">
            <div class="col-md-12" style="margin-bottom: 20px;">
                <div class="">
					<p><?php the_content(); ?></p>
                </div>

				<?php if(!empty($array)):?>
                <ul id="gallery" class="clearfix">
                    <?php
                        foreach($array as $key=>$value):
                            echo '<li class="gallery-frame col-md-3" style=""><a class="fancybox-thumbs" href="'.$value[1].'" data-fancybox-group="thumb" title=""><img src="'.$value[1].'" class="gallery-thumb" alt="" /></a></li>';
                        endforeach;
                    ?>
                </ul>
				<?php endif; ?>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<?php  endwhile;include_once('footer.php');exit();