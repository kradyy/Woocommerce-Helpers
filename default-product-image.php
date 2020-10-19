// Fallback image for products
function woo_sp_thumbnail_fallback( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    if ( empty( $html ) && get_post_type($post_id) == 'produkt' ) {
        $default_image = get_field('produkter_default_image', 'option');

        if( $default_image ) {
          $src = wp_get_attachment_image_src($default_image, 'full');
         
          if($src) $html = '<img src="'.$src[0].'" alt="" data-alt="" class="retina" />';
         }
    }

    return $html;
}

add_filter( 'post_thumbnail_html', 'woo_sp_thumbnail_fallback', 20, 5 );
