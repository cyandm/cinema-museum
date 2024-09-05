<div class="container">
	<div class="bg-white/10 flex justify-between items-center p-2 rounded-lg">
		<div class="text-lg">
			<?php echo $args['title'] ?>
		</div>

		<form id="categoryDropDown">
			<div class="[&_select]:w-full">
				<?php
				wp_dropdown_categories( [ 
					'show_option_none' => 'همه',
					'option_none_value' => 'video',
					'selected' => -1,
					'taxonomy' => $args['taxonomy'],
					'hide_empty' => true,
					'parent' => 0,
					'class' => 'form-select rounded-lg border cursor-pointer bg-black',
					'value_field' => 'slug'
				] );
				?>
			</div>

			<input type="hidden"
				   name="baseUrl"
				   value="<?php echo site_url( $args['taxonomy'] ) ?>">

			<input type="hidden"
				   name="categoryBase"
				   value="<?php echo $args['taxonomy'] ?>">

			<input type="hidden"
				   name="baseArchive"
				   value="<?php echo $args['post-type'] ?>">
		</form>
	</div>
</div>