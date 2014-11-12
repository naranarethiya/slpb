<div class='articles-slider' id="business-slider">
        <ul class='slides' style="max-height: 350px">
            <?php
            $i=0;
            foreach($nodes as $node):
                if($i > 4) {
                    break;
                }
                $image_uri = $node->field_ads_image['und'][0]['uri'];
                $masthead_raw = image_style_url('medium', $image_uri);
            ?>
            <li>
                <div class='main-article'>
                     <div class='title'>
                        <span>
                            <a <?php
                            if(isset($node->field_ads_link['und'][0]['value']) && $node->field_ads_link['und'][0]['value']!='#')
                            { echo 'target="_blank"'; }
                        ?>
                        href="
                            <?php
                                if(isset($node->field_ads_link['und'][0]['value'])) {
                                    echo  ucfirst($node->field_ads_link['und'][0]['value']);
                                }
                            ?>"
                        >
                            <?php echo $node->title; ?></a>
                        </span>
                    </div>
                    <a <?php
                    if(isset($node->field_ads_link['und'][0]['value']) && $node->field_ads_link['und'][0]['value']!='#')
                    { echo 'target="_blank"'; }
                    ?>
                        href="
                            <?php
                        if(isset($node->field_ads_link['und'][0]['value'])) {
                            echo  ucfirst($node->field_ads_link['und'][0]['value']);
                        }
                        ?>"
                        >
                    <figure>
                        <img src="<?php echo $masthead_raw; ?>" alt="<?php echo $node->title; ?>" title="<?php echo $node->title; ?>" />
                    </figure>
                    </a>
                    <div class='main-text'>
                        <div class='inner'>
                            <p><?php if(isset($node->field_ads_detail['und'][0]['value'])) { echo $node->field_ads_detail['und'][0]['value']; } ?></p>
                        </div>
                    </div>
                </div>
            </li>
            <?php
                $i++;
                endforeach;
            ?>
        </ul>
</div>