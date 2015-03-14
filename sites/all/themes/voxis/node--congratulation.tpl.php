<?php
    $title=$node->title;
    $body=$node->body['und'][0]['value'];
	if($body=='') {
		$body=$node->body[0]['value'];
	}
	
    $display_img=$node->field_image['und'][0]['uri'];
    $img_title=$node->field_image['und'][0]['title'];
    $img_src=file_create_url($display_img);
   
    $timestamp = strtotime($node->changed);
    $date=date('d, F Y - h:i');
?>

<article class="document-upload">
	<div class="inner">
		<figure class="figure" style="width:25%">
			<img style="width:200px" src="<?php echo $img_src; ?>" alt="<?php echo $img_title; ?>" title="<?php echo $img_title; ?>">
		</figure>
		<div class="text" style="width:72%">
			<div class="inner-border">
				<div class="title"><a href="#"><?php echo strtoupper($title); ?></a></div>
				<div class="description">
					<div class="date"><?php echo "Submitted on ".$date; ?></div>
					<div class="excerpt">
						<p>
							<?php echo $body; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>