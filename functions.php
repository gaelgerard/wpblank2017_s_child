<?php
// Enable support for Post Thumbnails, and declare sizes.
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'slidehome', 1280, 540, true ); //pour les slide
	add_image_size( 'imghome', 500, 500, true ); //pour les images carrées de l'accueil
	add_image_size( 'headercateg_tiny', 200, 79, true ); //pour les pages de catégories
	add_image_size( 'headercateg_small', 571, 225, true ); //pour les pages de catégories
	add_image_size( 'headercateg_medium', 849, 335, true ); //pour les pages de catégories
	add_image_size( 'headercateg', 1040, 410, true ); //pour les pages de catégories
	add_image_size( 'linkcateg', 250, 250, true ); //pour les liens vers les sous catégories

	/*------------Renommer Articles en actu-----------*/
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Actualités';
    $submenu['edit.php'][5][0] = 'Actualités';
    $submenu['edit.php'][10][0] = 'Ajouter une Actualité';
    $submenu['edit.php'][16][0] = 'Actualités Tags';
    echo '';
}
/*add specific languages*/
	load_theme_textdomain( 'wpblank2017_s', get_stylesheet_directory_uri() . '/languages' );

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

    if ( is_home() || is_front_page() || is_page('contactez-nous')) {
        wp_register_script('maps.googleapis', '//maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDaCz3LFGumrIbt0Mzk7NMLumUw9WuzIbk', array(), null, true); // Conditional script(s)
        wp_enqueue_script('maps.googleapis'); // Enqueue it!
        wp_register_script('maps.infobox', get_stylesheet_directory_uri().'/js/infobox_packed.js', array(), null, true); // Conditional script(s)
        wp_enqueue_script('maps.infobox'); // Enqueue it!
        wp_register_script('maps.acf', get_stylesheet_directory_uri().'/js/acf-map.js', array(), null, true); // Conditional script(s)
        wp_enqueue_script('maps.acf'); // Enqueue it!
    }
        wp_register_script('jqueryflexslider', '//cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.0/jquery.flexslider-min.js', array(), null, true); // Conditional script(s)
        wp_enqueue_script('jqueryflexslider'); // Enqueue it!
    wp_register_style('jqueryflexslider_css', '//cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.0/flexslider.css', array(), false, 'all');
    wp_enqueue_style('jqueryflexslider_css'); // Enqueue it!
	
	if ( is_page_template('page-pathology.php')) {
        wp_register_script('perfect-scrollbar',  get_stylesheet_directory_uri() . '/js/perfect-scrollbar.min.js', array(), null, true); // Conditional script(s)
        wp_enqueue_script('perfect-scrollbar'); // Enqueue it!
    wp_register_style('perfect-scrollbar_css',  get_stylesheet_directory_uri() . '/css/perfect-scrollbar.min.css', array(), false, 'all');
    wp_enqueue_style('perfect-scrollbar_css'); // Enqueue it!
	}
    //wp_register_script('jqueryflexslider_js_custom', get_stylesheet_directory_uri() . '/js/flexslider_custom.js', array('jquery'), null, true);
    //wp_enqueue_script('jqueryflexslider_js_custom'); // Enqueue it!

}
add_action('wp_print_scripts', 'client_conditional_scripts'); // Add Conditional Page Scripts
add_action( 'wp_enqueue_scripts', 'wpblank2017_s_remove_css', 25 );
function wpblank2017_s_remove_css(){
    wp_dequeue_style('cff-font-awesome');
    // etc
}
//Enlever la mention "Protégé" devant les titres d'articles privés avec mdp
add_filter( 'private_title_format', 'yourprefix_private_title_format' );
add_filter( 'protected_title_format', 'yourprefix_private_title_format' );

function yourprefix_private_title_format( $format ) {
    return '%s';
}
//Initiate ACF
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyBFMZEPeRe_r7ec2PUoSBbuVxuF5ULu0Jk');
}
add_action('acf/init', 'my_acf_init');

  //require_once dirname( __FILE__ ) . '/inc/post-type-pathology.php'; 

if ( is_home() || is_front_page() ) {
//import fields
  require_once dirname( __FILE__ ) . '/inc/acf_fields_home.php';
}
if ( !is_home() && !is_front_page() ) {
  require_once dirname( __FILE__ ) . '/inc/acf_fields_diapo.php';
}
if ( is_page_template('page-pathology.php') ) {
  require_once dirname( __FILE__ ) . '/inc/acf_fields_pathology.php';
}
  require_once dirname( __FILE__ ) . '/inc/acf_fields_praticiens.php';
