<?php include_once('header.php');?>
<div class="container">
        <div class="top-p1">
        <?php if (is_category()) { ?>
<h3><?php printf( __( '%s'), single_cat_title( '', false ) ); ?></h3>

							<?php } elseif (is_tag()) { ?>
            <h3><?php printf( __( '%s'), single_cat_title( '', false ) ); ?></h3>
            <?php } elseif (is_day()) { ?>
<h3><?php _e( 'Daily Archives:', 'bonestheme' ); ?><span><?php the_time('l, F j, Y'); ?></span></h3>
							<?php } elseif (is_month()) { ?>
									<h3>
										<?php _e( 'Monthly Archives:', 'bonestheme' ); ?> <span><?php the_time('F Y'); ?></span>
									</h3>

							<?php } elseif (is_year()) { ?>
									<h3>
										<?php _e( 'Yearly Archives:', 'bonestheme' ); ?> <span><?php the_time('Y'); ?></span>
									</h3>
							<?php } ?>
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
<?php  endwhile;?></div></div>
			<!--<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (is_category()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Posts Categorized:', 'bonestheme' ); ?></span> <?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Posts Tagged:', 'bonestheme' ); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="archive-title h2">

									<span><?php _e( 'Posts By:', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Daily Archives:', 'bonestheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Monthly Archives:', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Yearly Archives:', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="entry-header article-header">

									<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline entry-meta vcard">
										<?php printf( __( 'Posted %1$s by %2$s', 'bonestheme' ),
                  							     /* the time the post was published */
                  							     '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                       								/* the author of the post */
                       								'<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    							); ?>
									</p>

								</header>

								<section class="entry-content cf">

									<?php the_post_thumbnail( 'bones-thumb-300' ); ?>

									<?php the_excerpt(); ?>

								</section>

								<footer class="article-footer">

								</footer>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

					<?php get_sidebar(); ?>

				</div>

			</div>-->
<?php include_once('footer.php');exit();
