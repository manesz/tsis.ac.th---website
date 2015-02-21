<?php include_once('script.php');
$title_contact = get_option('title_contact');
$description_contact = get_option('description_contact');
$address_contact = get_option('address_contact');
$email_contact = get_option('email_contact');
$tel_contact = get_option('tel_contact');
$fb_contact = get_option('fb_contact');
$tw_contact = get_option('tw_contact');
$gp_conteact = get_option('gp_conteact');
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
if($fb_contact == false){
	add_option('fb_contact', 'https://www.facebook.com/', '', 'yes');
	$fb_contact=$fb_contact?$fb_contact:'https://www.facebook.com/';
}
if($tw_contact == false){
	add_option('tw_contact', 'https://twitter.com/', '', 'yes');
	$tw_contact=$tw_contact?$tw_contact:'https://twitter.com/';
}
if($gp_conteact == false){
	add_option('gp_conteact', 'https://plus.google.com/', '', 'yes');
	$gp_conteact=$gp_conteact?$gp_conteact:'https://plus.google.com/';
}
$title_contact = $title_contact?$title_contact:'Get in Touch';

?>
<style type="text/css">
.clear{clear:both}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h2>Contact edit</h2>
      <div class="panel panel-default">
        <div class="panel-body" id="tsis-hilightvdolist">
          <div class="row">
            <div class="col-md-12">
              <form action="<?php echo get_option('siteurl').'/';?>?feedaction=contactupdate&rel=<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
              <div class="form-group"><button type="submit" class="btn btn-primary">Save</button></div>
              <hr />
              	<div class="col-md-7">
              	<div class="form-group">
               	  <label for="title_contact">Title Contact</label>
                     <input name="title_contact" type="text" class="form-control" id="title_contact" placeholder="Title Contact" value="<?php echo $title_contact;?>">
                </div>
                <div class="form-group">
               	  <label for="description_contact">Description Contact</label>
                  <?php
$editor_id = 'description_contact';
wp_editor($description_contacttxt, $editor_id,array('textarea_rows'=>'5','textarea_name'=>'description_contact'));
				  ?>
                </div>
                </div>                
                <div class="clear"></div><hr>
                <div class="col-md-7">
                <div class="form-group">
                <label for="address_contact">Address</label>
                  <textarea name="address_contact" class="form-control" rows="5" id="address_contact"><?php echo $address_contact;?></textarea>
                </div>
                <div class="form-group">
                  <label for="email_contact">Email address</label>
                  <input name="email_contact" type="email" class="form-control" id="email_contact" placeholder="Enter email" value="<?php echo $email_contact;?>">
                </div>
                <div class="form-group">
                	<label for="tel_contact">Tel.</label>
                    <input type="tel" class="form-control" name="tel_contact" id="tel_contact" placeholder="Tel." value="<?php echo $tel_contact;?>" />
                </div>
                </div><div class="clear"></div><hr />
                <div class="form-group">
                	<label for="fb_contact">Facebook</label>
                    <input type="text" class="form-control" name="fb_contact" id="fb_contact" placeholder="Facebook" value="<?php echo $fb_contact;?>" />
                </div>
                <div class="form-group">
                	<label for="tw_contact">Twitter</label>
                    <input type="text" class="form-control" name="tw_contact" id="tw_contact" placeholder="Twitter" value="<?php echo $tw_contact;?>" />
                </div>
                <div class="form-group">
                	<label for="gp_conteact">Google+</label>
                    <input type="text" class="form-control" name="gp_conteact" id="gp_conteact" placeholder="Google+" value="<?php echo $gp_conteact;?>" />
                </div>
                <div class="clear"></div><hr />
                <div class="form-group"><button type="submit" class="btn btn-primary">Save</button></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
