
<div class="sort-options right">
	<div class="style-select">
		<select id="boe">
			<option class="placeholder" disabled selected>Sorteer op</option>
			<option value="bla">Datum</option>
			<option value="Sipsum">A-Z</option>
			<option value="Vlorem">Z-A</option>
		</select>
	</div>
</div>
<nav class=" sub-nav">
	<ul class="subnav-list">
		<li class="menu-item">
			<h3 class="subnav-title"><a href="<?php echo post_permalink($mother_id); ?>">Nieuws</a></h3>
			<ul class="sub-menu">
				<?php
				$args = array(
						'show_option_all'    => '',
						'orderby'            => 'name',
						'order'              => 'ASC',
						'style'              => 'list',
						'show_count'         => 0,
						'hide_empty'         => 1,
						'use_desc_for_title' => 1,
						'child_of'           => 0,
						'feed'               => '',
						'feed_type'          => '',
						'feed_image'         => '',
						'exclude'            => '',
						'exclude_tree'       => '',
						'include'            => '',
						'hierarchical'       => 1,
						'title_li'           => __( '' ),
						'show_option_none'   => __( '' ),
						'number'             => null,
						'echo'               => 1,
						'depth'              => 0,
						'current_category'   => 0,
						'pad_counts'         => 0,
						'taxonomy'           => 'category',
						'walker'             => null
				);
				wp_list_categories( $args );
				?>
			</ul>
		</li>
	</ul>
</nav>

