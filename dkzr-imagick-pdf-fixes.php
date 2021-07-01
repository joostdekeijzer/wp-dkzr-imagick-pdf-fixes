<?php
/**
 * Plugin Name: Imagick PDF fixes
 * Version: 1.0.2
 * Description: Imagick doesn't handle tranparency with current WordPress settings. Now it does.
 * Author: Joost de Keijzer
 * Author URI: https://dkzr.nl
 * Plugin URI: https://dkzr.nl
 * Update URI: https://dkzr.dev/wp/plugins/dkzr-imagick-pdf-fixes/
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */
add_filter( 'wp_image_editors', function ( $implementations ) {
  require_once __DIR__ . '/inc/class-dkzr-image-editor-imagick-pdf.php';

  $implementations = array_diff( $implementations, [ 'WP_Image_Editor_Imagick' ] );

  array_unshift( $implementations, 'DKZR_Image_Editor_Imagick_pdf' );

  return $implementations;
} );
