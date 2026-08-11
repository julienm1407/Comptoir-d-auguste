<?php
/**
 * Contact form (demo mode).
 *
 * @package Comptoir_Auguste
 */
?>
<form class="<?php echo esc_attr(ca_class('ContactForm', 'form')); ?>" data-ca-contact-form>
	<label class="<?php echo esc_attr(ca_class('ContactForm', 'field')); ?>">
		<span><?php esc_html_e('Nom', 'comptoir-auguste'); ?></span>
		<input name="name" type="text" required autocomplete="name">
	</label>
	<label class="<?php echo esc_attr(ca_class('ContactForm', 'field')); ?>">
		<span><?php esc_html_e('E-mail', 'comptoir-auguste'); ?></span>
		<input name="email" type="email" required autocomplete="email">
	</label>
	<label class="<?php echo esc_attr(ca_class('ContactForm', 'field')); ?>">
		<span><?php esc_html_e('Message', 'comptoir-auguste'); ?></span>
		<textarea name="message" rows="5" required></textarea>
	</label>
	<button type="submit" class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'md')); ?>">
		<?php esc_html_e('Envoyer', 'comptoir-auguste'); ?>
	</button>
	<p class="<?php echo esc_attr(ca_class('ContactForm', 'success')); ?>" role="status" data-ca-form-status hidden>
		<?php esc_html_e('Merci — le formulaire est en mode démonstration. L’envoi réel sera branché plus tard.', 'comptoir-auguste'); ?>
	</p>
</form>
