<?php $render_template = $args['render_template'] ?? true ?>

<!DOCTYPE html>
<html <?php language_attributes() ?>
	  class="scroll-smooth">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			  content="width=device-width, initial-scale=1.0">
		<?php wp_head() ?>
	</head>

	<body <?php body_class( 'bg-stone-900 text-white bg-repeat data-[popup=true]:overflow-hidden' ) ?>
		  data-popup="false"
		  style="background-image:url('<?php echo get_option( 'body_bg', '' ) ?>')">
		<?php wp_body_open() ?>

		<?php get_template_part( '/assets/icons/icons' ) ?>
		<?php cyn_get_component( '/mouse' ) ?>
		<?php cyn_get_component( '/preloader' ) ?>



		<?php if ( $render_template ) : ?>
			<?php cyn_get_part( '/header/template' ) ?>
		<?php endif; ?>

		<main class="min-h-[90vh]">