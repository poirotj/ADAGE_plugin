<?php

class ADAGE_router
{

    function __construct()
    {
        $this->load_dependencies();
        $this->start();
    }

    public function load_dependencies(){
        require_once File::build_path(array("model", "Model.php"));
        require_once File::build_path(array("model", "ADAGE_pages_model.php"));
    }

    public function start(){
        // if ($post->post_type == "adage_pages") {
        //     add_filter('the_content', array($this, 'add_pub_post'));
        //
        // }

        if(is_post_type_archive()){
            add_filter('the_content', array($this, 'add_pub_post'));
        }
    }

    public function add_pub_post()
    {
        echo "bonjour";
    }
}

?>
