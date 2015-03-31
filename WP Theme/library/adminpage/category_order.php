<?php include_once('script.php');?>
<style type="text/css">
.clear{clear:both}#mylistorder li{float:left;width:150px;margin-right:5px}#mylistorder li img{width:100%}#mylistorder li.sortable-placeholder{outline:2px dashed #333;border:2px solid #FFF;margin:0 5px 5px 0 ; min-height:150px}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h2>Gallery order</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <div class="well"><button type="button" class="btn btn-primary" id="sortsave-bt"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button></div>
        <ul id="mylistorder">
        	<?php global $posts,$post,$wp_query;
			$args = array(
	'post_type' => array('post','page'),
	'post_status' =>'publish',
	'category_name' => 'gallery',
	'posts_per_page' => -1
);
query_posts( $args );
while(have_posts()):the_post();
$order_gall = get_post_meta($post->ID, 'order_gall', true);
if ( ! $order_gall) { 
	add_post_meta($post->ID,'order_gall','0', true );	
}
endwhile;
 wp_reset_query();
			$args = array(
	'post_type' => array('post','page'),
	'post_status' =>'publish',
	'category_name' => 'gallery',
	'posts_per_page' => -1,
	'orderby'=>'meta_value_num',
	'meta_key'=>'order_gall',
	'order'=>'DESC'
);

query_posts( $args );
if(!$wp_query->found_posts){
	$args = array(
	'post_type' => array('post','page'),
	'post_status' =>'publish',
	'category_name' => 'gallery',
	'posts_per_page' => -1
);
query_posts( $args );
} 
$mycount = $wp_query->found_posts;
while(have_posts()):the_post();
$order_gall = get_post_meta($post->ID, 'order_gall', true);
if ( ! update_post_meta ($post->ID,'order_gall',$mycount) ) { 
	add_post_meta($post->ID,'order_gall',$mycount, true );	
}
$imagethumb = get_the_post_thumbnail($post->ID,'thumbnail');
$imagethumb = $imagethumb?str_replace('','',$imagethumb):get_first_inserted_image();
echo '<li rel="'.$post->ID.'">'.$imagethumb.$post->post_title.'</li>';
$mycount--;
endwhile;?></ul>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var mysiteurl = '<?php echo get_option('siteurl').'/';?>';
var pageSort = {
	datasort:[],
init:function(){
	pageSort.addEventSort();
	pageSort.reArraySort();
},
addEventSort:function(){
	jQuery( "#mylistorder" ).sortable({
	placeholder: "sortable-placeholder",
	stop:function( event, ui ) {
		pageSort.reArraySort();
	}
	});	
	jQuery('#sortsave-bt').on('click',function(){
		pageSort.reArraySort();
		jQuery('#sortsave-bt').attr('disabled','disabled').html('<i class="icon-spin6 animate-spin"></i> Sorting...');
		jQuery( "#mylistorder" ).sortable( "disable" );
		pageSort.getContentByUrlData(mysiteurl+'?feedaction=savesortgall',{sortid:pageSort.datasort},function(data){if(data['post_id']==='all'){
			jQuery('#sortsave-bt').removeAttr('disabled').html('<i class="glyphicon glyphicon-floppy-disk"></i> Save');
			jQuery( "#mylistorder" ).sortable( "enable" );
		}
			});
		return false;	
	});
},
reArraySort:function(){
	pageSort.datasort = [];
	jQuery.each(jQuery('#mylistorder li'),function(index,dat){
		pageSort.datasort.push(jQuery(this).attr('rel'));
	});
	return false;
},
getContentByUrlData: function (url,data,callback) {                
	jQuery.ajax({url:url+'&s=',type:'POST',dataType: "json",data:data, success: callback,error: function(){alert('error');jQuery('#sortsave-bt').removeAttr('disabled').html('<i class="glyphicon glyphicon-floppy-disk"></i> Save');jQuery( "#mylistorder" ).sortable( "enable" );}});
},
onready:function(){
	pageSort.init();
}
};
jQuery(document).ready(pageSort.onready);
</script>