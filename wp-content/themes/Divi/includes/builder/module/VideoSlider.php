<?php

class ET_Builder_Module_Video_Slider extends ET_Builder_Module {
	function init() {
		$this->name            = esc_html__( 'Video Slider', 'et_builder' );
		$this->slug            = 'et_pb_video_slider';
		$this->fb_support 	   = true;
		$this->child_slug      = 'et_pb_video_slider_item';
		$this->child_item_text = esc_html__( 'Video', 'et_builder' );
		$this->main_css_element = '.et_pb_video_slider%%order_class%%';

		$this->whitelisted_fields = array(
			'show_image_overlay',
			'show_arrows',
			'show_thumbnails',
			'controls_color',
			'admin_label',
			'module_id',
			'module_class',
			'play_icon_color',
			'thumbnail_overlay_color',
		);

		$this->fields_defaults = array(
			'show_image_overlay' => array( 'off' ),
			'show_arrows'        => array( 'on' ),
			'show_thumbnails'    => array( 'on' ),
		);

		$this->options_toggles = array(
			'general'  => array(
				'toggles' => array(
					'elements' => esc_html__( 'Elements', 'et_builder' ),
					'overlay'  => esc_html__( 'Overlay', 'et_builder' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'colors' => esc_html__( 'Controls Colors', 'et_builder' ),
				),
			),
		);

		$this->custom_css_options = array(
			'play_button' => array(
				'label'    => esc_html__( 'Play Button', 'et_builder' ),
				'selector' => '.et_pb_video_play',
			),
			'thumbnail_item' => array(
				'label'    => esc_html__( 'Thumbnail Item', 'et_builder' ),
				'selector' => '.et_pb_carousel_item',
			),
			'arrows' => array(
				'label'    => esc_html__( 'Slider Arrows', 'et_builder' ),
				'selector' => '.et-pb-slider-arrows a',
			),
		);

		$this->advanced_options = array(
			'background' => array(),
			'custom_margin_padding' => array(
				'css' => array(
					'important' => array( 'custom_margin' ), // needed to overwrite last module margin-bottom styling
				),
			),
			'max_width' => array(),
			'filters' => array(),
		);
	}

	function get_fields() {
		$fields = array(
			'show_image_overlay' => array(
				'label'           => esc_html__( 'Show Image Overlays on Main Video', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on' => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'This option will cover the player UI on the main video. This image can either be uploaded in each video setting or auto-generated by Divi.', 'et_builder' ),
			),
			'show_arrows' => array(
				'label'           => esc_html__( 'Show Arrows', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'toggle_slug'        => 'elements',
				'description'        => esc_html__( 'This setting will turn on and off the navigation arrows.', 'et_builder' ),
			),
			'show_thumbnails' => array(
				'label'             => esc_html__( 'Slider Controls', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'options'           => array(
					'on'  => esc_html__( 'Use Thumbnail Track', 'et_builder' ),
					'off' => esc_html__( 'Use Dot Navigation', 'et_builder' ),
				),
				'toggle_slug'        => 'elements',
				'description'        => esc_html__( 'This setting will let you choose to use the thumbnail track controls below the slider or dot navigation at the bottom of the slider.', 'et_builder' ),
			),
			'controls_color' => array(
				'label'             => esc_html__( 'Slider Controls Color', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'color_option',
				'options'           => array(
					'light' => esc_html__( 'Light', 'et_builder' ),
					'dark'  => esc_html__( 'Dark', 'et_builder' ),
				),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'colors',
				'description'       => esc_html__( 'This setting will make your slider controls either light or dark in color. Slider controls are either the arrows on the thumbnail track or the circles in dot navigation.', 'et_builder' ),
			),
			'play_icon_color' => array(
				'label'             => esc_html__( 'Play Icon Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'colors',
			),
			'thumbnail_overlay_color' => array(
				'label'             => esc_html__( 'Thumbnail Overlay Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'colors',
			),
			'disabled_on' => array(
				'label'           => esc_html__( 'Disable on', 'et_builder' ),
				'type'            => 'multiple_checkboxes',
				'options'         => array(
					'phone'   => esc_html__( 'Phone', 'et_builder' ),
					'tablet'  => esc_html__( 'Tablet', 'et_builder' ),
					'desktop' => esc_html__( 'Desktop', 'et_builder' ),
				),
				'additional_att'  => 'disable_on',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'This will disable the module on selected devices', 'et_builder' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'visibility',
			),
			'admin_label' => array(
				'label'       => esc_html__( 'Admin Label', 'et_builder' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'et_builder' ),
				'toggle_slug' => 'admin_label',
			),
			'module_id' => array(
				'label'           => esc_html__( 'CSS ID', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'module_class' => array(
				'label'           => esc_html__( 'CSS Class', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
		);
		return $fields;
	}

	function pre_shortcode_content() {
		global $et_pb_slider_image_overlay;

		$show_image_overlay = $this->shortcode_atts['show_image_overlay'];

		$et_pb_slider_image_overlay = $show_image_overlay;

	}

	function shortcode_callback( $atts, $content = null, $function_name ) {
		$module_id          = $this->shortcode_atts['module_id'];
		$module_class       = $this->shortcode_atts['module_class'];
		$show_arrows        = $this->shortcode_atts['show_arrows'];
		$show_thumbnails    = $this->shortcode_atts['show_thumbnails'];
		$controls_color     = $this->shortcode_atts['controls_color'];
		$play_icon_color = $this->shortcode_atts['play_icon_color'];
		$thumbnail_overlay_color = $this->shortcode_atts['thumbnail_overlay_color'];

		global $et_pb_slider_image_overlay;

		$module_class              = ET_Builder_Element::add_module_order_class( $module_class, $function_name );
		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		if ( '' !== $play_icon_color ) {
			ET_Builder_Element::set_style( $function_name, array(
				'selector'    => '%%order_class%% .et_pb_video_play, %%order_class%% .et_pb_carousel .et_pb_video_play',
				'declaration' => sprintf(
					'color: %1$s !important;',
					esc_html( $play_icon_color )
				),
			) );
		}

		if ( '' !== $thumbnail_overlay_color ) {
			ET_Builder_Element::set_style( $function_name, array(
				'selector'    => '%%order_class%% .et_pb_carousel_item .et_pb_video_overlay_hover:hover, %%order_class%%.et_pb_video_slider .et_pb_slider:hover .et_pb_video_overlay_hover, %%order_class%% .et_pb_carousel_item.et-pb-active-control .et_pb_video_overlay_hover',
				'declaration' => sprintf(
					'background-color: %1$s;',
					esc_html( $thumbnail_overlay_color )
				),
			) );
		}

		$class  = '';
		$class .= 'off' === $show_arrows ? ' et_pb_slider_no_arrows' : '';
		$class .= 'on' === $show_thumbnails ? ' et_pb_slider_carousel et_pb_slider_no_pagination' : '';
		$class .= 'off' === $show_thumbnails ? ' et_pb_slider_dots' : '';
		$class .= " et_pb_controls_{$controls_color}";

		$content = $this->shortcode_content;

		$output = sprintf(
			'<div%3$s class="et_pb_module et_pb_video_slider%4$s%5$s%7$s">
				%8$s
				%6$s
				<div class="et_pb_slider et_pb_preload%1$s">
					<div class="et_pb_slides">
						%2$s
					</div> <!-- .et_pb_slides -->
				</div> <!-- .et_pb_slider -->
			</div> <!-- .et_pb_video_slider -->
			',
			esc_attr( $class ),
			$content,
			( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
			( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' ),
			'' !== $video_background ? ' et_pb_section_video et_pb_preload' : '',
			$video_background,
			'' !== $parallax_image_background ? ' et_pb_section_parallax' : '',
			$parallax_image_background
		);

		return $output;
	}

	public function process_box_shadow( $function_name ) {
		/**
		 * @var ET_Builder_Module_Field_BoxShadow $boxShadow
		 */
		$boxShadow = ET_Builder_Module_Fields_Factory::get( 'BoxShadow' );
		$class = '.' . self::get_module_order_class( $function_name );
		$selector = "$class>.et_pb_slider, $class>.et_pb_carousel .et_pb_carousel_item";

		self::set_style( $function_name, $boxShadow->get_style( $selector, $this->shortcode_atts ) );
	}

	protected function _add_additional_border_fields() {
		parent::_add_additional_border_fields();

		$this->advanced_options['border']['css'] = array(
			'main' => array(
				'border_radii'  => "{$this->main_css_element} .et_pb_slider, {$this->main_css_element} .et_pb_carousel_item",
				'border_styles' => "{$this->main_css_element} .et_pb_slider, {$this->main_css_element} .et_pb_carousel_item",
			)
		);
	}
}

new ET_Builder_Module_Video_Slider;
