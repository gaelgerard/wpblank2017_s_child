<?php
// Enable support for Post Thumbnails, and declare sizes.
	add_theme_support( 'post-thumbnails' );

        //Polas Home
	add_image_size( 'vignette_grid', 250, 250, true ); //pour les galeries photos et la boucle d'actus
	add_image_size( 'vignette_grid_large', 400, 280, true ); //pour les images à la une
	add_image_size( 'slidehome', 1200, 520, true ); //pour les slide
	add_image_size( 'slidehome_thumb', 180, 78, true ); //pour les slide

	/*------------Renommer Articles en réalisations-----------*/
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Actualités';
    $submenu['edit.php'][5][0] = 'Actualités';
    $submenu['edit.php'][10][0] = 'Ajouter une Actualité';
    $submenu['edit.php'][16][0] = 'Actualités Tags';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Actualités';
    $labels->singular_name = 'Actualité';
    $labels->add_new = 'Ajouter une Actualité';
    $labels->add_new_item = 'Ajouter une Actualité';
    $labels->edit_item = 'Modifier cette Actualité';
    $labels->new_item = 'Actualités';
    $labels->view_item = 'Voir cette Actualité';
    $labels->search_items = 'Chercher parmi les Actualités';
    $labels->not_found = 'Pas de Actualité trouvée';
    $labels->not_found_in_trash = 'Pas de Actualité trouvée dans la corbeille';
    $labels->all_items = 'Toutes les Actualités';
    $labels->menu_name = 'Actualités';
    $labels->name_admin_bar = 'Actualités';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );
function custom_adminbar_titles() {
	global $wp_admin_bar;
        $wp_admin_bar->add_menu( array(
                'id'    => 'new-post',
                'title' => 'Nouvelle Actualité',
			)
		);
}
// Load conditional scripts
function client_conditional_scripts()
{

    if ( is_page('contact') || is_singular('annuaire') || is_page('points-de-vente')) {
        wp_register_script('maps.googleapis', '//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), null, true); // Conditional script(s)
        wp_enqueue_script('maps.googleapis'); // Enqueue it!
        wp_register_script('maps.infobox', '//google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.js', array(), null, true); // Conditional script(s)
        wp_enqueue_script('maps.infobox'); // Enqueue it!
        wp_register_script('maps.acf', get_stylesheet_directory_uri().'/js/acf-map.js', array(), null, true); // Conditional script(s)
        wp_enqueue_script('maps.acf'); // Enqueue it!
    }
    if ( is_home() || is_front_page() ) {
        wp_register_script('jqueryflexslider', '//cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.0/jquery.flexslider-min.js', array(), null, true); // Conditional script(s)
        wp_enqueue_script('jqueryflexslider'); // Enqueue it!
    wp_register_style('jqueryflexslider_css', '//cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.0/flexslider.css', array(), false, 'all');
    wp_enqueue_style('jqueryflexslider_css'); // Enqueue it!
    wp_register_script('jqueryflexslider_js_custom', get_stylesheet_directory_uri() . '/js/flexslider_custom.js', array(), null, true);
    wp_enqueue_script('jqueryflexslider_js_custom'); // Enqueue it!
    wp_register_style('jqueryflexslider_css_custom', get_stylesheet_directory_uri() . '/css/flexslider_custom.css', array(), false, 'all');
    wp_enqueue_style('jqueryflexslider_css_custom'); // Enqueue it!
    wp_register_style('jqueryflexslider_css_custom_keyframes', get_stylesheet_directory_uri() . '/css/flexslider_custom_keyframes.css', array(), false, 'all');
    wp_enqueue_style('jqueryflexslider_css_custom_keyframes'); // Enqueue it!
    //    wp_register_script('parallaxContentSlider', get_stylesheet_directory_uri().'/js/jquery.cslider.js', array(), null, true); // Conditional script(s)
    //    wp_enqueue_script('parallaxContentSlider'); // Enqueue it!
    //wp_register_style('parallaxContentSlider_css', get_stylesheet_directory_uri() . '/css/parallaxContentSlider.css', array(), false, 'all');
    //wp_enqueue_style('parallaxContentSlider_css'); // Enqueue it!

    }
}
add_action('wp_print_scripts', 'client_conditional_scripts'); // Add Conditional Page Scripts


//Enlever la mention "Protégé" devant les titres d'articles privés avec mdp
add_filter( 'private_title_format', 'yourprefix_private_title_format' );
add_filter( 'protected_title_format', 'yourprefix_private_title_format' );

function yourprefix_private_title_format( $format ) {
    return '%s';
}
//add_filter('walker_nav_menu_start_el', 'maiorano_generate_nav_images', 20, 4);
//function maiorano_generate_nav_images($item_output, $item, $depth, $args){
//    if(has_post_thumbnail($item->object_id)){
//        $dom = new DOMDocument(); //DOM Parser because RegEx is a terrible idea
//        $dom->loadHTML(utf8_decode($item_output)); //Load the markup provided by the original walker
//        $img = $dom->createDocumentFragment(); //Create arbitrary Element
//        $img->appendXML(get_the_post_thumbnail($item->object_id, 'vignette_grid_large_menu')); //Apply image data via string
//        $dom->getElementsByTagName('a')->item(0)->appendChild($img); //Append the image to the link
//        $item_output = $dom->saveHTML(); //Replace the original output
//    }
//    return $item_output;
//}
class Menu_With_Description extends Walker_Nav_Menu {
function start_el(&$output, $item, $depth, $args) {
    global $wp_query;

    $indent = ( $depth ) ? str_repeat( "", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
    $class_names = ' class="' . esc_attr( $class_names ) . '"';

    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    // get user defined attributes for thumbnail images
    $attr_defaults = array( 'class' => 'nav_thumb' , 'alt' => esc_attr( $item->attr_title ) , 'title' => esc_attr( $item->attr_title ) );
    $attr = isset( $args->thumbnail_attr ) ? $args->thumbnail_attr : '';
    $attr = wp_parse_args( $attr , $attr_defaults );

    $item_output = $args->before;
     $item_output .= '<a'. $attributes .'>';
    if($depth == 1){
    // thumbnail image output
    $item_output .= ( isset( $args->thumbnail_link ) && $args->thumbnail_link ) ? '<a' . $attributes . '>' : '';
    $item_output .= apply_filters( 'menu_item_thumbnail' , ( isset( $args->thumbnail ) && $args->thumbnail ) ? get_the_post_thumbnail( $item->object_id , ( isset( $args->thumbnail_size ) ) ? $args->thumbnail_size : 'thumbnail' , $attr ) : '' , $item , $args , $depth );
    $item_output .= ( isset( $args->thumbnail_link ) && $args->thumbnail_link ) ? '</a>' : '';
    }
    // menu link output

    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

    // menu description output based on depth
    //$item_output .= ( $args->desc_depth >= $depth ) ? '<br /><span class="sub">' . $item->description . '</span>' : '';

    // close menu link anchor
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}
add_filter( 'wp_nav_menu_args' , 'my_add_menu_descriptions' );
function my_add_menu_descriptions( $args ) {
    $args['walker'] = new Menu_With_Description;
    $args['desc_depth'] = 1;
    $args['thumbnail'] = true;
    $args['thumbnail_link'] = false;
    $args['thumbnail_size'] = 'vignette_grid_large_menu';
    $args['thumbnail_attr'] = array( 'class' => 'nav_thumb my_thumb' , 'alt' =>  'Vignette du menu Aventure au galop' );

    return $args;
}
show_admin_bar( true );
