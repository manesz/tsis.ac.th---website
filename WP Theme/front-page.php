<?php    include_once('header.php'); ?>

<div id="camps" class="upcoming" style="">
<?php
function getListHilight($title, $desc, $link, $img = '<img class="img-responsive img-content" src="http://tsis.ac.th/i/wp-content/uploads/2013/02/copy-header1.png" alt=""/>', $post_id)
{
	$arrRotationimage = arrGetPostGallery_rotation($post_id);
    ?>
    <div class="col-md-4 camps">
        <a href="<?php echo $link; ?>">
		
			<?php if(!empty($arrRotationimage)):?>
			<div id="carousel-example-generic-<?php echo $post_id; ?>" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<?php foreach( $arrRotationimage as $key => $value ):?>
				<li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>" class="<?php if($key==0):echo 'active'; endif; ?>"></li>
				<?php endforeach; ?>
			  </ol>

			  <!-- Wrapper for slides -->
			  
			  <div class="carousel-inner" role="listbox" style=''>
				<?php foreach( $arrRotationimage as $key => $value ):?>
				<div class="item <?php if($key==0):echo 'active'; endif; ?> img-frame"> <img src='<?php echo $value[1]; ?>'/> </div>
				<?php endforeach; ?>
			  </div>
			  

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic-<?php echo $post_id; ?>" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic-<?php echo $post_id; ?>" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
			<?php elseif(isset($img)):?>
			<div class="img-frame"><?php echo $img; ?></div>
			<?php endif; ?>
		</a>
		<a href="<?php echo $link; ?>">
			<h3 style="height: 40px; margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: #fff"><?php echo $title; ?></h3>
		</a>
		<a href="<?php echo $link; ?>">
			<div class="Proin">
				<p style="color: #eee; height: 200px;"><?php echo $desc; ?></p>
				<!--<a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="<?php// echo $link; ?>">READ MORE</a>-->
			</div>
		</a>
    </div>
<?php
}
function getListActivity($title, $desc, $link, $img = '<img class="img-responsive img-content" src="http://tsis.ac.th/i/wp-content/uploads/2013/02/copy-header1.png" alt=""/>')
{
    ?>
	
    <div class="col-md-4 camps" style="margin-bottom: 26px;">
        <a href="<?php echo $link; ?>">
            <div class="img-frame"><?php echo $img; ?>
            </div>
        </a>

<h3 style="height: 40px; margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: #fff"><?php echo $title; ?></h3>

        <div class="Proin">
            <p style="color: #fff; height: 200px;"><?php echo $desc; ?></p>
        </div>
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
        

        <h3 style="height: 40px; margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: #fff"><?php echo $title; ?></h3>

        <div class="Proin">
            <p style="color: #eee; height: 200px;"><?php echo $desc; ?></p>
            <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="<?php echo $link; ?>">READ MORE</a>
        </div>
		</a>
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
$topContentThumbnailURL = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );

$postId=21;
$WelcomePost = get_post($postId);
$WelcomeTitle = apply_filters('the_title', $WelcomePost->post_title);
$WelcomeContent = apply_filters('the_content', $WelcomePost->post_content);
				
?>
	<div class='bg-content clearfix' style='margin-top: 30px;'>
		<div class='col-md-6'>
			<div class='img-frame' style='max-height: 700px;'> 
				<h2 class='text-center' style='margin: 0 0 10px 0;'><span><?php echo $topContentTitle; ?></span></h2>
				<img src="<?php echo $topContentThumbnailURL; ?>"/> 
			</div>
		</div>
		<div class='col-md-6'>
			<div class='' style=''> 
				<?php 
					echo "<h2 class='text-center font-shadow ' style='margin: 0 0 10px 0;'>$WelcomeTitle</h2>";
					echo "<div style='text-align: left;'>$WelcomeContent</div>"; 
					
					$args = array (
						'pagename' => 'Accreditation',
					);

					// The Query
					$query = new WP_Query( $args );
					while ( $query->have_posts() ) : $query->the_post();
						$Actitle = apply_filters('the_title', $query->post_title);
						echo "<h2 class='text-center' style='margin: 30px 0 10px 0;'>Accreditation and Member</h2>";
						echo "<div style='text-align: left; line-height: 2.5;'>";
						the_content();
						echo "</div>";
					endwhile;
					wp_reset_postdata();
				?> 
			</div>
		</div>
		<div class='clearfix'></div>
	</div>
	
	
	
	<div id='focus-word' class='clearfix text-center' style=''>
		<h1>TSIS the first Sigaporean Curriculum is Samutprakarn<br/>TSIS the candidate status of CFBT accreditation</h1>
	</div>
	
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-4 welcome" style='padding: 0px;'>

        <div id="achievements" style="margin: 0 10px 10px 10px;"></div>

        <h2 style="">Videos</h2>
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
    <div class="clearfix">
        <!--<h2 class="text-left" style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 38px; font-weight: 300; color: #668591">HighLight</h2>-->
		
        <div id="" class="offerings text-left" style="color: #fff;">
            <h2 class="text-left">Highlight </h2>

            <div class="bootstrap-grids">
                <?php $cat_show = get_option('highlight_show');
                $myindex = json_decode(stripslashes($cat_show));
				if(count($myindex)){
                    global $posts, $post;
                    for ($i = 0; $i < count($myindex); $i++) {
                        $post = get_post($myindex[$i]);
                        $imagethumb = get_the_post_thumbnail($post->ID, 'full');
                        $imagethumb = $imagethumb ?$imagethumb: str_replace('src', ' class="img-responsive img-content" style="width: auto; height: 180px;" src', get_first_inserted_image());
                        getListHilight($post->post_title, $post->post_excerpt ? $post->post_excerpt : iconv_substr(strip_tags($post->post_content), 0, 320, "UTF-8") . "...", get_permalink($post->ID), $imagethumb, $post->ID);
                    }
				}
				$catHighLightID = get_cat_ID( 'highlight' );
				$catHighLightLink = get_category_link( $catHighLightID );
				echo "
					<div class='col-md-12'> <a class='button wow bounceIn text-center col-md-12' data-wow-delay='0.4s' href='$catHighLightLink' target='_blank'> READ MORE ARTICLE </a> </div>";
                ?>


            </div>
            <div class="clearfix"></div>
        </div>
    </div>
	
	<div class="clearfix">
        <!--<h2 class="text-left" style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 38px; font-weight: 300; color: #668591">HighLight</h2>-->
        <div id="" class="offerings text-left" style="color: #fff;">
            <h2 class="text-left">Activity </h2>

            <div class="bootstrap-grids">
                <?php $cat_show = get_option('onfocus_show');
                $myindex = json_decode(stripslashes($cat_show));
				if(count($myindex)){
                    global $posts, $post;
                    for ($i = 0; $i < count($myindex); $i++) {
                        $post = get_post($myindex[$i]);
                        $imagethumb = get_the_post_thumbnail($post->ID, 'full');
                        $imagethumb = $imagethumb ?$imagethumb: str_replace('src', ' class="img-responsive img-content" style="width: auto; height: 180px;" src', get_first_inserted_image());
                        getListActivity($post->post_title, $post->post_excerpt ? $post->post_excerpt : iconv_substr(strip_tags($post->post_content), 0, 320, "UTF-8") . "...", get_permalink($post->ID), $imagethumb);
                    }
				}
				$catHighLightID = get_cat_ID( 'activity' );
				$catHighLightLink = get_category_link( $catHighLightID );
				echo "<div class='col-md-12'><a class='button wow bounceIn text-center col-md-12' data-wow-delay='0.4s' href='$catHighLightLink' target='_blank'>READ MORE ARTICLE</a></div>";
                ?>


            </div>
            <div class="clearfix"></div>
        </div>
    </div>
	

    <div class="col-md-6 clearfix">

        <h2 class="text-left"
            style="font-family: 'Bree Serif', serif; font-weight: 300; color: #E1774F; text-align: center;  padding: 0.5em 0em 0.5em; margin-top: 0;">
            On Focus</h2>
        <?php 
		wp_reset_postdata();
		$args = NULL;
		$args = array (
			'name' => 'on-focus',
			'post_type'=> 'page'
		);
		$onfocus_array = get_posts( $args );
		$arrRotationimage = arrGetPostGallery($onfocus_array[0]->ID);
		$pageOnFocusID = get_post_permalink($onfocus_array[0]->ID);
		getCarouselList($onfocus_array[0]->ID,$arrRotationimage);
		// The Query
		/*$query = new WP_Query( $args );
		while ( $query->have_posts() ) : $query->the_post();
			$pageOnFocusID = get_post_permalink();
			/*$arrRotationimage = arrGetPostGallery_rotation(get_the_ID());
			print_r(arrGetPostGallery_rotation(get_the_ID()));
			getCarouselList(get_the_ID(),$arrRotationimage);
			$bannerUrl = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'medium' );
			
			echo "<div style='min-height: 550px;'><img src='$bannerUrl' class='col-md-12' style='width: 100%; height: auto;'/></div>";
		endwhile;*/
		echo "<a class='button wow bounceIn col-md-12 text-center' data-wow-delay='0.4s' href='$pageOnFocusID'>READ MORE</a>";
		wp_reset_postdata();
        ?>

    </div>

    <div id="" class="col-md-6 text-left" style="">
        <h2 class="text-left" style="font-family: 'Bree Serif', serif; font-weight: 300; color: #E1774F; text-align: center; padding: 0.5em 0em 0.5em; margin-top: 0;">Achievements</h2>

        <div class="bootstrap-grids">
            <?php
			
			$cat_shows = get_option('achievements_show');
			$arrRotationimage = NULL;
			$catID = get_cat_ID( 'achievements' );
			$catLink = get_category_link( $catID );			
			if(!$cat_show){			
				
			}else{
				$cat_show = json_decode(stripslashes($cat_show));
				for($ai=0;$ai<5;$ai++){
					if(!isset($cat_show[$ai])){
						break;
					}
					$mythumb = wp_get_attachment_image_src(get_post_thumbnail_id($cat_show[$ai]),array(420,420));
					if(strpos($_SERVER['HTTP_HOST'],'sis.th')){
						$mythumb[0] = str_replace('http://tsis.th/i/','http://demo.ideacorners.com/tsis/',$mythumb[0]);
					}
					$myarrayR = NULL;
					$myarrayR = array($cat_show[$ai],$mythumb[0]);
				$arrRotationimage[] = $myarrayR;
				}
			}
			getCarouselList('achievements_show',$arrRotationimage);
			echo "<a class='button wow bounceIn col-md-12 text-center' data-wow-delay='0.4s' href='$catLink'>READ MORE</a>";
			wp_reset_postdata();
			?>
        </div>
        <div class="clearfix"></div>
    </div>

    </div>
    </div>
    </div>
	
	<div class='clearfix col-md-12' style='background: #fff;'>
		<div class="fb-like-box" data-href="https://www.facebook.com/ThaiSingaporeInternationalSchool" data-width="100%" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
	</div>
	
    </div>
<?php include_once('footer.php');
exit();