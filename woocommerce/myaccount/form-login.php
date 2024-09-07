<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	<div class="grid grid-cols-1 md:grid-cols-2 gap-4"
		 id="customer_login">

		<div class="bg-white/15 backdrop-blur-xl border border-gray-400 p-4 rounded-xl">

		<?php endif; ?>

		<h2 class="text-2xl font-bold"><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

		<form class="py-4 grid gap-2"
			  method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="">
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
					   for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span
						  class="text-red-600">*</span></label>
				<input type="text"
					   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					   name="username"
					   id="username"
					   autocomplete="username"
					   value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p>
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
					   for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span
						  class="text-red-600">*</span></label>
				<input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					   type="password"
					   name="password"
					   id="password"
					   autocomplete="current-password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>


			<div class="flex items-center mb-4">
				<input name="rememberme"
					   type="checkbox"
					   id="rememberme"
					   value="forever"
					   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
				<label for="default-checkbox"
					   class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
					<span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
			</div>
			<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
			<div class="flex justify-end">
				<button type="submit"
						class="primary-btn small-btn"
						name="login"
						value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
			</div>

			<p class="">
				<a class="text-blue-600 underline"
				   href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

		<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

		</div>

		<div class="bg-white/15 backdrop-blur-xl border border-gray-400 p-4 rounded-xl">

			<h2 class="text-2xl font-bold"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

			<form method="post"
				  class="py-4 grid gap-2"
			  	<?php do_action( 'woocommerce_register_form_tag' ); ?>>

				<?php do_action( 'woocommerce_register_form_start' ); ?>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

					<p class="">
						<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
							   for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span
								  class="text-red-600">*</span></label>
						<input type="text"
							   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
							   name="username"
							   id="reg_username"
							   autocomplete="username"
							   value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</p>

				<?php endif; ?>

				<p class="">
					<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
						   for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span
							  class="text-red-600">*</span></label>
					<input type="email"
						   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
						   name="email"
						   id="reg_email"
						   autocomplete="email"
						   value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

					<p class="">
						<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
							   for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span
								  class="text-red-600">*</span></label>
						<input type="password"
							   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
							   name="password"
							   id="reg_password"
							   autocomplete="new-password" />
					</p>

				<?php else : ?>

					<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?>
					</p>

				<?php endif; ?>

				<?php do_action( 'woocommerce_register_form' ); ?>

				<p class="flex justify-end">
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<button type="submit"
							class="primary-btn small-btn"
							name="register"
							value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
				</p>

				<?php do_action( 'woocommerce_register_form_end' ); ?>

			</form>

		</div>

	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>