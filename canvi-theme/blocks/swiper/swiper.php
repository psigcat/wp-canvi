<?php
/**
 * Swiper Block template.
 *
 * @param array $block The block settings and attributes.
 */


/**
* Display list of the 21 most favorited parcelas
* @see https://wordpress.org/plugins/favorites/
*/
$parcela_query = new WP_Query(array(
  'post_type' => array('parcela'),
  'posts_per_page' => 21,
  //'meta_key' => 'simplefavorites_count',
  //'orderby' => 'meta_value_num',
  //'order' => 'DESC',
  //'ignore_sticky_posts' => true
));
if ( $parcela_query->have_posts() ) : ?>

<div class="wp-block-columns alignfull">

  <div class="swiper swiper-container favorites-swiper-container">
    <div class="swiper-wrapper">

      <?php
      while ( $parcela_query->have_posts() ) : $parcela_query->the_post();

        $id = get_field('id', get_the_ID());
        $title = get_the_title();
        $ha = get_field('ha', get_the_ID());
        $subzona = get_field('subzona', get_the_ID());
        $varietat = get_field('varietat', get_the_ID());
        if (sizeof($varietat)>0) {
          // get first varietat only for photo with grape color
          $color = get_field('color', $varietat[0]);
        }
        if ($color != 'blanca' and $color != 'negra') {
          $color = 'negra';
        }

        //$style = " style='background-image:url(" . get_site_url() . "/wp-content/mapas/id_" . $id . ".png)'";
        $style = " style='background-image:url(" . get_stylesheet_directory_uri() . "/images/raim_" . $color . ".jpg)'";

        //$title = get_field('nombre')[0]['nombre'] . ' (' . get_post_meta(get_the_id(), 'simplefavorites_count', true) . ')';
        echo '<div class="swiper-slide" data-id="' . get_the_permalink() . '"'.$style.'><div class="slide-sub"><a href="' . get_the_permalink() . '" title="' . $title . '">' . $title . '</a><br><span class="ha">Superficie: ' . $ha . ' [ha]</span><br><span class="ha">Subzona: ' . $color. $subzona . '</span></div></div>';
      endwhile; 
      ?>

    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>

</div>

<?php
endif; 
wp_reset_postdata();
?>

<?php
wp_enqueue_script( 'slider-js', get_site_url() . '/wp-content/themes/canvi/blocks/swiper/swiper.js', array('swiper-js'), '1.0', true );
?>