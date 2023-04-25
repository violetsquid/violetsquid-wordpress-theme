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
	<div class="vsqd-sidebar-nav">
		<h2>Find your section quicker...</h2>
		<hr></hr>
		<ul class="vsqd-sidebar-nav-list">
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
	</div>
	<div class="vsqd-sidebar-main">
    <?php echo $content ?>
	</div>
</div>
