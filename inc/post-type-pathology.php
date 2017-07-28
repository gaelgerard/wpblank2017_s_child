<?php	// Create 1 Custom Post type for pathology
			function create_post_type_pathology()
			{
				register_taxonomy_for_object_type('category', 'pathology'); // Register Taxonomies for Category
				register_taxonomy_for_object_type('post_tag', 'pathology');
				register_post_type('pathology', // Register Custom Post Type
					array(
					'labels' => array(
						'name' => __('Pathologies', 'wpblank2017_s'), // Rename these to suit
						'singular_name' => __('Pathology post', 'wpblank2017_s'),
						'add_new' => __('Add pathology post', 'wpblank2017_s'),
						'add_new_item' => __('Add pathology post', 'wpblank2017_s'),
						'edit' => __('Edit', 'wpblank2017_s'),
						'edit_item' => __('Edit pathology post', 'wpblank2017_s'),
						'new_item' => __('New pathology post', 'wpblank2017_s'),
						'view' => __('View pathology post', 'wpblank2017_s'),
						'view_item' => __('View pathology post', 'wpblank2017_s'),
						'search_items' => __('Search for pathology post', 'wpblank2017_s'),
						'not_found' => __('No pathology post found', 'wpblank2017_s'),
						'not_found_in_trash' => __('No pathology post found in trash', 'wpblank2017_s'),
					'parent' => __( 'pathology' )
					),
						  'menu_icon' => 'dashicons-clipboard',
					'public' => true,
				
					'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
					'has_archive' => true,
					'supports' => array(
						'title',
						'editor',
						'author',
						'excerpt',
						'revisions',
						'thumbnail'
					), // Go to Dashboard Custom ggai wp pathology post for supports
					'can_export' => true, // Allows export in Tools > Export
					'taxonomies' => array(
						//'post_tag',
						//'category'
					) // Add Category and Post Tags support
				));
			}
				//create taxonomy type
			function create_type_pathology_taxonomies() 
			{
			  // Add new taxonomy, make it hierarchical (like categories)
			  $labels = array(
				'name' => _x( 'Pathology category  ', 'taxonomy general name' ),
				'singular_name' => _x( 'Pathology category ', 'taxonomy singular name' , 'wpblank2017_s'),
				'search_items' =>  __( 'Search pathology category  ' , 'wpblank2017_s'),
				'all_items' => __( ' All pathology categories  ', 'wpblank2017_s' ),
				'parent_item' => __( 'Parent pathology category ', 'wpblank2017_s' ),
				'parent_item_colon' => __( 'Parent pathology category colon ' , 'wpblank2017_s'),
				'edit_item' => __( 'Edit pathology category ' , 'wpblank2017_s'), 
				'update_item' => __( 'Update pathology category', 'wpblank2017_s' ),
				'add_new_item' => __( 'Add new pathology category' , 'wpblank2017_s'),
				'new_item_name' => __( 'New pathology category name', 'wpblank2017_s' ),
				'menu_name' => __( 'Pathology categories', 'wpblank2017_s' ),
			  ); 	
			
			  register_taxonomy('category_pathology',array('pathology'), 
				array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_tagcloud' => false,
				'query_var' => true,
				'rewrite' => array( 'slug' => __( 'your-pathology', 'wpblank2017_s' )),
			  ));
			}
					
					
					/*ACTIONS*/	
				add_action('init', 'create_post_type_pathology'); //
				add_action( 'init', 'create_type_pathology_taxonomies', 0 ); // Add categories for Pathology

				
?>