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
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter36997680 = new Ya.Metrika({ id:36997680, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/36997680" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</body>
</html>
