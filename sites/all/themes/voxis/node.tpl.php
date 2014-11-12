<?php //echo '<pre>'.print_r($field_tag ,true).print_r($node,true).'</pre>';
	//dpm($content);
?>
<article id="node-<?php print $node->nid; ?>" class="<?php if($content['body']['#view_mode']=='full'): ?>blog-page full-node <?php endif; ?>clearfix" <?php print $attributes; ?>>
	<div class='inner'>
		<div class='text'>
			<div class='inner-border'>
				<div class="title"><a href="<?php print $node_url; ?>"><?php print strtoupper($title); ?> </a></div>
				<div class='description'>
					<?php if ($display_submitted): ?>
						<div class='date'><?php print $submitted; ?></div>
					<?php endif; ?>
					<div class="excerpt" <?php print $content_attributes; ?>>
						<p>					
							<?php 						
								hide($content['comments']);
								hide($content['links']);
								hide($content['field_tags']);
								hide($content['taxonomy_term']);
								if(isset($content['field_activity_photos'])) {
									hide($content['field_activity_photos']);
								}
								
								if(isset($content['field_display_image'])) {
									hide($content['field_display_image']);
								}
								
								print render($content); 
							?>
							<?php if($view_mode=='teaser'): ?>
								<a href="<?php print $node_url; ?>">Read More...</a>
							<?php endif; ?>
						</p>
						<p>
							<?php //print render($content['links']);  ?>
						</p>
					</div>
					<?php
						if(isset($content['field_activity_photos'])) {
					?>
						<article>
						  <div class='inner'>
						    <div class='text'>
						      <div class='inner-border'>
						        <div class="title"><?php print "પ્રવુતી ના ફોટો"; ?></div>
						        <div class='description'>
						          <div class="excerpt">
								  
									<?php 
										if(isset($content['field_display_image']['#items'][0])) { 
										$node = $content['field_display_image']['#items'][0];
										$image_uri = $node['uri'];
						                $title=$node['title'];
						                $alt=$node['alt'];
						                $masthead_raw = image_style_url('medium', $image_uri);
									?>
										<a href="<?php print file_create_url($image_uri); ?>" rel="prettyPhoto[flickr-gallery]" alt="<?php echo $node['alt'] ?>" title="<?php echo $node['title']; ?>" id="gallery-a">
						                  <img src="<?php print $masthead_raw; ?>" alt="<?php echo $node['alt'] ?>" title="<?php echo $node['title']; ?>">
						              </a>
									<?php } ?>
								  
						            <?php
						            	$images=$content['body']['#object']->field_activity_photos['und'];
						              foreach($images as $node) {
						                $image_uri = $node['uri'];
						                $title=$node['title'];
						                $alt=$node['alt'];
						                $masthead_raw = image_style_url('field_page_gallery_image', $image_uri);
						            ?>
						              <a href="<?php print file_create_url($image_uri); ?>" rel="prettyPhoto[flickr-gallery]" alt="<?php echo $node['alt'] ?>" title="<?php echo $node['title']; ?>" id="gallery-a">
						                  <img src="<?php print $masthead_raw; ?>" alt="<?php echo $node['alt'] ?>" title="<?php echo $node['title']; ?>">
						              </a>
						          <?php } ?>
						          </div>
						        </div>
						      </div>
						    </div>
						  </div>
						</article>
		        	<?php } ?>
				</div>
			</div>
		</div>
	</div>
	  <?php print render($content['comments']); ?>
</article>