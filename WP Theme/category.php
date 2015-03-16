<?php include_once('header.php');?>
<div class="container">
        <div class="top-p1">
            <h3>CATEGORY : <?php printf( __( '%s'), single_cat_title( '', false ) ); ?></h3>
            <?php if ( category_description() ) :?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
        </div>
<div class="bootstrap-grids">
<?php 
// START: check have child category:
// $argsChildCate = array ( 'posts_per_page'=>-1, 'child_of'  => $_GET['cat'], 'title_li' => __( '' ), );
// $queryChildCate = new WP_Query( $argsChildCate );
// echo "<ul class='cat-item-list' style=''>".$catList = wp_list_categories( $argsChildCate )."</ul>";

$currentCat = get_query_var('cat');
$categories= get_categories('child_of='.$currentCat.'&amp;depth=1');
$catcount = count($categories);

$this_category = get_category($currentCat);
	
	// echo '<pre>';var_dump($this_category); echo '</pre>';//DEBUG
	
	if ($this_category->category_parent == 41):
		$i = 0;
		$cat = get_query_var('cat');
		foreach(get_categories('ide_empty=0&depth=2&parent=45') as $category):
			// echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
			echo '<div class="col-md-4 text-center" style="min-height: 200px; margin-bottom: 20px;">';
			echo '<div class="blockContent"><a href="' . get_category_link( $category->term_id ) . '" target="_blank"/><h2>' . $category->name . '</h2></a>'; 
			echo '<hr/>';
			foreach(get_categories('ide_empty=0&depth=3&parent='.$category->term_id) as $category):
				echo '<a href="' . get_category_link( $category->term_id ) . '" target="_blank"/><p>' . $category->name . '</p></a><br/>'; 
			endforeach;
			
			echo'</div></div> ';
			$i++;
		endforeach;
	
	endif;
	
// END: ----------------------------;

$levelList= get_categories('child_of='.$currentCat.'&amp;depth=1');

/* is $catcount > 0 : it mean haven't child category */
if($i > 0): 

	
else:
	
// START: get post description value
$args = array ('posts_per_page'=>-1, 'cat' => $currentCat);
$query = new WP_Query( $args );
while ( $query->have_posts() ) : $query->the_post();

$contentDescription = apply_filters('the_content', $query->post_content);
$mylink = get_permalink();
$arrRotationimage = arrGetPostGallery_rotation($query->ID);
$imagethumb = wp_get_attachment_url( get_post_thumbnail_id($query->ID), 'full' );
$imagethumb = $imagethumb?'<img class="image-content" alt="'.$query->post_title.'" src="' .$imagethumb. '" style=""/>':get_first_inserted_image();
$arrCategory = get_the_category( $query->ID )
// END: ----------------------------;
?>

	<div class='col-md-4 camps' style='margin-bottom: 20px;'>
		<div class='col-md-12 blockContent'>
		
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
				<?php elseif(isset($imagethumb)):?>
				<a href="<?php echo $mylink;?>" target='_blank' alt="<?php echo $query->post_title?>"> <div class="img-frame"><?php echo $imagethumb; ?></div> </a>
				<?php endif; ?>
				<a href="<?php echo $mylink;?>" target='_blank' alt="<?php echo $query->post_title?>">
				<h3 style="text-align: center; height: 80px; padding: 30px 0 10px 0px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: #333">
					<?php echo $post->post_title; ?><br/>
				</h3>
				<!--<p class='col-md-12 text-center' style='font-size: 16px; font-weight: normal; background: #7BC0E7; color: #fff; width: 100%; padding: 5px; '>CATEGORY : <?php// echo get_cat_name( $currentCat) ; ?></p>-->
				</a>
				
				
				<?php// echo '<pre>';var_dump($query); echo '</pre>'; ?>
				
				<?php 
					$my_excerpt = get_the_excerpt();
					if ( $my_excerpt != '' ) :
						echo "<div class='Proin'><p style='min-height: 200px;'>";
						echo iconv_substr(strip_tags($post->post_content),0,320, "UTF-8");
						echo "</p></div>";
					endif;
				?>
				
				<a class="button wow swing col-md-12 text-center" data-wow-delay= "0.4s" href="<?php echo $mylink;?>" target='_blank'>READ MORE</a>
			
			<div class="clearfix"> </div>
		
		</div>
	</div> 
	
<?php  endwhile; endif; /* catcount */ ?></div></div><?php include_once('footer.php');exit();