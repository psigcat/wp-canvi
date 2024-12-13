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

	<?php get_template_part( 'template-parts/entry-header' ); ?>

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
				$varietat		= get_field( 'varietat_tax' );
				$campanya_rv	= get_field( 'campanya_rv' );
				$altitud_mig	= get_field( 'altitud_mig' );
				$orientacio_mig	= get_field( 'orientacio_mig' );
				$tipus_cultiu	= get_field( 'tipus_cultiu' );
				$d_o			= get_field( 'd_o' );
				$tipus_sol		= get_field( 'tipus_sol' );
				$estat_fenologic= get_field( 'estat_fenologic' );
				$tipus_guarda	= get_field( 'tipus_guarda' );
				$produccio      = get_field( 'produccio_estimada' );
				$zona_cava      = get_field( 'zona_cava' );
				$subzona_cava   = get_field( 'subzona_cava' );
				$kg_disponibles = get_field( 'kg_disponibles' );
				$valoracion = get_field( 'valoracion' );

				// Mini-ficha variables
				$title = get_the_title();
				$subzona = get_field( 'subzona', get_the_ID() );
				$color = '';
				if ( sizeof( $varietat ) > 0 ) {
					$color = get_field( 'color', $varietat[0] );
				}
				if ( $color != 'blanca' && $color != 'negra' ) {
					$color = 'negra';
				}
			?>

			<!-- Mini-ficha -->
			<div class="parcela-mini-ficha">
			    <div class="slide-top">

					<div class="column">
				        <span class="id"><?php _e( 'ID:', 'canvi' ); ?> <?php echo esc_html( $id ); ?></span><br>
				        <span class="title"><?php echo esc_html( $title ); ?></span><br>

						<div class="spacer"></div>

				        <span class="pot">
				            <span class="potencialidad"><?php _e( 'Potencialidad:', 'canvi' ); ?></span> 
				            <span class="guarda-superior"><?php _e( 'Guarda Superior', 'canvi' ); ?></span> 
				            <span class="tipus-guarda"><?php echo esc_html( $tipus_guarda ); ?></span>
				        </span>
		       		</div>
					<div class="column">
						<img class="mapa" src='<?php echo get_site_url() . "/wp-content/mapas/id_" . rand(1,100) . ".png"; ?>' />
					</div>

			    </div>
			
			    <!-- Espacio entre Potencialidad e info-boxes -->
			    <div class="spacer"></div>
			
			    <div class="info_container">
			        <div class="info_boxes">
			            <div class="raim_box">
			                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/raim_<?php echo esc_attr( $color ); ?>.jpg">
			            </div>
			            <div class="d_o_box">
			                <?php 
			                $d_o = get_field( 'd_o_tax', get_the_ID() );
			                if ( $d_o ) {
			                   foreach ( $d_o as $term ): ?>
			                        <img class="d_o" src="<?php echo get_stylesheet_directory_uri(); ?>/images/do_<?php echo esc_html( $term->slug ); ?>.png" />
			                    <?php endforeach;
			                } 
							/*$d_o = get_field( 'd_o', get_the_ID() );
							if ( $d_o ) {
							$terms = explode(",", $d_o);
			                    foreach ( $terms as $term ): ?>
			                        <img class="d_o" src="<?php echo get_stylesheet_directory_uri(); ?>/images/do_<?php echo strtolower( trim($term) ); ?>.png" />
			                    <?php endforeach;
			                }*/
			                ?>
			            </div>
			        </div>
			        
			        <div class="action_buttons">
			            <?php 
			            // Obtenemos el recuento de visualizaciones
			            $view_count = get_post_meta( get_the_ID(), 'view_count', true );
			            if ( ! $view_count ) {
			                $view_count = 0; // Si no existe el campo, asignamos un valor por defecto de 0.
			            }
			            ?>
			            <button class="action_button view_count">
			                <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/eye.png" alt="Visualizaciones" />
			                
			            </button>
			            <button class="action_button like_button">
			                <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/like.png" alt="Marcar Favorito" />
			            </button>
			            <button class="action_button share_button">
			                <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/share.png" alt="Compartir" />
			            </button>
			            <a class="action_button whatsapp_button" 
			               href="https://wa.me/?text=<?php echo urlencode( get_the_title() . ' - ' . get_the_permalink() ); ?>" 
			               target="_blank" 
			               rel="noopener noreferrer">
			                <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/whatsapp.png" alt="Compartir por WhatsApp" />
			            </a>
			        </div>
			    </div>
				
				
				
			    <div class="box-buttons">
			        <div class="box offer-button">Oferta: 25.000 kg</div>
			        <div class="box expiry-button">Caduca: 10 h.20 min</div>
			    </div>
				
				<div class="spacer"></div>
				
			</div>




			<div class="parcela_info_container">
			<div class="parcela_col">
				<div class="parcela_info">
				    <span class="parcela_title"><?php _e( 'DO:', 'canvi' ); ?></span>
				    <span class="parcela_valor">
				        <?php 
				        if ( is_array( $d_o ) && !empty( $d_o ) ) {
				            $values = array_map( function( $term ) {
				                return $term->name; // O usa otro atributo según sea necesario
				            }, $d_o );
				            echo esc_html( implode( ', ', $values ) );
				        }
				        ?>
				    </span>
				</div>
		
				<div class="parcela_info">
					<span class="parcela_title"><?php _e( 'Zona Cava:', 'canvi' ); ?></span>
					<span class="parcela_valor"><?php echo esc_html( $zona_cava ); ?></span>
				</div>
		
				<div class="parcela_info">
					<span class="parcela_title"><?php _e( 'Subzona Cava:', 'canvi' ); ?></span>
					<span class="parcela_valor"><?php echo esc_html( $subzona_cava ); ?></span>
				</div>
		
				<div class="parcela_info">
					<span class="parcela_title"><?php _e( 'Superfície:', 'canvi' ); ?></span>
					<span class="parcela_valor"><?php echo esc_html( $ha ); ?></span>
					<span class="parcela_valor"><?php _e( 'ha', 'canvi' ); ?></span>
				</div>
				
				<div class="parcela_info">
					<span class="parcela_title"><?php _e( 'Tipo suelo:', 'canvi' ); ?></span>
					<span class="parcela_valor"><?php echo esc_html( $tipus_sol ); ?></span>
				</div>
		
		
			</div>
		
			<div class="parcela_col">
			
			
				<div class="parcela_info">
					<span class="parcela_title"><?php _e( 'Tipo de guarda:', 'canvi' ); ?></span>
				    <span class="parcela_valor">
				        <?php 
				        if ( !empty( $tipus_guarda ) ) {
				            echo esc_html( $tipus_guarda );
				        } else {
				            _e( 'No disponible', 'canvi' ); // Texto temporal si el campo está vacío
				        }
				        ?>
				    </span>
				</div>
			
			
				<div class="parcela_info">
				    <span class="parcela_title"><?php _e( 'Kgs disponibles:', 'canvi' ); ?></span>
				    <span class="parcela_valor">
				        <?php 
				        if ( !empty( $kg_disponibles ) ) {
				            echo esc_html( $kg_disponibles );
				        } else {
				            _e( 'No disponible', 'canvi' ); // Texto temporal si el campo está vacío
				        }
				        ?>
				    </span>
				</div>
				
				<div class="parcela_info">
				    <span class="parcela_title"><?php _e( 'Valoración Experto', 'canvi' ); ?></span>
				    <span class="parcela_valor">
				        <?php 
				        if ( !empty( $valoracion ) ) {
				            echo esc_html( $valoracion );
				        } else {
				            _e( 'No disponible', 'canvi' ); // Texto temporal si el campo está vacío
				        }
				        ?>
				    </span>
				</div>

			
				<div class="parcela_info">
					<span class="parcela_title"><?php _e( 'Calidad:', 'canvi' ); ?></span>
				    <span class="parcela_valor">
				        <?php 
				        if ( !empty( $calidad ) ) {
				            echo esc_html( $calidad );
				        } else {
				            _e( 'No disponible', 'canvi' ); // Texto temporal si el campo está vacío
				        }
				        ?>
				    </span>
				</div>
		
				<div class="parcela_info">
					<span class="parcela_title"><?php _e( 'Certificaciones:', 'canvi' ); ?></span>
				    <span class="parcela_valor">
				        <?php 
				        if ( !empty( $certificacion ) ) {
				            echo esc_html( $certificacion );
				        } else {
				            _e( 'No disponible', 'canvi' ); // Texto temporal si el campo está vacío
				        }
				        ?>
				    </span>
				</div>
		
			</div>
			
		</div>

		<div class="box-buttons">
		    <div class="box comprar"><a href="https://mapa.psig.es/canvi/wp-login.php" class="comprar">COMPRAR</a>
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

	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</article><!-- .post -->
