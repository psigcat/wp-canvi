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
        //$style = " style='background-image:url(" . get_stylesheet_directory_uri() . "/images/raim_" . $color . ".jpg)'";

        ?>

        <div class="swiper-slide" data-id="<?php echo get_the_permalink(); ?>" <?php //echo $style; ?>>
          <div class="slide-top">
            <span class="id"><?php echo $id; ?></span><br>
            <a href="<?php echo get_the_permalink(); ?>"><?php echo $title; ?></a><br>
            <span class="pot">Potencialidad: <?php echo get_field('tipus_guarda', get_the_ID()); ?></span>
          </div>
          <div class="d_o_box">
          <?php 
            $d_o = get_field( 'd_o_tax', get_the_ID() );
            if( $d_o ){
              foreach( $d_o as $term ): ?>
                <img class="d_o" src="<?php echo get_stylesheet_directory_uri(); ?>/images/do_<?php echo esc_html( $term->slug ); ?>.png" />
                <?php endforeach;
            } 
          ?>
          </div>

          <div class="raim_box">
            <img src="<?php echo get_stylesheet_directory_uri() . "/images/raim_" . $color; ?>.jpg">
          </div>

          <div class="slide-sub">
            <!--<a href="<?php echo get_the_permalink(); ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a><br><span class="ha">Superficie: <?php echo $ha; ?> [ha]</span><br><span class="ha">Subzona: <?php echo $color . $subzona ; ?></span>-->
            <a class="button" href="<?php echo get_the_permalink(); ?>">Ficha de producto</a>
          </div>
        </div>

      <?php 
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