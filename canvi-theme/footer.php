<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
		
                <footer id="site-footer" class="header-footer-group">
                    <div class="section-inner">
                        <div class="footer-columns">
                            <!-- Columna 1: CANVI -->
                            <div class="footer-column">
                                <h4>CANVI</h4>
                                <p>CanVi es una plataforma ..... </p>
                            </div>
                
                            <!-- Columna 2: Mercado -->
                            <div class="footer-column">
                                <h4>Mercado</h4>
                                <ul>
                                    <li><a href="https://mapa.psig.es/canvi/contacto/">Unirse como comprador</a></li>
                                    <li><a href="https://mapa.psig.es/canvi/contacto/">Unirse como vendedor</a></li>
                                </ul>
                            </div>
                
                            <!-- Columna 3: Ayuda -->
                            <div class="footer-column">
                                <h4>Ayuda</h4>
                                <ul>
                                    <li><a href="https://mapa.psig.es/canvi/ayuda/">Centro de ayuda</a></li>
                                    <li><a href="https://mapa.psig.es/canvi/contacto/">Contáctanos</a></li>
                                </ul>
                            </div>
                        </div><!-- .footer-columns -->
                
                        <div class="footer-credits">     
						
                        </div><!-- .footer-credits -->
                
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php
                                /* translators: %s: HTML character for up arrow. */
                                printf( __( 'To the top %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                                ?>
                            </span><!-- .to-the-top-long -->
                            <span class="to-the-top-short">
                                <?php
                                /* translators: %s: HTML character for up arrow. */
                                printf( __( 'Up %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                                ?>
                            </span><!-- .to-the-top-short -->
                        </a><!-- .to-the-top -->
                
                    </div><!-- .section-inner -->
                </footer><!-- #site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>





