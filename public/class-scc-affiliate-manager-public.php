<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://straycat.nu
 * @since      1.0.0
 *
 * @package    Scc_Affiliate_Manager
 * @subpackage Scc_Affiliate_Manager/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Scc_Affiliate_Manager
 * @subpackage Scc_Affiliate_Manager/public
 * @author     Stray Cat Communication <developer@straycat.nu>
 */
class Scc_Affiliate_Manager_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/scc-affiliate-manager-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/scc-affiliate-manager-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	* Returns a post object of random quotes
	*
	* @param array $params An array of optional parameters
	* quantity Number of quote posts to return
	*
	* @return object A post object
	*/

	public function get_aff_links($params) {
		$return = '';
		$args = array(
			'post_type' => 'aff-link',
			'posts_per_page' => $params,
			'order' => 'asc',
			'orderby' => 'name'
		);

		$query = new WP_Query( $args );

		if ( is_wp_error( $query ) ) {
			$return = 'Oops!...No posts for you!';
		} else {
			$return = $query->posts;
		}

		return $return;
	} // get_rdm_quotes()

		/**
		* Registers all shortcodes at once
		*
		* @return [type] [description]
		*/

		public function register_shortcodes() {
			add_shortcode( 'aff_list', array( $this, 'list_links' ) );
		} // register_shortcodes()

		/**
		* Processes shortcode randomquote
		*
		* @param array $atts The attributes from the shortcode
		*
		*
		* @return mixed $output Output of the buffer
		*/

		public function list_links( $atts = array() ) {
			ob_start();

			$args = shortcode_atts( array(
				'num-links' => 5,
				'links-title' => 'Partners',),
				$atts
			);

			$items = $this->get_aff_links($args['num-links']);
			//var_dump($items);

			if ( is_array( $items ) || is_object( $items ) ) {
				echo('<h4 class="table-h4">' . $args['links-title'] . '</h4>');
				echo('<input id="myInput" type="text" onkeyup="sccSearch()" placeholder="Sök...">');
				echo('<div id="myTable" class="scc_container">');
				echo('<ul class="scc_entry">');
					echo('<li class="scc_head">Namn</li>');
					echo('<li class="scc_head">Beskrivning</li>');
					echo('<li class="scc_head">Bonus</li>');
					echo('<li class="scc_head">Hemsida</li>');
				echo('</ul>');
				foreach ( $items as $item ) {

					echo('<ul class="scc_entry">');
						// $scc_img = get_field("$item->scc_affiliate_logo['url']");
						// echo('<img src=' . $scc_img . '>');
						$image = $item->scc_affiliate_logo;
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo('<li class="scc_item">');
							echo wp_get_attachment_image( $image, $size );
						}
						else {
							echo('<li class="scc_item">' . $item->post_title);
						}
						echo('</li>');
						echo('<li class="scc_item">' . $item->post_content . '<p class="scc_read_more"><i><a href=' . $item->scc_company_website . '>Läs mer om företaget</a></i></p>' . '</li>');
						echo('<li class="scc_item">' . $item->scc_bonus . '</li>');
						// echo('<li class="scc_item">' . $item->scc_tag . '</li>');
						echo("<li class='scc_item'> <a href='$item->scc_masked_link'><button type='button' class='btn btn-primary'>Till sajten</button></a><a href='$item->scc_review'>Recension</a> </li>");
					echo('</ul>');
				} // foreach
				echo('</div>');


				// echo('<div class="table-responsive">');
				// echo('<table class="table" id="myTable">');
				// echo('<h4 class="table-h4">' . $args['links-title'] . '</h4>');
				// echo('<input id="myInput" type="text" onkeyup="sccSearch()" placeholder="Sök...">');
				// echo('<thead>');
  			// 	echo('<tr class="header">
    		// 		<th scope="col" style="width: 15%;">Namn</th>
    		// 		<th scope="col" style="width: 30%;">Beskrivning</th>
				// 		<th scope="col" style="width: 20%;">Bonus</th>
				// 		<th scope="col" style="width: 20%;">Taggar</th>
				// 		<th scope="col" style="width: 15%;">Hemsida</th>
  			// 	</tr>');
 				// echo('</thead>');
				// echo('<ul><tbody>');
				// foreach ( $items as $item ) {
				// 	echo('<tr class="scc_entry">' .
				// 	'<td>' . $item->post_title . '</th>' .
				// 	'<td>' . $item->post_content . '</td>' .
				// 	'<td>' . $item->scc_bonus . '</td>' .
				// 	'<td>' . $item->scc_tag . '</td>' .
				// 	"<td> <a href='$item->scc_masked_link'><button type='button' class='btn btn-primary'>Till sajten</button></a> <br> <a href='$item->scc_review'>Recension </td>" .
				// 	'</tr>');
				// } // foreach
				// echo ('</ul>');
				// echo ('</tbody>');
				// echo('</table>');
				// echo('</div>');
			} else {
				echo $items;
			}

			$output = ob_get_contents();
			ob_end_clean();

			return $output;

		} // get_rdm_quotes()

}
