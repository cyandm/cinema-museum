<form action="/"
	  id="formContactUs"
	  class="grid gap-5">

	<div
		 class="bg-stone-900 w-full rounded-full border border-white/15 [&:has(input:focus)]:border-white flex px-4 py-1 items-center transition-all">
		<svg class="icon">
			<use href="#icon-User,-Profile" />
		</svg>

		<input type="text"
			   required
			   name="name"
			   placeholder="<?php echo __( 'نام شما', 'cyn-dm' ) . ' *' ?>"
			   class="peer w-full bg-stone-900 ring-0 border-0 focus:ring-0 peer">
	</div>

	<div
		 class="bg-stone-900 w-full rounded-full border border-white/15 [&:has(input:focus)]:border-white flex px-4 py-1 items-center transition-all">
		<svg class="icon">
			<use href="#icon-Phone,-Call-11" />
		</svg>

		<input type="tel"
			   required
			   name="tel"
			   placeholder="<?php echo '* ' . __( 'شماره همراه', 'cyn-dm' ) ?>"
			   class="w-full bg-stone-900 ring-0 border-0 focus:ring-0 text-right">
	</div>

	<div
		 class="bg-stone-900 w-full rounded-full border border-white/15 [&:has(input:focus)]:border-white flex px-4 py-1 items-center transition-all">
		<svg class="icon">
			<use href="#icon-Mail" />
		</svg>

		<input type="email"
			   required
			   name="email"
			   placeholder="<?php echo __( 'ایمیل شما', 'cyn-dm' ) . ' *' ?>"
			   class="peer w-full bg-stone-900 ring-0 border-0 focus:ring-0 peer">
	</div>

	<div
		 class="bg-stone-900 w-full rounded-3xl border border-white/15 [&:has(textarea:focus)]:border-white flex px-4 py-1 items-start transition-all">
		<svg class="icon mt-2">
			<use href="#icon-Chat,-Messages-1" />
		</svg>

		<textarea name="message"
				  required
				  placeholder="<?php echo __( 'پیام شما', 'cyn-dm' ) . ' *' ?>"
				  class="w-full h-full bg-stone-900 ring-0 border-0 focus:ring-0 resize-none"></textarea>

	</div>


	<div>
		<button class="primary-btn w-full flex justify-center"
				id="formContactUsSubmit"
				type="submit">
			<div class="flex gap-1 items-center">
				<svg class="icon">
					<use href="#icon-Send" />
				</svg>
				<?php _e( 'ارسال پیام', 'cyn-dm' ) ?>
			</div>
		</button>
	</div>

</form>