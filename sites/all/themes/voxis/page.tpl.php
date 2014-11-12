<?php 
	///dpm($page);
 ?>
<div id="feedback_link">
	<span id="arrow"><a href="./contact">Feedback</a></span>
</div>
<header>
	<!-- header container -->
    <div class='container'>
		<!-- #pre-header -->
		<div class='row menu-line' id="pre-header">
			<div class='span10'>
				<!--<nav>
					<ul>
						<li class='active'><a href="index-2.html">Home</a></li>
						<li><a href="blog.html">Post Layout</a></li>
						<li><a href="homepage-blog.html">Pages</a></li>
						<li><a href="shortcodes-texts.html">Shortcodes</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</nav>-->
				<p class="header-title">શ્રી લેવા પાટીદાર બોર્ડિંગ,ભચાઉ—કચ્છ ટ્રસ્ટ રજી. નં:- એ - ૧૦૫૭ - કચ્છ</p>
			</div>
			<!--<div class='span3 social-links'>
				<ul>
					<li><a href="#" class='facebook'>Facebook</a></li>
					<li><a href="#" class='twitter'>Twitter</a></li>
					<li><a href="#" class='pinterest'>Pinterest</a></li>
					<li><a href="#" class='googleplus'>Google+</a></li>
				</ul>
			</div>-->
			<div class='span2 search-form'>
				<form action="/drupal/search/node">
					<input class='span2' type="text" id="edit-keys" name="keys" placeholder="Search..." />
					<input type="submit" name="submit" value='Search' />
				</form>
			</div>
		</div>
		<!-- EOF: #pre-header -->
		
		<?php if(isset($page['posts_title'])): ?>
		<!-- #header-top -->
			<div class='row breaking-news' id="header-top">
				<div class='span2 title' id="header-top-one">
				   <span>Latest Post</span>
				</div>
				<div class='span10 header-news' id="header-top-two">
					<ul id="js-news" class="js-hidden">
						<?php print($page['posts_title']); ?>
					</ul>
				</div>
			</div>
		<!-- EOF: #header-top -->
		<?php endif; ?>
		
		<!-- Header  -->
			<div class='row logo-line' id="header">
				<div class='span10 logo' id="header-logo">
					<?php if ($logo):?>
						<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
							
								<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
							
						</a>
					<?php endif; ?>
				</div>
				<?php if ($page['header']) :?>
					<?php //print render($page['header']); ?>
                <?php endif; ?>
				<div class="span2 advertising hidden-phone align-right" id="header-ads">
					<img src="<?php echo base_path(); ?>sites/default/files/saraswatiji.png">
				</div>
				
			</div>
		<!-- EOF: #Header  -->
		
		<!-- #main-navigation -->
		<div class='row main-nav' id="main-navigation">
			<div class='span12'>
				<nav>
				
					<?php if($page['custom_menu']):  ?>
						<?php print $page['custom_menu']; ?>
					<?php else: ?>
						<?php if ($page['navigation']) :?>
							<?php print drupal_render($page['navigation']); ?>
							
							<?php else : ?>
							
							<?php 
								print theme('links__system_main_menu', 
									array('links' => $main_menu, 
										'attributes' => 
											array('class' => 
												array('main-menu', 'menu'),
											),
									)
								); 
							?>

						<?php endif; ?>
					<?php endif; ?>
				</nav>
			</div>
		</div>
		<!-- EOF: #main-navigation --> 
	</div>
	<!-- #header container -->
</header>

<?php if ($is_front): ?>
	<!-- #banner -->
	<!--<div class='slider hidden-phone' id="banner">
		<div class='container' id="banner-container">
			<div class='row'>
				<div class='inner'>
					<div id="slider">
						<ul class='slides'>
							<?php //echo $page['home_banner']['li']; ?>
						</ul>
					</div>
					<div class='span12 slider-navigation'>
						<?php //echo $page['home_banner']['title']; ?>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<!-- EOF:#banner -->
	<?php  print render($page['banner']); ?>
<?php endif; ?>

<div id="main">
    <div class='container'>
	
		<?php if ($page['highlighted']):?>
			<!-- #top-content -->
			<div class='row'>
				<div id="highlighted" class="clearfix">
					<div class="container">
						<!-- #top-content-inside -->
						<div id="top-content-inside" class="clearfix">
							<div class="row">
								<div class="sapn12">
									<?php print render($page['highlighted']); ?>
								</div>
							</div>
						</div>
						<!-- EOF:#top-content-inside -->
					</div>
				</div>
			</div>
			<!-- EOF: #top-content -->
		<?php endif; ?>
		
        <div class='row'>
			
			<?php if ($page['sidebar_first']):?>
                <aside class="span4`">  
                    <!--#sidebar-first-->
                    <section id="sidebar-first" class="sidebar clearfix">
						<?php print render($page['sidebar_first']); ?>
                    </section>
                    <!--EOF:#sidebar-first-->
                </aside>
            <?php endif; ?>
			
            <div class='content span8 blog-page blog-style'>
				 <!-- #messages-console -->
				<?php if ($messages):?>
					<div id="messages-console" class="clearfix">
						<div class="row">
							<div class="span8">
								<?php print $messages; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<!-- EOF: #messages-console -->
				
				<!--#content-wrapper -->
            	<div id="content-wrapper">
	                  <?php print render($title_prefix); ?>
	                  <?php if ($title):?>
	                    <?php if(isset($view_mode) && $view_mode=='teaser'): ?>
	                    	<h2 class="page-title"><?php print strtoupper($title); ?></h1>
	                    <?php endif; ?>
	                  <?php endif; ?>
	                  <?php print render($title_suffix); ?>

	                  <?php print render($page['help']); ?>
	            
	                  <!-- #tabs -->
	                  <?php if($tabs):?>
	                      <div class="tabs">
	                      <?php print render($tabs); ?>
	                      </div>
	                  <?php endif; ?>
	                  <!-- EOF: #tabs -->

	                  <!-- #action links -->
	                  <?php if ($action_links):?>
	                      <ul class="action-links">
	                      <?php print render($action_links); ?>
	                      </ul>
	                  <?php endif; ?>
	                  <!-- EOF: #action links -->
	                  <?php print render($page['content']); ?>
	                  <?php print $feed_icons; ?>
            	</div>
              <!-- EOF:#content-wrapper -->
			</div>
			
			
			
			<?php if ($page['sidebar_second']):?>
                <aside class="span4">
                    <!--#sidebar-second-->
                    <section id="sidebar-second" class="sidebar clearfix">
						<?php print render($page['sidebar_second']); ?>
                    </section>
                    <!--EOF:#sidebar-second-->
                </aside>
            <?php endif; ?>
		</div>
	</div>
</div>


<?php if ($page['bottom_content']):?>
    <!-- #bottom-content -->
    <div id="bottom-content" class="clearfix">
        <div class="container">
            <!-- #bottom-content-inside -->
            <div id="bottom-content-inside" class="clearfix">
                <div class="row">
                    <div class="span12">
                    <?php print render($page['bottom_content']); ?>
                    </div>
                </div>
            </div>
            <!-- EOF:#bottom-content-inside -->
        </div>
    </div>
    <!-- EOF: #bottom-content -->
<?php endif; ?>


<?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer_fourth']):?>
<!-- #footer -->
	<footer>
		<div class='container'>
			<div class="row">
                <div class="span4 footer-widget">
                    <?php if ($page['footer_first']):?>
						<?php print render($page['footer_first']); ?>
                    <?php endif; ?>
                </div>
                
                <div class="span4 footer-widget">
                    <?php if ($page['footer_second']):?>
						<?php print render($page['footer_second']); ?>
                    <?php endif; ?>
                </div>

                <div class="span4 footer-widget">
                    <?php if ($page['footer_third']):?>
						<?php print render($page['footer_third']); ?>
                    <?php endif; ?>
                </div>
            </div>
		</div>
	</footer>
<?php endif; ?>

<div class='sub-footer'>
    <div class='container'>
        <div class='row'>
            <div class='span9 copyright'>
                Copyright &copy; slpb.org. Developed by <a href="http://gordinateur.com/">G-Ordinateur</a>.
            </div>
            <div class='span3 social-links'>
                <ul>
                    <li><a href="#" class='facebook'>Facebook</a></li>
                    <li><a href="#" class='twitter'>Twitter</a></li>
                    <li><a href="#" class='pinterest'>Pinterest</a></li>
                    <li><a href="#" class='googleplus'>Google+</a></li>
                </ul>
            </div>
        </div>
        <a href='#' class='back-to-top'>Scroll Top</a>
    </div>
</div>