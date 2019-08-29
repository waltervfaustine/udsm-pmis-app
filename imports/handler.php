<?php require_once(LIB_PATH.DS.'autoload.php'); ?>

<?php 
    class Handler {
        public $assets_dir = "assets";

        public function load_image($img_url) {
            // return $_SERVER['DOCUMENT_ROOT'].DS.'cainam'.DS.'public'.DS.$this->assets_dir.DS.$img_url;
            return SITE_ROOT.DS.'public'.DS.$this->assets_dir.DS.$img_url;
        }
    }

    $handler = new Handler();
?>