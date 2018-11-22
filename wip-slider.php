<?php
/* ----------------------------------------------------------------------
	Plugin Name:	WIP - Slider
	Plugin URI:		http://www.webideaperu.net
	Description:	Slider para WIP
	Version:		1.2.WIP-20160219
	Author:			Gustavo Pajuelo Vargas
	Author URI:		http://www.webideaperu.net
 * ---------------------------------------------------------------------- */


/*-----------------------------------------------------------------------------------*/
/*      Global variables
/*-----------------------------------------------------------------------------------*/
if (!defined('WIP_PREFIX'))	define('WIP_PREFIX', 'wip');
if (!defined('WIP_VERSION')) define('WIP_VERSION', '1.0'); 
define('WIP_SLIDER_URL', plugin_dir_url( __FILE__ ));
define('WIP_SLIDER_PATH', plugin_dir_path( __FILE__ ));

define('WIP_SLIDER_POST_TYPE', WIP_PREFIX . '-slide');
define('WIP_SLIDER_SINGULAR', 'Slide');
define('WIP_SLIDER_PLURAL', 'Slider');
define('WIP_SLIDER_TAXONOMY', 'slide-category');

/*-------------------------------------	----------------------------------------------*/
/*		System
/*-----------------------------------------------------------------------------------*/

function wip_slider_scripts() {

	wp_enqueue_style( 'wip-slider-css', WIP_SLIDER_URL . "css/wip-slider.css", false, WIP_VERSION, 'all' );
  //wp_enqueue_style( 'animate-css', WIP_SLIDER_URL . "css/animate.css", false, WIP_VERSION, 'all' );
    if ( is_front_page() ) {
        wp_enqueue_script( 'wip-slider-js', WIP_SLIDER_URL . 'js/wip-slider.js', array('jquery'), WIP_VERSION, true);
    }
    
}
add_action('wp_enqueue_scripts', 'wip_slider_scripts');

function wip_slider_admin_scripts($hook) {
	global $typenow;
	if( is_admin() && ( $hook == 'term.php' || $hook == 'edit-tags.php' ) && $typenow == WIP_SLIDER_POST_TYPE && $_GET[ 'taxonomy' ] == WIP_SLIDER_TAXONOMY ) {
		wp_enqueue_media();
		wp_enqueue_script( 'wip-slider-admin-js', WIP_SLIDER_URL . 'js/wip-slider-admin.js', array('jquery'), WIP_VERSION, true);
	}
}
add_action( 'admin_enqueue_scripts', 'wip_slider_admin_scripts');

// Register Custom Post Type
function wip_slider_post_type() {

	$labels = array(
		'name'                  => _x( WIP_SLIDER_PLURAL, 'Post Type General Name', 'WIP_domain' ),
		'singular_name'         => _x( WIP_SLIDER_SINGULAR, 'Post Type Singular Name', 'WIP_domain' ),
		'menu_name'             => __( WIP_SLIDER_PLURAL, 'WIP_domain' ),
		'all_items'             => __( 'All ' . WIP_SLIDER_PLURAL, 'WIP_domain' ),
		'add_new_item'          => __( 'Add New ' . WIP_SLIDER_SINGULAR, 'WIP_domain' ),
		'add_new'               => __( 'Add New', 'WIP_domain' ),
		'new_item'              => __( 'New ' . WIP_SLIDER_SINGULAR, 'WIP_domain' ),
		'edit_item'             => __( 'Edit ' . WIP_SLIDER_SINGULAR, 'WIP_domain' ),
		'update_item'           => __( 'Update ' . WIP_SLIDER_SINGULAR, 'WIP_domain' ),
		'view_item'             => __( 'View ' . WIP_SLIDER_SINGULAR, 'WIP_domain' ),
		'view_items'            => __( 'View ' . WIP_SLIDER_PLURAL, 'WIP_domain' ),
		'search_items'          => __( 'Search ' . WIP_SLIDER_PLURAL, 'WIP_domain' ),
		'not_found' 						=> __( sprintf('No %s found', strtolower( WIP_SLIDER_PLURAL ) ), 'WIP_domain' ),
    'not_found_in_trash' 		=> __( sprintf('No %s found in Trash', strtolower( WIP_SLIDER_PLURAL ) ), 'WIP_domain' ),
		'featured_image'        => __( 'Featured Image', 'WIP_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'WIP_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'WIP_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'WIP_domain' ),
		'insert_into_item'      => __( 'Insert into ' . WIP_SLIDER_SINGULAR, 'WIP_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this ' . WIP_SLIDER_SINGULAR, 'WIP_domain' ),
		'items_list'            => __( WIP_SLIDER_PLURAL . ' list', 'WIP_domain' ),
		'items_list_navigation' => __( WIP_SLIDER_PLURAL . ' list navigation', 'WIP_domain' ),
		'filter_items_list'     => __( sprintf('Filter %s list', strtolower( WIP_SLIDER_PLURAL ) ), 'WIP_domain' ),
	);
	$args = array(
		'label'                 => __( WIP_SLIDER_SINGULAR, 'WIP_domain' ),
		//'description'           => __( 'Post Type Description', 'WIP_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		//'taxonomies'			=> array( 'category' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_icon'             => 'dashicons-format-gallery',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( WIP_SLIDER_POST_TYPE, $args );

	// Register custom new taxonomy
	register_taxonomy( WIP_SLIDER_TAXONOMY, WIP_SLIDER_POST_TYPE, array( 
		'label' => __( 'Categories', 'WIP_DOMAIN' ), 
		'hierarchical' => false, 
		'public' => true,
		//'rewrite' => array( 'slug' => 'slide-category' ), 
	) );	
}
add_action( 'init', 'wip_slider_post_type', 0 );

function prefix_register_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'id'         => 'personal',
        'title'      => 'Personal Information',
        'post_types' => WIP_SLIDER_POST_TYPE,
        'context'    => 'normal',
        'priority'   => 'high',

        'fields' => array(
            array(
                'name'  => 'Link URL',
                'placeholder' => 'http://',
                'id'    => WIP_PREFIX . '_slider_url',
                'type'  => 'text',
            ),
        )
    );

    // Add more meta boxes if you want
    // $meta_boxes[] = ...

    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'prefix_register_meta_boxes' );

function html_featured_img() {
	global $new_content_width;
	if( empty( $new_content_width ) ) $new_content_width = 254;
	?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[featured_img]"><?php _e( 'Featured image', 'pippin' ); ?></label></th>
		<td>
			<div id="listingimagediv">
				<img src="" style="width:<?php echo esc_attr( $new_content_width ); ?>px;height:auto;border:0;display:none;" />
				<p class="hide-if-no-js"><input value="<?php echo esc_attr( 'Set featured image', 'text-domain' ); ?>" type="button" id="upload_listing_image_button" data-uploader_title="<?php echo esc_attr( 'Choose an image', 'text-domain' ); ?>" data-uploader_button_text="<?php echo esc_attr( 'Set featured image', 'text-domain' ); ?>"></p>
				<input type="hidden" id="upload_listing_image" name="term_meta[featured_img]" value="" />
			</div>
		</td>
	</tr>
	<?php
}

// Add term page to create
function slide_category_add_new_meta_fields() {
	?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[link_url]"><?php _e( 'Link URL', 'pippin' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[link_url]" id="link_url" placeholder="http://">
			<p class="description"><?php _e( 'Go to more info.','pippin' ); ?></p>
		</td>
	</tr>
<?php
	html_featured_img();
}
add_action( WIP_SLIDER_TAXONOMY . '_add_form_fields', 'slide_category_add_new_meta_fields', 10, 2 );

// Add term page to edit
function slide_category_edit_meta_fields($term) {
 	global $new_content_width, $_wp_additional_image_sizes;

 	// put the term ID into a variable
 	$t_id = $term->term_id;
 	$term_meta = get_option( WIP_SLIDER_TAXONOMY . "_" . $t_id );
	?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[link_url]"><?php _e( 'Link URL', 'pippin' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[link_url]" id="link_url" value="<?php echo esc_attr( $term_meta['link_url'] ) ? esc_attr( $term_meta['link_url'] ) : ''; ?>" placeholder="http://">
			<p class="description"><?php _e( 'Go to more info.','pippin' ); ?></p>
		</td>
	</tr>
	<?php

	$image_id = $term_meta['featured_img'];
	$new_content_width = 254;
	if ( $image_id && get_post( $image_id ) ) {
		if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
			$thumbnail_html = wp_get_attachment_image( $image_id, array( $new_content_width, $new_content_width ) );
		} else {
			$thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
		}
		if ( ! empty( $thumbnail_html ) ) { ?>
			<tr class="form-field">
				<th scope="row" valign="top"><label for="term_meta[featured_img]"><?php _e( 'Featured image', 'pippin' ); ?></label></th>
				<td>
					<div id="listingimagediv">
						<?php echo $thumbnail_html; ?>
						<p class="hide-if-no-js"><input type="button" id="remove_listing_image_button" value="<?php echo esc_html__( 'Remove featured image', 'text-domain' ); ?>"></p>
						<input type="hidden" id="upload_listing_image" name="term_meta[featured_img]" value="<?php echo esc_attr( $image_id ); ?>" />
					</div>
				</td>
			</tr>
			<?php
		}
		$content_width = $old_content_width;
	} else {
		html_featured_img();
	}
}
add_action( WIP_SLIDER_TAXONOMY . '_edit_form_fields', 'slide_category_edit_meta_fields', 10, 2 );

// Save extra taxonomy fields callback function.
function save_slide_category_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( WIP_SLIDER_TAXONOMY . "_" . $t_id );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( WIP_SLIDER_TAXONOMY . "_" . $t_id, $term_meta );
	}
}  
add_action( 'edited_' . WIP_SLIDER_TAXONOMY, 'save_slide_category_custom_meta', 10, 2 );  
add_action( 'create_' . WIP_SLIDER_TAXONOMY, 'save_slide_category_custom_meta', 10, 2 );

// Delete extra taxonomy fields
function delete_slide_category_custom_meta( $term_id ) {
	$t_id = $term_id;
	$term_meta = get_option( WIP_SLIDER_TAXONOMY . "_" . $t_id );
	if(!empty( $term_meta )) {
		delete_option( WIP_SLIDER_TAXONOMY . "_" . $t_id );
	}
}
add_action( 'delete_' . WIP_SLIDER_TAXONOMY, 'delete_slide_category_custom_meta', 10, 2 );

// Add Shortcode
function slider_shortcode( $atts ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'num_cat' => '2',
			'slide_per_cat' => '6',
		),
		$atts
	);

	// Output
	$terms = get_terms( array(
	    'taxonomy' => WIP_SLIDER_TAXONOMY,
	    'hide_empty' => false,
	    'orderby' => 'date',
	    'order' => 'ASC',
	    'number' => $atts['num_cat']
		) 
	);
	$queries = array();
	foreach ($terms as $key => $term) {
		$term_meta = get_option( WIP_SLIDER_TAXONOMY . "_" . $term->term_id );
		$terms[$key] = (object) array_merge( (array) $term, $term_meta );
		$args = array(
			'post_type' => WIP_SLIDER_POST_TYPE,
			'posts_per_page' => $atts['slide_per_cat'],
			'tax_query' => array(
				array(
					'taxonomy' => WIP_SLIDER_TAXONOMY,
					'field'    => 'term_id',
					'terms'    => $term->term_id
					),
				),
		);
		$queries[] = new WP_Query( $args );
	}
	ob_start();
	include WIP_SLIDER_PATH . 'front/front-slider.php';
	return ob_get_clean();
}
add_shortcode( 'WIP_SLIDER', 'slider_shortcode' );