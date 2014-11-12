<article class="category-showcase">
  <div class='inner'>
    <div class='text'>
      <div class='inner-border'>
        <div class="title"><a href="#"><?php print $title; ?></a></div>
      </div>
    </div>
  </div>
  
  
  
  <div class="categories">
  	<?php $i=0; ?>
    <?php foreach($nodes as $node): ?>
    <?php
    	$name=$node->title;
        $note='';
        if(isset($node->field_staff_note['und'][0]['value'])) {
            $note=$node->field_staff_note['und'][0]['value'];
        }
		
    	$post=$node->field_staff_post['und'][0]['value'];
    	$image_uri = $node->field_photo['und'][0]['uri'];
        $masthead_raw = image_style_url('thumbnail', $image_uri);
    ?>
    	<div class="half">
			<a href="#">
			    <figure>
			        <img src="<?php echo $masthead_raw; ?>" alt="<?php echo $name; ?>">
			    </figure>
			    <div class="category-text">
			        <h4><?php echo $name; ?></h4>
			        <div class="date"><?php echo $post; ?></div>
              <div class="date"><strong><?php echo $note; ?></strong></div>
			    </div>
			</a>
		</div>
    <?php 
    	$i++;
    	endforeach; 
    ?>
	
	<?php
	if(count($nodes) < 1) { 
	?>
		<div class="half">
			<div class="messages error">આ વિભાગ મા કોઇ અધિકારી ની માહિતી નથી</div>
		</div>
	<?php
	}
  ?>
	
  </div>
</article>