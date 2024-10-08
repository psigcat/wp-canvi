<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php

	get_template_part( 'template-parts/entry-header' );

	if ( ! is_search() ) {
		get_template_part( 'template-parts/featured-image' );
	}

	?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
			?>

			<?php
				// Load values
				$id				= get_field( 'id' );
				$comarca		= get_field( 'comunitat_autonoma' );
				$provincia		= get_field( 'provincia' );
				$comarca		= get_field( 'comarca' );
				$municipi		= get_field( 'municipi' );

				$ha				= get_field( 'ha' );
				$pendent		= get_field( 'pendent' );
				$varietat		= get_field( 'varietat' );
				$campanya_rv	= get_field( 'campanya_rv' );
				$altitud_mig	= get_field( 'altitud_mig' );
				$orientacio_mig	= get_field( 'orientacio_mig' );
				$tipus_cultiu	= get_field( 'tipus_cultiu' );
				$d_o			= get_field( 'd_o' );
				$tipus_sol		= get_field( 'tipus_sol' );
				$estat_fenologic= get_field( 'estat_fenologic' );
				$tipus_guarda	= get_field( 'tipus_guarda' );
				$produccio      = get_field( 'produccio_estimada' );
			?>

			<div class="mapa">
				<img src="<?php echo get_site_url(); ?>/wp-content/mapas/id_<?php echo $id; ?>.png" />
			</div>

			<!-- <div class="parcela">
		        <?php echo esc_html( $ccaa ); ?>
		        <?php echo esc_html( $provincia ); ?>
		        <?php echo esc_html( $comarca ); ?>
		        <?php echo esc_html( $municipi ); ?>
			</div> -->

			<h2> <?php _e( 'Información', 'canvi' ); ?> </h2>

			<div class="parcela_info_container">
			<div class="parcela_col">
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/grape.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Variedad', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $varietat ); ?></span>
				</div>
		
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/calendar.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Año de plantación', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $campanya_rv ); ?></span>
				</div>
		
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/area.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Superficie', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $ha ); ?></span>
				</div>
		
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/soil.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Suelo', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $tipus_sol ); ?></span>
				</div>
		
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/heigh.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Altitud de la finca', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $altitud_mig ); ?></span>
				</div>
		
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/compass.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Orientación', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $orientacio_mig ); ?></span>
				</div>
			</div>
		
			<div class="parcela_col">
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/world.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Procedencia', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $procedencia ); ?></span>
				</div>
		
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/do.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Certificación', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $certificacion ); ?></span>
				</div>
		
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/crop.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Calidad', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $calidad ); ?></span>
				</div>
		
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/grape.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Categoría', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $categoria ); ?></span>
				</div>
		
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/state.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Estado fenológico', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $estado_fenologico ); ?></span>
				</div>
		
				<div class="parcela_info">
				  <div class="parcela_icon_wrapper">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/weight.svg" />
				  </div>
					<span class="parcela_title"><?php _e( 'Kg disponibles', 'canvi' ); ?></span>
					<div class="parcela_separator"></div> <!-- Añadimos un separador aquí -->
					<span class="parcela_valor"><?php echo esc_html( $kg_disponibles ); ?></span>
				</div>
			</div>
		</div>

		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		// Single bottom post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/*
	 * Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</article><!-- .post -->
