<?php
/**
 * Template for showing parcela content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package canvi
 */

// Load values
$id				= get_field( 'id' );
$varietats		= get_field( 'varietat' );
$campanya_rv	= get_field( 'campanya_rv' );
$ha				= get_field( 'ha' );
$subzona      	= get_field( 'subzona' );
?>

<tr <?php post_class('parcela'); ?> id="post-<?php the_ID(); ?>">

	<td>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</td>

	<td>
		<?php 
		if( $varietats ){
			$i = 0;
			foreach( $varietats as $varietat ) {
            	if ( $i>0 ) echo ", ";
            	echo esc_html( $varietat->name );
    			$i++; 
		    }
		} 
		?>
	</td>

	<td>
		<?php echo esc_html( $campanya_rv ); ?>
	</td>

	<td>
		<?php echo esc_html( $ha ); ?>
	</td>

	<td>
		<?php echo esc_html( $subzona ); ?>
	</td>

</tr><!-- .post -->
