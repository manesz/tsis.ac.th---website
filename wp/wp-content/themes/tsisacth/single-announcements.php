<?php include_once('header.php');
while ( have_posts() ) : the_post();?>
<div class="container">
        <div class="top-p1 col-md-12" style="text-align: left;">
            <h3 style="text-align: left;"><?php the_title(); ?></h3>
            <p class="s_head" style="text-align: left; margin: 0; margin-bottom: 20px;"><?php $date = date('dS F Y',strtotime($post->post_date)); echo $date;?></p>
        </div>
        <div class="bootstrap-grids">
            <div class="col-md-12 camps">
                <div class="Proin">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<?php  endwhile;include_once('footer.php');exit();
