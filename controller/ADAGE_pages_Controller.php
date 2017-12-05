<?php

// TODO: rendre cette class abrtract.
class ADAGE_pages_Controller
{

    function __construct()
    {
        $this->load_dependencies();
    }

    public function load_dependencies(){
        require_once File::build_path(array("model", "ADAGE_pages_model.php"));
    }

    public static function exists($compare)
    {
        $pagesDB = ADAGE_pages_model::selectAll();
        foreach ($pagesDB as $key) {
            if ($key->post_name == $compare->get("post_name")) {
                return true;
            }
        }
        return false;
    }

    public static function getID($compare){
        $pagesDB = ADAGE_pages_model::selectAll();
        
        return null;
    }
}



?>
