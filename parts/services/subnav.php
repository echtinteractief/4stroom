<?php
	if(get_post_type() == 'vacature')
	{
		$vacaturePage = get_page_by_title('vacatures');
		$mother_id = get_top_parent_page_id($vacaturePage->ID);

	}
	else {
		$mother_id = get_top_parent_page_id(); //get mother ancestor id
	}
?>
<nav class=" sub-nav">
	<ul class="subnav-list">
		<li class="menu-item">
			<h3 class="subnav-title">
				<a href="<?php echo post_permalink($mother_id); ?>"><?php echo get_the_title($mother_id); ?></a>
			</h3>
			<ul class="sub-menu">

				<?php
					wp_list_pages("title_li=&child_of=".$mother_id);
				?>	
			</ul>
		</li>
	</ul>
</nav>
