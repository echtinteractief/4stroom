<?php

function switch_page_template() {
	global $post;
	// Checks if current post type is a page, rather than a post
	if (is_page()) {
		$mother = get_top_parent_page_id();
		$mother_title= get_the_title($mother);
		//if($mother_title == "leden") {
		if($mother == 37) {
			$ancestors = $post->ancestors;
			
			if ($ancestors) {
				$parent_page_template = get_post_meta(end($ancestors),'_wp_page_template',true);
				$template = TEMPLATEPATH . "/{$parent_page_template}";
	
				if (file_exists($template)) {
					load_template($template);
					exit;
				}
			} else {
				return true;
			}
		}
	}
}

add_action('template_redirect','switch_page_template');

/**------------------------------------------------------
remove wordpress jquery
--------------------------------------------------------*/
remove_action('wp_footer', 'wp_func_jquery');

/**------------------------------------------------------
turn link of by set image link to uri image or page.
--------------------------------------------------------*/
update_option('image_default_link_type','none');


/**------------------------------------------------------
add tagging for pages
--------------------------------------------------------*/
function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');


/**------------------------------------------------------
Create breadcrumb
--------------------------------------------------------*/
function the_breadcrumb($split='') {
	$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter = $split; // delimiter between crumbs
	$home = 'Home'; // text for the 'Home' link
	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before = '<li>'; // tag before the current crumb
	$after = '</li>'; // tag after the current crumb

	global $post;
	$homeLink = get_bloginfo('url');

	if (is_home() || is_front_page()) {

		if ($showOnHome == 1) {
			echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>';
		}

		if(have_posts()) {
			echo '<li><a href="' . $homeLink . '">' .$home. '</a> '.$delimiter.' </li><li>Nieuws</li>';
		}

	} else {

		echo '<li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';

		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);

			if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
			echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

		} elseif ( is_search() ) {
			echo $before . 'Search results for "' . get_search_query() . '"' . $after;

		} elseif ( is_day() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				//echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>';
				echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $slug['slug'] . '</a></li>';
				if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
				echo $cats;
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
			if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

		} elseif ( is_page() && !$post->post_parent ) {
			if ($showCurrent == 1) echo $before .'<span class="active">'. get_the_title() .'</span>'. $after;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
			}
			if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before .'<span class="active">'. get_the_title() . '</span>'.$after;

		} elseif ( is_tag() ) {
			echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . 'Articles posted by ' . $userdata->display_name . $after;

		} elseif ( is_404() ) {
			echo $before . 'Error 404' . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '';

	}
}


/**------------------------------------------------------
remove default wp gallery, for use in theme file:

if ( has_shortcode( $post->post_content, 'gallery' ) ) {
$post_content = $post->post_content;
preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
$array_id = explode(",", $ids[1]);
$string=implode(",",$array_id);

if ($array_id) {
echo do_shortcode('[gallery link="file" ids="'.$string.'"]');
}
}

--------------------------------------------------------*/
function theme_remove_gallery_sc( $content = null ){
	global $post;

	//if( is_single() && is_main_query() && $post->post_type == 'projecten' ){

	if( is_single() && is_main_query() ){
		$pattern = get_shortcode_regex();
		preg_match('/'.$pattern.'/s', $content, $matches);
		if ( isset($matches[2]) && is_array($matches) && $matches[2] == 'gallery') {
			//shortcode is being used
			$content = str_replace( $matches['0'], '', $content );
		}
	}
	return $content;
}
add_filter( 'the_content', 'theme_remove_gallery_sc' );


/**------------------------------------------------
Set special sitemap class for the footer sitemap
--------------------------------------------------*/
class Footer_Sitemap_Nav extends Walker_Nav_Menu {
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		$element->has_children = !empty( $children_elements[$element->ID] );
		$element->classes[] = ($depth == 0) ? 'sitemap-item' : '';
		//$element->classes[] = ( $element->has_children ) ? 'has-subnav' : '';
		//$element->classes[] = ( sizeof($children_elements)>1) ? 'has-dropdown-more' : 'has-dropdown-one';

		if($depth>=1):
			$element->classes[] = 'sitemap-subitem';
		endif;

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$item_html = '';
		parent::start_el( $item_html, $object, $depth, $args );
		$output .= $item_html;
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul class=\"sitemap-subgroup\">\n";
	}
}


//return top ancestor id
function get_top_parent_page_id($postId = null) {

	global $post;

	$ancestors = $post->ancestors;

	if(isset($postId))
	{
		$ancestors = get_post($postId)->ancestors;
	}

	// Check if page is a child page (any level)
	if ($ancestors) {

		//  Grab the ID of top-level page from the tree
		return end($ancestors);

	} else {

		// Page is the top level, so use  it's own id
		return $post->ID;

	}

}



?>