<?php
  class File {

  	public static function build_path($path_array = NULL) {
      if ( !is_null($path_array)) {
        return ROOT_FOLDER.join(SLASH, $path_array);
      }
  		return ROOT_FOLDER;
  	}
  }
?>
