<?php
/*
Template Name: Leden page template
*/
?>

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
	if ( is_page() ) {
		$page_slug = 'ledenPage page-' . $post->post_name;
	}
	?>
</head>
<body <?php body_class($page_slug); ?>>

<?php
get_template_part( 'parts/members/leden-topnav' );
get_template_part( 'parts/members/leden-header-img' );
?>

<article>
	<?php get_template_part( 'parts/members/leden-mainnav' ); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
	<?php 
	
		if(is_page('aanbod')) {
			get_template_part('page/members/overview');
		} 
		elseif(is_page('leden')) {
			get_template_part('page/members/home');
		} else {
			get_template_part('page/members/detail');
		} 
	
	?>

	<?php endwhile; endif; ?>
</article>

<?php get_footer(); ?>
</body>
</html>