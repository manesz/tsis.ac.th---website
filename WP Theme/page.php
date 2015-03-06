<?php include_once('header.php'); if(is_page('contact-us')){ ?>

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
            <div class="col-md-12 camps clearfix" style="margin-bottom: 30px;">
                <div class="Proin clearfix">
                    <?php 
					if(is_page('gallery')){
						include_once('post-formats/loop-gallery.php');
						wp_reset_query();
					}else if(is_page('Parent Information')){
					?>
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							  
						<?php
							
							echo '<h1>Parent Information (1)</h1>';
							$args = array (
								
								// 'cat' => '8',
								// 'category_name' => 'news-letter',
								'post_type' => 'parent_info',
							);

							// The Query
							$query = new WP_Query( $args );
							$i = 0;
							while ( $query->have_posts() ) : $query->the_post();
							
							?>
							<div class="panel">
								<div class="panel-heading" role="tab" id="heading<?php echo get_the_ID(); ?>">
								  
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo get_the_ID(); ?>" aria-expanded="true" aria-controls="collapse<?php echo get_the_ID(); ?>">
									<h4 class="panel-title"> <?php echo get_the_title(); ?> </h4>
								</a>
								  
								</div>
								<div id="collapse<?php echo get_the_ID(); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo get_the_ID(); ?>">
								  <div class="panel-body">
									<?php 
										the_content(); 
										$postID = get_the_ID();
										$arrayGallery[] = arrGetPostGallery($postID);
									?>
									<?php if(!empty($arrayGallery[$i])):?>
									<ul id="gallery" class="clearfix">
										<?php
											foreach($arrayGallery[$i] as $key=>$value):
												echo '<li class="gallery-frame col-md-3" style=""><a class="fancybox-thumbs" href="'.$value[1].'" data-fancybox-group="thumb" title=""><img src="'.$value[1].'" class="gallery-thumb" alt="" /></a></li>';
											endforeach;
										?>
									</ul>
									<?php endif; ?>
								  </div>
								</div>
							  </div>
							<?php
							$i++;
							endwhile;
							wp_reset_postdata();
						?>
							
						</div>					
						
						<hr/>
						
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							  
						<?php
							echo '<h1>Parent Information</h1>';
							$args = array (
								'post_type' => 'parent_info',
								'cat_ID' => 9,
							);

							// The Query
							$query = new WP_Query( $args );
							while ( $query->have_posts() ) : $query->the_post();
							?>
							<div class="panel">
								<div class="panel-heading" role="tab" id="heading<?php echo get_the_ID(); ?>">
								  
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo get_the_ID(); ?>" aria-expanded="true" aria-controls="collapse<?php echo get_the_ID(); ?>">
									<h4 class="panel-title"> <?php echo single_cat_title().' ###### '; echo get_the_title(); ?> </h4>
								</a>
								  
								</div>
								<div id="collapse<?php echo get_the_ID(); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo get_the_ID(); ?>">
								  <div class="panel-body">
									<?php the_content(); ?>
								  </div>
								</div>
							  </div>
							<?php
							endwhile;
							wp_reset_postdata();
						?>
							
						</div>					

					<?php
						
					}else if(is_page('About us')){
						// Set up the objects needed
						$my_wp_query = new WP_Query();
						$all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'order' => 'ASC', 'order_by' => 'menu_order', 'posts_per_page' => '-1'));

						// Get the page as an Object
						$childPage =  get_page_by_title('About us');

						// Filter through all pages and find Portfolio's children
						$childPageList = get_page_children( $childPage->ID, $all_wp_pages );
						
						foreach($childPageList as $key=>$value):
						?>
							<div class="col-md-4" style="height: 300px;">
								<?php// echo $value->ID;?>
								<?php $featureImage = get_the_post_thumbnail( $value->ID, 'full' ); ?>
								<div class="page-child-frame"><a href="<?php echo $value->guid ?>"><?php echo $featureImage; ?></a></div>
								<a class="button wow bounceIn text-center animated col-md-12" data-wow-delay="0.4s" href="<?php echo $value->guid ?>" style="visibility: visible; -webkit-animation: bounceIn 0.4s;"><?php echo $value->post_title; ?></a>
								<div class="clearfix"></div>
							</div>
						<?php
						endforeach;
					}else if(is_page('Level')){
						// Set up the objects needed
						$my_wp_query = new WP_Query();
						$all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'order' => 'ASC', 'order_by' => 'menu_order', 'posts_per_page' => '-1'));

						// Get the page as an Object
						$childPage =  get_page_by_title('Level');

						// Filter through all pages and find Portfolio's children
						$childPageList = get_page_children( $childPage->ID, $all_wp_pages );
						
						foreach($childPageList as $key=>$value):
						?>
							<div class="col-md-4" style="height: 300px;">
								<?php// echo $value->ID;?>
								<?php $featureImage = get_the_post_thumbnail( $value->ID, 'full' ); ?>
								<div class="page-child-frame"><a href="<?php echo $value->guid ?>"><?php echo $featureImage; ?></a></div>
								<a class="button wow bounceIn text-center animated col-md-12" data-wow-delay="0.4s" href="<?php echo $value->guid ?>" style="visibility: visible; -webkit-animation: bounceIn 0.4s;"><?php echo $value->post_title; ?></a>
								<div class="clearfix"></div>
							</div>
						<?php
						endforeach;
					}else{
						the_content();
					}?>
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
<?php  endwhile;}$gallpage = true;include_once('footer.php');exit();