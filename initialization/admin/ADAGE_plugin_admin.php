<?php

class ADAGE_plugin_Admin {

	private $plugin_name;
	private $version;
	private $loader;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->load_dependencies();
		$this->load();
	}

	public function load_dependencies()
	{
		require_once File::build_path(array("initialization", "admin", "ADAGE_custom_post_type.php"));
		require_once File::build_path(array("initialization", "admin", "ADAGE_pages.php"));
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	}

	public function load()
	{
		$custom_post_type = new ADAGE_custom_post_type($this->plugin_name, $this->version);
		$pages = new ADAGE_pages($this->plugin_name, $this->version);
	}

	public function enqueue_styles() {
		$dir = File::build_path(array("assets", "css", "ADAGE_admin_css.css"));
		wp_enqueue_style( $this->plugin_name, $dir, array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {
		$dir = File::build_path(array("assets", "script", "ADAGE_admin_script.js"));
		wp_enqueue_script( $this->plugin_name, $dir, array( 'jquery' ), $this->version, false );
	}

}
