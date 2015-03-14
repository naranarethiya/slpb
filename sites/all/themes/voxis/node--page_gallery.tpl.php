<article id="node-<?php print $node->nid; ?>" class="clearfix" <?php print $attributes; ?>>
  <div class='inner'>
    <div class='text'>
      <div class='inner-border'>
        <div class="title"><?php print strtoupper($title); ?></div>
        <div class='description'>
          <?php if ($display_submitted): ?>
            <div class='date'><?php print $submitted; ?></div>
          <?php endif; ?>
          <div class="row">
            <?php
              $imgcount = count($node->field_page_gallery_image['und']);
              for ($i = 0; $i < $imgcount; $i++) {
                $image_uri = $node->field_page_gallery_image['und'][$i]['uri'];
                $masthead_raw = image_style_url('field_page_gallery_image', $image_uri);
            ?>
			<div class="span2">
              <a href="<?php print file_create_url($node->field_page_gallery_image['und'][$i]['uri']); ?>" rel="prettyPhoto[flickr-gallery]" alt="<?php echo $node->field_page_gallery_image['und'][$i]['alt'] ?>" title="<?php echo $node->field_page_gallery_image['und'][$i]['title']; ?>" id="gallery-a">
                  <img src="<?php print $masthead_raw; ?>" alt="<?php echo $node->field_page_gallery_image['und'][$i]['alt'] ?>" title="<?php echo $node->field_page_gallery_image['und'][$i]['title']; ?>" class="img-polaroid">
              </a>
			</div>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</article>