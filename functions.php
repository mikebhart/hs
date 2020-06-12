<?php
/**
  * Set up My Child Theme's textdomain.
  *
  * Declare textdomain for this child theme.
  * Translations can be added to the /languages/ directory.
  */

define( 'GENLITE_CONTACT_MAILTO', 'genlite_contact_mailto'); 
define( 'GENLITE_CONTACT_SUBJECT', 'genlite_contact_subject');   
define( 'GENLITE_CONTACT_STATUS', 'genlite_contact_status'); 

// Queue parent style followed by child/customized style
function theme_enqueue_styles() {
   wp_enqueue_style( 'genlite-child-style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX);


// Work Post Type
function cptui_register_my_cpts() {

	
	/**
	 * Post Type: Projects.
	 */

	$labels = array(
		"name" => __( "Projects", "genlite" ),
		"singular_name" => __( "Project", "genlite" ),
	);

	$args = array(
		"label" => __( "Projects", "genlite" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "work", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "custom-fields" ),
		"taxonomies" => array( "work_category" ),
	);

	register_post_type( "work", $args );
}
add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts_work() {

	/**
	 * Post Type: Projects.
	 */

	$labels = array(
		"name" => __( "Projects", "genlite" ),
		"singular_name" => __( "Project", "genlite" ),
	);

	$args = array(
		"label" => __( "Projects", "genlite" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "work", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "custom-fields" ),
		"taxonomies" => array( "work_category" ),
	);

	register_post_type( "work", $args );
}
add_action( 'init', 'cptui_register_my_cpts_work' );

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Work Categories.
	 */

	$labels = array(
		"name" => __( "Work Categories", "genlite" ),
		"singular_name" => __( "Work Category", "genlite" ),
	);

	$args = array(
		"label" => __( "Work Categories", "genlite" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Work Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'work-type', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "work_category", array( "work" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

function cptui_register_my_taxes_work_category() {

	/**
	 * Taxonomy: Work Categories.
	 */

	$labels = array(
		"name" => __( "Work Categories", "genlite" ),
		"singular_name" => __( "Work Category", "genlite" ),
	);

	$args = array(
		"label" => __( "Work Categories", "genlite" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Work Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'work-type', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "work_category", array( "work" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_work_category' );

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_project-details',
		'title' => 'Project Details',
		'fields' => array (
			array (
				'key' => 'field_5a6d0a8ea8160',
				'label' => 'Website',
				'name' => 'website',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a6e206350b5e',
				'label' => 'teest',
				'name' => 'teestte',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5a6e2095274ff',
				'label' => '',
				'name' => '',
				'type' => 'select',
				'choices' => array (
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'work',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}




function genlite_register_meta_boxes() {
    add_meta_box( 'meta-box-id', __( 'Work2 Custom Fields', 'genlite' ), 'genlite_my_display_callback', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'genlite_register_meta_boxes' );

function genlite_my_display_callback( $post ) {

	wp_nonce_field( basename( __FILE__ ), 'website_meta_box_nonce' );
	$value = get_post_meta(get_the_ID(), 'website_key', true);
	$html = '<label>Website Url: </label><input type="text" name="website" size="100" value="'.$value.'"/>';
	echo $html;
}
 
// function genlite_website_meta_box_save( $post_id ){   

//     if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
//     if ( !isset( $_POST['website_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['website_meta_box_nonce'], basename( __FILE__ ) ) ) return;
//    	if( !current_user_can( 'edit_post' ) ) return;  
//     if( isset( $_POST['website'] ) )  
//         update_post_meta( $post_id, 'website_key', esc_attr( $_POST['website'], $allowed ) );
// }
// add_action( 'save_post', 'genlite_website_meta_box_save' );  

function genlite_hs_customize_register( $wp_customize ) {

 //  =============================
  //  = Contact                   =
  //  =============================

    $wp_customize->add_section( 'genlite_contact_section', array(
  'capability'     => 'edit_theme_options',
  'theme_supports' => '',
  'title'          => __( 'Contact Form', 'genlite' ),
  'description'    => esc_html__( 'To use assign a page to Contact from the Template dropdown in Page Editor. Developers can extend by modifying the themes template-contact.php file.', 'genlite' ),
  'panel'          => 'genlite_home_theme_panel'
) );




    // Mail To
    $wp_customize->add_setting( GENLITE_CONTACT_MAILTO , array(
       'type'   => 'theme_mod',
       'default'   => get_option('admin_email'),
       'sanitize_callback' => 'sanitize_email' 
    ));

    $wp_customize->add_control(GENLITE_CONTACT_MAILTO, array(
      'label' =>__('The email address for notifications','genlite'),
      'section' => 'genlite_contact_section',
      'priority' => 1
    ));

    // Subject
    $wp_customize->add_setting( GENLITE_CONTACT_SUBJECT, array(
       'type'   => 'theme_mod',
       'default'   => __('Contact Form Message has arrived', 'genlite'),
       'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control(GENLITE_CONTACT_SUBJECT, array(
      'label' =>__('Subject line for email notification','genlite'),
      'section' => 'genlite_contact_section',
      'priority' => 1
    ));


    // creen User Status
    $wp_customize->add_setting(GENLITE_CONTACT_STATUS , array(
       'type'   => 'theme_mod',
       'default'   => __('Thanks for reaching out.  Once reviewed I will get back to you as soon as possible.','genlite'),
       'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control(GENLITE_CONTACT_STATUS, array(
      'label' =>__('User screen submit message','genlite'),
      'section' => 'genlite_contact_section',
      'priority' => 1
    )); 




}
add_action( 'customize_register', 'genlite_hs_customize_register' );
