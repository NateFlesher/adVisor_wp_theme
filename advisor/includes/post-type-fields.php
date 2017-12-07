<?php
add_filter( 'rwmb_meta_boxes', 'advisor_meta_boxes' );
function advisor_meta_boxes( $meta_boxes ) {

	$meta_boxes[] = array(
        'title'      => esc_html__( 'Member Details', 'advisor' ),
        'post_types' => 'team',
        'fields'     => array(
			array(
                'id'   => 'advisor_member_bio',
                'name' => esc_html__( 'Bio', 'advisor' ),
                'type' => 'WYSIWYG',
            ),
            array(
                'id'   => 'advisor_member_designation',
                'name' => esc_html__( 'Designation', 'advisor' ),
                'type' => 'text',
            ),
			array(
                'id'   => 'advisor_member_facebook',
                'name' => esc_html__( 'Facebook Link', 'advisor' ),
                'type' => 'url',
            ),
			array(
                'id'   => 'advisor_member_twitter',
                'name' => esc_html__( 'Twitter Link', 'advisor' ),
                'type' => 'url',
            ),
			array(
                'id'   => 'advisor_member_youtube',
                'name' => esc_html__( 'Youtube Link', 'advisor' ),
                'type' => 'url',
            ),

        ),
    );
	 $meta_boxes[] = array(
        'title'      => esc_html__( 'Testimonial Details', 'advisor' ),
        'post_types' => 'testimonial',
        'fields'     => array(
			array(
					'id'   => 'advisor_hide_stars',
					'name' => esc_html__( 'Hide Rating Stars', 'advisor' ),
					'type' => 'checkbox',
			),
			array(
					'id'   => 'advisor_stars_rating',
					'name' => esc_html__( 'Star Rating', 'advisor' ),
					'type' => 'Select',
					'options' => array(
								'one' 	=> 1,
								'two' 	=> 2,
								'three' => 3,
								'four' 	=> 4,
								'five' 	=> 5,
                ),
			),
            array(
                'id'   => 'advisor_client_designation',
                'name' => esc_html__( 'Designation', 'advisor' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'advisor_client_feedback',
                'name' => esc_html__( 'Client Feedback', 'advisor' ),
                'type' => 'textarea',
				'rows' => 10
            ),
        ),
    );
	$meta_boxes[] = array(
        'title'      => esc_html__( 'Case Study Details', 'advisor' ),
        'post_types' => 'case',
        'fields'     => array(
			array(
					'id'         => 'advisor_case_type',
					'name'       => esc_html__( 'Case Type', 'advisor' ),
					'type'       => 'taxonomy',
					'taxonomy'   => 'case-study-type',
					'field_type' => 'select',
					'multiple'   => false
			),

			array(
					'id'   => 'advisor_case_gallery',
					'name' => esc_html__( 'Case Images Gallery', 'advisor' ),
					'type' => 'plupload_image',
			),

            array(
                'id'   => 'advisor_case_challenge',
                'name' => esc_html__( 'Case Challenge', 'advisor' ),
                'type' => 'WYSIWYG',
            ),
             array(
                'id'   => 'advisor_case_solution',
                'name' => esc_html__( 'Case Solution', 'advisor' ),
                'type' => 'WYSIWYG',
            ),
			array(
                'id'   => 'advisor_case_result',
                'name' => esc_html__( 'Case Results', 'advisor' ),
                'type' => 'WYSIWYG',
            ),
        ),
    );
		$meta_boxes[] = array(
	        'title'      => esc_html__( 'Post Details', 'advisor' ),
	        'post_types' => 'post',
	        'fields'     => array(
				array(
						'id'   => 'advisor_post_gallery',
						'name' => esc_html__( 'Images Gallery', 'advisor' ),
						'type' => 'plupload_image',
				),
				array(
						'id'   => 'advisor_post_bordered',
						'name' => esc_html__( 'Post Bordered/Featured (Sidebar Layout)', 'advisor' ),
						'type' => 'checkbox',
				),

	        ),
	    );

			$meta_boxes[] = array(
	         'title'      => esc_html__( 'Page Top Layout', 'advisor' ),
	         'post_types' => array('page', 'post', 'team', 'case'),
	         'fields'     => array(

						 array(
							 'id'   => 'advisor_page_sidebar',
							 'name' => esc_html__( 'Page Sidebar Position', 'advisor' ),
							 'type' => 'select',
							 'options' => array(

										 'sidebar-left'  => 'Left',
										 'sidebar-right' => 'Right',

								),
								'std' => 'sidebar-left',
							 'desc' => esc_html__( "This options allows you to select the postion (Left/Right) of sidebar on 'Page With Sidebar' and 'Services' templates only.", 'advisor' )

							),
						 array(
			 					'id'   => 'advisor_page_top_layout',
			 					'name' => esc_html__( 'Page Top Layout', 'advisor' ),
			 					'type' => 'select',
			 					'options' => array(
			 								'none' 	=> 'None',
			 								'banner' 	=> 'Page Banner',
			 								'slideshow' => 'SlideShow',

			           ),
								 'std' => 'banner',
		 						'desc' => 'This options allows you to select the layout for your page i.e on top of the page below header there will be a page banner with breadcrumbs, slideshow or none.'

							 ),
							 array(

	                 'id'   => 'advisor_banner_button_label',
	                 'name' => esc_html__( 'Banner Button Label', 'advisor' ),
	                 'type' => 'text',
									 'std'  => 'Contact Us',
									 //'visible' => array('advisor_page_top_layout', '=', 'banner')
	             ),
							 array(

	                 'id'   => 'advisor_banner_button_url',
	                 'name' => esc_html__( 'Banner Button URL', 'advisor' ),
	                 'type' => 'url',
									 'std'  => ''
									 //'visible' => array('advisor_page_top_layout', '=', 'banner')

	             ),
							 array(
			 						'id'   => 'advisor_banner_enable_breadcrumbs',
			 						'name' => esc_html__( 'Enable Breadcrumbs', 'advisor' ),
			 						'type' => 'checkbox',
									'std'  => '1',
									//'visible' => array('advisor_page_top_layout', '=', 'banner')
			 				),
							array(

									'id'   => 'advisor_banner_font_color',
									'name' => esc_html__( 'Banner Font Color', 'advisor' ),
									'type' => 'color',
									'std'  => '',
									//'visible' => array('advisor_page_top_layout', '=', 'banner')
							),
							array(

									'id'   => 'advisor_banner_bg_color',
									'name' => esc_html__( 'Banner Background Color', 'advisor' ),
									'type' => 'color',
									'std'  => '',
									//'visible' => array('advisor_page_top_layout', '=', 'banner')
							),
							array(

									'id'   => 'advisor_banner_bg_image',
									'name' => esc_html__( 'Banner Background Image', 'advisor' ),
									'type' => 'image_advanced',
									'max_file_uploads' => 1,
									'std'  => '',
									//'visible' => array('advisor_page_top_layout', '=', 'banner')
							),

	      ));


					$meta_boxes[] = array(
							 'title'      => esc_html__( 'For Desktop - Page Width: more than 1199px', 'advisor' ),
							 'post_types' => 'page',
							 'fields'     => array(

								array(

										'id'   => 'advisor_1199_margin_top',
										'name' => esc_html__( 'Row Class Margin Top(px)', 'advisor' ),
										'type' => 'number',
								),
								array(

									 'id'   => 'advisor_1199_margin_left',
									 'name' => esc_html__( 'Row Class Margin Left(px)', 'advisor' ),
									 'type' => 'number',
							 ),
							 array(

									'id'   => 'advisor_1199_margin_bottom',
									'name' => esc_html__( 'Row Class Margin Bottom(px)', 'advisor' ),
									'type' => 'number',
								),
								array(

									 'id'   => 'advisor_1199_margin_right',
									 'name' => esc_html__( 'Row Class Margin Right(px)', 'advisor' ),
									 'type' => 'number',
							 ),


						));

						$meta_boxes[] = array(
								 'title'      => esc_html__( 'For Desktop - Page Width: 992px to 1199px', 'advisor' ),
								 'post_types' => 'page',
								 'fields'     => array(

									array(

											'id'   => 'advisor_992_margin_top',
											'name' => esc_html__( 'Row Class Margin Top(px)', 'advisor' ),
											'type' => 'number',
									),
									array(

										 'id'   => 'advisor_992_margin_right',
										 'name' => esc_html__( 'Row Class Margin Right(px)', 'advisor' ),
										 'type' => 'number',
								 ),
								 array(

										'id'   => 'advisor_992_margin_bottom',
										'name' => esc_html__( 'Row Class Margin Bottom(px)', 'advisor' ),
										'type' => 'number',
									),
									array(

										 'id'   => 'advisor_992_margin_left',
										 'name' => esc_html__( 'Row Class Margin Left(px)', 'advisor' ),
										 'type' => 'number',
								 ),



							));


						$meta_boxes[] = array(
							'title'      => esc_html__( 'For Tab - Page Width: 769px to 991px', 'advisor' ),
								 'post_types' => 'page',
								 'fields'     => array(

									array(

											'id'   => 'advisor_769_margin_top',
											'name' => esc_html__( 'Row Class Margin Top(px)', 'advisor' ),
											'type' => 'number',
									),
									array(

										 'id'   => 'advisor_769_margin_right',
										 'name' => esc_html__( 'Row Class Margin Right(px)', 'advisor' ),
										 'type' => 'number',
								 ),

								 array(

										'id'   => 'advisor_769_margin_bottom',
										'name' => esc_html__( 'Row Class Margin Bottom(px)', 'advisor' ),
										'type' => 'number',
									),
									array(

										 'id'   => 'advisor_769_margin_left',
										 'name' => esc_html__( 'Row Class Margin Left(px)', 'advisor' ),
										 'type' => 'number',
								 ),



							));


							$meta_boxes[] = array(
								'title'      => esc_html__( 'For Tab (portrait) - Page Width: 481 to 768px', 'advisor' ),
									 'post_types' => 'page',
									 'fields'     => array(

										array(

												'id'   => 'advisor_481_margin_top',
												'name' => esc_html__( 'Row Class Margin Top(px)', 'advisor' ),
												'type' => 'number',
										),
										array(

											 'id'   => 'advisor_481_margin_right',
											 'name' => esc_html__( 'Row Class Margin Right(px)', 'advisor' ),
											 'type' => 'number',
									 ),
									 array(

											'id'   => 'advisor_481_margin_bottom',
											'name' => esc_html__( 'Row Class Margin Bottom(px)', 'advisor' ),
											'type' => 'number',
										),
										array(

											 'id'   => 'advisor_481_margin_left',
											 'name' => esc_html__( 'Row Class Margin Left(px)', 'advisor' ),
											 'type' => 'number',
									 ),



								));

								$meta_boxes[] = array(
									'title'      => esc_html__( 'For Mobile - Page Width: Upto 480px', 'advisor' ),
										 'post_types' => 'page',
										 'fields'     => array(

											array(

													'id'   => 'advisor_480_mobile_margin_top',
													'name' => esc_html__( 'Row Class Margin Top(px)', 'advisor' ),
													'type' => 'number',
											),
											array(

												 'id'   => 'advisor_480_mobile_margin_right',
												 'name' => esc_html__( 'Row Class Margin Right(px)', 'advisor' ),
												 'type' => 'number',
										 ),

										 array(

												'id'   => 'advisor_480_mobile_margin_bottom',
												'name' => esc_html__( 'Row Class Margin Bottom(px)', 'advisor' ),
												'type' => 'number',
											),
											array(

												 'id'   => 'advisor_480_mobile_margin_left',
												 'name' => esc_html__( 'Row Class Margin Left(px)', 'advisor' ),
												 'type' => 'number',
										 ),



									));

									$meta_boxes[] = array(
											 'title'      => esc_html__( 'Subscriber Details', 'advisor' ),
											 'post_types' => 'subscriber',
											 'fields'     => array(

													 array(
															 'id'   => 'advisor_subscriber_email',
															 'name' => esc_html__( 'Email', 'advisor' ),
															 'type' => 'text',
													 ),

											 ),
									 );


    return $meta_boxes;
}
?>
