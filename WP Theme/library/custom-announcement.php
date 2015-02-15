<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// let's create the function for the custom type
function custom_post_announcements() { 
	register_post_type( 'announcements',
	array(
			'labels' => array(
				'name' => __( 'Announcements' ),
				'singular_name' => __( 'Announcement' ),
				'add_new' => __( 'Add Announcement'),
				'add_new_item' => __( 'Add Announcement'),
				'edit_item' => __( 'Edit Announcement' ),
				'new_item' => __( 'New Announcement' ),
				'view_item' => __( 'View Announcement' )
	),
			'show_ui' => true,
			'description' => 'Post type for Announcements',
			'menu_position' => 5,
			'menu_icon' => 'http://tsis.th/i/wp-content/plugins/scheduled-announcements-widget//saw-menu-icon.png',
			'public' => true,
			'rewrite'	=> array( 'slug' => 'announcements', 'with_front' => false ),
			'supports' => array('title', 'editor', 'page-attributes'),
			'can_export' => true
	)
	);
	flush_rewrite_rules();
}
	add_action( 'init', 'custom_post_announcements');
	
add_action('add_meta_boxes', 'announcements_add_custom_box');

//save the data in the custom field
add_action('save_post', 'announcements_save_postdata');

function announcements_save_postdata($post_id) {
    if ($_POST['datefrom'] != '') {
        $start = $_POST['datefrom'];
    }

    if ($_POST['dateto'] != '') {
        $end = $_POST['dateto'];
    }
    update_post_meta($post_id, 'ann_start_date', $start);
    update_post_meta($post_id, 'ann_end_date', $end);
}

function announcements_add_custom_box() {

    add_meta_box(
            'dynamic_saw_dates', __('Dates (optional)'), 'announcements_dates_custom_box', 'announcements', 'side');
}

function announcements_dates_custom_box() {
    global $post;
    $start = get_post_meta($post->ID, 'ann_start_date', true);
    $end = get_post_meta($post->ID, 'ann_end_date', true);
    $start = $start ? $start : '';
    $end = $end ? $end : '';
    ?>
    <link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/library/css/jquery-ui.min.css'; ?>" />
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/library/js/jquery-ui.min.js'; ?>"></script>
    <label for="datefrom">From</label>
    <input type="text" id="datefrom" name="datefrom" value="<?php echo $start; ?>"><br>
    <label for="dateto">to&nbsp;&nbsp;&nbsp;</label>&nbsp;
    <input type="text" id="dateto" name="dateto" value="<?php echo $end; ?>">
    <script type="text/javascript">
        var metaDate = {
            init: function () {
                metaDate.addEventDate();
            },
            addEventDate: function () {
                jQuery("#datefrom").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    dateFormat: "yy-mm-dd",
                    numberOfMonths: 3,
                    onClose: function (selectedDate) {
                        jQuery("#dateto").datepicker("option", "minDate", selectedDate);
                    }
                });
                jQuery("#dateto").datepicker({
                    defaultDate: "+1w",
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    numberOfMonths: 3,
                    onClose: function (selectedDate) {
                        jQuery("#datefrom").datepicker("option", "maxDate", selectedDate);
                    }
                });
            }
        };
        jQuery(document).ready(metaDate.init);
    </script>
    <?php
}

	

?>
