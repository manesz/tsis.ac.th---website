<?php
add_action( 'after_switch_theme', 'tsis_flush_rewrite_rules' );

// Flush your rewrite rules
function tsis_flush_rewrite_rules() {
	flush_rewrite_rules();
}
function announcements_post_type() {
    register_post_type( 'events',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' ),
				'add_new' => __( 'Add New Event' ),
				'add_new_item' => __( 'Add New Event' ),
				'edit_item' => __( 'Edit Event' ),
				'new_item' => __( 'Add New Event' ),
				'view_item' => __( 'View Event' ),
				'search_items' => __( 'Search Event' ),
				'not_found' => __( 'No events found' ),
				'not_found_in_trash' => __( 'No events found in trash' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail'),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "events"), // Permalinks format
			'menu_position' => 5
		)
	);
}

// adding the function to the Wordpress init
add_action('init', 'announcements_post_type');
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
            'dynamic_saw_dates', __('Dates (optional)'), 'announcements_dates_custom_box', 'events', 'side');
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
