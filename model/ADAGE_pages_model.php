<?php


class ADAGE_pages_model extends Model
{
    private $id;
    private $post_name;
    private $post_id;

    function __construct($tabPage=null){
        if(is_object($tabPage) && !is_null($tabPage)){
            $this->id = $tabPage->id;
            $this->pos_name = $tabPage->post_name;
            $this->post_id = $tabPage->post_id;
        }else{
            $this->id = null;
            $this->post_name = $tabPage["post_name"];
            $this->post_id = null;
        }
    }


    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut)) {
            return $this->$nom_attribut;
        }
        return false;
    }

    public function set($nom_attribut, $new_values) {
        if (property_exists($this, $nom_attribut)) {
            $this->$nom_attribut = $new_values;
        }
    }

    public static function selectAll(){
        $adage_pages = new WP_Query( array( 'post_type' => 'adage_pages') );
        $adage_pages = $adage_pages->posts;
        $array_pages = array();
        foreach ($adage_pages as $key) {
            array_push($array_pages, new ADAGE_pages_model($key));
        }
        return $adage_pages;
    }

    public static function save($page){
        global $wpdb;
        $table = $wpdb->prefix.'ADAGE_page';
        $intoValue = array(
                        'post_name' => $page->get("post_name"),
                        'post_id' => $page->get("post_id")
                     );
        $valuesType = array('%s','%s');
        $wpdb->insert($table, $intoValue, $valuesType);
    }

    public static function creatDB(){
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $commissions_table_name = $wpdb->prefix . 'ADAGE_page';
        $commissions_sql = "CREATE TABLE IF NOT EXISTS $commissions_table_name (
            id int(11) NOT NULL AUTO_INCREMENT,
            post_name varchar(200) NOT NULL,
            post_id int(11) NOT NULL,
            post_title varchar(200) NOT NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate;";

        dbDelta($commissions_sql);
    }
}


?>
