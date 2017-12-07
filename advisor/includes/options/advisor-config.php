<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "advisor_options";

    // This line is only for altering the demo. Can be easily removed.
    //$opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );
	   add_action( 'redux/loaded', 'remove_demo' );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */


    /**
     * ---> SET ARGUMENT */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        'menu_icon'            => get_template_directory_uri().'/images/advisor-options.png',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => false,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Advisor Options', 'advisor' ),
        'page_title'           => esc_html__( 'Advisor Options', 'advisor' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => '',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 25,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.

        // dev mode
        'dev_mode'             => false,
        // Force your panel to always open to a specific tab (by id)
        //'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'             => 'theme-options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    // -> START Basic Fields
     Redux::setSection( $opt_name, array(

    'title'            => esc_html__( 'General', 'advisor' ),
    'id'               => 'advisor-general',
    'customizer_width' => '400px',
    'icon'             => 'el el-home',
		'fields'           => array(

		    array(
			  'id'        => 'advisor-header-logo',
			  'type'      => 'media',
			  'title'     => esc_html__( 'Logo', 'advisor' ),
			  'compiler'  => 'true',
			  'mode'      => false,
			  'desc'      => esc_html__('Please Upload Logo','advisor')
			),
      array(
        'id'        => 'advisor_blog_layout',
        'type'      => 'radio',
        'title'     => esc_html__( 'Blog Layout', 'advisor' ),
        'desc'      => esc_html__( 'Please select Blog layout for your site.', 'advisor' ),

        'options'   => array(

          'blog-sidebar' 	      => esc_html__( 'Blog With Sidebar', 'advisor' ),
          'blog-no-sidebar' 		=> esc_html__( 'Blog With No Sidebar', 'advisor' ),
        ),
        'default'   => 'blog-sidebar'
      ),
      array(
        'id'        => 'advisor-accent-type',
        'type'      => 'radio',
        'title'     => esc_html__( 'Theme Accent Color Type', 'advisor' ),
        'desc'      => esc_html__( 'Please select a color type, it can be predefined color types or custom color selection.', 'advisor' ),

        'options'   => array(
          'default-colors' 	=> esc_html__( 'Default Color Options', 'advisor' ),
          'custom-color' 		=> esc_html__( 'Select Custom Color', 'advisor' ),
        ),
        'default'   => 'default-colors'
      ),
      array(
        'id'       	=> 'advisor-accent-select',
        'type'     	=> 'image_select',
        'title'    	=> esc_html__( 'Select Accent', 'advisor' ),
        'subtitle' 	=> esc_html__( 'Choose between 7 color schemes provided.', 'advisor' ),
        'options'   => array(
          'default' => array(
            'alt' => esc_html__( 'Default (Green)', 'advisor' ),
            'img' => get_template_directory_uri() . '/images/accent-colors/1.jpg',
          ),
          'red' => array(
            'alt' => esc_html__( 'Red', 'advisor' ),
            'img' => get_template_directory_uri() . '/images/accent-colors/2.jpg',
          ),
           'dark-blue' => array(
             'alt' => esc_html__( 'Dark Blue', 'advisor' ),
             'img' => get_template_directory_uri() . '/images/accent-colors/3.jpg',
           ),
           'blue' => array(
             'alt' => esc_html__( 'Blue', 'advisor' ),
             'img' => get_template_directory_uri() . '/images/accent-colors/4.jpg',
           ),
            'pink' => array(
              'alt' => esc_html__( 'Pink', 'advisor' ),
              'img' => get_template_directory_uri() . '/images/accent-colors/5.jpg',
            ),
            'light-blue' => array(
              'alt' => esc_html__( 'Light Blue', 'advisor' ),
              'img' => get_template_directory_uri() . '/images/accent-colors/6.jpg',
            ),
             'orange' => array(
               'alt' => esc_html__( 'Orange', 'advisor' ),
               'img' => get_template_directory_uri() . '/images/accent-colors/7.jpg',
             ),

        ),
        'default'   => 'default',
        'required'   => array('advisor-accent-type', '=' , 'default-colors'),
      ),
      array(
			  'id'          => 'advisor-accent-color',
			  'type'        => 'color',
			  'title'       => esc_html__( 'Accent Color', 'advisor' ),
			  'default'     => '#09a223',
			  'validate'    => 'color',
			  'transparent' => false,
        'required'   => array('advisor-accent-type', '=' , 'custom-color'),

      ),

      array(
        'id'       	=> 'advisor-icon-select',
        'type'     	=> 'image_select',
        'title'    	=> esc_html__( 'Select Icon Color', 'advisor' ),
        'subtitle' 	=> esc_html__( 'Choose between 7 color schemes provided.', 'advisor' ),
        'options'   => array(
          'default' => array(
            'alt' => esc_html__( 'Default (Green)', 'advisor' ),
            'img' => get_template_directory_uri() . '/images/accent-colors/1.jpg',
          ),
          'red' => array(
            'alt' => esc_html__( 'Red', 'advisor' ),
            'img' => get_template_directory_uri() . '/images/accent-colors/2.jpg',
          ),
           'dark-blue' => array(
             'alt' => esc_html__( 'Dark Blue', 'advisor' ),
             'img' => get_template_directory_uri() . '/images/accent-colors/3.jpg',
           ),
           'blue' => array(
             'alt' => esc_html__( 'Blue', 'advisor' ),
             'img' => get_template_directory_uri() . '/images/accent-colors/4.jpg',
           ),
            'pink' => array(
              'alt' => esc_html__( 'Pink', 'advisor' ),
              'img' => get_template_directory_uri() . '/images/accent-colors/5.jpg',
            ),
            'light-blue' => array(
              'alt' => esc_html__( 'Light Blue', 'advisor' ),
              'img' => get_template_directory_uri() . '/images/accent-colors/6.jpg',
            ),
             'orange' => array(
               'alt' => esc_html__( 'Orange', 'advisor' ),
               'img' => get_template_directory_uri() . '/images/accent-colors/7.jpg',
             ),

        ),
        'default'   => 'default',
      ),
    array(

         'id'       => 'advisor-enable-animations',
         'type'     => 'switch',
         'title'    => esc_html__( 'Enable Animations.', 'advisor' ),
         'desc'     => __( 'Please enable this if you want to have active animations on page load.','advisor' ),
         'default'  => '0',

      ),
      array(

           'id'       => 'advisor-enable-page-loader',
           'type'     => 'switch',
           'title'    => esc_html__( 'Enable Page Loader.', 'advisor' ),
           'desc'     => __( 'Please enable this if you want to show page loader on page load.','advisor' ),
           'default'  => '1',

        ),
      array(

         'id'       => 'enable-charts-script-on-all',
         'type'     => 'checkbox',
         'title'    => esc_html__( 'Enable Pie Charts Script For All Pages.', 'advisor' ),
         'subtitle' => esc_html__( 'Required for pei charts.', 'advisor' ),
         'desc'     => __( 'Please enable this if you want to show chart on all other pages than services page.','advisor' ),
         'default'  => '0',

      ),
      array(

         'id'       => 'enable-google-script-on-all',
         'type'     => 'checkbox',
         'title'    => esc_html__( 'Enable Google Script For All Pages.', 'advisor' ),
         'subtitle' => esc_html__( 'Required for maps.', 'advisor' ),
         'desc'     => __( 'Please enable this if you want to show maps on other pages than contact page.','advisor' ),
         'default'  => '0',

      ),
      array(

         'id'       => 'bta-google-map-api-key',
         'type'     => 'text',
         'title'    => esc_html__( 'Google Map API Key', 'advisor' ),
         'subtitle' => esc_html__( 'Required for contact us page maps.', 'advisor' ),
         'desc'     => __( 'Please add map api key, it is required by google if you want to show maps, you can . <a href="https://developers.google.com/maps/documentation/android-api/signup" target="_blank">Get The Key Here</a>', 'advisor' ),

      ),
			array(
          	  'id'        => 'advisor-custom-styles',
              'type'      => 'ace_editor',
              'mode' 	    => 'css',
			        'theme'     => 'chrome',
              'title'     => esc_html__( 'Custom Styles (CSS)', 'advisor' ),
              'subtitle'  => esc_html__( 'The CSS will be added to header, please DO NOT add "<style>" and "</style>" tags', 'advisor' ),
          	  'default'   => '',
            ),
            array(
              'id'        => 'advisor-custom-scripts',
              'type'      => 'ace_editor',
              'mode' 	    => 'javascript',
			        'theme' 	  => 'chrome',
              'title'     => esc_html__( 'Custom Scripts (Google Analytics etc)', 'advisor' ),
              'subtitle'  => esc_html__( 'Infile scripts before closing body tags, please DO NOT add "<script>" and "</script>".', 'advisor' ),
              'desc'      => esc_html__( 'Use "jQuery" selector, instead of "$".', 'advisor' ),
              'default'   => '',
        ),
		)


    )
	);
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'advisor' ),
        'id'               => 'advisor-header',
        'subsection'       => false,
		    'icon'             => 'el el-credit-card',
        'fields'           => array(

          array(

            'id'       => 'advisor-header-layout',
            'type'     => 'select',
            'title'    => esc_html__( 'Select Header Style', 'advisor' ),
            'options'  => array (

        				'one'     => esc_html__( 'Header Style One', 'advisor' ),
        				'two'     => esc_html__( 'Header Style Two', 'advisor' ),
                'three'   => esc_html__( 'Header Style Three', 'advisor' ),
                'four'    => esc_html__( 'Header Style Four', 'advisor' ),
                'five'    => esc_html__( 'Header Style Five', 'advisor' ),
                'six'     => esc_html__( 'Header Style Six', 'advisor' ),
                'seven'   => esc_html__( 'Header Style Seven', 'advisor' ),
                'eight'   => esc_html__( 'Header Style Eight', 'advisor' ),
                'nine'    => esc_html__( 'Header Style Nine', 'advisor' )

            	),
              'default' => 'one',
            ),



            array(
              'id'       => 'advisor-header-seven-layout',
              'type'      => 'radio',
              'title'    => __('Header Layout', 'advisor'),
              'desc'      => esc_html__( 'Please select if the header layout is full width or slightly short from both left and right.', 'advisor' ),

              'options'   => array(
                'full' 	=> esc_html__( 'Full Width', 'advisor' ),
                'short' 	=> esc_html__( 'Not Full Width', 'advisor' ),
              ),
              'default'   => 'short',
              'required' => array('advisor-header-layout', '=' , 'seven')
            ),

            array(
             'id'       => 'advisor-enable-tob-bar',
             'type'     => 'checkbox',
             'title'    => esc_html__( 'Enable Top Bar', 'advisor' ),
             'desc'     => esc_html__( 'This is for header style one, two, four and nine only.', 'advisor' ),
             'default'  => '1',// 1 = on | 0 = off
             'required' => array(
               array('advisor-header-layout','=', array('one', 'two', 'four', 'five', 'seven', 'nine') )
                )

            ),
          array(

             'id'       => 'advisor-header-tagline',
             'type'     => 'text',
             'title'    => esc_html__( 'Header Tagline', 'advisor' ),
             'desc'     => esc_html__( 'It will show on the top of header, like slogan for your company', 'advisor' ),
             'default'  => 'We have over 15 years of experience',
             'required' => array(
               array('advisor-header-layout','=', array('one', 'two', 'three', 'four', 'nine') )
                )

          ),

            array(
              'id'        => 'advisor-top-bar-color-type',
              'type'      => 'radio',
              'title'     => esc_html__( 'Top Bar Color Type', 'advisor' ),
              'desc'      => esc_html__( 'Please select a color type, it can be predefined color types or custom color selection and will not be applicable to header style nine.', 'advisor' ),

              'options'   => array(
                'default' 	=> esc_html__( 'Default Skin Color', 'advisor' ),
                'custom' 		=> esc_html__( 'Select Custom Color', 'advisor' ),
              ),
              'default'   => 'default',
              'required' => array('advisor-enable-tob-bar', '=' , '1')
            ),

          array(
            'id'         => 'advisor-header-font-color',
            'type'       => 'color',
            'title'      => esc_html__( 'Header Font Color', 'advisor' ),
            'subtitle'   => esc_html__( 'Will be applied on header five menu items, header eight all elements and header six phone number, icon only if default theme skin is not selected.', 'advisor' ),
            'default'    => '#ffffff',
            'validate'   => 'color',
            'transparent'=> false,
            'required' => array('advisor-header-layout', '=' , array('five', 'six', 'eight') ),

            ),

          array(
    			  'id'         => 'advisor-header-top-bar-color',
    			  'type'       => 'color',
    			  'title'      => esc_html__( 'Header Top Bar Color', 'advisor' ),
            'subtitle'   => esc_html__( 'Will be applied on header one,two and four if default theme skin is not selected.', 'advisor' ),
    			  'default'    => '#3a2c5f',
    			  'validate'   => 'color',
    			  'transparent'=> false,
            'required' => array('advisor-top-bar-color-type', '=' , 'custom')

            ),
            array(
              'id'         => 'advisor-header-tagline-bg',
              'type'       => 'color',
              'title'      => esc_html__( 'Tag Line Background', 'advisor' ),
              'subtitle'   => esc_html__( 'For header layout one and seven only.', 'advisor' ),
              'desc'       => esc_html__( 'Will be applied custom top bar color is used.', 'advisor' ),
              'default'    => '#483a6d',
              'transparent'=> false,
              'validate'   => 'color',
              'required' => array('advisor-top-bar-color-type', '=' , 'custom'),

              ),
            array(
              'id'         => 'advisor-header-menu-background',
              'type'       => 'color',
              'title'      => esc_html__( 'Menu Background', 'advisor' ),
              'subtitle'   => esc_html__( 'For header layout two, five, six, seven and nine only.', 'advisor' ),
              'desc'       => esc_html__( 'Will be applied if default theme accent is not selected.', 'advisor' ),
              'default'    => '#3a2c5f',
              'validate'   => 'color',

              ),
      			 array(
                'id'       => 'advisor-header-phone',
                'type'     => 'text',
                'title'    => esc_html__( 'Phone Number', 'advisor' ),
                'subtitle' => esc_html__( 'e.g: +1 900 234 567', 'advisor' ),
              ),
              array(
                 'id'       => 'advisor-header-phone-label',
                 'type'     => 'text',
                 'title'    => esc_html__( 'Phone Number Label', 'advisor' ),
                 'subtitle' => esc_html__( 'e.g: Phone Number', 'advisor' ),
                 'desc'     => esc_html__( 'Applied on header four style.', 'advisor' ),
                 'default'  => esc_html__( 'Phone Number.', 'advisor' ),
                 'required' => array('advisor-header-layout', '=' , array('four', 'five') ),
               ),
               array(
                  'id'       => 'advisor-header-phone-call-us',
                  'type'     => 'text',
                  'title'    => esc_html__( 'Phone Number Call Us Label', 'advisor' ),
                  'subtitle' => esc_html__( 'e.g: Call us, Contact us @', 'advisor' ),
                ),
              array(
                 'id'       => 'advisor-header-email',
                 'type'     => 'text',
                 'validate' => 'email',
                 'title'    => esc_html__( 'Email', 'advisor' ),
                 'subtitle' => esc_html__( 'e.g: support@advisor.com', 'advisor' ),
                 'desc'     => esc_html__( 'It will show up in header one, two, three, four, seven and eight header layout. ', 'advisor' ),
                 'required' => array(
                   array('advisor-header-layout','=', array('one', 'two', 'three', 'four', 'seven', 'eight') )
                    )

               ),
              array(
                    'id'       => 'advisor-header-company',
                    'type'     => 'text',
                    'title'    => esc_html__( 'City, company or area', 'advisor' ),
                    'subtitle' => esc_html__( 'e.g: "Manhattan Hall", "New York" etc', 'advisor' ),
                    'desc'     => esc_html__( 'It will show up above menu before address in layout two.', 'advisor' ),
                    'default'  => '',
                    'required' => array(
                      array('advisor-header-layout','=', array('one', 'two', 'three', 'four', 'five', 'seven') )
                       )

                ),
  			     array(
                  'id'       => 'advisor-header-address',
                  'type'     => 'text',
                  'title'    => esc_html__( 'Office Address', 'advisor' ),
                  'desc'     => esc_html__( 'It will show up top of header, enter a short address for header layout one.', 'advisor' ),
                  'required' => array(
                    array('advisor-header-layout','=', array('one', 'two', 'three', 'four', 'five', 'seven') )
                     )
              ),
    			array(
                  'id'       => 'advisor-header-office-time',
                  'type'     => 'text',
                  'title'    => esc_html__( 'Office Timing', 'advisor' ),
                  'subtitle' => esc_html__( 'e.g: 9:00 - 17:00', 'advisor' ),
                  'desc'     => esc_html__( 'It will show up top of header', 'advisor' ),
                  'default'  => '09:00 - 17:00',
                  'required' => array(
                    array('advisor-header-layout','!=', 'six')
                     )
                ),
          array(
                  'id'       => 'advisor-header-working-days',
                  'type'     => 'text',
                  'title'    => esc_html__( 'Working Days', 'advisor' ),
                  'subtitle' => esc_html__( 'e.g: Monday to Friday or Mon to Fri ', 'advisor' ),
                  'desc'     => esc_html__( 'It will show up next to office timing.', 'advisor' ),
                  'default'  => 'Monday to Friday',
                  'required' => array(
                    array('advisor-header-layout','!=', 'six')
                     )
          ),
          array(
                 'id'       => 'advisor-get-a-quote',
                 'type'     => 'text',
                 'validate' => 'url',
                 'title'    => esc_html__( 'Get A Quote (Add URL)', 'advisor' ),
                 'subtitle' => esc_html__( 'e.g: http://yoursite.com/contact-us/', 'advisor' ),
                 'default'  => 'http://yoursite.com/contact-us/',
                 'required' => array('advisor-header-layout', '=' , array( 'three', 'six', 'nine' ) )

           ),
           array(
                  'id'       => 'advisor-get-a-label',
                  'type'     => 'text',
                  'title'    => esc_html__( 'Get A Quote Button Label', 'advisor' ),
                  'subtitle' => esc_html__( 'e.g: Get a quote', 'advisor' ),
                  'default'  => 'Get a quote',
                  'required' => array('advisor-header-layout', '=' , array( 'three', 'six', 'nine' ) )
            ),
    			 array(
                    'id'       => 'advisor-header-search-icon',
                    'type'     => 'checkbox',
                    'title'    => esc_html__( 'Show Search Icon', 'advisor' ),
                    'desc'     => esc_html__( 'It will show search icon on right side of header one, two, seven and eight only.', 'advisor' ),
                    'default'  => '1', // 1 = on | 0 = off
                    'required' => array(
                      array('advisor-header-layout','=', array('one', 'two', 'three', 'four', 'five', 'seven', 'eight') )
                       )
                ),
    			array(
                    'id'       => 'advisor-header-social-icons',
                    'type'     => 'checkbox',
                    'title'    => esc_html__( 'Show Social Icons', 'advisor' ),
                    'desc'     => esc_html__( 'Will show up in header layout two, four and seven only.', 'advisor' ),
                    'default'  => '1',// 1 = on | 0 = off
                    'required' => array(
                      array('advisor-header-layout','=', array('one', 'two', 'three', 'four', 'five', 'seven', 'eight') )
                       )
                ),

            ),

    ) );
	 Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'SlideShow', 'advisor' ),
        'id'               => 'advisor-slideshow',
        'subsection'       => false,
		    'icon'   		       => 'el-icon-lines',
        'fields'           => array(

          array(
              'id'       => 'adivor-slideshow-delay-time',
              'type'     => 'spinner',
              'title'    => esc_html__( 'Slide Delay Time', 'advisor' ),
              'subtitle' => esc_html__( 'Value in mili second, the slideshow will autoplay if set greater than 0.', 'advisor' ),
              'min'      => 0,
              'max'      => 60000,
              'step'     => 500,
              'default'  => 0,
          ),

          array(
            'id'       => 'adivor-slideshow-navigation-thumbnails',
            'type'     => 'switch',
            'title'    => esc_html__( 'Overlap Top Navigation Thumbnails', 'advisor' ),
            'default'  => false,
            'on'	     => 'Yes',
            'off'	     => 'No',
          ),

            array(
            'id'       	=> 'advisor-slide-1',
            'type'    	=> 'accordion',
            'title'     => esc_html__( 'Slide 1', 'advisor' ),
            'subtitle'  => '',
            'position'  => 'start',
        ),
        array(
			  'id'        => 'advisor-image-slide-1',
			  'type'      => 'media',
			  'title'     => esc_html__( 'Upload Image', 'advisor' ),
			  'compiler'  => 'true',
			  'mode'      => false,
			  'desc'      => esc_html__('slidehsow image upload 1900x800 px ratio at least for proper full width slideshow','advisor')
		),
        array(
            'id'       => 'heading-slide-1',
            'type'     => 'text',
            'title'    => esc_html__( 'Heading', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text heading', 'advisor' ),
        ),
		array(
            'id'       => 'text-slide-1',
            'type'     => 'textarea',
			'textarea_rows' => 2,
            'title'    => esc_html__( 'Text', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text below heading, add <span class="color-default"> tag to highlight words, "color-white" can be used for white text', 'advisor' ),
        ),

		array(
            'id'       => 'button-text-1-slide-1',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Label', 'advisor' ),
            'default'  => 'Read More',
        ),
		array(
            'id'       => 'button-link-1-slide-1',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Link', 'advisor' ),
			      'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow first button url, leave empty to hide button', 'advisor' ),
        ),
		array(
            'id'       => 'button-text-2-slide-1',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 2 Label', 'advisor' ),
            'default'  => 'Read More',
        ),
		array(
            'id'       => 'button-link-2-slide-1',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 2 Link', 'advisor' ),
			      'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow second button url', 'advisor' ),
        ),
		array(
            'id'       => 'text-align-slide-1',
            'type'     => 'select',
            'title'    => esc_html__( 'Text Align', 'advisor' ),
            'options'  => array (

				'text-left'     => esc_html__( 'Left', 'advisor' ),
				'text-center'   => esc_html__( 'Center', 'advisor' ),
				'text-right'    => esc_html__( 'Right', 'advisor' ),

			),
			'default'  => 'text-left',
        ),
		array(
            'id'       => 'heading-nav-slide-1',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slide Navigation text heading', 'advisor' ),
        ),
		array(
            'id'       => 'text-nav-slide-1',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slideshow navigation next below heading', 'advisor' ),
        ),
        array(
            'id'        => 'advisor-slide-1-end',
            'type'      => 'accordion',
            'position'  => 'end'
        ),

        array(
            'id'       => 'advisor-slide-2',
            'type'     => 'accordion',
            'title'    => esc_html__( 'Slide 2', 'advisor' ),
            'position'  => 'start',
            'open'      => false
        ),
       array(
			  'id'        => 'advisor-image-slide-2',
			  'type'      => 'media',
			  'title'     => esc_html__( 'Upload Image', 'advisor' ),
			  'compiler'  => 'true',
			  'mode'      => false,
			  'desc'      => esc_html__('slidehsow image upload 1900x800 px ratio at least for proper full width slideshow','advisor')
		),
        array(
            'id'       => 'heading-slide-2',
            'type'     => 'text',
            'title'    => esc_html__( 'Heading', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text heading', 'advisor' ),
        ),
		array(
            'id'       => 'text-slide-2',
            'type'     => 'textarea',
			'textarea_rows' => 2,
            'title'    => esc_html__( 'Text', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text below heading, add <span class="color-default"> tag to highlight words', 'advisor' ),
        ),

		array(
            'id'       => 'button-text-1-slide-2',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Label', 'advisor' ),
            'default'  => 'Read More',
        ),
		array(
            'id'       => 'button-link-1-slide-2',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Link', 'advisor' ),
			      'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow first button url', 'advisor' ),
        ),
		array(
            'id'       => 'button-text-2-slide-2',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 2 Label', 'advisor' ),
            'subtitle' => esc_html__( '', 'advisor' ),
            'default'  => '',
        ),
		array(
            'id'       => 'button-link-2-slide-2',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 2 Link', 'advisor' ),
			      'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow second button url', 'advisor' ),
        ),
		array(
            'id'       => 'text-align-slide-2',
            'type'     => 'select',
            'title'    => esc_html__( 'Text Align', 'advisor' ),
            'options'  => array (

				'text-left'     => esc_html__( 'Left', 'advisor' ),
				'text-center'   => esc_html__( 'Center', 'advisor' ),
				'text-right'    => esc_html__( 'Right', 'advisor' ),

			),
			'default'  => 'text-left',
        ),
		array(
            'id'       => 'heading-nav-slide-2',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slide Navigation text heading', 'advisor' ),
        ),
		array(
            'id'       => 'text-nav-slide-2',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slideshow navigation next below heading', 'advisor' ),
        ),
        array(
            'id'        => 'advisor-slide-2-end',
            'type'      => 'accordion',
            'position'  => 'end'
        ),
		array(
            'id'       => 'advisor-slide-3',
            'type'     => 'accordion',
            'title'    => esc_html__( 'Slide 3', 'advisor' ),
            'position'  => 'start',
            'open'      => false
        ),
        array(
			  'id'        => 'advisor-image-slide-3',
			  'type'      => 'media',
			  'title'     => esc_html__( 'Upload Image', 'advisor' ),
			  'compiler'  => 'true',
			  'mode'      => false,
			  'desc'      => esc_html__('slidehsow image upload 1900x800 px ratio at least for proper full width slideshow','advisor')
		),
        array(
            'id'       => 'heading-slide-3',
            'type'     => 'text',
            'title'    => esc_html__( 'Heading', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text heading', 'advisor' ),
        ),
		array(
            'id'       => 'text-slide-3',
            'type'     => 'textarea',
			      'textarea_rows' => 2,
            'title'    => esc_html__( 'Text', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text below heading, add <span class="color-default"> tag to highlight words', 'advisor' ),
        ),

		array(
            'id'       => 'button-text-1-slide-3',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Label', 'advisor' ),
            'default'  => '',
        ),
		array(
            'id'       => 'button-link-1-slide-3',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Link', 'advisor' ),
			      'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow first button url', 'advisor' ),
        ),
		array(
            'id'       => 'button-text-2-slide-3',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 2 Label', 'advisor' ),
            'subtitle' => esc_html__( '', 'advisor' ),
            'default'  => 'Read More',
        ),
		array(
            'id'       => 'button-link-2-slide-3',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 2 Link', 'advisor' ),
			      'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow second button url', 'advisor' ),
        ),
		array(
            'id'       => 'text-align-slide-3',
            'type'     => 'select',
            'title'    => esc_html__( 'Text Align', 'advisor' ),
            'options'  => array (

      				'text-left'     => esc_html__( 'Left', 'advisor' ),
      				'text-center'   => esc_html__( 'Center', 'advisor' ),
      				'text-right'    => esc_html__( 'Right', 'advisor' ),

			      ),
			'default'  => 'text-left',
        ),
		array(
            'id'       => 'heading-nav-slide-3',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slide Navigation text heading', 'advisor' ),
        ),
		array(
            'id'       => 'text-nav-slide-3',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slideshow navigation next below heading', 'advisor' ),
        ),
        array(
            'id'        => 'advisor-slide-3-end',
            'type'      => 'accordion',
            'position'  => 'end'
        ),
		array(
            'id'       => 'advisor-slide-4',
            'type'     => 'accordion',
            'title'    => esc_html__( 'Slide 4', 'advisor' ),
            'position'  => 'start',
            'open'      => false
        ),
        array(
			  'id'        => 'advisor-image-slide-4',
			  'type'      => 'media',
			  'title'     => esc_html__( 'Upload Image', 'advisor' ),
			  'compiler'  => 'true',
			  'mode'      => false,
			  'desc'      => esc_html__('slidehsow image upload 1900x800 px ratio at least for proper full width slideshow','advisor')
		),
        array(
            'id'       => 'heading-slide-4',
            'type'     => 'text',
            'title'    => esc_html__( 'Heading', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text heading', 'advisor' ),
        ),
		array(
            'id'       => 'text-slide-4',
            'type'     => 'textarea',
			      'textarea_rows' => 2,
            'title'    => esc_html__( 'Text', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text below heading, add <span class="color-default"> tag to highlight words', 'advisor' ),
        ),

		array(
            'id'       => 'button-text-1-slide-4',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Label', 'advisor' ),
            'default'  => 'Read More',
        ),
		array(
            'id'       => 'button-link-1-slide-4',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Link', 'advisor' ),
			      'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow first button url', 'advisor' ),
        ),
		array(
          'id'       => 'button-text-2-slide-4',
          'type'     => 'text',
          'title'    => esc_html__( 'Button 2 Label', 'advisor' ),
          'subtitle' => esc_html__( '', 'advisor' ),
          'default'  => 'Read More',
        ),
		array(
            'id'       => 'button-link-2-slide-4',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 2 Link', 'advisor' ),
			      'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow second button url', 'advisor' ),
        ),
		array(
            'id'       => 'text-align-slide-4',
            'type'     => 'select',
            'title'    => esc_html__( 'Text Align', 'advisor' ),
            'options'  => array (

				'text-left'     => esc_html__( 'Left', 'advisor' ),
				'text-center'   => esc_html__( 'Center', 'advisor' ),
				'text-right'    => esc_html__( 'Right', 'advisor' ),

			),
			'default'  => 'text-left',
        ),
		array(
            'id'       => 'heading-nav-slide-4',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slide Navigation text heading', 'advisor' ),
        ),
		array(
            'id'       => 'text-nav-slide-4',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slideshow navigation next below heading', 'advisor' ),
        ),
        array(
            'id'        => 'advisor-slide-4-end',
            'type'      => 'accordion',
            'position'  => 'end'
        ),

        array(
            'id'       => 'advisor-slide-5',
            'type'     => 'accordion',
            'title'    => esc_html__( 'Slide 5', 'advisor' ),
            'position'  => 'start',
            'open'      => false
        ),
       array(
        'id'        => 'advisor-image-slide-5',
        'type'      => 'media',
        'title'     => esc_html__( 'Upload Image', 'advisor' ),
        'compiler'  => 'true',
        'mode'      => false,
        'desc'      => esc_html__('slidehsow image upload 1900x800 px ratio at least for proper full width slideshow','advisor')
    ),
        array(
            'id'       => 'heading-slide-5',
            'type'     => 'text',
            'title'    => esc_html__( 'Heading', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text heading', 'advisor' ),
        ),
    array(
            'id'       => 'text-slide-5',
            'type'     => 'textarea',
            'textarea_rows' => 2,
            'title'    => esc_html__( 'Text', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text below heading, add <span class="color-default"> tag to highlight words', 'advisor' ),
        ),

    array(
            'id'       => 'button-text-1-slide-5',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Label', 'advisor' ),
            'default'  => 'Read More',
        ),
    array(
            'id'       => 'button-link-1-slide-5',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Link', 'advisor' ),
            'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow first button url', 'advisor' ),
        ),
    array(
            'id'       => 'button-text-2-slide-5',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 2 Label', 'advisor' ),
            'subtitle' => esc_html__( '', 'advisor' ),
            'default'  => '',
        ),
    array(
            'id'       => 'button-link-2-slide-5',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 2 Link', 'advisor' ),
            'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow second button url', 'advisor' ),
        ),
    array(
            'id'       => 'text-align-slide-5',
            'type'     => 'select',
            'title'    => esc_html__( 'Text Align', 'advisor' ),
            'options'  => array (

        'text-left'     => esc_html__( 'Left', 'advisor' ),
        'text-center'   => esc_html__( 'Center', 'advisor' ),
        'text-right'    => esc_html__( 'Right', 'advisor' ),

      ),
      'default'  => 'text-left',
        ),
    array(
            'id'       => 'heading-nav-slide-5',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slide Navigation text heading', 'advisor' ),
        ),
    array(
            'id'       => 'text-nav-slide-5',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slideshow navigation next below heading', 'advisor' ),
        ),
        array(
            'id'        => 'advisor-slide-5-end',
            'type'      => 'accordion',
            'position'  => 'end'
        ),

        array(
            'id'       => 'advisor-slide-6',
            'type'     => 'accordion',
            'title'    => esc_html__( 'Slide 6', 'advisor' ),
            'position'  => 'start',
            'open'      => false
        ),
       array(
        'id'        => 'advisor-image-slide-6',
        'type'      => 'media',
        'title'     => esc_html__( 'Upload Image', 'advisor' ),
        'compiler'  => 'true',
        'mode'      => false,
        'desc'      => esc_html__('slidehsow image upload 1900x800 px ratio at least for proper full width slideshow','advisor')
    ),
        array(
            'id'       => 'heading-slide-6',
            'type'     => 'text',
            'title'    => esc_html__( 'Heading', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text heading', 'advisor' ),
        ),
    array(
            'id'       => 'text-slide-6',
            'type'     => 'textarea',
            'textarea_rows' => 2,
            'title'    => esc_html__( 'Text', 'advisor' ),
            'subtitle' => esc_html__( 'slideshow text below heading, add <span class="color-default"> tag to highlight words', 'advisor' ),
        ),

    array(
            'id'       => 'button-text-1-slide-6',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Label', 'advisor' ),
            'default'  => 'Read More',
        ),
    array(
            'id'       => 'button-link-1-slide-6',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 1 Link', 'advisor' ),
            'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow first button url', 'advisor' ),
        ),
    array(
            'id'       => 'button-text-2-slide-6',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 2 Label', 'advisor' ),
            'subtitle' => esc_html__( '', 'advisor' ),
            'default'  => '',
        ),
    array(
            'id'       => 'button-link-2-slide-6',
            'type'     => 'text',
            'title'    => esc_html__( 'Button 2 Link', 'advisor' ),
            'validate' => 'url',
            'subtitle' => esc_html__( 'slideshow second button url', 'advisor' ),
        ),
    array(
            'id'       => 'text-align-slide-6',
            'type'     => 'select',
            'title'    => esc_html__( 'Text Align', 'advisor' ),
            'options'  => array (

        'text-left'     => esc_html__( 'Left', 'advisor' ),
        'text-center'   => esc_html__( 'Center', 'advisor' ),
        'text-right'    => esc_html__( 'Right', 'advisor' ),

      ),
      'default'  => 'text-left',
        ),
    array(
            'id'       => 'heading-nav-slide-6',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slide Navigation text heading', 'advisor' ),
        ),
    array(
            'id'       => 'text-nav-slide-6',
            'type'     => 'text',
            'title'    => esc_html__( 'Navigation Heading', 'advisor' ),
            'subtitle' => esc_html__( 'Slideshow navigation next below heading', 'advisor' ),
        ),
        array(
            'id'        => 'advisor-slide-6-end',
            'type'      => 'accordion',
            'position'  => 'end'
        ),


        )
    ) );
    Redux::setSection( $opt_name, array(
          'title'            => esc_html__( 'Typography', 'advisor' ),
          'id'               => 'advisor-typography',
  		    'icon'             => 'el el-cog-alt',
          'fields'           => array(
            array(
      			  'id'         => 'advisor-primary-btn-hover',
      			  'type'       => 'color',
      			  'title'      => esc_html__( 'Primary Button Hover', 'advisor' ),
      			  'default'    => '#047f19',
      			  'validate'   => 'color',
      			  'transparent'=> false,
              'subtitle' => esc_html__( 'Will be applied if theme accent is not selected.', 'advisor' ),
              ),
              array(
                'id'         => 'advisor-btn-link-color',
                'type'       => 'color',
                'title'      => esc_html__( 'Button Hover/Focus Text Color', 'advisor' ),
                'default'    => '#047f19',
                'validate'   => 'color',
                'transparent'=> false,
                'subtitle' => esc_html__( 'Will be applied if theme accent is not selected.', 'advisor' ),
                ),

            array(
              'id'            => 'advisor-typography-h1',
              'type'          => 'typography',
              'title'         => esc_html__( 'Typography Heading H1', 'advisor' ),
              'google'        => true,
              'font-backup'   => false,
              'font-style'    => true,
              'font-weight'   => true,
              'text-align'		=> false,
              'font-size'     => true,
              'line-height'   => false,
              'color'         => true,
              'all_styles'    => false,
              'output'        => array( 'h1','.h1' ),
              'units'         => 'px',

            ),
            array(
              'id'            => 'advisor-typography-h2',
              'type'          => 'typography',
              'title'         => esc_html__( 'Typography Heading H2', 'advisor' ),
              'google'        => true,
              'font-backup'   => false,
              'font-style'    => true,
              'font-weight'   => true,
              'text-align'		=> false,
              'font-size'     => true,
              'line-height'   => false,
              'color'         => true,
              'all_styles'    => false,
              'output'        => array( 'h2','h2' ),
              'units'         => 'px',

            ),
            array(
              'id'            => 'advisor-typography-h3',
              'type'          => 'typography',
              'title'         => esc_html__( 'Typography Heading H3', 'advisor' ),
              'google'        => true,
              'font-backup'   => false,
              'font-style'    => true,
              'font-weight'   => true,
              'text-align'		=> false,
              'font-size'     => true,
              'line-height'   => false,
              'color'         => true,
              'all_styles'    => false,
              'output'        => array( 'h3','.h3' ),
              'units'         => 'px',

            ),
            array(
              'id'            => 'advisor-typography-h4',
              'type'          => 'typography',
              'title'         => esc_html__( 'Typography Heading H4', 'advisor' ),
              'google'        => true,
              'font-backup'   => false,
              'font-style'    => true,
              'font-weight'   => true,
              'text-align'		=> false,
              'font-size'     => true,
              'line-height'   => false,
              'color'         => true,
              'all_styles'    => false,
              'output'        => array( 'h4','.h4' ),
              'units'         => 'px',

            ),
            array(
              'id'            => 'advisor-typography-h5',
              'type'          => 'typography',
              'title'         => esc_html__( 'Typography Heading H5', 'advisor' ),
              'google'        => true,
              'font-backup'   => false,
              'font-style'    => true,
              'font-weight'   => true,
              'text-align'		=> false,
              'font-size'     => true,
              'line-height'   => false,
              'color'         => true,
              'all_styles'    => false,
              'output'        => array( 'h5','.h5' ),
              'units'         => 'px',

            ),
            array(
              'id'            => 'advisor-typography-body',
              'type'          => 'typography',
              'title'         => esc_html__( 'Typography Body', 'advisor' ),
              'google'        => true,
              'font-backup'   => false,
              'font-style'    => false,
              'font-weight'   => true,
              'text-align'		=> false,

              'font-size'     => true,
              'line-height'   => false,
              'color'         => false,
              'all_styles'    => false,    // Enable all Google Font style/weight variations to be added to the page
              'output'        => array( 'body','html','input','textarea','p' ), // An array of CSS selectors to apply this font style to dynamically
              'units'         => 'px',


            ),
          )

      ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Media', 'advisor' ),
        'id'               => 'advisor-social',
		    'icon'             => 'el el-myspace',
        'fields'           => array(
            array(
                'id'       => 'advisor-facebook-url',
                'type'     => 'text',
				        'validate' => 'url',
                'title'    => esc_html__( 'Facebook', 'advisor' ),
                'desc'     => esc_html__( 'Add facebook URL', 'advisor' ),
                'default'  => 'https://www.facebook.com/advisor-theme'
            ),
			array(
                'id'       => 'advisor-twitter-url',
                'type'     => 'text',
				        'validate' => 'url',
                'title'    => esc_html__( 'Twitter', 'advisor' ),
                'desc'     => esc_html__( 'Add Twitter URL', 'advisor' ),
                'default'  => 'https://www.twitter.com/advisor-theme'
            ),
			array(
                'id'       => 'advisor-google-url',
                'type'     => 'text',
				        'validate' => 'url',
                'title'    => esc_html__( 'Google+', 'advisor' ),
                'desc'     => esc_html__( 'Add Google+ URL', 'advisor' ),
                'default'  => 'https://www.google.com/advisor-theme'
            ),
			array(
                'id'       => 'advisor-instagram-url',
                'type'     => 'text',
				        'validate' => 'url',
                'title'    => esc_html__( 'Instagram', 'advisor' ),
                'desc'     => esc_html__( 'Add Instagram URL', 'advisor' ),
                'default'  => 'https://www.instagram.com/advisor-theme'
            ),
			array(
                'id'       => 'advisor-linkedin-url',
                'type'     => 'text',
				        'validate' => 'url',
                'title'    => esc_html__( 'Linkedin', 'advisor' ),
                'desc'     => esc_html__( 'Add Linkedin URL', 'advisor' ),
                'default'  => 'https://www.linkedin.com/advisor-theme'
            ),

        )
    ) );


        Redux::setSection( $opt_name, array(
            'title'            => esc_html__( 'Post Type', 'advisor' ),
            'id'               => 'advisor-post',
            'icon'             => 'el el-briefcase',
            'fields'           => array(

              array(
                    'id'       => 'advisor-post-name',
                    'type'     => 'text',
                    'title'    => esc_html__( "Change 'Case Studies' Post Name", 'advisor' ),
                    'subtitle' => esc_html__( 'e.g: Portfolio', 'advisor'),
                    'desc'     => esc_html__( "If empty or invalid post name is provided, default post name 'Case Studies' will be used.", 'advisor' ),
                    'default'  => 'Case Studies',
                ),

            array(
                  'id'       => 'advisor-post-slug',
                  'type'     => 'text',
                  'title'    => esc_html__( "Change 'Case Studies' Post slug", 'advisor' ),
                  'subtitle' => esc_html__( 'e.g: portfolio', 'advisor' ),
                  'desc'     => __( "If empty or invalid post slug is provided, default post name 'case-study' will be used.
                  <br><b>Note:</b> If more than one word is used as post name, they must be separated with - (dash) only.", 'advisor' ),
                  'default'  => 'case-study',

              ),

            )
        ) );


    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'advisor' ),
        'id'               => 'advisor-footer',
		    'icon'             => 'el el-download-alt',
        'fields'           => array(

          array(
          'id'       => 'advisor-footer-style',
          'type'     => 'select',
          'title'    => __('Footer Style', 'advisor'),
          'options'  => array(
              'style1' => 'Style 1',
              'style2' => 'Style 2',
              ),
              'default'  => 'style1',
          ),
          array(
            'id'       => 'advisor-footer-widgets',
            'type'     => 'switch',
            'title'    => __('Show Widgets', 'advisor'),
            'default'  => false,
            'on'	     => 'Yes',
            'off'	     => 'No',
            'required' => array(
                array('advisor-footer-style', 'equals', 'style2'),
                array('advisor-footer-style', '!=', 'style1')
            ),
          ),
          array(
              'id'       => 'advisor-footer-logo-text-widget',
              'type'     => 'checkbox',
              'title'    => esc_html__( 'Enable Footer Logo and Text', 'advisor' ),
              'desc'     => esc_html__( 'It will enable footer text and logo.', 'advisor' ),
              'default'  => '1',// 1 = on | 0 = off,
              'required' => array(
                  array('advisor-footer-style', 'equals', 'style1'),
                  array('advisor-footer-style', '!=', 'style2')
              ),
          ),
            array(
      			  'id'        => 'advisor-footer-logo',
      			  'type'      => 'media',
      			  'title'     => esc_html__( 'Footer Logo', 'advisor' ),
      			  'compiler'  => 'true',
      			  'mode'      => false,
      			  'desc'      => esc_html__('Please Upload Logo','advisor'),
              'required' => array('advisor-footer-logo-text-widget','=','1'),
              'required' => array(
                  array('advisor-footer-style', 'equals', 'style1'),
                  array('advisor-footer-style', '!=', 'style2')
              ),
      			),
            array(
                      'id'       => 'advisor-footer-text',
                      'type'     => 'textarea',
                      'title'    => esc_html__( 'Footer Text', 'advisor' ),
                      'desc'     => esc_html__( 'Add text to show next to footer logo in footer top area.', 'advisor' ),
                      'required' => array('advisor-footer-logo-text-widget','=','1'),
                      'default'  => 'Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod tempor Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem or phone +11 987 654 3210 ipsum quia dolor sit amet, consectetur.',
                      'required' => array(
                          array('advisor-footer-style', 'equals', 'style1'),
                          array('advisor-footer-style', '!=', 'style2')
                      ),
                  ),
            array(
                'id'       => 'advisor-footer-color',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Layout', 'advisor' ),
                'desc'     => esc_html__( 'Select footer layout, it can be dark or light.', 'advisor' ),
                'options'  => array (

                  'light'  => esc_html__( 'Light', 'advisor' ),
                  'dark'   => esc_html__( 'Dark', 'advisor' ),
                  'custom'   => esc_html__( 'Custom Colors', 'advisor' ),

                ),
                'default'  => 'light',
      ),
      array(
        'id'         => 'advisor-footer-top-background-color',
        'type'       => 'color',
        'title'      => esc_html__( 'Footer Top Background Color', 'advisor' ),
        'subtitle'   => esc_html__( 'Will be applied on footer top area.', 'advisor' ),
        'default'    => '#fff',
        'validate'   => 'color',
        'transparent'=> false,
        'required' => array('advisor-footer-color', '=' , 'custom')

        ),
        array(
          'id'         => 'advisor-footer-bottom-background-color',
          'type'       => 'color',
          'title'      => esc_html__( 'Footer Bottom Background Color', 'advisor' ),
          'subtitle'   => esc_html__( 'Will be applied on footer bottom area.', 'advisor' ),
          'default'    => '#fff',
          'validate'   => 'color',
          'transparent'=> false,
          'required' => array('advisor-footer-color', '=' , 'custom')

          ),
          array(
            'id'         => 'advisor-footer-font-color',
            'type'       => 'color',
            'title'      => esc_html__( 'Footer Font Color', 'advisor' ),
            'subtitle'   => esc_html__( 'Will be applied on footer.', 'advisor' ),
            'default'    => '#000',
            'validate'   => 'color',
            'transparent'=> false,
            'required' => array('advisor-footer-color', '=' , 'custom')

            ),
			array(
                'id'       => 'advisor-footer-address-widget',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Enable Address Widget', 'advisor' ),
                'desc'     => esc_html__( 'It will show up on top left of the footer', 'advisor' ),
                'default'  => '1', // 1 = on | 0 = off
                'required' => array(
                    array('advisor-footer-style', 'equals', 'style1'),
                    array('advisor-footer-style', '!=', 'style2')
                ),
            ),
			array(
                'id'       => 'advisor-footer-phone',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Phone Number', 'advisor' ),
                'desc'     => esc_html__( 'Add phone number to show in footer with complete address', 'advisor' ),
                'default'  => '+1 900 234 567',
				        'required' => array('advisor-footer-address-widget','=','1'),
            ),
			array(
                'id'       => 'advisor-footer-email',
                'type'     => 'text',
				        'validate' => 'email',
                'title'    => esc_html__( 'Footer Email', 'advisor' ),
                'desc'     => esc_html__( 'Add email to show in footer with complete address', 'advisor' ),
                'default'  => 'support@avisor-theme.com',
				        'required' => array('advisor-footer-address-widget','=','1'),
            ),
			array(
                'id'       => 'advisor-footer-company',
                'type'     => 'text',
                'title'    => esc_html__( 'Company', 'advisor' ),
                'desc'     => esc_html__( 'Add company name to show in footer with complete address', 'advisor' ),
                'default'  => 'Manhatta  Hall',
				        'required' => array('advisor-footer-address-widget','=','1'),
            ),
			array(
                'id'       => 'advisor-footer-address',
                'type'     => 'text',
                'title'    => esc_html__( 'Full Address', 'advisor' ),
                'desc'     => esc_html__( 'Add address to show in footer with complete address', 'advisor' ),
                'default'  => 'Advisor Ltd 1258, Melbourne, australia',
				        'required' => array('advisor-footer-address-widget','=','1'),
            ),
            array(
                      'id'       => 'advisor-footer-copyrights',
                      'type'     => 'textarea',
                      'title'    => esc_html__( 'Copy Rights Text', 'advisor' ),
                      'desc'     => esc_html__( '', 'advisor' ),
                      'default'  => 'Coyright 2016 Advisor. All rights reserved.',
                  ),
      			array(
                      'id'       => 'advisor-footer-tagline',
                      'type'     => 'text',
                      'title'    => esc_html__( 'Footer Tagline', 'advisor' ),
                      'desc'     => esc_html__( '', 'advisor' ),
                      'default'  => 'Designed by <a href="#.">Brighthemes</a>',
                  ),


        )
    ) );


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'advisor' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'advisor' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
