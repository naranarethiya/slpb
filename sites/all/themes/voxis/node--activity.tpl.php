<?php
	if($content['body']['#view_mode'] == 'teaser') {
 ?>
 
<?php
	$node_href=base_path()."node/".$node->nid;
    $title=$node->title;
    $body=$node->body['und'][0]['value'];
	if($body=='') {
		$body=$node->body[0]['value'];
	}
	
    $display_img=$node->field_display_image['und'][0]['uri'];
    $img_alt=$node->field_display_image['und'][0]['alt'];
    $img_title=$node->field_display_image['und'][0]['title'];
	$img_src=image_style_url('medium', $display_img);
    //$img_src=file_create_url($display_img);
    $note='';
	
    if(isset($node->field_result_note['und'][0]['value'])) { 
		$note=$node->field_result_note['und'][0]['value']; 
	}

    $timestamp = strtotime($node->changed);
    $date=date('d, F Y - h:i');
?>

<article class="document-upload">
        <div class="inner">
            <figure class="figure" style="width:25%">
                <img src="<?php echo $img_src; ?>" alt="">
            </figure>
            <div class="text" style="width:72%">
                <div class="inner-border">
                    <div class="title"><a href="<?php echo $node_href; ?>"><?php echo strtoupper($title); ?></a></div>
                    <div class="description">
                        <div class="date"><?php echo "Submitted on ".$date; ?></div>
                        <div class="excerpt">
                            <?php if($note!='') { ?>
								<p><span class="highlight"><?php echo $note; ?></span></p>
							<?php } ?>
                            <p>
                                <?php echo $body; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php
	}
	else {
		include('node.tpl.php');
	}
?>