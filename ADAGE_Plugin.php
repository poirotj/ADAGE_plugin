<?php
/*
Plugin Name: ADAGE
Plugin URI: *
Description: Merci de bien vouloir entree une description correcte !
Version: 1.0
Author: jonathan Poirot
Author URI: http://localhost/wordpress
License: GPL2
Text Domaine: ADAGE_Plugin
*/

    // If this file is called directly, abort.
    if ( ! defined( 'WPINC' ) ) {
    	die;
    }

    define( 'PLUGIN_NAME_VERSION', '1.0.0' );
    define( 'PLUGIN_NAME', 'ADAGE_Plugin');
    define("SLASH", DIRECTORY_SEPARATOR);
    define("ROOT_FOLDER", plugin_dir_path( __FILE__ ));
    require_once ROOT_FOLDER . "lib" . SLASH . "file.php";
    require_once File::build_path(array("initialization","ADAGE_loader.php"));


    function activate_ADAGE_Plugin() {
    	require_once File::build_path(array("initialization","ADAGE_activator.php"));
    	new ADAGE_activator();
    }
    register_activation_hook( __FILE__, 'activate_ADAGE_Plugin' );


    function deactivate_ADAGE_Plugin() {
        require_once File::build_path(array("initialization","ADAGE_desactivator.php"));
    	new ADAGE_desactivator();
    }
    register_deactivation_hook( __FILE__, 'deactivate_ADAGE_Plugin' );


    function run_ADAGE_Plugin() {
        require_once File::build_path(array("initialization","ADAGE_initialization.php"));
        require_once File::build_path(array("controller", "ADAGE_Router.php"));
        new ADAGE_initialization();
        new ADAGE_router();
    }
    run_ADAGE_Plugin();

?>
