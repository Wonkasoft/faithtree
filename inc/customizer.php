<?php
/**
 * FaithTree Theme Customizer
 *
 * @package faithtree
 * @version  1.0.0
 * @since  1.0.0
 * 
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function faithtree_customize_register( $wp_customize ) {

	/**
	 * Theme Options 
	 * @since  1.0.0 [Theme options for home page]
	 */
	
	// Adding customizer section for Theme Options
	$wp_customize->add_section( 'ft_theme_options' , array(
		'title'		=> __( 'Theme Options', 'faithtree' ),
		'priority'		=> 11,
	) );

		// Section Options
	$wp_customize->add_setting( 'section_count' , array(
		'default'   => '1',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'section_count',
        array(
            'label'          => __( 'How many sections', 'faithtree' ),
            'section'        => 'ft_theme_options',
            'settings'       => 'section_count',
            'type'           => 'select',
            'choices'        => array(
                '1'   => __( '1 Section' ),
                '2'  	=> __( '2 Sections' ),
                '3'   => __( '3 Sections' ),
                '4'  	=> __( '4 Sections' ),
                '5'   => __( '5 Sections' ),
                '6'  	=> __( '6 Sections' ),
                '7'   => __( '7 Sections' ),
                '8'  	=> __( '8 Sections' ),
                '9'   => __( '9 Sections' ),
                '10'  => __( '10 Sections' ),
            ),
            'description'	=> 'Choose how many home page sections',
        )
    )
);
	
	/**
 	* End of Theme Options
 	*/

	/**
	 * 
	 * Main Header Section
	 * @since  1.0.0
	 * 
	 */
	// Adding customizer section for main header section
	$wp_customize->add_section( 'main_header_section' , array(
		'title'		=> __( 'Main Header Section', 'faithtree' ),
		'priority'		=> 29,
	) );

	// Main Header Image Setting
	$wp_customize->add_setting( 'featured_header_media' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	// Main Header Image Control
	$wp_customize->add_control( new WP_Customize_Media_Control( 
		$wp_customize, 
		'featured_header_media', 
		array(
		'label'      	=> __( 'Featured Header Media ', 'faithtree' ),
		'section'    	=> 'main_header_section',
		'setting'   	=> 'featured_header_media',
		'description'	=> 'Choose an media for header section',
	) ) );

		// Main header Title Setting
	$wp_customize->add_setting( 'header_title' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

		// Main header Title Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'header_title', 
		array(
		'label'      	=> __( 'Header Title ', 'faithtree' ),
		'section'    	=> 'main_header_section',
		'setting'   	=> 'header_title',
		'type'			 	=> 'text',
		'description'	=> 'Input a title for header section',
	) ) );

			// Main header Tag-line Setting
	$wp_customize->add_setting( 'header_tag_line' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

		// Main header Tag-line Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'header_tag_line', 
		array(
		'label'      	=> __( 'Header Tag-line ', 'faithtree' ),
		'section'    	=> 'main_header_section',
		'setting'   	=> 'header_tag_line',
		'type'			 	=> 'text',
		'description'	=> 'Input a tag-line for header section',
	) ) );

		// Main header CTA (Call To Action) Setting
	$wp_customize->add_setting( 'header_cta_text' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

		// Main header CTA (Call To Action) Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'header_cta_text', 
		array(
		'label'      	=> __( 'Header Button(CTA) Text', 'faithtree' ),
		'section'    	=> 'main_header_section',
		'setting'   	=> 'header_cta_text',
		'type'			 	=> 'text',
		'description'	=> 'Input CTA (Button) Text here',
	) ) );

		// Main header CTA (Call To Action) Link
	$wp_customize->add_setting( 'header_cta_link' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

		// Main header CTA (Call To Action) Link Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'header_cta_link', 
		array(
		'label'      	=> __( 'Header Button(CTA) Link', 'faithtree' ),
		'section'    	=> 'main_header_section',
		'setting'   	=> 'header_cta_link',
		'type'			 	=> 'dropdown-pages',
		'description'	=> 'Select the page for CTA',
	) ) );
	
	/**
	 * End of Main Header Section
	 */
	
	/**
	 * 
	 * Loop for all sub sections
	 * @since  1.0.0
	 * 
	 */
	// Get Section count from Theme options
	$section_count = get_theme_mod( 'section_count' );
	for ( $i=1; $i < $section_count + 1 ; $i++ ) { 
		// Adding customizer section for sections
		$wp_customize->add_section( 'section_'.$i , array(
			'title'		=> __( 'Section '.$i, 'faithtree' ),
			'priority'		=> 30,
		) );

		// Section Image Setting
		$wp_customize->add_setting( 'background_image_section_'.$i , array(
			'default'   => '',
			'transport' => 'postMessage',
		) );

		// Section Image Control
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'background_image_section_'.$i, 
			array(
			'label'      	=> __( 'Section Image '.$i, 'faithtree' ),
			'section'    	=> 'section_'.$i,
			'setting'   	=> 'background_image_section_'.$i,
			'description'	=> 'Choose a background image for section '.$i,
		) ) );

			// Section Title Image Setting
		$wp_customize->add_setting( 'section_title_'.$i , array(
			'default'   => '',
			'transport' => 'postMessage',
		) );

			// Section Title Control
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'section_title_'.$i, 
			array(
			'label'      	=> __( 'Title Image For Section '.$i, 'faithtree' ),
			'section'    	=> 'section_'.$i,
			'setting'   	=> 'section_title'.$i,
			'description'	=> 'Select a title image for section '.$i,
		) ) );

			// Section position for message Setting
		$wp_customize->add_setting( 'section_message_position_'.$i , array(
			'default'   => '',
			'transport' => 'postMessage',
		) );

			// Section position Control
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 
			'section_message_position_'.$i, 
			array(
			'label'      	=> __( 'Position For message on section '.$i, 'faithtree' ),
			'section'    	=> 'section_'.$i,
			'setting'   	=> 'section_message_position_'.$i,
			'type'        => 'select',
            'choices'        => array(
                ''   			=> __( 'None' ),
                'left'   	=> __( 'Left' ),
                'center'  => __( 'Center' ),
                'right'   => __( 'Right' ),
            ),
			'description'	=> 'Select position for message on section '.$i,
		) ) );

			// Section Message Setting
		$wp_customize->add_setting( 'section_message_'.$i , array(
			'default'   => '',
			'transport' => 'postMessage',
		) );

			// Section Message Control
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 
			'section_message_'.$i, 
			array(
			'label'      	=> __( 'Message For Section '.$i, 'faithtree' ),
			'section'    	=> 'section_'.$i,
			'setting'   	=> 'section_message_'.$i,
			'type'			 	=> 'textarea',
			'description'	=> 'Input a message for section '.$i,
		) ) );

				// Section position for cta Setting
		$wp_customize->add_setting( 'section_cta_position_'.$i , array(
			'default'   => '',
			'transport' => 'postMessage',
		) );

			// Section position cta Control
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 
			'section_cta_position_'.$i, 
			array(
			'label'      	=> __( 'Position For message on section '.$i, 'faithtree' ),
			'section'    	=> 'section_'.$i,
			'setting'   	=> 'section_cta_position_'.$i,
			'type'        => 'select',
            'choices'        => array(
                ''   			=> __( 'None' ),
                'left'   	=> __( 'Left' ),
                'center'  => __( 'Center' ),
                'right'   => __( 'Right' ),
            ),
			'description'	=> 'Select position for CTA on section '.$i,
		) ) );

			// Section CTA (Call To Action) Setting
		$wp_customize->add_setting( 'section_cta_text_'.$i , array(
			'default'   => '',
			'transport' => 'postMessage',
		) );

			// Section CTA (Call To Action) Control
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 
			'section_cta_text_'.$i, 
			array(
			'label'      	=> __( 'Section Button(CTA) Text '.$i, 'faithtree' ),
			'section'    	=> 'section_'.$i,
			'setting'   	=> 'section_cta_text_'.$i,
			'type'			 	=> 'text',
			'description'	=> 'Input CTA (Button) Text here for section '.$i,
		) ) );

			// Section CTA (Call To Action) Link
		$wp_customize->add_setting( 'section_cta_link_'.$i , array(
			'default'   => '',
			'transport' => 'postMessage',
		) );

			// Section CTA (Call To Action) Link Control
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 
			'section_cta_link_'.$i, 
			array(
			'label'      	=> __( 'Section Button(CTA) Link '.$i, 'faithtree' ),
			'section'    	=> 'section_'.$i,
			'setting'   	=> 'section_cta_link_'.$i,
			'type'			 	=> 'dropdown-pages',
			'description'	=> 'Select the page for CTA on section '.$i,
		) ) );
	}
	/**
	 * End of Section loop
	 */


/**
 *
 * Add Footer Section
 * @since 1.0.0
 * 
 */

$wp_customize->add_section( 'footer_section' , array(
	'title'				=> __( 'Footer Section', 'faithtree' ),
	'priority'		=> 36,
) );

// Footer Logo Setting
	$wp_customize->add_setting( 'footer_logo' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	// Footer Logo Control
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 
		'footer_logo', 
		array(
		'label'      	=> __( 'Footer Logo', 'faithtree' ),
		'section'    	=> 'footer_section',
		'setting'   	=> 'footer_logo',
		'description'	=> 'Choose an image for Footer section',
	) ) );

		// Footer Message Setting
	$wp_customize->add_setting( 'footer_message' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	// Footer Message Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'footer_message', 
		array(
		'label'      	=> __( 'Footer Message', 'faithtree' ),
		'section'    	=> 'footer_section',
		'setting'   	=> 'footer_message',
		'type'				=> 'textarea',
		'description'	=> 'Add Message for Footer section',
	) ) );

			// Footer Copyright Setting
	$wp_customize->add_setting( 'footer_copyright' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	// Footer Message Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'footer_copyright', 
		array(
		'label'      	=> __( 'Footer Copyright', 'faithtree' ),
		'section'    	=> 'footer_section',
		'setting'   	=> 'footer_copyright',
		'type'				=> 'text',
		'description'	=> 'Add Copyright for Footer section',
	) ) );

	// Footer Socials Facebook Setting
	$wp_customize->add_setting( 'footer_social_facebook' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	// Footer Socials Facebook Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'footer_social_facebook', 
		array(
		'label'      	=> __( 'Footer Social Facebook', 'faithtree' ),
		'section'    	=> 'footer_section',
		'setting'   	=> 'footer_social_facebook',
		'type'				=> 'text',
		'description'	=> 'Add Facebook URL for Footer section',
	) ) );

	// Footer Socials Twitter Setting
	$wp_customize->add_setting( 'footer_social_twitter' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	// Footer Socials Twitter Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'footer_social_twitter', 
		array(
		'label'      	=> __( 'Footer Social Twitter', 'faithtree' ),
		'section'    	=> 'footer_section',
		'setting'   	=> 'footer_social_twitter',
		'type'				=> 'text',
		'description'	=> 'Add Twitter URL for Footer section',
	) ) );

	// Footer Socials Instagram Setting
	$wp_customize->add_setting( 'footer_social_instagram' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	// Footer Socials Instagram Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'footer_social_instagram', 
		array(
		'label'      	=> __( 'Footer Social Instagram', 'faithtree' ),
		'section'    	=> 'footer_section',
		'setting'   	=> 'footer_social_instagram',
		'type'				=> 'text',
		'description'	=> 'Add Instagram URL for Footer section',
	) ) );

		// Footer Socials Yelp Setting
	$wp_customize->add_setting( 'footer_social_yelp' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	// Footer Socials Yelp Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'footer_social_yelp', 
		array(
		'label'      	=> __( 'Footer Social Yelp', 'faithtree' ),
		'section'    	=> 'footer_section',
		'setting'   	=> 'footer_social_yelp',
		'type'				=> 'text',
		'description'	=> 'Add Yelp URL for Footer section',
	) ) );

			// Footer Email Setting
	$wp_customize->add_setting( 'footer_social_email' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	// Footer Email Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'footer_social_email', 
		array(
		'label'      	=> __( 'Footer Email', 'faithtree' ),
		'section'    	=> 'footer_section',
		'setting'   	=> 'footer_social_email',
		'type'				=> 'email',
		'description'	=> 'Add Email URL for Footer section',
	) ) );

/**
 * End of Footer Section
 */

/**
 *
 * Add Facebook App ID Section
 * @since 1.0.0 [<Add About Me Section>]
 * 
 */

$wp_customize->add_section( 'fb_app_section' , array(
	'title'				=> __( 'Facebook App Section', 'faithtree' ),
	'priority'		=> 37,
) );

// Footer Socials Instagram Setting
	$wp_customize->add_setting( 'fb_app_setting' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	// Footer Socials Instagram Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'fb_app_setting', 
		array(
		'label'      	=> __( 'Footer Social Instagram', 'faithtree' ),
		'section'    	=> 'fb_app_section',
		'setting'   	=> 'fb_app_setting',
		'type'				=> 'text',
		'description'	=> 'Add Fackbook App ID to intergrate Facebook',
	) ) );

/**
 * End of Facebook App ID Section
 */

$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'faithtree_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'faithtree_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'faithtree_customize_register' );
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function faithtree_customize_partial_blogname() {
	bloginfo( 'name' );
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function faithtree_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function faithtree_customize_preview_js() {
	wp_enqueue_script( 'faithtree-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20171012', true );
}
add_action( 'customize_preview_init', 'faithtree_customize_preview_js' );