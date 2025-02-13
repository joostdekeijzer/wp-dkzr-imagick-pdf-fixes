<?php
require_once ABSPATH . WPINC . '/class-wp-image-editor.php';
require_once ABSPATH . WPINC . '/class-wp-image-editor-imagick.php';

class DKZR_Image_Editor_Imagick_pdf extends WP_Image_Editor_Imagick {
  public function load() {
    $return = parent::load();

    if ( $return && ! is_wp_error( $return ) ) {
      $file_extension = strtolower( pathinfo( $this->file, PATHINFO_EXTENSION ) );

      if ( 'pdf' === $file_extension ) {
        $this->image->setImageAlphaChannel( Imagick::ALPHACHANNEL_REMOVE );

        // alternative
        //$this->image->setImageBackgroundColor('white');
        //$this->image = $this->image->mergeImageLayers( Imagick::LAYERMETHOD_FLATTEN );
      }
    }

    return $return;
  }
}
