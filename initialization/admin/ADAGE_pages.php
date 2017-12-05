<?php

class ADAGE_pages
{

    private $plugin_name;
    private $version;
    private $pages;

    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->pages = array();
        $this->load_dependencies();
        add_action( 'init', array($this, 'load'), 0 );
    }

    public function load_dependencies()
    {
        require_once File::build_path(array("controller", "ADAGE_pages_Controller.php"));
        require_once File::build_path(array("model", "ADAGE_pages_model.php"));
    }

    public function load()
    {
        $this->load_pages();
        $this->creat_pages();
    }

    private function load_pages()
    {
        $training = array(
                        'post_title' => 'Training list',
                        'post_name'  => 'training-list-adage',
                        'post_content' => 'Ce texte s\'affiche si le plugin rencontre une difficulté',
                        'post_status' => 'publish',
                        'post_author' => 1,
                        'post_type' => 'adage_pages'
                    );
        $cours_list = array(
                        'post_title' => 'Cours',
                        'post_name'  => 'cours-list-adage',
                        'post_content' => 'Ce texte s\'affiche si le plugin rencontre une difficulté',
                        'post_status' => 'publish',
                        'post_author' => 1,
                        'post_type' => 'adage_pages'
                      );
        array_push($this->pages, $training);
        array_push($this->pages, $cours_list);
    }

    private function creat_pages()
    {
        foreach ($this->pages as $value) {
            $object_value = new ADAGE_pages_model($value);
            if (ADAGE_pages_Controller::exists($object_value) == false) {
                wp_insert_post($value);
                $id = ADAGE_pages_Controller::getID($object_value);
                $object_value->set("post_id", $id);
                ADAGE_pages_model::save($object_value);
            }else {

            }
        }
    }
}


?>
