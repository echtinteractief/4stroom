<?php
	// Get the id of member home
	$mother_id = get_top_parent_page_id(); //get mother ancestor id
?>

<?php if(get_field('leden_actie_stempel', $mother_id)): ?>
<div class="action-stamp widget bg-brand-color">
	<div class="action-table">
		<div class="action-content">
			<article>
				
				<h1 class="action-title"><?php echo get_field('actionstamp_titel', $mother_id); ?></h1>
				<p class="action-text"><?php echo get_field('actionstamp_sub_titel', $mother_id); ?></p>
				<a href="#linkto?" class="box-link">Lees meer</a>
			</article>
		</div>
	</div>
</div>
<?php endif; ?>