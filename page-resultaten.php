<?php
/*
Template Name: Resultaten
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
		$page_slug = 'page-' . $post->post_name;
	}
	?>
</head>
<body <?php body_class( $page_slug ); ?>>

<?php
get_template_part( 'parts/common/topnav' );
get_template_part( 'parts/common/_part-header-img' );
?>

<article>
	<?php get_template_part( 'parts/services/nav' ); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="row block-padding page-overview">

				<?php if(is_page('vacatures')){
					get_template_part('page/jobs/overview');
			} ?>

			<!--<aside class="grid-4 sidebar">
				<?php get_template_part( 'parts/services/subnav' ); ?>
			</aside>-->
		</div>
	<?php endwhile; endif; ?>
</article>
<?php get_footer(); ?>
</body>
</html>