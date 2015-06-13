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