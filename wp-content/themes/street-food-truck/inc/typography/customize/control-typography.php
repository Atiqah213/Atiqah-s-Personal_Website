<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Street_Food_Truck_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'street-food-truck-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'street-food-truck' ),
				'family'      => esc_html__( 'Font Family', 'street-food-truck' ),
				'size'        => esc_html__( 'Font Size',   'street-food-truck' ),
				'weight'      => esc_html__( 'Font Weight', 'street-food-truck' ),
				'style'       => esc_html__( 'Font Style',  'street-food-truck' ),
				'line_height' => esc_html__( 'Line Height', 'street-food-truck' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'street-food-truck' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'street-food-truck-ctypo-customize-controls' );
		wp_enqueue_style(  'street-food-truck-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'street-food-truck' ),
        'Abril Fatface' => __( 'Abril Fatface', 'street-food-truck' ),
        'Acme' => __( 'Acme', 'street-food-truck' ),
        'Anton' => __( 'Anton', 'street-food-truck' ),
        'Architects Daughter' => __( 'Architects Daughter', 'street-food-truck' ),
        'Arimo' => __( 'Arimo', 'street-food-truck' ),
        'Arsenal' => __( 'Arsenal', 'street-food-truck' ),
        'Arvo' => __( 'Arvo', 'street-food-truck' ),
        'Alegreya' => __( 'Alegreya', 'street-food-truck' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'street-food-truck' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'street-food-truck' ),
        'Bangers' => __( 'Bangers', 'street-food-truck' ),
        'Boogaloo' => __( 'Boogaloo', 'street-food-truck' ),
        'Bad Script' => __( 'Bad Script', 'street-food-truck' ),
        'Bitter' => __( 'Bitter', 'street-food-truck' ),
        'Bree Serif' => __( 'Bree Serif', 'street-food-truck' ),
        'BenchNine' => __( 'BenchNine', 'street-food-truck' ),
        'Cabin' => __( 'Cabin', 'street-food-truck' ),
        'Cardo' => __( 'Cardo', 'street-food-truck' ),
        'Courgette' => __( 'Courgette', 'street-food-truck' ),
        'Cherry Swash' => __( 'Cherry Swash', 'street-food-truck' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'street-food-truck' ),
        'Crimson Text' => __( 'Crimson Text', 'street-food-truck' ),
        'Cuprum' => __( 'Cuprum', 'street-food-truck' ),
        'Cookie' => __( 'Cookie', 'street-food-truck' ),
        'Chewy' => __( 'Chewy', 'street-food-truck' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'street-food-truck' ),
			'100' => esc_html__( 'Thin',       'street-food-truck' ),
			'300' => esc_html__( 'Light',      'street-food-truck' ),
			'400' => esc_html__( 'Normal',     'street-food-truck' ),
			'500' => esc_html__( 'Medium',     'street-food-truck' ),
			'700' => esc_html__( 'Bold',       'street-food-truck' ),
			'900' => esc_html__( 'Ultra Bold', 'street-food-truck' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'street-food-truck' ),
			'normal'  => esc_html__( 'Normal', 'street-food-truck' ),
			'italic'  => esc_html__( 'Italic', 'street-food-truck' ),
			'oblique' => esc_html__( 'Oblique', 'street-food-truck' )
		);
	}
}
