<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CreativeWorks
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo" style="background-color:<?php echo esc_attr( get_theme_mod( 'creative_works_footer_bg_color', '#F8F8FF' ) ); ?>">
		<section id="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 text-center">
						<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'creative_works_footer_heading', 'Let\'s Get In Touch!' ) ); ?></h2>
						<hr class="primary">
						<p><?php echo esc_html( get_theme_mod( 'creative_works_footer_body', 'Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!' ) ); ?></p>
					</div>
					<div class="col-lg-4 col-lg-offset-2 text-center">
						<i class="fa fa-phone fa-3x wow bounceIn"></i>
						<p><a href="tel:<?php echo esc_html( get_theme_mod( 'creative_works_footer_phone', '123-456-7890' ) ); ?>"><?php echo esc_html( get_theme_mod( 'creative_works_footer_phone', '123-456-7890' ) ); ?></a></p>
					</div>
					<div class="col-lg-4 text-center">
						<i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
						<p><a href="mailto:<?php echo antispambot( esc_attr( get_theme_mod( 'creative_works_footer_email', 'acbilimoria@gmail.com' ) ) ); ?>"><?php echo antispambot( esc_html( get_theme_mod( 'creative_works_footer_email', 'acbilimoria@gmail.com' ) ) ); ?></a></p>
					</div>
				</div>
			</div>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
