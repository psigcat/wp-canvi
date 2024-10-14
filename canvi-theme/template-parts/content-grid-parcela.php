<?php
/**
 * Template for showing parcela content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package canvi
 */

?>

<article <?php post_class('parcela'); ?> id="post-<?php the_ID(); ?>">

	<?php
		// Load values
		$id				= get_field( 'id' );
		$ha				= get_field( 'ha' );
		$subzona      	= get_field( 'subzona' );
	?>

	<div class="bgparcela" style ="background-image:url(<?php echo get_site_url(); ?>/wp-content/mapas/id_<?php echo $id; ?>.png);" />

		<div class="parcela_grid_title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</div>

		<div class="parcela_grid_info">
			<div class="parcela_grid">
				<?php _e( 'Superficie: ', 'canvi' ); ?><?php echo esc_html( $ha ); ?>
			</div>
	
			<div class="parcela_grid">
				<?php _e( 'Subzona: ', 'canvi' ); ?><?php echo esc_html( $subzona ); ?>
			</div>
		</div>

	</div>

</article><!-- .post -->
