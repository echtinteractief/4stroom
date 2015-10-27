
<nav class=" sub-nav">
	<ul class="subnav-list">
		<li class="menu-item">
			<h3 class="subnav-title"><a href="/nieuws">Nieuws</a></h3>
			<ul class="sub-menu">
			<?php	// Get all the taxonomies for this post type
			$categories = get_terms('category');
			$currentCategory = $_GET['category'];

			foreach( $categories as $category ):

			echo '<li class="cat-item"><a ' . ($currentCategory == $category->name ? 'class="current_page_item" ' : '') . 'title="' . $category->name . '" href="/nieuws?category='. $category->name .'">' . $category->name.'</a></li>';

			endforeach;

			?>
			</ul>
		</li>
	</ul>
</nav>

