</section>

<!--========================================================
                          FOOTER
=========================================================-->
<footer id="footer">
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<div class="footer_menu wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
						<?php wp_nav_menu( array( 'menu' => 'main', 'container' => 'nav', 'depth' => 1 ) ); ?>
					</div>
					<div class="privacy-block wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
						<?php echo get_theme_mod( 'copyright' ); ?> &copy; <span id="copyright-year">2016 г</span>.
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
