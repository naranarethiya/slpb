<?php
	dpm($contant);
 ?>

<?php
    $title=$node->title;
    $body=$node->body['und'][0]['value'];

    $file=$node->field_result_document_file['und'][0]['uri'];
    $file_src=file_create_url($file);

    $display_img=$node->field_display_image['und'][0]['uri'];
    $img_alt=$node->field_display_image['und'][0]['alt'];
    $img_title=$node->field_display_image['und'][0]['title'];
    $img_src=file_create_url($display_img);
    $note='';
    if(isset($node->field_result_note['und'][0]['value'])) { $note=$node->field_result_note['und'][0]['value']; }

    $timestamp = strtotime($node->changed);
    $date=date('d, F Y - h:i');
?>

<article class="document-upload">
        <div class="inner">
            <figure class="figure" style="width:30%">
                <img src="<?php echo $img_src; ?>" alt="">
            </figure>
            <div class="text" style="width:68%">
                <div class="inner-border">
                    <div class="title"><a href="<?php echo $file_src ?>"><?php echo strtoupper($title); ?></a></div>
                    <div class="description">
                        <div class="date"><?php echo "Submitted on ".$date; ?></div>
                        <div class="excerpt">
                            <?php if($note!='') { ?><p><span class="highlight"><?php echo $note; ?></span></p><?php } ?>
                            <p>
                                <?php echo $body; ?>
                            </p>
                            <p>
                                <a href="<?php echo $file_src ?>"><img src="<?php echo base_path().'sites/default/files/download60.png' ?>"/> Download File</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>