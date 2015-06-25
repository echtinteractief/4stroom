<?php

	$mother_id = get_top_parent_page_id(); //get mother ancestor id	
?>
<nav class=" sub-nav">
	<h3 class="subnav-title"><a href="<?php echo post_permalink($mother_id); ?>"><?php echo get_the_title($mother_id); ?></a></h3>
	<ul class="subnav-list">

	<?php
		wp_list_pages("title_li=&child_of=".$mother_id);
	?>
	</ul>
</nav>
