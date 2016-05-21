<?php
/**
 * CreativeWorks widgets.
 *
 * @link https://codex.wordpress.org/Widgets_API
 *
 * @package CreativeWorks
 */

// Register widgets
function creative_works_register_widgets() {
	register_widget( 'creative_works_fw_cta' );
	register_widget( 'creative_works_service' );
	register_widget( 'creative_works_portfolio' );
}
add_action( 'widgets_init', 'creative_works_register_widgets' );

// Full-Width Call to Action Widget
class creative_works_fw_cta extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'creative_works_fw_cta',
			esc_html__( 'CreativeWorks Call to Action', 'CreativeWorks' ),
			array(
				'description' => esc_html__( 'Full-width call to action banner.', 'CreativeWorks' ),
				'classname'   => 'creative_works_fw_cta',
			)
		);
	}

	public function widget( $args, $instance ) {
		$background_color = !empty( $instance['background_color'] ) ? $instance['background_color'] : '';
		$background_img = !empty( $instance['background_img'] ) ? $instance['background_img'] : '';
		$title = !empty( $instance['title'] ) ? $instance['title'] : '';
		$body_text = !empty( $instance['body_text'] ) ? $instance['body_text'] : '';
		$button_color = !empty( $instance['button_color'] ) ? $instance['button_color'] : '';
		$button_url = !empty( $instance['button_url'] ) ? $instance['button_url'] : '';
		$button_text = !empty( $instance['button_text'] ) ? $instance['button_text'] : '';
		$bg_hex = creative_works_hex2rgb( $background_color );

		?>
			<section class="bg-primary" id="about" style="background-image: url(<?php echo esc_attr( $background_img ); ?>); margin: 20px -9999rem; height: 370px; box-shadow: inset 0 0 0 1000px rgba(<?php print_r( esc_attr( $bg_hex ) ); ?>); background-size: cover;">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2 text-center">
							<h2 class="section-heading"><?php echo esc_html( $title ); ?></h2>
							<hr class="light">
							<p class="text-faded"><?php echo esc_html( $body_text ); ?></p>
							<a href="<?php echo esc_attr( $button_url ); ?>" class="page-scroll btn btn-default btn-xl" style="background-color:<?php echo esc_attr( $button_color ); ?>;color:<?php echo ( $background_color ); ?>;"><?php echo esc_html( $button_text ); ?></a>
						</div>
					</div>
				</div>
			</div>
			</section>
		<?php
	}

	public function form( $instance ) {
		$background_color = !empty( $instance['background_color'] ) ? $instance['background_color'] : '';
		$background_img = !empty( $instance['background_img'] ) ? $instance['background_img'] : '';
		$title = !empty( $instance['title'] ) ? $instance['title'] : '';
		$body_text = !empty( $instance['body_text'] ) ? $instance['body_text'] : '';
		$button_color = !empty( $instance['button_color'] ) ? $instance['button_color'] : '';
		$button_url = !empty( $instance['button_url'] ) ? $instance['button_url'] : '';
		$button_text = !empty( $instance['button_text'] ) ? $instance['button_text'] : '';
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Call to Action Title', 'CreativeWorks' ); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., We\'ve got what you need!', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'background_color' ) ); ?>"><?php echo esc_html__( 'Call to Action Background &amp; Button Text Color', 'CreativeWorks' ); ?></label><br />
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'background_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_color' ) ); ?>" class="widefat color-picker" value="<?php echo esc_attr( $background_color ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'background_img' ) ); ?>"><?php echo esc_html__( 'Call to Action Background Image', 'CreativeWorks' ); ?></label>
			<input class="widefat" style="margin-bottom: 6px;" id="<?php echo esc_attr( $this->get_field_id( 'background_img' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_img' ) ); ?>" type="text" value="<?php echo esc_attr( $background_img ); ?>" placeholder="<?php echo esc_attr__( 'e.g., https://www.your-site.com/public-images/great-image.jpg', 'CreativeWorks' ); ?>">
			<input type="button" onclick="CreativeWorksWidgetsUploader.imageUploader.openFileFrame('<?php echo esc_attr( $this->get_field_id( 'background_img' ) ); ?>');" class="button button-primary" value="<?php echo esc_attr__( 'Select / Upload Background Image', 'CreativeWorks' ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'body_text' ) ); ?>"><?php echo esc_html__( 'Call to Action Body Text', 'CreativeWorks' ); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'body_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'body_text' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., All of our products are free, open source, and easy to use!  No strings attached.', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $body_text ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_color' ) ); ?>"><?php echo esc_html__( 'Call to Action Button Color', 'CreativeWorks' ); ?></label><br />
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'button_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_color' ) ); ?>" class="widefat color-picker" value="<?php echo esc_attr( $button_color ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>"><?php echo esc_html__( 'Call to Action Button URL', 'CreativeWorks' ); ?></label>
			<input type="button_url" id="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_url' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., /store', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $button_url ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><?php echo esc_html__( 'Call to Action Button Text' , 'CreativeWorks' ); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., Buy Now, Billy', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $button_text ); ?>">
		</p>

		<script>
			jQuery('.color-picker').wpColorPicker();
		</script>

	<?php

	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['background_color'] = wp_filter_kses( $new_instance['background_color'] );
		$instance['background_img'] = wp_filter_kses( $new_instance['background_img'] );
		$instance['title'] = wp_filter_kses( $new_instance['title'] );
		$instance['body_text'] = wp_filter_kses( $new_instance['body_text'] );
		$instance['button_color'] = wp_filter_kses( $new_instance['button_color'] );
		$instance['button_url'] = wp_filter_kses( $new_instance['button_url'] );
		$instance['button_text'] = wp_filter_kses( $new_instance['button_text'] );

		return $instance;
	}
}

// How We Work Widget
class creative_works_service extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'creative_works_service',
			esc_html__( 'CreativeWorks Service', 'CreativeWorks' ),
			array(
				'description' => esc_html__( 'Small &amp; flexible widget with icon, title, &amp; text', 'CreativeWorks' ),
				'classname' => 'creative_works_service',
			)
		);
	}

	public function widget( $args, $instance ) {
		$title = !empty( $instance['title'] ) ? $instance['title'] : '';
		$body_text = !empty( $instance['body_text'] ) ? $instance['body_text'] : '';
		$icon = !empty( $instance['icon'] ) ? $instance['icon'] : '';

		?>
			<div class="service-box" style="text-align:center;">
				<i class="fa fa-4x <?php echo esc_attr( $icon ); ?> wow bounceIn text-primary"></i>
				<h3><?php echo esc_html( $title ); ?></h3>
				<p class="text-muted"><?php echo esc_html( $body_text ); ?></p>
			</div>
		<?php
	}

	public function form( $instance ) {
		$title = !empty( $instance['title'] ) ? $instance['title'] : '';
		$body_text = !empty( $instance['body_text'] ) ? $instance['body_text'] : '';
		$icon = !empty( $instance['icon'] ) ? $instance['icon'] : '';
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php echo esc_html__( 'Service Icon Class', 'CreativeWorks' ); ?></label><br />
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><?php echo esc_html__( 'Click here', 'CreativeWorks' ); ?></a> <?php echo esc_html__( 'to see all Font Awesome Icons', 'CreativeWorks' ); ?></label>
			<input type="icon" id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., fa-code', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $icon ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Service Title', 'CreativeWorks' ); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., Clean, Responsive Code', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'body_text' ) ); ?>"><?php echo esc_html__( 'Service Body Text', 'CreativeWorks' ); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'body_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'body_text' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., We work with only the best programmers because we care about code quality.', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $body_text ); ?>">
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = wp_filter_kses( $new_instance['title'] );
		$instance['body_text'] = wp_filter_kses( $new_instance['body_text'] );
		$instance['icon'] = wp_filter_kses( $new_instance['icon'] );

		return $instance;
	}
}

class creative_works_portfolio extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'creative_works_portfolio',
			esc_html__( 'CreativeWorks Portfolio', 'CreativeWorks' ),
			array(
				'description' => esc_html__( 'Portfolio Piece with Image, Title, &amp; Heading', 'CreativeWorks' ),
				'classname' => 'creative_works_portfolio',
			)
		);
	}

	public function widget( $args, $instance ) {
		$ahref = !empty( $instance['ahref'] ) ? $instance['ahref'] : '';
		$img_src = !empty( $instance['img_src'] ) ? $instance['img_src'] : '';
		$img_alt = !empty( $instance['img_alt'] ) ? $instance['img_alt'] : '';
		$heading = !empty( $instance['heading'] ) ? $instance['heading'] : '';
		$title = !empty( $instance['title'] ) ? $instance['title'] : '';
		?>
			<section class="no-padding" id="portfolio">
				<div class="row no-gutter">
					<a href="<?php echo esc_attr( $ahref ); ?>" class="portfolio-box">
						<img src="<?php echo esc_attr( $img_src ); ?>" class="img-responsive" alt="<?php echo esc_attr( $img_alt ); ?>">
						<div class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category text-faded"><?php echo esc_html( $heading ); ?></div>
								<div class="project-name"><?php echo esc_html( $title ); ?></div>
							</div>
						</div>
					</a>
				</div>
			</section>
		<?php
	}

	public function form( $instance ) {
		$ahref = !empty( $instance['ahref'] ) ? $instance['ahref'] : '';
		$img_src = !empty( $instance['img_src'] ) ? $instance['img_src'] : '';
		$img_alt = !empty( $instance['img_alt'] ) ? $instance['img_alt'] : '';
		$heading = !empty( $instance['body_text'] ) ? $instance['body_text'] : '';
		$title = !empty( $instance['title'] ) ? $instance['title'] : '';
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ahref' ) ); ?>"><?php echo esc_html__( 'Portfolio a href', 'CreativeWorks' ); ?></label><br />
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'ahref' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ahref' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., https://www.your-site.com/portfolio/one', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $ahref ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'img_src' ) ); ?>"><?php echo esc_html__( 'Portfolio Image URL', 'CreativeWorks' ); ?></label><br />
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'img_src' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'img_src' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., https://www.your-site.com/portfolio/one.jpg', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $img_src ); ?>">
			<input type="button" onclick="CreativeWorksWidgetsUploader.imageUploader.openFileFrame('<?php echo esc_attr( $this->get_field_id( 'img_src' ) ); ?>');" class="button button-primary" value="<?php echo esc_attr__( 'Select / Upload Portfolio Image', 'CreativeWorks' ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'img_alt' ) ); ?>"><?php echo esc_html__( 'Portfolio Image Alt Tag', 'CreativeWorks' ); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'img_alt' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'img_alt' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., Portrait of Captain James T Kirk of the SS Enterprise', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $img_alt ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'heading' ) ); ?>"><?php echo esc_html__( 'Portfolio Heading', 'CreativeWorks' ); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'heading' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'heading' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., Portraits', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $heading ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Portfolio Title', 'CreativeWorks' ); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" class="widefat" placeholder="<?php echo esc_attr__( 'e.g., Captain Kirk', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = wp_filter_kses( $new_instance['title'] );
		$instance['heading'] = wp_filter_kses( $new_instance['heading'] );
		$instance['ahref'] = wp_filter_kses( $new_instance['ahref'] );
		$instance['img_src'] = wp_filter_kses( $new_instance['img_src'] );
		$instance['img_alt'] = wp_filter_kses( $new_instance['img_alt'] );

		return $instance;
	}
}
