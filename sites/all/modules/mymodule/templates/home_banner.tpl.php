<?php //echo base_path(); ?>
<div class='slider hidden-phone' id="banner">
		<div class='container' id="banner-container">
			<div class='row'>
				<div class='inner'>
					<div id="slider">
						<ul class='slides'> 
						<?php $i=0;$title=''; ?>
							<?php foreach($nodes as $node) {
								$img=$node->field_image['und'][0];
									echo '<li>
										<div class="span12 single-slide">
											<figure>
												<img src="'.base_path().'sites/default/files/'.$img['filename'].'" alt="'.$img['alt'].'" width="'.$img['width'].'" height="'.$img['height'].'" title="'.$img['title'].'" />
											</figure>
											<div class="slider-caption">';
                                                if($node->title!='') {
                                                    /* echo '<div class="span6 no-margin">
                                                            <div class="title">'.$node->title.'</div>
                                                        </div><br >';)*/
                                                }
                                                if(isset($node->field_short_description['und']) && $node->field_short_description['und'][0]['safe_value']!='') {
                                                    echo '<div class="description span5">'.$node->field_short_description['und'][0]['safe_value'].'</div>';
                                                }
												echo '
											</div>
										</div>
									</li>
								';
								if($i==0) {
									$attr='first-child active';
								}
								else{
									$attr='';
								}
								$title.='
									<div class="navigation-item '.$attr.'" rel="'.($i+1).'">
										<span>'.$node->title.'</span>
									</div>
								';
								$i++;
							}
							?>
						</ul>
					</div>
					<div class='span12 slider-navigation'>
						<?php echo $title; ?>
					</div>
				</div>
			</div>
		</div>
	</div>