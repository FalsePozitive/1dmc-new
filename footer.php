<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 1DMC
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="col1">
			<a href="/"><img src="/wp-content/uploads/2024/12/logo-1dmcworld-1.svg" alt=""></a>
			<div class="fcnt">
				<a href="tel:+447365151135"><img src="/wp-content/uploads/2024/12/Icon-awesome-phone.svg" alt="">+44 7365 151135</a>
				<a href="mailto:info@1dmcworld.com"><img src="/wp-content/uploads/2024/12/Icon-zocial-email.svg" alt="">info@1dmcworld.com</a>
			</div>
		</div>
		<div class="col2">
			<p><?php echo the_field('footer_text', 'options');?></p>
		</div>
		<div class="col3">
			<a href="/destinations/">Destinations</a>
			<a href="/about">About</a>
			<a href="/news-events/">News</a>
			<a href="/contact">Contact</a>
			<a href="#">Privacy Policy</a>
		</div>
		<div class="col4">
			
			<div class="socifoot">
			
                <a href="<?=$instagram?>" target="_blank"><img src="/wp-content/themes/onedmc/assets/link.png" alt="linkedin"></a>
                <a href="<?=$linkedin?>" target="_blank"><img src="/wp-content/themes/onedmc/assets/insto.png" alt="instagram"></a>
				<a href="<?=$facebook?>" target="_blank"><img src="/wp-content/themes/onedmc/assets/fbook.png" alt="facebook"></a>
			</div>
		</div>
		<?php echo do_shortcode('[contact-form-7 id="5874b0c" title="Newsletter"]');?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<a href="/contact" class="floating-contact-btn" aria-label="Contact Us">
    Contact
</a>
<div id="rfpmodal" class="modal" aria-hidden="true">

  <!-- Modal content -->
  <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="rfp-title" tabindex="-1">
    <button type="button" class="close" aria-label="Close request form">&times;</button>
    <h3 id="rfp-title">Request For Proposal</h3>
   <?php echo do_shortcode('[contact-form-7 id="4d59b24" title="Contact form 1"]');?>
  </div>

</div>
</body>
</html>
