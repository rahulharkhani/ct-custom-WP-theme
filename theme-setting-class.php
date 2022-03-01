<?php
class ThemeSettings {
	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $options;

	/**
	 * Start up
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'ct_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'custom_js_enqueue' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'custom_css_enqueue' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_contactform_metabox' ) );
		add_action( 'save_post', array( $this, 'save_home_metabox_data' ) );
	}

	/**
	 * Add js for image upload
	 */
	function custom_js_enqueue( $hook ) {
		wp_enqueue_media();
		wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/js/logo-upload.js', array(), '1.0' );
	}

	/**
	 * Add css for frontend
	 */
	function custom_css_enqueue( $hook ) {
		wp_enqueue_style( 'custom_css', get_template_directory_uri() . '/css/custom-style.css', array(), '1.0' );
	}

	/**
	 * Add options page
	 */
	public function ct_admin_menu() {
		$page_title = 'Theme Settings Page';
		$menu_title = 'Theme Settings';
		$capability = 'edit_posts';
		$menu_slug = 'theme_options_page';
		$function = array( $this, 'create_admin_setting_page' );
		$icon_url = '';
		$position = 100;
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	}

	/**
	 * Options page callback
	 */
	public function create_admin_setting_page() {
		// Set class property
		$this->options = get_option( 'theme_option' );
		?>
		<div class="wrap">
			<h1>Settings Page</h1>
			<form method="post" action="options.php" name="theme_settings">
				<?php
					// This prints out all hidden setting fields
					settings_fields( 'theme_option_group' );
					do_settings_sections( 'theme-setting-admin' );
					submit_button();
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Register and add settings
	 */
	public function page_init() {

		register_setting(
			'theme_option_group', // Option group
			'theme_option', // Option name
			array( $this, 'sanitize' ) // Sanitize
		);

		add_settings_section(
			'admin_setting_section', // ID
			'Coalitiontest Theme Settings', // Title
			array( $this, 'print_section_info' ), // Callback
			'theme-setting-admin' // Page
		);

		add_settings_field(
			'logo', // ID
			'Website Logo', // Title 
			array( $this, 'logo_callback' ), // Callback
			'theme-setting-admin', // Page
			'admin_setting_section' // Section
		);

		add_settings_field(
			'phone', // ID
			'Phone Number', // Title 
			array( $this, 'phone_callback' ), // Callback
			'theme-setting-admin', // Page
			'admin_setting_section' // Section
		);

		add_settings_field(
			'fax', // ID
			'Fax', // Title
			array( $this, 'fax_callback' ), // Callback
			'theme-setting-admin', // Page
			'admin_setting_section' // Section
		);

		add_settings_field(
			'address', // ID
			'Address', // Title
			array( $this, 'address_callback' ), // Callback
			'theme-setting-admin', // Page
			'admin_setting_section' // Section
		);

		add_settings_field(
			'facebook', // ID
			'Facebook', // Title
			array( $this, 'facebook_callback' ), // Callback
			'theme-setting-admin', // Page
			'admin_setting_section' // Section
		);

		add_settings_field(
			'twitter', // ID
			'Twitter', // Title
			array( $this, 'twitter_callback' ), // Callback
			'theme-setting-admin', // Page
			'admin_setting_section' // Section
		);

		add_settings_field(
			'linkedin', // ID
			'Linkedin', // Title
			array( $this, 'linkedin_callback' ), // Callback
			'theme-setting-admin', // Page
			'admin_setting_section' // Section
		);

		add_settings_field(
			'pintrest', // ID
			'Pintrest', // Title
			array( $this, 'pintrest_callback' ), // Callback
			'theme-setting-admin', // Page
			'admin_setting_section' // Section
		);
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 */
	public function sanitize( $input ) {
		$newInput = array();

		if( isset( $input['logo'] ) )
			$newInput['logo'] = sanitize_text_field( $input['logo'] );

		if( isset( $input['phone'] ) )
			$newInput['phone'] = absint( $input['phone'] );

		if( isset( $input['fax'] ) )
			$newInput['fax'] = sanitize_text_field( $input['fax'] );

		if( isset( $_POST['address'] ) )
			$newInput['address'] = $_POST['address'];

		if( isset( $input['facebook'] ) )
			$newInput['facebook'] = sanitize_text_field( $input['facebook'] );

		if( isset( $input['twitter'] ) )
			$newInput['twitter'] = sanitize_text_field( $input['twitter'] );

		if( isset( $input['linkedin'] ) )
			$newInput['linkedin'] = sanitize_text_field( $input['linkedin'] );

		if( isset( $input['pintrest'] ) )
			$newInput['pintrest'] = sanitize_text_field( $input['pintrest'] );

		return $newInput;
	}

	/** 
	 * Print the Section text
	 */
	public function print_section_info() {
		//print 'Enter your settings below:';
	}

	/** 
	 * Get the settings option array and print one of its values
	 */
	public function logo_callback() {
		printf(
			 '<input type="text" id="logo" name="theme_option[logo]" size="60" value="%s" />',
			 isset( $this->options['logo'] ) ? esc_attr( $this->options['logo']) : ''
		);
		echo '<input id="upload_logo_button" class="button" type="button" value="Upload Logo" />';
		
	}

	/** 
	 * Get the settings option array and print one of its values
	 */
	public function phone_callback() {
		printf(
			'<input type="text" id="phone" name="theme_option[phone]" size="50" value="%s" />',
			isset( $this->options['phone'] ) ? esc_attr( $this->options['phone']) : ''
		);
	}

	/** 
	 * Get the settings option array and print one of its values
	 */
	public function fax_callback() {
		printf(
			'<input type="text" id="fax" name="theme_option[fax]" size="50" value="%s" />',
			isset( $this->options['fax'] ) ? esc_attr( $this->options['fax']) : ''
		);
	}

	/** 
	 * Get the settings option array and print one of its values
	 */
	public function address_callback() {
		// printf(
		// 	'<textarea id="address" name="theme_option[address]" rows="5" cols="50">%s</textarea>',
		// 	isset( $this->options['address'] ) ? esc_attr( $this->options['address']) : ''
		// );
		$content = $this->options['address'];
		$editor_id = "address";
		$args = array(
			'tinymce'       => array(
				'toolbar1'      => 'bold,italic,underline,alignleft,aligncenter,alignright,separator,link,unlink,undo,redo',
				'toolbar2'      => '',
				'toolbar3'      => '',
				'height' => "150",
			),
		);
		wp_editor( $content, $editor_id, $args );
	}

	/** 
	 * Get the settings option array and print one of its values
	 */
	public function facebook_callback() {
		printf(
			'<input type="text" id="facebook" name="theme_option[facebook]" size="50" value="%s" />',
			isset( $this->options['facebook'] ) ? esc_attr( $this->options['facebook']) : ''
		);
	}

	/** 
	 * Get the settings option array and print one of its values
	 */
	public function twitter_callback() {
		printf(
			'<input type="text" id="twitter" name="theme_option[twitter]" size="50" value="%s" />',
			isset( $this->options['twitter'] ) ? esc_attr( $this->options['twitter']) : ''
		);
	}

	/** 
	 * Get the settings option array and print one of its values
	 */
	public function linkedin_callback() {
		printf(
			'<input type="text" id="linkedin" name="theme_option[linkedin]" size="50" value="%s" />',
			isset( $this->options['linkedin'] ) ? esc_attr( $this->options['linkedin']) : ''
		);
	}

	/** 
	 * Get the settings option array and print one of its values
	 */
	public function pintrest_callback() {
		printf(
			'<input type="text" id="pintrest" name="theme_option[pintrest]" size="50" value="%s" />',
			isset( $this->options['pintrest'] ) ? esc_attr( $this->options['pintrest']) : ''
		);
	}

	/**
	 * Add metaboxes for home page
	 */
	function add_contactform_metabox() {
		global $post;

		if(!empty($post)) {
			$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

			if($pageTemplate == 'homepage.php' ) {

				add_meta_box(
					'page_data', // $id
					'Page Data Section', // $title
					array( $this, 'page_data_section_fields' ), // $callback
					'page', // $page
					'normal', // $context
					'high' // $priority
				);

				add_meta_box(
					'contact_data', // $id
					'Contact Form Section', // $title
					array( $this, 'contactform_section_fields' ), // $callback
					'page', // $page
					'normal', // $context
					'high' // $priority
				);

				add_meta_box(
					'reachus_data', // $id
					'Reach Us Section', // $title
					array( $this, 'reachus_section_fields' ), // $callback
					'page', // $page
					'normal', // $context
					'high' // $priority
				);
			}
		}
	}

	/**
	 * Contact Details metaboxes for home page
	 */
	public function page_data_section_fields() {

		// Add the HTML for the post meta
		$pageTitle = get_post_meta(get_the_ID(), '_pagetitle', true);
		$content = get_post_meta(get_the_ID(), '_pagecontent', true);
		?>
		<h4>Add Page Title</h4>
		<input type="text" name="pagetitle" id="pagetitle" value='<?php echo $pageTitle; ?>' size="60" />
		<h4>Add Page Content</h4>
		<?php
		// $editor_id = "pagecontent";
		// $args = array(
		// 	'tinymce'       => array(
		// 		'toolbar1'      => 'bold,italic,underline,separator,alignleft,aligncenter,alignright,separator,link,unlink,undo,redo',
		// 		'toolbar2'      => '',
		// 		'toolbar3'      => '',
		// 		'height' => "150",
		// 	),
		// );
		// wp_editor( $content, $editor_id, $args );
	}


	/**
	 * Contact Details metaboxes for home page
	 */
	public function contactform_section_fields() {

		// Add the HTML for the post meta
		$contactTitle = get_post_meta(get_the_ID(), '_contacttitle', true);
		$contactForm = get_post_meta(get_the_ID(), '_contactform', true);
		?>
		<h4>Add Contact Section Title</h4>
		<input type="text" name="contacttitle" id="contacttitle" value='<?php echo $contactTitle; ?>' size="60" />
		<h4>Add Contact From 7 Shortcode</h4>
		<input type="text" name="contactform" id="contactform" value='<?php echo $contactForm; ?>' size="60" />
		<?php
	}

	/**
	 * Reach us metaboxes for home page
	 */
	public function reachus_section_fields() {

		// Add the HTML for the post meta
		$reachusTitle = get_post_meta(get_the_ID(), '_reachustitle', true);
		?>
		<h4>Add Reach Us Section Title</h4>
		<input type="text" name="reachustitle" id="reachustitle" value='<?php echo $reachusTitle; ?>' size="60" />
		<?php
	}

	/**
	 * Save metaboxes details
	 */
	function save_home_metabox_data(){

		global $post;

		if(isset($_POST["pagetitle"]))
			
			update_post_meta($post->ID, '_pagetitle', sanitize_text_field($_POST["pagetitle"]));

		if(isset($_POST["pagecontent"]))
			
			update_post_meta($post->ID, '_pagecontent', $_POST["pagecontent"]);

		if(isset($_POST["contacttitle"]))
			
			update_post_meta($post->ID, '_contacttitle', sanitize_text_field($_POST["contacttitle"]));

		if(isset($_POST["contactform"]))
			
			update_post_meta($post->ID, '_contactform', sanitize_text_field($_POST["contactform"]));
		
		if(isset($_POST["reachustitle"]))
			
			update_post_meta($post->ID, '_reachustitle', sanitize_text_field($_POST["reachustitle"]));

		if(isset($_POST["reachus_editor"]))
			
			update_post_meta( $post->ID, '_reachus_editor', $_POST["reachus_editor"] );
	}

}

if( is_admin() )
	$themeSettings = new ThemeSettings();

global $themeoption;
$themeoption = get_option('theme_option');