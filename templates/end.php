<!-- footer START -->
<?php $options = get_option('inove_options'); ?>
<div id="footer">
	<a id="gotop" href="#" onclick="MGJS.goTop();return false;"><?php _e('Top', 'inove'); ?></a>
	<a id="powered" href="http://wordpress.org/">WordPress</a>
	<div id="copyright" <? if ($options['copyright_license']) : ?>style="margin-top: 4px;"<? endif; ?>>
		<?php
			global $wpdb;
			$post_datetimes = $wpdb->get_results("SELECT YEAR(min(post_date_gmt)) AS firstyear, YEAR(max(post_date_gmt)) AS lastyear FROM $wpdb->posts WHERE post_date_gmt > 1970");
			if ($post_datetimes) {
				$firstpost_year = $post_datetimes[0]->firstyear;
				$lastpost_year = $post_datetimes[0]->lastyear;

				$copyright = __('Copyright &copy; ', 'inove') . $firstpost_year;
				if($firstpost_year != $lastpost_year) {
					$copyright .= '-'. $lastpost_year;
				}
				$copyright .= ' ';

				echo $copyright;
        if ( $options['copyright_author'] ) {
          echo $options['copyright_author'];
        } else {
  				bloginfo('name');
        }
        if ( $options['copyright_license'] )
          echo "<br />" . $options['copyright_license'];
			}
		?>
	</div>
	<div id="themeinfo">
		<?php _e('Theme by <a href="http://www.neoease.com/">mg12</a>. Valid <a href="http://validator.w3.org/check?uri=referer">XHTML 1.1</a> and <a href="http://jigsaw.w3.org/css-validator/">CSS 3</a>.', 'inove'); ?>
	</div>
</div>
<!-- footer END -->

</div>
<!-- container END -->
</div>
<!-- wrap END -->

<?php wp_footer(); ?>

<? if ( $options['google_analytics'] ) : ?>
  <script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  </script>
  <script type="text/javascript">
  try {
  var pageTracker = _gat._getTracker("<?=$options['google_analytics_ua']?>");
  pageTracker._trackPageview();
  } catch(err) {}</script>
<? endif; ?>


</body>
</html>
