<?php
/**
 * All of the parameters passed to the function where this file is being required are accessible in this scope:
 *
 * @param array    $attributes     The array of attributes for this block.
 * @param string   $content        Rendered block output. ie. <InnerBlocks.Content />.
 * @param WP_Block $block_instance The instance of the WP_Block class that represents the block being rendered.
 *
 * @package gutenberg-examples
 */

?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes() ); ?>>
	<div class="sim-icons">
		<ul>
			<?php for ($i = 1; $i <= 3; $i++) { ?>
				<li class="sim-icon-circle" id="sim-icon-circle-<?= $i; ?>" style="left: <?= ($i*10)+15; ?>px"></li>
			<?php } ?>
		</ul>
	</div>
	<div class="content-container">
    <?php echo $content ?>
	</div>
</div>
