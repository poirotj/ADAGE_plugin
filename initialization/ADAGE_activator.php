<?php

class ADAGE_activator {

    protected $plugin_name;
    protected $version;
    private   $initialiaztion;

    function __construct()
    {
        $this->initialiaztion = get_option('ADAGE_initialization');
        $this->load_dependencies();
        if ($this->initialiaztion != true){
            $this->load();
            update_option('ADAGE_initialization', true);
        }
    }

    private function load_dependencies(){
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        require_once File::build_path(array("model", "ADAGE_pages_model.php"));
    }

    private  function load()
    {
        $this->creatDataBase();
    }

    private function creatDataBase()
    {
        ADAGE_pages_model::creatDB();
    }
}

?>
