<!doctype html>
<!--[if lt IE 7 ]>
<html class="ie ieLT ie6" lang="nl"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ieLT ie7" lang="nl"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ieLT ie8" lang="nl"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ieLT ie9" lang="nl"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="nl">
<head>
	<?php
	get_header();

	//body page class
	$page_slug = "";
	
		$page_slug = 'ledenPage post-' . $post->post_name;
	
	?>
</head>
<body <?php body_class($page_slug); ?>>

<?php
get_template_part( 'parts/members/leden-topnav' );
get_template_part( 'parts/members/leden-header-img' );
?>

<article>
	<?php get_template_part( 'parts/members/leden-mainnav' ); ?>

	<?php 
		get_template_part('page/members/action-detail');
	?>

	
</article>

<footer class="footer-page-end">
	<div class="row">
		<span class=""><?php echo date('Y'); ?>  </span>
		<em class=""><?php bloginfo('name'); ?>, <?php bloginfo('description');?></em>
	</div>
</footer>
	
	
<?php wp_footer(); ?>
</body>
</html>