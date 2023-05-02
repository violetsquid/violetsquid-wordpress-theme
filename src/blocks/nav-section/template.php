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

if(!function_exists("createSlug")) {
	function createSlug($str, $delimiter = '-'){

		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
		return $slug;

	} 
}

?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes() ); ?>>
	<div class="vsqd-sidebar-main">
		<h2><?php
		if ( isset( $attributes['header'] ) ) {
			/**
			 * The wp_kses_post function is used to ensure any HTML that is not allowed in a post will be escaped.
			 *
			 * @see https://developer.wordpress.org/reference/functions/wp_kses_post/
			 * @see https://developer.wordpress.org/themes/theme-security/data-sanitization-escaping/#escaping-securing-output
			 */
			echo wp_kses_post( $attributes['header'] );
		}
		?></h2>
		<div class="vsqd-sidebar-nav">
			<h3>Dive deeper into this section...</h3>
			<hr></hr>
			<ul class="vsqd-sidebar-nav-list">
			<?php $upNext = "up-next-" . rand() ?>
			<?php 
			$dom = new DOMDocument;
			$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
			if($list = $dom->getElementsByTagName("h3")) {
				foreach ($list as $item) { ?>
					<li><a href="#
						<?php 
							if ($id = $item->getAttribute('id')) {
								echo $id;
							} else {
								$slug = createSlug($item->textContent) . "-" . rand();
								$item->setAttribute('id', $slug);
								echo $slug;
							}
						?>">
					<?= $item->textContent ?></a></li>
					<?php }
				$content = $dom->saveHTML();
			} else {}
			?>
			</ul>
			<div class="up-next">
			<hr></hr>
			<h3 class="vsqd-nav-section-up-next"><a href="#<?= $upNext ?>">Move down the page?</a></h3>
			</div>
		</div>
		<?php echo $content ?>
		<div class="end-of-nav-section" id="<?= $upNext ?>"></div>
	</div>
</div>
