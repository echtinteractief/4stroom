<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /> 
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<?php wp_head(); ?>
<title>
	<?php
		
		$wptitle = wp_title('|', false);
		$placeholders=array('strong','/strong','&lt;', '&gt;', '/');
		$wptitle = str_replace($placeholders,'', $wptitle);
		echo $wptitle;
	?>
	
</title>

<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/library/style/gfx/favicon.png">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-29464609-1', 'auto');
  ga('send', 'pageview');

</script>