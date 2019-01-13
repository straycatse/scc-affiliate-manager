<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://straycat.nu
 * @since      1.0.0
 *
 * @package    Scc_Affiliate_Manager
 * @subpackage Scc_Affiliate_Manager/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Scc_Affiliate_Manager
 * @subpackage Scc_Affiliate_Manager/admin
 * @author     Stray Cat Communication <developer@straycat.nu>
 */
class Scc_Affiliate_Manager_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Scc_Affiliate_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Scc_Affiliate_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/scc-affiliate-manager-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Scc_Affiliate_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Scc_Affiliate_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/scc-affiliate-manager-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	* Creates a new custom post type
	*
	* @since 1.0.0
	* @access public
	* @uses register_post_type()
	*/
	public static function new_cpt_aff_link() {
		$cap_type = 'post';
		$plural = 'Affiliate Links';
		$single = 'Affiliate Link';
		$cpt_name = 'aff-link';
		$opts['can_export'] = TRUE;
		$opts['capability_type'] = $cap_type;
		$opts['description'] = '';
		$opts['exclude_from_search'] = FALSE;
		$opts['has_archive'] = FALSE;
		$opts['hierarchical'] = FALSE;
		$opts['map_meta_cap'] = TRUE;
		$opts['menu_icon'] = 'dashicons-businessman';
		$opts['menu_position'] = 25;
		$opts['public'] = TRUE;
		$opts['publicly_querable'] = TRUE;
		$opts['query_var'] = TRUE;
		$opts['register_meta_box_cb'] = '';
		$opts['rewrite'] = FALSE;
		$opts['show_in_admin_bar'] = TRUE;
		$opts['show_in_menu'] = TRUE;
		$opts['show_in_nav_menu'] = TRUE;

		$opts['labels']['add_new'] = esc_html__( "Add New {$single}", 'wisdom' );
		$opts['labels']['add_new_item'] = esc_html__( "Add New {$single}", 'wisdom' );
		$opts['labels']['all_items'] = esc_html__( $plural, 'wisdom' );
		$opts['labels']['edit_item'] = esc_html__( "Edit {$single}" , 'wisdom' );
		$opts['labels']['menu_name'] = esc_html__( $plural, 'wisdom' );
		$opts['labels']['name'] = esc_html__( $plural, 'wisdom' );
		$opts['labels']['name_admin_bar'] = esc_html__( $single, 'wisdom' );
		$opts['labels']['new_item'] = esc_html__( "New {$single}", 'wisdom' );
		$opts['labels']['not_found'] = esc_html__( "No {$plural} Found", 'wisdom' );
		$opts['labels']['not_found_in_trash'] = esc_html__( "No {$plural} Found in Trash", 'wisdom' );
		$opts['labels']['parent_item_colon'] = esc_html__( "Parent {$plural} :", 'wisdom' );
		$opts['labels']['search_items'] = esc_html__( "Search {$plural}", 'wisdom' );
		$opts['labels']['singular_name'] = esc_html__( $single, 'wisdom' );
		$opts['labels']['view_item'] = esc_html__( "View {$single}", 'wisdom' );
		register_post_type( strtolower( $cpt_name ), $opts );
	} // new_cpt_job()

}
