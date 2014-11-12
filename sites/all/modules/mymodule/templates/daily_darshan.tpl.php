<div class='articles-slider' id="entertainment-slider">
	<ul class='slides'>
	<?php $img_base='http://www.bhujmandir.org'; ?>
	<?php foreach($images as $image): ?>
	   <li>
		   <div class='main-article' style="text-align:center">
				<img src="<?php echo $img_base.$image->image_mid; ?>" style="height:231px;" alt="" />
		   </div>
		</li>
		<?php endforeach; ?>
	</ul>
</div>