<?php
$fb_contact = $fb_contact?$fb_contact:get_option('fb_contact');
$tw_contact = $tw_contact?$tw_contact:get_option('tw_contact');
$gp_conteact = $gp_conteact?$gp_conteact:get_option('gp_conteact');
$title_contact = get_option('title_contact');
$description_contact = get_option('description_contact');
$address_contact = get_option('address_contact');
$email_contact = get_option('email_contact');
$tel_contact = get_option('tel_contact');
$description_contacttxt = $description_contact?$description_contact:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in laoreet purus. Phasellus turpis lacus, feugiat eu tincidunt a, ultrices quis tellus. Ut eu justo a nunc gravida adipiscing.';
if ($title_contact == false) {
    add_option('title_contact', 'Get in Touch', '', 'yes');
}
if ($description_contact == false) {
    add_option('description_contact',$description_contacttxt, '', 'yes');
	unset($description_contact);
}
if ($address_contact == false) {
    add_option('address_contact', '1000 Moo 5, Srinakarin Road, Sumrongnua Muang, Samutprakarn 10270', '', 'yes');
	$address_contact = $address_contact?$address_contact:'1000 Moo 5, Srinakarin Road, Sumrongnua Muang, Samutprakarn 10270';
}
if ($email_contact == false) {
    add_option('email_contact', 'info@tsis.ac.th', '', 'yes');
	$email_contact = $email_contact?$email_contact:'info@tsis.ac.th';
}
if ($tel_contact == false) {
    add_option('tel_contact', '+66 2 710 5900', '', 'yes');
	$tel_contact = $tel_contact?$tel_contact:'+66 2 710 5900';
}
$title_contact = $title_contact?$title_contact:'Get in Touch';
?>
</div>
<!--/upcoming camps Ends Here-->
<!--Get in Touch Start Here-->
<div id="contact" class="get">
    <div class="container">
        <div class="vida">
            <div class="touch">
                <h5><?php echo $title_contact;?></h5>
                <?php echo $description_contacttxt;?>
            </div>
            <div class="col-md-3 contant-grid">
                <h3>Contact Us</h3>
                <div class="contact-top">
                    <div class="col-md-3">
                        <img src="<?php echo $themeLib;?>images/ion1.png" alt=""/>
                    </div>
                    <div class="col-md-9 us-left">
                        <p><?php echo $address_contact;?></p>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="col-md-3">
                        <img src="<?php echo $themeLib;?>images/ion2.png" alt=""/>
                    </div>
                    <div class="col-md-9 us-left">
                        <p><?php echo $email_contact;?></p>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="col-md-3">
                        <img src="<?php echo $themeLib;?>images/ion3.png" alt=""/>
                    </div>
                    <div class="col-md-9 us-left-bottom">
                        <p><?php echo $tel_contact;?></p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-9 contact-form">
                <form action="<?php echo get_option('siteurl').'/';?>?feedaction=mailsend" id="formcontactmail" method="post">
                    <h4>Request a Quote</h4>
                    <input type="text" class="text" value="Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Full Name';}" name="email_quote" id="email_quote">
                    <input type="text" class="text" value="Your Phone no:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Adress';}" name="phone_quote" id="phone_quote">
                    <textarea rows="10" cols="70" onfocus="if(this.value == 'Your Message') this.value='';" onblur="if(this.value == '') this.value='Your Message';" name="message_quote" id="message_quote">Your Message....</textarea>
                    <input type="submit" value="SUBMIT">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--/Get in Touch Ends Here-->
<!--Footer Start Here-->
<div class="footer" style='background: #fff;'>
    <div class="container-fluid">
        <div class="col-md-6">
			<?php 
				if (has_nav_menu('top-menu')) :
                    wp_nav_menu(array('menu' => 'footer'));
				endif;
			?>
        </div>
        <div class="col-md-6 text-center">
			<?php 
				$argsCert = array (
					'cat' => 61,
				);
				
				// The Query
				$queryCert = new WP_Query( $argsCert );
				while ( $queryCert->have_posts() ) : $queryCert->the_post();
					$certBanner = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'medium' );
					$certLink = get_post_permalink();
					echo "<a href='$certLink' target='_blank'><img src='$certBanner' class='col-md-12' style='max-width: 90px; max-height: 40px;'/></a>";
				endwhile;
			?>
        </div>
    </div>
</div>
<!--/Footer end Here-->
<script type="application/javascript" src="<?php echo get_stylesheet_directory_uri().'/library/js/jquery.min.js';?>"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/library/js/move-top.js';?>"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/library/js/easing.js';?>"></script>
<script src="<?php echo $themeLib;?>js/wow.min.js"></script>
<!------------------------------- Fancy jQuery Lightbox ------------------------------->

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/library/js/jquery.fancybox.js?v=2.1.5'?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri().'/library/css/jquery.fancybox.css?v=2.1.5'?>" media="screen" />

<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri().'/library/css/jquery.fancybox-thumbs.css?v=1.0.7'?>" />
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/library/js/jquery.fancybox-thumbs.js?v=1.0.7'?>"></script>

<!------------------------------- END: Fancy jQuery Lightbox ------------------------------->
<?php if(isset($gallpage)){?>
<link href="<?php echo $themeLib;?>js/fancyapps/jquery.fancybox.css" rel="stylesheet" type="text/css" /><link href="<?php echo $themeLib;?>js/fancyapps/helpers/jquery.fancybox-buttons.css" rel="stylesheet" type="text/css" /><link href="<?php echo $themeLib;?>js/fancyapps/helpers/jquery.fancybox-thumbs.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="<?php echo 
$themeLib.'js/fancyapps/jquery.fancybox.pack.js';?>"></script>
<script type="text/javascript" src="<?php echo 
$themeLib.'js/fancyapps/helpers/jquery.fancybox-buttons.js';?>"></script><script type="text/javascript" src="<?php echo 
$themeLib.'js/fancyapps/helpers/jquery.fancybox-thumbs.js';?>"></script>
<script type="text/javascript">
	var gallhook = {
		init:function(){
			$('.ngg-gallery-thumbnail a').attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});
		}
	};
</script>
<?php }?>

<?php 

$myfrontpage = true;

if($myfrontpage){?>
<link href="<?php echo $themeLib;?>css/fullcalendar.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $themeLib;?>css/fullcalendar.print.css" rel="stylesheet" media="print" />
<script src='<?php echo get_stylesheet_directory_uri();?>/lib/moment.min.js'></script>
<script src='<?php echo get_stylesheet_directory_uri();?>/lib/fullcalendar.min.js'></script>
<script type="text/javascript">var ishome = true,calurl = '<?php echo get_site_url();?>/';</script>
<?php // if(is_page('Parent Information')):?>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/library/js/bootstrap.min.js';?>"></script>
<?php // endif; ?>
<?php } ?>
<script type="text/javascript">

var mysiteurl = '<?php echo get_option('siteurl').'/';?>';
	var $ = jQuery.noConflict();
//	var $ = null;
	
	var homeHook = {
		init:function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
			homeHook.addEventPage();
			if(ishome){
				homeHook.announcementSetup();			
			}
		},
		addEventPage:function(){
			new WOW().init();
			contactMail.init();
			if(typeof gallhook !== 'undefined'){
				gallhook.init();
			}
			$("span.menu").on('click',function(){
				$(".navigation ul").slideToggle("slow" , function(){});
			});
			$(".scroll").on('click',function(){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		},
		announcementSetup:function(){
			$.ajax({url:mysiteurl+'?feedaction=getannouncements',dataType:"json",data:{ran:Math.random()},success: function(data){
				$('#achievements').html('<div id="calendar"></div>');
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,basicWeek,basicDay'
					},
					defaultDate:Date.now(),
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					events:data.data
				});
			}});
		}
	};
	var contactMail = {
		init:function(){
			contactMail.addEventMail();
		},
		addEventMail:function(){
			$('#formcontactmail').on('submit',function(){
				$('input,textarea').attr('disabled','disabled');
				$('input[type="submit"]').val('Sending...');
				$.ajax({url:$(this).attr('action'),type:'POST',dataType:"json",data:{ran:Math.random(),email_quote:$('#email_quote').val(),phone_quote:$('#phone_quote').val(),message_quote:$('#message_quote').val()},success:function(data){
					$('input,textarea').val('').removeAttr('disabled');
					$('input[type="submit"]').val('SUBMIT');					
					if(data.error==='none'){
						alert('Sent Complete');
					}
					}});
				return false;	
			});
		}
	};

    $(document).ready(function() {
		$('.carousel').carousel();
		<?php if(!isset($_SESSION['cover_display'])): $_SESSION['cover_display'] = 0; endif;?>
		<?php if($_SESSION['cover_display'] == 0 ): ?> $('#myModal').modal('show'); <?php endif;?>
        <?php if(!is_page('Parent Information')):?> homeHook.init(); <?php endif; ?>
		<?php if(is_page('Parent Information')):?> $('.collapse').collapse(); <?php endif; ?>

        $('.fancybox-thumbs').fancybox({
            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : false,
            arrows    : false,
            nextClick : true,

            helpers : {
                thumbs : {
                    width  : 50,
                    height : 50
                }
            }
        });
    });
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1499945126956049&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style='width: 100%; margin: auto;'>
    <div class="modal-content body-bg">
	  <div class="modal-header clearfix" style='background: #fff'>
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="col-md-12 text-center" style='margin-bottom: 20px; background: #fff;'>
			<img src='http://demo.ideacorners.com/tsis/wp-content/themes/tsisacth/library/images/logo.png' style='margin: auto; max-width: 600px; height: auto;'/>
		</div>
      </div>
	  
      <div class="modal-body container-fluid">
		
		<div class='container-fluid'>
			<div class="row">
				<div class="col-md-12 text-center">
				
					<?php
						$_SESSION['cover_display'] = 1;
						$id=21;
						$post = get_post($id);
						$title = apply_filters('the_title', $post->post_title);
						$content = apply_filters('the_content', $post->post_content);
						$arrModalRotationimage = arrGetPostGallery_rotation($id);
					?>
					
					<?php if(!empty($arrModalRotationimage)):?>
					<div id="carousel-example-generic-<?php echo $post_id; ?>" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
						<?php foreach( $arrModalRotationimage as $key => $value ):?>
						<li data-target="#carousel-example-generic" data-slide-to="<?php echo $key?>" class="<?php if($key==0):echo 'active';endif;?>"></li>
						<?php endforeach; ?>
					  </ol>

					  <!-- Wrapper for slides -->
					  
					  <div class="carousel-inner" role="listbox">
						<?php foreach( $arrModalRotationimage as $key => $value ):?>
						<div class="item <?php if($key==0):echo 'active';endif;?>" style='width: 100%; max-height: 400px; overflow: hidden;'> <img src='<?php echo $value[1]; ?>' style='width: 100%;'/> </div>
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
				</div>
			</div>
		</div>
		
		<div class='container-fluid'>
			<div class="row">	
			<div class='col-md-12' style='margin-top: 30px;'>
			<?php
					
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
						<a class="button wow bounceIn text-center animated col-md-12" data-wow-delay="0.4s" href="<?php echo $value->guid ?>" style=" visibility: visible; -webkit-animation: bounceIn 0.4s;"><?php echo $value->post_title; ?></a>
						<div class="clearfix"></div>
					</div>
				<?php
				endforeach;
			
			?>
			</div>
		</div>
		</div>
		
      </div>
      <div class="modal-footer" style=''>
        <button type="button" class="button-cover wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" data-dismiss="modal">Visit our home page</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>