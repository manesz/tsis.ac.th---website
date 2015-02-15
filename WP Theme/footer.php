</div>
<!--/upcoming camps Ends Here-->
<!--Get in Touch Start Here-->
<div id="contact" class="get">
    <div class="container">
        <div class="vida">
            <div class="touch">
                <h5>Get in Touch</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Suspendisse in laoreet purus. Phasellus turpis lacus, feugiat
                    eu tincidunt a, ultrices quis tellus. Ut eu justo a nunc gravida adipiscing.</p>
            </div>
            <div class="col-md-3 contant-grid">
                <h3>Contact Us</h3>
                <div class="contact-top">
                    <div class="col-md-3">
                        <img src="<?php echo $themeLib;?>images/ion1.png" alt=""/>
                    </div>
                    <div class="col-md-9 us-left">
                        <p>1000 Moo 5, Srinakarin Road, Sumrongnua Muang, Samutprakarn 10270</p>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="col-md-3">
                        <img src="<?php echo $themeLib;?>images/ion2.png" alt=""/>
                    </div>
                    <div class="col-md-9 us-left">
                        <p>info@tsis.ac.th</p>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="col-md-3">
                        <img src="<?php echo $themeLib;?>images/ion3.png" alt=""/>
                    </div>
                    <div class="col-md-9 us-left-bottom">
                        <p>+66 2 710 5900</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-9 contact-form">
                <form>
                    <h4>Request a Quote</h4>
                    <input type="text" class="text" value="Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Full Name';}">
                    <input type="text" class="text" value="Your Phone no:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Adress';}">
                    <textarea rows="10" cols="70" onfocus="if(this.value == 'Your Message') this.value='';" onblur="if(this.value == '') this.value='Your Message';" >Your Message....</textarea>
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
            <h4 style="font-size: 12px;">Design by<a href="http://w3layouts.com" target="_blank"> Idea Corners Studio co.,ltd.</a></h4>
        </div>
        <div class="col-md-6 bottom-icons">
            <span class="icon1"> </span>
            <span class="icon2"> </span>
            <span class="icon3"> </span>
        </div>
    </div>
</div>
<!--/Footer end Here-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script type="text/javascript" src="<?php echo 
get_stylesheet_directory_uri().'/library/js/move-top.js';?>"></script>
<script type="text/javascript" src="<?php echo 
get_stylesheet_directory_uri().'/library/js/easing.js';?>"></script>
<script src="<?php echo $themeLib;?>js/wow.min.js"></script>
<?php if(is_front_page()){?>
<link href="<?php echo $themeLib;?>css/fullcalendar.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $themeLib;?>css/fullcalendar.print.css" rel="stylesheet" media="print" />
<script src='<?php echo get_stylesheet_directory_uri();?>/lib/moment.min.js'></script>
<script src='<?php echo get_stylesheet_directory_uri();?>/lib/fullcalendar.min.js'></script>
<script type="text/javascript">var ishome = true,calurl = '<?php echo get_site_url();?>/';</script>
<?php }else{?><script type="text/javascript">var ishome = false;</script><?php }?>
<script type="text/javascript">
	var $ = jQuery.noConflict();
	var homeHook = {
		init:function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
			homeHook.addEventPage();
			if(ishome){
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
					events: [
						{
							title: 'All Day Event',
							start: '2015-02-01'
						},
						{
							title: 'Long Event',
							start: '2015-02-07',
							end: '2015-02-10'
						},
						{
							id: 999,
							title: 'Repeating Event',
							start: '2015-02-09T16:00:00'
						},
						{
							id: 999,
							title: 'Repeating Event',
							start: '2015-02-16T16:00:00'
						},
						{
							title: 'Conference',
							start: '2015-02-11',
							end: '2015-02-13'
						},
						{
							title: 'Meeting',
							start: '2015-02-12T10:30:00',
							end: '2015-02-12T12:30:00'
						},
						{
							title: 'Lunch',
							start: '2015-02-12T12:00:00'
						},
						{
							title: 'Meeting',
							start: '2015-02-12T14:30:00'
						},
						{
							title: 'Happy Hour',
							start: '2015-02-12T17:30:00'
						},
						{
							title: 'Dinner',
							start: '2015-02-12T20:00:00'
						},
						{
							title: 'Birthday Party',
							start: '2015-02-13T07:00:00'
						},
						{
							title: 'Click for Google',
							url: 'http://google.com/',
							start: '2015-02-28'
						}
					]
				});			
			}
		},
		addEventPage:function(){
			new WOW().init();
			$("span.menu").on('click',function(){
				$(".navigation ul").slideToggle("slow" , function(){});
			});
			$(".scroll").on('click',function(){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		}
	};
    $(document).ready(function() {
        homeHook.init();       
    });
</script>
<a href="#to-top" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>
