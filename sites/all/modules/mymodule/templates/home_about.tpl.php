<article class="blog-page full-node">
	<div class='inner'>
		<div class='text'>
			<div class='inner-border'>
				<div class="title"> ફોટો ગેલેરી ના નવા ફોટો </div>
				<div class='description'>
					<div class="excerpt">
						<marquee direction="right" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 6, 0);" scrollamount="6">
							<?php 
								$i=0;
								foreach((array)$nodes as $node) {
									foreach($node->field_page_gallery_image['und'] as $img) {
										if($i >= 10) {
											break;
										}
										$thumb = image_style_url('field_page_gallery_image', $img['uri']);
										$title=$img['title'];
										$alt=$img['alt'];
										$img=file_create_url($img['uri']);
							?>
						
							<a href="<?php echo $img; ?>" rel="prettyPhoto[flickr-gallery]" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" id="gallery-a">
								<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
							</a>
							<?php 
										$i++;
									} 
								} 
							?>
						</marquee>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>