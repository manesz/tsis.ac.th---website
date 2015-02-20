<?php $mysite = get_option('siteurl').'/';
$orderby = isset($_GET['orderby'])?$_GET['orderby']:'gid';
$order = isset($_GET['order'])?$_GET['order']:'DESC';
$paged = intval($wp_query->query_vars['paged'])?intval($wp_query->query_vars['paged']):1;
$limit = isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
$begin = 0;
if($paged>1){
	$begin = ($paged-1)*$limit;
}
$total = $wpdb->get_var("SELECT count(gid) FROM wp_ngg_gallery where
		 pageid>0");
$sql = "
         SELECT * FROM wp_ngg_gallery
		 where
		 pageid>0
		 ORDER BY {$orderby} {$order}
		 limit {$begin},{$limit}
		";
$galldatas = $wpdb->get_results($sql);
?>
<div class="container">
<div class="row" id="container-gall">
<?php
foreach($galldatas as $galldata){
	$gallimage = $wpdb->get_row($wpdb->prepare("SELECT filename from wp_ngg_pictures where galleryid=%d order  by sortorder DESC",$galldata->gid));
	$myimages = $gallimage->filename;
	$mylink = $mysite.'?page_id='.$galldata->pageid;
	?>
    <div class="col-md-3 camps">
                <a href="<?php echo $mylink;?>"><img src="<?php echo $mysite,$galldata->path,'/',$myimages;?>"  class="img-responsive" /></a>
                <ul class="product_title titlelast">
                    <li class="s_head"><h3><?php echo str_replace(array('_','-'),' ',$galldata->name);?></h3></li>
                </ul>
                <div class="clearfix"> </div>
            </div>
    <?php
}?>
</div></div><div class="clearfix"> </div><div class="ngg-navigation"><?php
$p = new pagination;
$p->items($total);
$p->limit($limit);
$p->nextLabel('');//removing next text
$p->prevLabel('');//removing previous text
$p->nextIcon('&#9658;');//Changing the next icon
$p->prevIcon('&#9668;');//Changing the previous icon
$p->target($_SERVER['REQUEST_URI']);
$p->currentPage($paged);
$p->parameterName("paged");
echo $p->getOutput();?></div>
<style type="text/css">
.col-md-3.camps{margin-bottom:10px;overflow:hidden}.col-md-3.camps ul.product_title li.s_head h3{font-size:18px}
</style>
<script type="text/javascript" src="<?php echo 
get_stylesheet_directory_uri().'/library/js/masonry.pkgd.min.js';?>"></script>
<script type="text/javascript">
var container = document.querySelector('#container-gall');
var msnry = new Masonry( container, {
  itemSelector: '.camps'
});
</script>