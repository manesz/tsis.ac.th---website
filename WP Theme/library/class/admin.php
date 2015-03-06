<?php
$rootpath = get_option('siteurl').'/';
include_once('pagination.class.php');
function tsis_add_pages() {
    add_menu_page(__('Manage TSIS Theme'), __('Manage TSIS Theme'), 'manage_options', 'manage-tsis', 'tsis_toplevel_page','dashicons-admin-settings',6);
	add_submenu_page('manage-tsis', __('Top Content'), __('Top Content'), 'manage_options', 'managetop-content', 'tsis_sublevel_topcontent');
	add_submenu_page('manage-tsis', __('Contact'), __('Contact'), 'manage_options', 'manage-contact', 'tsis_sublevel_contact');
	add_submenu_page('manage-tsis', __('Highlight'), __('Highlight'), 'manage_options', 'manage-highlight', 'tsis_sublevel_highlight');
	add_submenu_page('manage-tsis', __('Activity'), __('Activity'), 'manage_options', 'manage-onfocus', 'tsis_sublevel_onfocus');
	add_submenu_page('manage-tsis', __('Gallery order'), __('Gallery order'), 'manage_options', 'manage-category-order', 'tsis_sublevel_categoryorder');
	add_submenu_page('manage-tsis', __('Achievements'), __('Achievements'), 'manage_options', 'manage-achievements', 'tsis_sublevel_achievements');
    add_submenu_page('manage-tsis', __('Video Manage'), __('Video Manage'), 'manage_options', 'video-mange', 'tsis_sublevel_vdo');
}
function tsis_sublevel_categoryorder(){
	include_once(get_template_directory().'/library/adminpage/category_order.php');
}
function getconfigscript(){
?>
<script type="text/javascript">var rootpath = '<?php echo $rootpath;?>';</script>
<?php	
}
function tsis_sublevel_highlight(){
	include_once(get_template_directory().'/library/adminpage/theme_highlight.php');
}
function tsis_sublevel_onfocus(){
	include_once(get_template_directory().'/library/adminpage/theme_onfocus.php');
}
function tsis_sublevel_achievements(){
	include_once(get_template_directory().'/library/adminpage/theme_achievements.php');
}
function tsis_toplevel_page() {
    include_once(get_template_directory().'/library/adminpage/theme_manage.php');
}
function tsis_sublevel_topcontent() {
    include_once(get_template_directory().'/library/adminpage/topcontent.php');
}
function tsis_sublevel_contact() {
    include_once(get_template_directory().'/library/adminpage/contact.php');
}
function tsis_sublevel_vdo() {
    include_once(get_template_directory().'/library/adminpage/vdo.php');
}
function tsis_sublevel_page2() {
    echo "<h2>" . __( 'Test Sublevel2', 'menu-test' ) . "</h2>";
}
$feedAction = isset($_GET['feedaction'])?$_GET['feedaction']:false;
add_action('add_meta_boxes', 'gallinpost_add_custom_box');
add_action('save_post', 'gallinpost_save_postdata');
function gallinpost_save_postdata($post_id) {
    if ($_POST['fg_metadata'] != '') {
        $fg_metadata = $_POST['fg_metadata'];
    }

    if ($_POST['gallinpost_meta'] != '') {
        $gallinpost_meta = $_POST['gallinpost_meta'];
    }
	if($fg_metadata&&$gallinpost_meta){
		update_post_meta($post_id, 'gallinpost', $gallinpost_meta);
    update_post_meta($post_id, 'gallinpostid', $fg_metadata);
	}else{
		update_post_meta($post_id, 'gallinpost','');
    update_post_meta($post_id, 'gallinpostid','');
	}
}
add_action('save_post', 'gallinpost_rotation_save_postdata');
function gallinpost_rotation_save_postdata($post_id) {
    if ($_POST['fg_metadata_rotation'] != '') {
        $fg_metadata = $_POST['fg_metadata_rotation'];
    }

    if ($_POST['gallinpost_meta_rotation'] != '') {
        $gallinpost_meta = $_POST['gallinpost_meta_rotation'];
    }
	if($fg_metadata&&$gallinpost_meta){
		update_post_meta($post_id, 'gallinpost_rotation', $gallinpost_meta);
    update_post_meta($post_id, 'gallinpostid_rotation', $fg_metadata);
	}else{
		update_post_meta($post_id, 'gallinpost_rotation','');
    update_post_meta($post_id, 'gallinpostid_rotation','');
	}
}
function gallinpost_add_custom_box(){
	$screens = array( 'post', 'page', 'parent_info' );

	foreach ( $screens as $screen ) {
add_meta_box('gallery_forpost', __('<span class="dashicons dashicons-images-alt2"></span> Gallery post'), 'gallinpost_image_custom_box',$screen, 'advanced','high');
add_meta_box('upload_image_rotation', __('<span class="dashicons dashicons-format-gallery"></span> Upload image rotation'), 'gallinpost_imagerotation_custom_box',$screen, 'advanced','high');
	}
    
}
function gallinpost_imagerotation_custom_box(){
	global $post;
    $gallinpost_rotation = get_post_meta($post->ID, 'gallinpost_rotation', true);
	$gallinpostid_rotation = get_post_meta($post->ID, 'gallinpostid_rotation', true);
	?>
<input type="hidden" value="<?php echo $gallinpostid_rotation;?>" id="fg_metadata_rotation" name="fg_metadata_rotation" />
<input type="hidden" value="<?php echo $gallinpost_rotation;?>" id="gallinpost_meta_rotation" name="gallinpost_meta_rotation" />
<a class="button" id="findgallinpost_rotation"><?php if($gallinpost){?><span class="dashicons dashicons-edit"></span> Edit Image rotation<?php }else{?><span class="dashicons dashicons-plus"></span> Add Image rotation<?php }?></a><a class="button" id="clearallgall_rotation" style="margin-left:5px"><span class="dashicons dashicons-trash"></span> Clear all</a>
<div id="gallinpost_rotation">
    	<ul>
        <?php echo getPostGallMeta_rotation($post->ID);?>
        </ul>
    </div>
    <div class="clear"></div>
    <style type="text/css">
	#gallinpost_rotation ul li{width:150px;float:left;overflow:hidden;margin-left:5px;height:112px;outline:2px solid #FFF;border:2px solid #FFF}#gallinpost_rotation ul li img{width:100%}#gallinpost_rotation ul li.sortable-placeholder{outline:2px dashed #333;border:2px solid #FFF;margin:0 0 0 5px}
	</style>
        <script type="text/javascript">
	var file_frame_rotation;
	var mysrcarr_rotation=[];
    var metaGallinpost_rotation = {
            init: function () {
                metaGallinpost_rotation.addEventGallinpost();
            },
			getEventGalldrag:function(){
				if(jQuery( "#gallinpost_rotation ul" ).sortable( "instance" )){
			jQuery( "#gallinpost_rotation ul" ).sortable("destroy");
				}
			jQuery('a#clearallgall_rotation').on('click',function(){
				if(confirm('ต้องการลบรูปทั้งหมดหรือไม่')){
					jQuery('#fg_metadata_rotation').val('');
					jQuery("#gallinpost_meta_rotation").val('');
					jQuery("#gallinpost_rotation ul").html('');
				}
				return false;	
			});
			jQuery( "#gallinpost_rotation ul" ).sortable({
			placeholder: "sortable-placeholder",
			stop:function( event, ui ) {
				var myids = [];
				var myscrs = [];
				jQuery("#gallinpost_rotation ul li").each(function(index, element) {
					var myid = jQuery(this).find('img').attr('id');
					myid = myid.replace('gall-','');
					var mysrc = jQuery(this).find('img').attr('src');
                    myids.push(myid);
					myscrs.push(mysrc);
                });
				if(myids){
					jQuery('#fg_metadata_rotation').val(myids.join(","));
				}
				if(myscrs){
					jQuery("#gallinpost_meta_rotation").val(myscrs.join(","));
				}
			}
			});	
			},
            addEventGallinpost: function () {
				metaGallinpost_rotation.getEventGalldrag();
				jQuery('#findgallinpost_rotation').on('click', function(event){				
					event.preventDefault();
					/*if (file_frame_rotation) {
						file_frame_rotation.open();
						return;
					}*/
					file_frame_rotation = wp.media.frame = wp.media({
						frame: "post",
						state: "gallery",
						title:'Select 5 images',
						library : { type : 'image'},
						button: {text: "Edit Image rotation Order"},
						multiple: true
					});
					file_frame_rotation.on('open', function() {
						var selection = file_frame_rotation.state().get('selection');
						var ids = jQuery('#fg_metadata_rotation').val();
						if (ids) {
							idsArray = ids.split(',');
							idsArray.forEach(function(id) {
								attachment = wp.media.attachment(id);
								attachment.fetch();
								selection.add( attachment ? [ attachment ] : [] );
							});
						}
					});
					file_frame_rotation.on('update', function() {
						var imageIDArray = [];
						var imageHTML = '';
						var metadataString = '',metadataStringSrc='';
						images = file_frame_rotation.state().get('library');
						var countimg = 0;
						images.each(function(attachment) {
							if(countimg<5){
							imageIDArray.push(attachment.attributes.id);
							mysrcarr_rotation.push(attachment.attributes.url);
							imageHTML += '<li><img id="gall-'+attachment.attributes.id+'" class="mygallsrc" src="'+attachment.attributes.url+'"></li>';
							}
							countimg++;
						});
						metadataString = imageIDArray.join(",");
						metadataStringSrc = mysrcarr_rotation.join(",");
						if (metadataString) {
							jQuery("#fg_metadata_rotation").val(metadataString);
							jQuery("#gallinpost_meta_rotation").val(metadataStringSrc);
							jQuery("#gallinpost_rotation ul").html(imageHTML);
							jQuery('#findgallinpost_rotation').html('<span class="dashicons dashicons-edit"></span> Edit Images rotation');
							metaGallinpost_rotation.getEventGalldrag();
						}
					});
					file_frame_rotation.open();
				
				});
            }
        };
        jQuery(document).ready(metaGallinpost_rotation.init);
    </script>
    <?php
}
function gallinpost_image_custom_box() {
    global $post;
    $gallinpost = get_post_meta($post->ID, 'gallinpost', true);
	$gallinpostid = get_post_meta($post->ID, 'gallinpostid', true);
    ?>
    <input type="hidden" value="<?php echo $gallinpostid;?>" id="fg_metadata" name="fg_metadata" />
    <input type="hidden" value="<?php echo $gallinpost;?>" id="gallinpost_meta" name="gallinpost_meta" />
    <a class="button" id="findgallinpost"><?php if($gallinpost){?><span class="dashicons dashicons-edit"></span> Edit Gallery<?php }else{?><span class="dashicons dashicons-plus"></span> Add image<?php }?></a><a class="button" id="clearallgall" style="margin-left:5px"><span class="dashicons dashicons-trash"></span> Clear all</a>
    <div id="gallinpost">
    	<ul>
        <?php echo getPostGallMeta($post->ID);?>
        </ul>
    </div>
    <div class="clear"></div>
    <style type="text/css">
	#gallinpost ul li{width:150px;float:left;overflow:hidden;margin-left:5px;height:112px;outline:2px solid #FFF;border:2px solid #FFF}#gallinpost ul li img{width:100%}.clear{clear:both}#gallinpost ul li.sortable-placeholder{outline:2px dashed #333;border:2px solid #FFF;margin:0 0 0 5px}
	</style>
    <script type="text/javascript">
	var file_frame;
	var srcimg;
	var mysrcarr=[];
    var metaGallinpost = {
            init: function () {
                metaGallinpost.addEventGallinpost();
            },
			getEventGalldrag:function(){
				if(jQuery( "#gallinpost ul" ).sortable( "instance" )){
			jQuery( "#gallinpost ul" ).sortable("destroy");
				}
			jQuery('a#clearallgall').on('click',function(){
				if(confirm('ต้องการลบรูปทั้งหมดหรือไม่')){
					jQuery('#fg_metadata').val('');
					jQuery("#gallinpost_meta").val('');
					jQuery("#gallinpost ul").html('');
				}
				return false;	
			});
			jQuery( "#gallinpost ul" ).sortable({
			placeholder: "sortable-placeholder",
			stop:function( event, ui ) {
				var myids = [];
				var myscrs = [];
				jQuery("#gallinpost ul li").each(function(index, element) {
					var myid = jQuery(this).find('img').attr('id');
					myid = myid.replace('gall-','');
					var mysrc = jQuery(this).find('img').attr('src');
                    myids.push(myid);
					myscrs.push(mysrc);
                });
				if(myids){
					jQuery('#fg_metadata').val(myids.join(","));
				}
				if(myscrs){
					jQuery("#gallinpost_meta").val(myscrs.join(","));
				}
			}
			});	
			},
            addEventGallinpost: function () {
				metaGallinpost.getEventGalldrag();
				jQuery('#findgallinpost').on('click', function(event){				
					event.preventDefault();
					/*if ( file_frame ) {
						file_frame.open();
						return;
					}*/
					file_frame = wp.media.frame = wp.media({
						frame: "post",
						state: "gallery",
						library : { type : 'image'},
						button: {text: "Edit Image Order"},
						multiple: true
					});
				
					file_frame.on('open', function() {
						var selection = file_frame.state().get('selection');
						var ids = jQuery('#fg_metadata').val();
						if (ids) {
							idsArray = ids.split(',');
							idsArray.forEach(function(id) {
								attachment = wp.media.attachment(id);
								attachment.fetch();
								selection.add( attachment ? [ attachment ] : [] );
							});
						}
					});
					file_frame.on('update', function() {
						var imageIDArray = [];
						var imageHTML = '';
						var metadataString = '',metadataStringSrc='';
						images = file_frame.state().get('library');
						images.each(function(attachment) {
							imageIDArray.push(attachment.attributes.id);
							mysrcarr.push(attachment.attributes.url);
							imageHTML += '<li><img id="gall-'+attachment.attributes.id+'" class="mygallsrc" src="'+attachment.attributes.url+'"></li>';
						});
						metadataString = imageIDArray.join(",");
						metadataStringSrc = mysrcarr.join(",");
						if (metadataString) {
							jQuery("#fg_metadata").val(metadataString);
							jQuery("#gallinpost_meta").val(metadataStringSrc);
							jQuery("#gallinpost ul").html(imageHTML);
							jQuery('#findgallinpost').html('<span class="dashicons dashicons-edit"></span> Edit Gallery');
							metaGallinpost.getEventGalldrag();
						}
					});
					file_frame.open();
				
				});
            }
        };
        jQuery(document).ready(metaGallinpost.init);
    </script>
    <?php
}
if($feedAction){	
	include_once(get_template_directory().'/library/adminpage/'.$feedAction.'.php');
	exit();
}