<?php
$rootpath = get_option('siteurl').'/';
include_once('pagination.class.php');
function tsis_add_pages() {
    add_menu_page(__('Manage TSIS Theme'), __('Manage TSIS Theme'), 'manage_options', 'manage-tsis', 'tsis_toplevel_page','dashicons-admin-settings',6);
	add_submenu_page('manage-tsis', __('Top Content'), __('Top Content'), 'manage_options', 'managetop-content', 'tsis_sublevel_topcontent');
	add_submenu_page('manage-tsis', __('Contact'), __('Contact'), 'manage_options', 'manage-contact', 'tsis_sublevel_contact');
	add_submenu_page('manage-tsis', __('Highlight'), __('Highlight'), 'manage_options', 'manage-highlight', 'tsis_sublevel_highlight');
	add_submenu_page('manage-tsis', __('Onfocus'), __('Onfocus'), 'manage_options', 'manage-onfocus', 'tsis_sublevel_onfocus');
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
	}
}
function gallinpost_add_custom_box(){
    add_meta_box('gallery_forpost', __('Gallery post'), 'gallinpost_image_custom_box', 'post', 'advanced','high');
}
function gallinpost_image_custom_box() {
    global $post;
    $gallinpost = get_post_meta($post->ID, 'gallinpost', true);
	$gallinpostid = get_post_meta($post->ID, 'gallinpostid', true);
    ?>
    <input type="hidden" value="<?php echo $gallinpostid;?>" id="fg_metadata" name="fg_metadata" />
    <input type="hidden" value="<?php echo $gallinpost;?>" id="gallinpost_meta" name="gallinpost_meta" />
    <a class="button" id="findgallinpost"><?php if($gallinpost){?>Edit Gallery<?php }else{?>Add image<?php }?></a>
    <div id="gallinpost">
    	<ul>
        <?php echo getPostGallMeta($post->ID);?>
        </ul>
    </div>
    <div class="clear"></div>
    <style type="text/css">
	#gallinpost ul li{width:150px;float:left;overflow:hidden;margin-left:5px;height:112px;outline:2px solid #FFF;border:2px solid #FFF}#gallinpost ul li img{width:100%}.clear{clear:both}#gallinpost ul li.sortable-placeholder{outline:2px dashed #333;border:2px solid #FFF;margin:0 0 0 5px}
	</style>
    <!--<link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/library/css/jquery-ui.min.css'; ?>" />
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/library/js/jquery-ui.min.js'; ?>"></script>-->
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
					if ( file_frame ) {
						file_frame.open();
						return;
					}
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
							jQuery('#findgallinpost').text('Edit Gallery');
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