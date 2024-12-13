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
                    $varietat = get_field('varietat_tax', get_the_ID());
                    $color = 'negra'; // Default color
                    if (!empty($varietat)) {
                        $color = get_field('color', $varietat[0]);
                        if ($color != 'blanca' && $color != 'negra') {
                            $color = 'negra';
                        }
                    }
                ?>

                <div class="swiper-slide" data-id="<?php echo get_the_permalink(); ?>">
                    <div class="slide-top">
                        <span class="id"><?php echo $id; ?></span>
                        <a href="<?php echo get_the_permalink(); ?>"><?php echo $title; ?></a>
                        <span class="pot">Potencialidad: <?php echo get_field('tipus_guarda', get_the_ID()); ?></span>
                    </div>
                    <div class="swipe-images">
                        <div class="d_o_box">
                            <?php 
                            $d_o = get_field('d_o_tax', get_the_ID());
                            if ($d_o) {
                                foreach ($d_o as $term): ?>
                                    <img class="d_o" src="<?php echo get_stylesheet_directory_uri(); ?>/images/do_<?php echo esc_html($term->slug); ?>.png" />
                                <?php endforeach;
                            }
                            /*$d_o = get_field('d_o', get_the_ID());
                            if ($d_o) {
                                $terms = explode(",", $d_o);
                                foreach ($terms as $term): ?>
                                    <img class="d_o" src="<?php echo get_stylesheet_directory_uri(); ?>/images/do_<?php echo strtolower( trim($term) ); ?>.png" />
                                <?php endforeach;
                            }*/
                            ?>
                        </div>
                        <div class="raim_box <?php echo ($color == 'negra') ? 'raim-negro' : 'raim-blanco'; ?>">
                            <img src="<?php echo get_stylesheet_directory_uri() . "/images/raim_" . $color; ?>.jpg">
                        </div>
                    </div>
                    <div class="slide-sub">
                        <a class="button" href="<?php echo get_the_permalink(); ?>">Ficha del producto</a>
                    </div>
                </div>

                <?php endwhile; ?>

            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

<?php endif; 
wp_reset_postdata();
?>

<?php
wp_enqueue_script('slider-js', get_site_url() . '/wp-content/themes/canvi/blocks/swiper/swiper.js', array('swiper-js'), '1.0', true);
?>
