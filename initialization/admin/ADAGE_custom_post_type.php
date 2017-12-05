<?php

class ADAGE_custom_post_type
{

    private $plugin_name;
    private $version;

    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->load_dependencies();
        add_action( 'init', array($this, 'load'), 0 );
    }

    public function load_dependencies(){}

    public function load()
    {
        $this->creat_custom_post_type();
    }

    function creat_custom_post_type() {

    	$args = array(
    		'label'               => __( 'ADAGE pages'),
    		'description'         => __( 'Tous sur ADAGE pages'),
    		'labels'              => array(
                                    		'name'                => _x( 'ADAGE pages', 'Post Type General Name'),
                                    		'singular_name'       => _x( 'ADAGE page', 'Post Type Singular Name'),
                                    		'menu_name'           => __( 'ADAGE pages'),
                                    		'all_items'           => __( 'Toutes les pages'),
                                    		'view_item'           => __( 'Voir les pages ADAGE'),
                                    		'add_new_item'        => __( 'Ajouter une nouvelle page ADAGE'),
                                    		'add_new'             => __( 'Ajouter'),
                                    		'edit_item'           => __( 'Editer la page ADAGE'),
                                    		'update_item'         => __( 'Modifier la page ADAGE'),
                                    		'search_items'        => __( 'Rechercher une page ADAGE'),
                                    		'not_found'           => __( 'Non trouvée'),
                                    		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
                                    	  ),
    		'supports'            => array( 'title', 'editor'),
    		'hierarchical'        => false,
    		'public'              => true,
    		'has_archive'         => true,
    		'rewrite'			  => array( 'slug' => 'ADAGE-pages'),
            'show_in_menu'        => true,
            'menu_icon'           => 'dashicons-admin-page'
    	);

    	register_post_type( 'ADAGE_Pages', $args );
    }

}


?>
