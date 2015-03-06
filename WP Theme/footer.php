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
<div class="footer">
    <div class="container">
        <div class="col-md-6 Reserved">
            <h4 style="font-size: 12px;">Design by <a href="http://www.idaecorners.com" target="_blank">Idea Corners Studio co.,ltd.</a></h4>
        </div>
        <div class="col-md-6 bottom-icons">
            <?php if($fb_contact){?><a href="<?php echo $fb_contact;?>"><span class="icon1"> </span></a><?php } if($tw_contact){?><a href="<?php echo $tw_contact;?>"><span class="icon2"> </span></a><?php } if($gp_conteact){?><a href="<?php echo $gp_conteact;?>"><span class="icon3"> </span></a><?php }?>
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
<?php// if(is_page('Parent Information')):?>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/library/js/bootstrap.min.js';?>"/>
<?php// endif; ?>
<?php } ?>


<script>

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

</script>
<script type="text/javascript">
    var $ = jQuery.noConflict();
    $(document).ready(function() {
		$('.carousel').carousel()
	
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
<a href="#to-top" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>
