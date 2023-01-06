<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Church_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'vw-church-typography';

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
				'color'       => esc_html__( 'Font Color', 'vw-church' ),
				'family'      => esc_html__( 'Font Family', 'vw-church' ),
				'size'        => esc_html__( 'Font Size',   'vw-church' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-church' ),
				'style'       => esc_html__( 'Font Style',  'vw-church' ),
				'line_height' => esc_html__( 'Line Height', 'vw-church' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-church' ),
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
		wp_enqueue_script( 'vw-church-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-church-ctypo-customize-controls' );
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
			'' => __( 'No Fonts', 'vw-church' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-church' ),
        'Acme' => __( 'Acme', 'vw-church' ),
        'Anton' => __( 'Anton', 'vw-church' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-church' ),
        'Arimo' => __( 'Arimo', 'vw-church' ),
        'Arsenal' => __( 'Arsenal', 'vw-church' ),
        'Arvo' => __( 'Arvo', 'vw-church' ),
        'Alegreya' => __( 'Alegreya', 'vw-church' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-church' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-church' ),
        'Bangers' => __( 'Bangers', 'vw-church' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-church' ),
        'Bad Script' => __( 'Bad Script', 'vw-church' ),
        'Bitter' => __( 'Bitter', 'vw-church' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-church' ),
        'BenchNine' => __( 'BenchNine', 'vw-church' ),
        'Cabin' => __( 'Cabin', 'vw-church' ),
        'Cardo' => __( 'Cardo', 'vw-church' ),
        'Courgette' => __( 'Courgette', 'vw-church' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-church' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-church' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-church' ),
        'Cuprum' => __( 'Cuprum', 'vw-church' ),
        'Cookie' => __( 'Cookie', 'vw-church' ),
        'Chewy' => __( 'Chewy', 'vw-church' ),
        'Days One' => __( 'Days One', 'vw-church' ),
        'Dosis' => __( 'Dosis', 'vw-church' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-church' ),
        'Economica' => __( 'Economica', 'vw-church' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-church' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-church' ),
        'Francois One' => __( 'Francois One', 'vw-church' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-church' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-church' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-church' ),
        'Handlee' => __( 'Handlee', 'vw-church' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-church' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-church' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-church' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-church' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-church' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-church' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-church' ),
        'Kanit' => __( 'Kanit', 'vw-church' ),
        'Lobster' => __( 'Lobster', 'vw-church' ),
        'Lato' => __( 'Lato', 'vw-church' ),
        'Lora' => __( 'Lora', 'vw-church' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-church' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-church' ),
        'Merriweather' => __( 'Merriweather', 'vw-church' ),
        'Monda' => __( 'Monda', 'vw-church' ),
        'Montserrat' => __( 'Montserrat', 'vw-church' ),
        'Muli' => __( 'Muli', 'vw-church' ),
        'Marck Script' => __( 'Marck Script', 'vw-church' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-church' ),
        'Open Sans' => __( 'Open Sans', 'vw-church' ),
        'Overpass' => __( 'Overpass', 'vw-church' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-church' ),
        'Oxygen' => __( 'Oxygen', 'vw-church' ),
        'Orbitron' => __( 'Orbitron', 'vw-church' ),
        'Patua One' => __( 'Patua One', 'vw-church' ),
        'Pacifico' => __( 'Pacifico', 'vw-church' ),
        'Padauk' => __( 'Padauk', 'vw-church' ),
        'Playball' => __( 'Playball', 'vw-church' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-church' ),
        'PT Sans' => __( 'PT Sans', 'vw-church' ),
        'Philosopher' => __( 'Philosopher', 'vw-church' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-church' ),
        'Poiret One' => __( 'Poiret One', 'vw-church' ),
        'Quicksand' => __( 'Quicksand', 'vw-church' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-church' ),
        'Raleway' => __( 'Raleway', 'vw-church' ),
        'Rubik' => __( 'Rubik', 'vw-church' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-church' ),
        'Russo One' => __( 'Russo One', 'vw-church' ),
        'Righteous' => __( 'Righteous', 'vw-church' ),
        'Slabo' => __( 'Slabo', 'vw-church' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-church' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-church'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-church' ),
        'Sacramento' => __( 'Sacramento', 'vw-church' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-church' ),
        'Tangerine' => __( 'Tangerine', 'vw-church' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-church' ),
        'VT323' => __( 'VT323', 'vw-church' ),
        'Varela Round' => __( 'Varela Round', 'vw-church' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-church' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-church' ),
        'Volkhov' => __( 'Volkhov', 'vw-church' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-church' )
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
			'' => esc_html__( 'No Fonts weight', 'vw-church' ),
			'100' => esc_html__( 'Thin',       'vw-church' ),
			'300' => esc_html__( 'Light',      'vw-church' ),
			'400' => esc_html__( 'Normal',     'vw-church' ),
			'500' => esc_html__( 'Medium',     'vw-church' ),
			'700' => esc_html__( 'Bold',       'vw-church' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-church' ),
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
			'' => esc_html__( 'No Fonts Style', 'vw-church' ),
			'normal'  => esc_html__( 'Normal', 'vw-church' ),
			'italic'  => esc_html__( 'Italic', 'vw-church' ),
			'oblique' => esc_html__( 'Oblique', 'vw-church' )
		);
	}
}
