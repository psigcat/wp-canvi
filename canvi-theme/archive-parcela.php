<?php
/**
 * The parcela archive template file
 *
 * @package canvi
 */

get_header();
?>

<main id="site-content">

	<header class="archive-header has-text-align-center header-footer-group">

		<div class="archive-header-inner section-inner medium">

			

		</div><!-- .archive-header-inner -->

	</header><!-- .archive-header -->

	<aside class="search-outer-wrapper">
   		<div class="search-wrapper">

		   	<?php
				echo do_shortcode( '[fe_widget]' );
				//echo do_shortcode( '[fe_widget horizontal="yes" columns="5"]' );
			?>
		</div>
	</aside>

	<?php $uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0]; ?>

	<div class="display">
		<a href="<?php echo $uri; ?>?display=table" title="Vista de Tabla">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/table-icon.svg">
		</a>
		<a href="<?php echo $uri; ?>?display=grid" title="Vista de Cuadrícula">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/grid-icon.svg">
		</a>
		
    </div>


	<?php

	if (isset($_GET['display']) && $_GET['display'] == 'table'): ?>
		<div class="table">
			<table>
				<thead>
					<td>Nombre</td>
					<td>Varietat</td>
					<td>Año</td>
					<td>Superficie [ha]</td>
					<td>Subzona</td>
				</thead>
	<?php else: ?>
		<div class="grid">
	<?php endif;

		// wp-query to get all published parcelas in random order
		$allPostsWPQuery = new WP_Query(array(
			'post_type'=>'parcela', 
			'post_status'=>'publish', 
			'posts_per_page'=>100,
			//'orderby' => 'rand',
		));
	?>

	<?php if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			if (isset($_GET['display']) && $_GET['display'] == 'table') {
				get_template_part( 'template-parts/content-table', get_post_type() );
			} else {
				get_template_part( 'template-parts/content-grid', get_post_type() );
			}
		}
	}?>
		 
	<?php /*if ( $allPostsWPQuery->have_posts() ) :
	 
	    while ( $allPostsWPQuery->have_posts() ) : 
	    	$allPostsWPQuery->the_post();

			if (isset($_GET['display']) && $_GET['display'] == 'table') {

				get_template_part( 'template-parts/content-table', get_post_type() );
			} else {

				get_template_part( 'template-parts/content-grid', get_post_type() );
			}
	    	endwhile;
			wp_reset_postdata();
		else :*/ ?>
	    <p><?php //_e( 'There no posts to display.' ); ?></p>
	<?php /*endif;
	if (isset($_GET['display']) && $_GET['display'] == 'table'):*/ ?>
		</table>
	<?php //endif; ?>

	</div>

	<?php 
		//echo do_shortcode( '[ajax_load_more id="alm_canvi" post_type="parcela" posts_per_page="9"]' );
		get_template_part( 'template-parts/pagination' );
	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
