<?php

class ADAGE_initialization {

    private $plugin_name;
    private $version;
    private $loader;

    function __construct()
    {
        if ( defined('PLUGIN_NAME_VERSION') && defined('PLUGIN_NAME') ) {
            $this->version = PLUGIN_NAME_VERSION;
            $this->plugin_name = PLUGIN_NAME;
        } else {
            $this->version = '1.0.0';
            $this->plugin_name = "plugin_name";
        }

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies(){
        require_once File::build_path(array("initialization","admin","ADAGE_plugin_admin.php"));
        require_once File::build_path(array("model","Model.php"));
    }

    private function set_locale()
    {
        // TODO: realiser le lien vers la traduction
    }

    public function define_admin_hooks()
    {
        $plugin_admin_init = new ADAGE_plugin_Admin($this->plugin_name, $this->version);
        add_action( 'admin_enqueue_scripts', array($plugin_admin_init, 'enqueue_styles'));
        add_action( 'admin_enqueue_scripts', array($plugin_admin_init, 'enqueue_scripts'));
    }

    private function define_public_hooks()
    {
        // TODO: define admin hook
    }

    public function start()
    {

    }

}

?>
