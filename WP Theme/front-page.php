<?php	include_once('header.php');
$top_content_op = get_option('top_content');
global $post,$posts;
$post = get_post($top_content_op);
$imagethumb = get_the_post_thumbnail( $post->ID );
$imagethumb = $imagethumb?'<img alt="'.$post->post_title.'" width="190" src="' .$imagethumb. '" />':get_first_inserted_image();?>
<div class="clearfix">
    <div class="col-lg-6"><?php echo $imagethumb;?></div>
    <div class="col-lg-6">
        <h2 style="margin-bottom: 40px;"><?php echo $post->post_title;?></h2>
        <div id="postselect-contentdesc"><?php echo $post->post_content;?></div>
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
foreach($vdofeeds as $vdofeed){
	?>
    <div class="col-md-12 grid wow bounceIn" data-wow-delay="0.4s">
    
        <iframe width="100%" height="250" src="https://www.youtube.com/embed/<?php echo str_replace('https://www.youtube.com/watch?v=','',$vdofeed->vdourl);?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="clearfix"></div>
    <?php }?>
</div>
<div class="col-md-8">
    <div class="row">
        <!--Welcome to Kids Corner Start Here-->
        <div id="about" class="clearfix welcome">

            <h2>Welcome to School</h2>

            <p>
                Thai-Singapore International School (TSIS) implements a comprehensive curriculum issued by the globally
                respected
                Singapore Ministry of Education to provide our students with the best education.<br/><br/>

                We nurture and develop students in the Moral, Intellectual, Physical, Social and Aesthetic domains over
                their
                formative years. The educational objectives of these five domains (五育: 德, 智, 体, 群, 美) are achieved through
                the best practices, from the east and the west, with a keen emphasis on Asian values and obvious links to
                global values.</p>

            <h3>If you are a parent looking for a place where your child will grow the best,look no further, <span
                    style="color:#70C6E7">talk to us now.</span></h3>
        </div>
        <div class="clearfix">
            <!--<h2 class="text-left" style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 38px; font-weight: 300; color: #668591">HighLight</h2>-->
            <div id="" class="offerings text-left" style="color: #fff;">
                <h3 class="text-left">Highlight </h3>
                <div class="bootstrap-grids">

                    <div class="col-md-4 camps">
                        <a href="#">
                            <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-01.jpg" alt=""/>
                            </div>
                        </a>
                        <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                        <div class="Proin">
                            <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                                Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                                Administration all believe these JSC members can contribute much to the development of future
                                student involvement at TSIS. Congratulations to our First JSC!</p>
                            <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                        </div>
                    </div>
                    <div class="col-md-4 camps">
                        <a href="#">
                            <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-01.jpg" alt=""/>
                            </div>
                        </a>
                        <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                        <div class="Proin">
                            <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                                Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                                Administration all believe these JSC members can contribute much to the development of future
                                student involvement at TSIS. Congratulations to our First JSC!</p>
                            <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                        </div>
                    </div>
                    <div class="col-md-4 camps">
                        <a href="#">
                            <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-01.jpg" alt=""/>
                            </div>
                        </a>
                        <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                        <div class="Proin">
                            <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                                Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                                Administration all believe these JSC members can contribute much to the development of future
                                student involvement at TSIS. Congratulations to our First JSC!</p>
                            <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                        </div>
                    </div>
                    <div class="col-md-4 camps">
                        <a href="#">
                            <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-01.jpg" alt=""/>
                            </div>
                        </a>
                        <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                        <div class="Proin">
                            <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                                Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                                Administration all believe these JSC members can contribute much to the development of future
                                student involvement at TSIS. Congratulations to our First JSC!</p>
                            <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                        </div>
                    </div>
                    <div class="col-md-4 camps">
                        <a href="#">
                            <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-01.jpg" alt=""/>
                            </div>
                        </a>
                        <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                        <div class="Proin">
                            <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                                Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                                Administration all believe these JSC members can contribute much to the development of future
                                student involvement at TSIS. Congratulations to our First JSC!</p>
                            <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                        </div>
                    </div>
                    <div class="col-md-4 camps">
                        <a href="#">
                            <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-01.jpg" alt=""/>
                            </div>
                        </a>
                        <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                        <div class="Proin">
                            <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                                Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                                Administration all believe these JSC members can contribute much to the development of future
                                student involvement at TSIS. Congratulations to our First JSC!</p>
                            <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                        </div>
                    </div>


                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="clearfix">

            <h3 class="text-left" style="font-family: 'Bree Serif', serif; font-weight: 300; color: #668591; text-align: center; font-size: 52px; padding: 0.5em 0em 0.5em; margin-top: 0;">On Focus</h3>

            <div class="col-md-4 camps">
                <a href="#">
                    <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-03.jpg" alt=""/>
                    </div>
                </a>
                <ul class="product_title titlelast">
                    <li class="s_head"><h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300;">Student Immersion Program in Singapore</h3></li>
                    <!--<li> <a href="#" class="fa-btn1 btn-2 btn-1e1">$35</a> </li>-->
                </ul>
                <div class="clearfix"></div>
                <div class="Proin">
                    <p>Our P2 and P3 students went to Singapore for an Immersion Program in Jingshan Primary School. The program provided our students with great learning experience. They attended classes taught by wonderful teachers and were able to interact with students in Jingshan in and out of the classroom. The immersion program has established a strong education partnership between two schools from two different countries - Thailand and Singapore.</p>
                    <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                </div>
            </div>
            <div class="col-md-4 camps">
                <a href="#">
                    <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-03.jpg" alt=""/>
                    </div>
                </a>
                <ul class="product_title titlelast">
                    <li class="s_head"><h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300;">Student Immersion Program in Singapore</h3></li>
                    <!--<li> <a href="#" class="fa-btn1 btn-2 btn-1e1">$35</a> </li>-->
                </ul>
                <div class="clearfix"></div>
                <div class="Proin">
                    <p>Our P2 and P3 students went to Singapore for an Immersion Program in Jingshan Primary School. The program provided our students with great learning experience. They attended classes taught by wonderful teachers and were able to interact with students in Jingshan in and out of the classroom. The immersion program has established a strong education partnership between two schools from two different countries - Thailand and Singapore.</p>
                    <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                </div>
            </div>
            <div class="col-md-4 camps">
                <a href="#">
                    <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-03.jpg" alt=""/>
                    </div>
                </a>
                <ul class="product_title titlelast">
                    <li class="s_head"><h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300;">Student Immersion Program in Singapore</h3></li>
                    <!--<li> <a href="#" class="fa-btn1 btn-2 btn-1e1">$35</a> </li>-->
                </ul>
                <div class="clearfix"></div>
                <div class="Proin">
                    <p>Our P2 and P3 students went to Singapore for an Immersion Program in Jingshan Primary School. The program provided our students with great learning experience. They attended classes taught by wonderful teachers and were able to interact with students in Jingshan in and out of the classroom. The immersion program has established a strong education partnership between two schools from two different countries - Thailand and Singapore.</p>
                    <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                </div>
            </div>
            <div class="col-md-4 camps">
                <a href="#">
                    <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-03.jpg" alt=""/>
                    </div>
                </a>
                <ul class="product_title titlelast">
                    <li class="s_head"><h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300;">Student Immersion Program in Singapore</h3></li>
                    <!--<li> <a href="#" class="fa-btn1 btn-2 btn-1e1">$35</a> </li>-->
                </ul>
                <div class="clearfix"></div>
                <div class="Proin">
                    <p>Our P2 and P3 students went to Singapore for an Immersion Program in Jingshan Primary School. The program provided our students with great learning experience. They attended classes taught by wonderful teachers and were able to interact with students in Jingshan in and out of the classroom. The immersion program has established a strong education partnership between two schools from two different countries - Thailand and Singapore.</p>
                    <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                </div>
            </div>
            <div class="col-md-4 camps">
                <a href="#">
                    <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-03.jpg" alt=""/>
                    </div>
                </a>
                <ul class="product_title titlelast">
                    <li class="s_head"><h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300;">Student Immersion Program in Singapore</h3></li>
                    <!--<li> <a href="#" class="fa-btn1 btn-2 btn-1e1">$35</a> </li>-->
                </ul>
                <div class="clearfix"></div>
                <div class="Proin">
                    <p>Our P2 and P3 students went to Singapore for an Immersion Program in Jingshan Primary School. The program provided our students with great learning experience. They attended classes taught by wonderful teachers and were able to interact with students in Jingshan in and out of the classroom. The immersion program has established a strong education partnership between two schools from two different countries - Thailand and Singapore.</p>
                    <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                </div>
            </div>
            <div class="col-md-4 camps">
                <a href="#">
                    <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-03.jpg" alt=""/>
                    </div>
                </a>
                <ul class="product_title titlelast">
                    <li class="s_head"><h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300;">Student Immersion Program in Singapore</h3></li>
                    <!--<li> <a href="#" class="fa-btn1 btn-2 btn-1e1">$35</a> </li>-->
                </ul>
                <div class="clearfix"></div>
                <div class="Proin">
                    <p>Our P2 and P3 students went to Singapore for an Immersion Program in Jingshan Primary School. The program provided our students with great learning experience. They attended classes taught by wonderful teachers and were able to interact with students in Jingshan in and out of the classroom. The immersion program has established a strong education partnership between two schools from two different countries - Thailand and Singapore.</p>
                    <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                </div>
            </div>
        </div>

        <div id="" class="offerings text-left" style="color: #fff;">
            <h3 class="text-left">Achievements</h3>
            <div class="bootstrap-grids">

                <div class="col-md-4 camps">
                    <a href="#">
                        <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-05.jpg" alt=""/>
                        </div>
                    </a>
                    <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                    <div class="Proin">
                        <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                            Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                            Administration all believe these JSC members can contribute much to the development of future
                            student involvement at TSIS. Congratulations to our First JSC!</p>
                        <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                    </div>
                </div>
                <div class="col-md-4 camps">
                    <a href="#">
                        <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-05.jpg" alt=""/>
                        </div>
                    </a>
                    <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                    <div class="Proin">
                        <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                            Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                            Administration all believe these JSC members can contribute much to the development of future
                            student involvement at TSIS. Congratulations to our First JSC!</p>
                        <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                    </div>
                </div>
                <div class="col-md-4 camps">
                    <a href="#">
                        <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-05.jpg" alt=""/>
                        </div>
                    </a>
                    <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                    <div class="Proin">
                        <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                            Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                            Administration all believe these JSC members can contribute much to the development of future
                            student involvement at TSIS. Congratulations to our First JSC!</p>
                        <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                    </div>
                </div>
                <div class="col-md-4 camps">
                    <a href="#">
                        <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-05.jpg" alt=""/>
                        </div>
                    </a>
                    <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                    <div class="Proin">
                        <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                            Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                            Administration all believe these JSC members can contribute much to the development of future
                            student involvement at TSIS. Congratulations to our First JSC!</p>
                        <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                    </div>
                </div>
                <div class="col-md-4 camps">
                    <a href="#">
                        <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-05.jpg" alt=""/>
                        </div>
                    </a>
                    <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                    <div class="Proin">
                        <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                            Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                            Administration all believe these JSC members can contribute much to the development of future
                            student involvement at TSIS. Congratulations to our First JSC!</p>
                        <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                    </div>
                </div>
                <div class="col-md-4 camps">
                    <a href="#">
                        <div class="img-frame"><img class="img-responsive img-content" src="<?php echo $themeLib;?>images/demo-img-05.jpg" alt=""/>
                        </div>
                    </a>
                    <h3 style="margin-bottom: 20px; font-family: 'Bree Serif', serif; font-size: 18px; font-weight: 300; color: ##fff">TSIS First Junior Student Council</h3>
                    <div class="Proin">
                        <p style="color: #eee;">Our First Junior Student Council (JSC) at TSIS was recently elected by a vote from the entire
                            Primary Level. They are willing, eager, and able to learn. The Teacher Advisors, colleagues, and
                            Administration all believe these JSC members can contribute much to the development of future
                            student involvement at TSIS. Congratulations to our First JSC!</p>
                        <a class="button wow bounceIn col-md-12 text-center" data-wow-delay="0.4s" href="#">ENROLL TODAY</a>
                    </div>
                </div>

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
                    <div class="col-md-6 posts wow bounceIn" data-wow-delay="0.4s">
                        <a href="#"><img class="img-responsive" src="<?php echo $themeLib;?>images/br1.jpg" alt=""/></a>
                        <span>February 14, 2014</span>

                        <h2>Picnic to Rock Garden & Sukhna</h2>

                        <p>Vivamus laoreet vitae mi sit amet mattis.
                            Praesent sagittis libero dui, et adipiscing lorem pharetra non.
                            Vestibulum aliquam adipiscing magna ut adipiscing. Mauris sit amet ante nisl.</p>
                    </div>
                    <div class="col-md-6 magna wow bounceIn" data-wow-delay="0.4s">
                        <div class="col-md-6 amet wow bounceIn" data-wow-delay="0.4s">
                            <span>February 4, 2014</span>
                            <a href="#"><img class="img-responsive" src="<?php echo $themeLib;?>images/br2.jpg" alt=""/></a>
                        </div>
                        <div class="col-md-6 dui wow bounceIn" data-wow-delay="0.4s">
                            <h2>New swings added</h2>

                            <p>Vivamus laoreet vitae mi sit amet mattis.
                                Praesent sagittis libero dui, et adipiscing lorem pharetra non.
                                Vestibulum aliquam adipiscing. Vivamus laoreet vitae mi sit amet mattis.
                                Sent sagittis libero dui et adipiscing.</p>
                        </div>
                        <div class="col-md-6 amet wow bounceIn" data-wow-delay="0.4s">
                            <span>February 4, 2014</span>
                            <a href="#"><img class="img-responsive" src="<?php echo $themeLib;?>images/br3.jpg" alt=""/></a>
                        </div>
                        <div class="col-md-6 dui wow bounceIn" data-wow-delay="0.4s">
                            <h2>New swings added</h2>

                            <p>Vivamus laoreet vitae mi sit amet mattis.
                                Praesent sagittis libero dui, et adipiscing lorem pharetra non.
                                Vestibulum aliquam adipiscing. Vivamus laoreet vitae mi sit amet mattis.
                                Sent sagittis libero dui et adipiscing.</p>
                        </div>
                    </div>
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
<?php include_once('footer.php');exit();