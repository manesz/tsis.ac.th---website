<?php    include_once('header.php'); ?>
<div id="camps" class="upcoming" style="margin-top: 25px;">
<?php
function getListHilight($title, $desc, $link, $img = '<img class="img-responsive img-content" src="http://tsis.ac.th/i/wp-content/uploads/2013/02/copy-header1.png" alt=""/>')
{
    ?>
    <div class="col-md-4 camps">
        <a href="<?php echo $link; ?>">
            <div class="img-frame"><?php echo $img; ?>
            </div>
        </a>

        <h3 style="height: 80px; margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: #fff"><?php echo $title; ?></h3>

        <div class="Proin">
            <p style="color: #eee; height: 200px;"><?php echo $desc; ?></p>
            <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="<?php echo $link; ?>">READ MORE</a>
        </div>
    </div>
<?php
}
function getListOnFocus($title, $desc, $link, $img = '<img class="img-responsive img-content" src="http://tsis.ac.th/i/wp-content/uploads/2013/02/copy-header1.png" alt=""/>')
{
    ?>
    <div class="col-md-4 camps" style="margin-bottom: 26px; height: 350px;">
        <a href="<?php echo $link; ?>">
            <div class=""><?php echo $img; ?>
            </div>
        </a>

<!--        <h3 style="height: 80px; margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: #666">--><?php //echo $title; ?><!--</h3>-->
<!---->
<!--        <div class="Proin">-->
<!--            <p style="color: #999; height: 200px;">--><?php //echo $desc; ?><!--</p>-->
<!--            <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="--><?php //echo $link; ?><!--">READ MORE</a>-->
<!--        </div>-->
    </div>
<?php
}
function getListAchievements($title, $desc, $link, $img = '<img class="img-responsive img-content" src="http://tsis.ac.th/i/wp-content/uploads/2013/02/copy-header1.png" alt=""/>')
{
    ?>
    <div class="col-md-4 camps" style="">
        <a href="<?php echo $link; ?>">
            <div class="img-frame"><?php echo $img; ?>
            </div>
        </a>

        <h3 style="height: 80px; margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: #fff"><?php echo $title; ?></h3>

        <div class="Proin">
            <p style="color: #eee; height: 200px;"><?php echo $desc; ?></p>
            <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="<?php echo $link; ?>">READ MORE</a>
        </div>
    </div>
<?php
}

/**
 * Get top content section
 */
$top_content_op = get_option('top_content');
global $post, $posts;
$post = get_post($top_content_op);
$imagethumb = get_the_post_thumbnail($post->ID, 'full');
$imagethumb = $imagethumb ? str_replace('src', ' class="img-responsive" src', $imagethumb) : str_replace('src', ' class="img-responsive img-content" src', get_first_inserted_image());


$post = get_post($post->ID);
$topContentTitle = apply_filters('the_title', $post->post_title);
$topContentDescription = apply_filters('the_content', $post->post_content);
?>
    <div class="clearfix">
        <div id="topTitle" class="col-lg-6"><?php echo $imagethumb; ?></div>
        <div id="topContent" class="col-lg-6">
            <h2 style="margin-bottom: 40px;"><?php echo $topContentTitle; ?></h2>

            <div id="postselect-contentdesc"><?php echo $topContentDescription; ?></div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-4 welcome">

        <h2 style="margin-bottom: 30px;">Announcements</h2>

        <div id="achievements" style="padding: 10px;"></div>

        <h2 style="margin-bottom: 30px;">Videos</h2>
        <?php
        $orderby = 'order_id';
        $sql = "
         SELECT vdourl FROM wp_videos
		 where order_id>0
		 ORDER BY order_id DESC
		";
        $vdofeeds = $wpdb->get_results($sql);
        foreach ($vdofeeds as $vdofeed) {
            ?>
            <div class="col-md-12 grid wow bounceIn" data-wow-delay="0.4s">

                <iframe width="100%" height="250"
                        src="https://www.youtube.com/embed/<?php echo str_replace('https://www.youtube.com/watch?v=', '', $vdofeed->vdourl); ?>"
                        frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="clearfix"></div>
        <?php } ?>
    </div>
    <div class="col-md-8">
    <div class="row">
    <!--Welcome to Kids Corner Start Here-->
    <div id="about" class="clearfix welcome">
        <?php
            $id=21;
            $post = get_post($id);
            $title = apply_filters('the_title', $post->post_title);
            $content = apply_filters('the_content', $post->post_content);

        ?>

        <h2><?php echo $title; ?></h2>

        <p><?php echo $content;?></p>

    </div>
    <div class="clearfix">
        <!--<h2 class="text-left" style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 38px; font-weight: 300; color: #668591">HighLight</h2>-->
        <div id="" class="offerings text-left" style="color: #fff;">
            <h3 class="text-left">Highlight </h3>

            <div class="bootstrap-grids">
                <?php $cat_show = get_option('highlight_show');
                $myindex = json_decode(stripslashes($cat_show));
                if (count($myindex) < 6) {
                    $arghis = array(
                        'post_type' => array('post', 'page'),
                        'post_status' => 'publish',
                        'category_name' => 'highlight'
                    );
                    global $posts, $post;
                    query_posts($arghis);
                    while (have_posts()):the_post();
                        $imagethumb = get_the_post_thumbnail($post->ID, 'full');
                        $imagethumb = $imagethumb ? str_replace('src', ' class="img-responsive img-content" src', $imagethumb) : str_replace('src', ' class="img-responsive img-content" style="width: auto; height: 180px;" src', get_first_inserted_image());
                        getListHilight($post->post_title, $post->post_excerpt ? $post->post_excerpt : iconv_substr(strip_tags($post->post_content), 0, 320, "UTF-8") . "...", get_permalink($post->ID), $imagethumb);
                    endwhile;
                } else if (count($myindex) > 5) {
                    global $posts, $post;
                    for ($i = 0; $i < count($myindex); $i++) {
                        $post = get_post($myindex[$i]);
                        $imagethumb = get_the_post_thumbnail($post->ID, 'full');
                        $imagethumb = $imagethumb ? '<img alt="' . $post->post_title . '" class="img-responsive img-content" src="' . $imagethumb . '" />' : str_replace('src', ' class="img-responsive img-content" style="width: auto; height: 180px;" src', get_first_inserted_image());
                        getListHilight($post->post_title, $post->post_excerpt ? $post->post_excerpt : iconv_substr(strip_tags($post->post_content), 0, 320, "UTF-8") . "...", get_permalink($post->ID), $imagethumb);
                    }
                }
                ?>


            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="clearfix">

        <h3 class="text-left"
            style="font-family: 'Bree Serif', serif; font-weight: 300; color: #668591; text-align: center; font-size: 52px; padding: 0.5em 0em 0.5em; margin-top: 0;">
            On Focus</h3>
        <?php $cat_show = get_option('onfocus_show');
        $myindex = json_decode(stripslashes($cat_show));
        if (count($myindex) < 6) {
            $arghis = array(
                'post_type' => array('post', 'page'),
                'post_status' => 'publish',
                'category_name' => 'onfocus'
            );
            global $posts, $post;
            query_posts($arghis);
            while (have_posts()):the_post();
                $imagethumb = get_the_post_thumbnail($post->ID, 'full');
                $imagethumb = $imagethumb ? str_replace('src', ' class="img-responsive img-content" src', $imagethumb) : str_replace('src', ' class="img-responsive img-content" style="width: auto; height: 350px;" src', get_first_inserted_image());
                getListOnFocus($post->post_title, $post->post_excerpt ? $post->post_excerpt : iconv_substr(strip_tags($post->post_content), 0, 320, "UTF-8") . "...", get_permalink($post->ID), $imagethumb);
            endwhile;
        } else if (count($myindex) > 5) {
            global $posts, $post;
            for ($i = 0; $i < count($myindex); $i++) {
                $post = get_post($myindex[$i]);
                $imagethumb = get_the_post_thumbnail($post->ID, 'full');
                $imagethumb = $imagethumb ? str_replace('src', ' class="img-responsive img-content" src', $imagethumb) : str_replace('src', ' class="img-responsive img-content" style="width: auto; height: 350px;" src', get_first_inserted_image());
                getListOnFocus($post->post_title, $post->post_excerpt ? $post->post_excerpt : iconv_substr(strip_tags($post->post_content), 0, 320, "UTF-8") . "...", get_permalink($post->ID), $imagethumb);
            }
        }
        ?>

    </div>

    <div id="" class="offerings text-left" style="color: #fff;">
        <h3 class="text-left">Achievements</h3>

        <div class="bootstrap-grids">
            <?php $cat_show = get_option('achievements_show');
            $myindex = json_decode(stripslashes($cat_show));
            if (count($myindex) < 6) {
                $arghis = array(
                    'post_type' => array('post', 'page'),
                    'post_status' => 'publish',
                    'category_name' => 'achievements'
                );
                global $posts, $post;
                query_posts($arghis);
                while (have_posts()):the_post();
                    $imagethumb = get_the_post_thumbnail($post->ID, 'full');
                    $imagethumb = $imagethumb ? str_replace('src', ' class="img-responsive img-content" src', $imagethumb) : str_replace('src', ' class="img-responsive img-content" style="width: auto; height: 180px;" src', get_first_inserted_image());
                    getListAchievements($post->post_title, $post->post_excerpt ? $post->post_excerpt : iconv_substr(strip_tags($post->post_content), 0, 320, "UTF-8") . "...", get_permalink($post->ID), $imagethumb);
                endwhile;
            } else if (count($myindex) > 5) {
                global $posts, $post;
                for ($i = 0; $i < count($myindex); $i++) {
                    $post = get_post($myindex[$i]);
                    $imagethumb = get_the_post_thumbnail($post->ID, 'full');
                    $imagethumb = $imagethumb ? str_replace('src', ' class="img-responsive img-content" src', $imagethumb) : str_replace('src', ' class="img-responsive img-content" style="width: auto; height: 180px;" src', get_first_inserted_image());
                    getListAchievements($post->post_title, $post->post_excerpt ? $post->post_excerpt : iconv_substr(strip_tags($post->post_content), 0, 320, "UTF-8") . "...", get_permalink($post->ID), $imagethumb);
                }
            }
            ?>

        </div>
        <div class="clearfix"></div>
    </div>


    <!--Recent Blog Posts Start Here-->
    <div class="justo">
        <div id="blogs" class="recent">
            <div class="lacus">
                <h2>Recent Blog Posts</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Suspendisse in laoreet purus. Phasellus turpis lacus, feugiat
                    eu tincidunt a, ultrices quis tellus. Ut eu justo a nunc gravida adipiscing.</p>
            </div>
            <?php
            $arghis = array(
                'post_type' => 'parent_info',
                'post_status' => 'publish'
            );
            global $posts, $post;
            query_posts($arghis);
            $countparent = 1;
            while (have_posts()):the_post();
                $imagethumb = get_the_post_thumbnail($post->ID);
                $imagethumb = $imagethumb ? str_replace('src', ' class="img-responsive" src', $imagethumb) : str_replace('src', ' class="img-responsive" src', get_first_inserted_image());
                $mylink = get_permalink($post->ID);
                $postdate = date('F d, Y', strtotime($post->post_date));
                if ($countparent == 1) {

                    ?>
                    <div class="col-md-6 posts wow bounceIn" data-wow-delay="0.4s">
                        <a href="<?php echo $mylink; ?>"><?php echo $imagethumb; ?></a>
                        <span><?php echo $postdate; ?></span>

                        <h2><?php echo $post->post_title; ?></h2>

                        <p><?php echo $post->post_excerpt ? $post->post_excerpt : iconv_substr(strip_tags($post->post_content), 0, 320, "UTF-8") . "..."; ?></p>
                    </div>
                    <?php
                    $countparent++;

                } else {
                    if ($countparent == 2) {
                        ?>
                        <div class="col-md-6 magna wow bounceIn" data-wow-delay="0.4s">

                        <!--                        <div class="col-md-6 amet wow bounceIn" data-wow-delay="0.4s">
                            <span>February 4, 2014</span>
                            <a href="#"><img class="img-responsive" src="<?php echo $themeLib; ?>images/br3.jpg" alt=""/></a>
                        </div>
                        <div class="col-md-6 dui wow bounceIn" data-wow-delay="0.4s">
                            <h2>New swings added</h2>

                            <p>Vivamus laoreet vitae mi sit amet mattis.
                                Praesent sagittis libero dui, et adipiscing lorem pharetra non.
                                Vestibulum aliquam adipiscing. Vivamus laoreet vitae mi sit amet mattis.
                                Sent sagittis libero dui et adipiscing.</p>
                        </div>-->

                    <?php
                    }
                    ?>
                    <div class="col-md-6 amet wow bounceIn" data-wow-delay="0.4s">
                        <span>February 4, 2014</span>
                        <a href="<?php echo $mylink; ?>"><?php echo $imagethumb; ?></a>
                    </div>
                    <div class="col-md-6 dui wow bounceIn" data-wow-delay="0.4s">
                        <h2><?php echo $post->post_title; ?></h2>

                        <p><?php echo $post->post_excerpt ? $post->post_excerpt : iconv_substr(strip_tags($post->post_content), 0, 320, "UTF-8") . "..."; ?></p>
                    </div>
                    <?php
                    $countparent++;
                }
                if ($countparent == 4) {
                    ?> </div><?php
                }
            endwhile;
            ?>

        </div>
    </div>
    <div class="clearfix"></div>
    <!--/Recent Blog Posts Ends Here-->
    <!--Get in Touch Start Here-->

    <!--/Get in Touch Ends Here-->
    </div>
    </div>
    </div>
    </div>
<?php include_once('footer.php');
exit();