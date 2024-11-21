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
		$id						= get_field( 'id' );
		$guarda   		= get_field( 'tipus_guarda' );
		$ha						= get_field( 'ha' );
		$d_o					= get_field( 'd_o' );
		$zona_d_o			= get_field( 'zona_d_o' );
		$subzona_d_o	= get_field( 'subzona_d_o' );
		$produccio		= get_field( 'produccio_estimada' );
		$certificacio = get_field( 'certificacion' );
		$valoracion		= get_field( 'valoracion' );
		$qualitat     = get_field( 'calidad' );

    $varietat = get_field('varietat');
    if (sizeof($varietat)>0) {
      // get first varietat only for photo with grape color
      $color = get_field('color', $varietat[0]);
    }
    if ($color != 'blanca' and $color != 'negra') {
      $color = 'negra';
    }
	?>

	<div class="bgparcela">

		<div class="parcela_grid_title">
			<span class="id"><?php echo $id ?></span><br>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <span class="pot">Potencialidad: <?php echo $guarda; ?></span>
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

		<div class="parcela_grid_info">
			<div class="column-ele">
				<span class="label">DO:</span>
				<span class="value"><?php the_field( 'd_o' ); ?></span>
			</div>
			<div class="column-ele">
				<span class="label">Subzona DO:</span>
				<span class="value"><?php echo $zona_d_o; ?></span>
			</div>
			<div class="column-ele">
				<span class="label">Subzona geológica:</span>
				<span class="value"><?php echo $subzona_d_o; ?></span>
			</div>
			<div class="column-ele">
				<span class="label">Superficie:</span>
				<span class="value"><?php echo $ha; ?></span>
			</div>
			<div class="column-ele">
				<span class="label">Tipo guarda:</span>
				<span class="value"><?php echo $tipus_guarda; ?></span>
			</div>
			<div class="column-ele">
				<span class="label">Producción:</span>
				<span class="value"><?php echo $produccio_estimada; ?></span>
			</div>
			<div class="column-ele">
				<span class="label">Valoración Expert:</span>
				<span class="value"><?php echo $valoracion; ?></span>
			</div>
			<div class="column-ele">
				<span class="label">Calidad:</span>
				<span class="value"><?php echo $calidad; ?></span>
			</div>
			<div class="column-ele">
				<span class="label">Certificaciones:</span>
				<span class="value"><?php echo $certificacion; ?></span>
			</div>
		</div>

	</div>

</article><!-- .post -->
