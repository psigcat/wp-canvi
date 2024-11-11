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

	if ( have_posts() ) {

		$i = 0;

		while ( have_posts() ) {
			++$i;
			/*if ( $i > 1 ) {
				echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
			}*/
			the_post();

			if (isset($_GET['display']) && $_GET['display'] == 'table') {

				get_template_part( 'template-parts/content-table', get_post_type() );

			} else {

				get_template_part( 'template-parts/content-grid', get_post_type() );

			}
		}
	}

	if (isset($_GET['display']) && $_GET['display'] == 'table'): ?>
		</table>
	<?php endif; ?>

	</div>

	<?php get_template_part( 'template-parts/pagination' ); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
