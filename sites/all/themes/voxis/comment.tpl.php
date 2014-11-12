<div class="comments row">
	<div class="span8">
		<div class="top-comment comment">
			<div class="left">
				<figure>
					 <?php print $picture; ?>
				</figure>
			</div>
			<div class="right">
				<div class='text'>
					<div class='name'><?php print $author; ?></div>
					<span class="date"> <?php print date('d-M-Y',$comment->created); ?></span>
					<p>
						<?php
							hide($content['links']);
							print render($content);
						?>
					</p>
					<p>
						  <?php print render($content['links']) ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>