<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.0.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>

<form method="post"
	  class="woocommerce-ResetPassword lost_reset_password | bg-white/15 backdrop-blur-xl p-4 grid gap-4 border border-gray-400 rounded-xl">



	<p class="">
		<label class="block mb-2 text-sm font-medium text-white/65 dark:text-white"
			   for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?>&nbsp;<span
				  class="text-red-600">*</span></label>
		<input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
			   type="text"
			   name="user_login"
			   id="user_login"
			   autocomplete="username"
			   aria-required="true" />

	<p class="text-sm text-white/65 ">
		<?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?>
	</p><?php // @codingStandardsIgnoreLine ?>
	</p>



	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	<p class="flex justify-end">
		<input type="hidden"
			   name="wc_reset_password"
			   value="true" />
		<button type="submit"
				class="primary-btn small-btn"
				value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
	</p>

	<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

</form>
<?php
do_action( 'woocommerce_after_lost_password_form' );