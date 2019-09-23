<?php
class STM_Similar_Cars extends WP_Widget {

public function __construct() {
	$widget_ops = array('classname' => 'stm_similar_cars', 'description' => __('STM Similar Cars', 'stm_motors_extends'));
	$control_ops = array('width' => 400, 'height' => 350);
	parent::__construct('stm_similar_cars', __('STM Similar Cars', 'stm_motors_extends'), $widget_ops, $control_ops);
}

public function widget( $args, $instance ) {
	/** This filter is documented in wp-includes/default-widgets.php */
	$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
	echo $args['before_widget'];
	if ( ! empty( $title ) ) {
		echo $args['before_title'] . $title . $args['after_title'];
	}
	get_template_part('partials/single-car-listing/car-similar');
	echo $args['after_widget'];
}

public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance['title'] = $new_instance['title'];
	return $instance;
}

public function form( $instance ) {
	$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	$title = $instance['title'];
	?>
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'stm_motors_extends'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>
<?php
}
}

function register_stm_similar_cars() {
	register_widget( 'STM_Similar_Cars' );
}
add_action( 'widgets_init', 'register_stm_similar_cars' );