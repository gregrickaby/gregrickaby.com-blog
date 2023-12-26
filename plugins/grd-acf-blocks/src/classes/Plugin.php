<?php
/**
 * The main plugin class.
 *
 * @see https://www.advancedcustomfields.com/resources/including-acf-within-a-plugin-or-theme/
 * @package Grd\Acf\Blocks
 * @since 1.0.0
 */

namespace Grd\Acf\Blocks;

/**
 * ACF Blocks Plugin.
 */
class Plugin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->hooks();
	}

	/**
	 * Check if ACF is available and functional.
	 *
	 * @return bool True if ACF is available, false otherwise.
	 */
	private function meets_requirements(): bool {
		return class_exists( 'ACF' ) && function_exists( 'acf_add_local_field_group' );
	}

	/**
	 * Register hooks.
	 */
	private function hooks(): void {

		if ( ! $this->meets_requirements() ) {
			return;
		}

		$this->register_acf_fields();
		add_action( 'acf/init', [ $this, 'register_acf_blocks' ] );
	}

	/**
	 * Register fields with ACF.
	 *
	 * Note: Auto generated by ACF --> Tools --> Export.
	 *
	 * @see https://www.advancedcustomfields.com/resources/register-fields-via-php/
	 */
	private function register_acf_fields(): void {
		\acf_add_local_field_group(
			array(
				'key'                   => 'group_63cc36384ce02',
				'title'                 => 'Block: Gallery',
				'fields'                => array(
					array(
						'key'               => 'field_63cc36388e742',
						'label'             => 'Photos',
						'name'              => 'photos',
						'aria-label'        => '',
						'type'              => 'gallery',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'array',
						'library'           => 'all',
						'min'               => '',
						'max'               => '',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
						'insert'            => 'append',
						'preview_size'      => 'medium',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'block',
							'operator' => '==',
							'value'    => 'acf/gallery',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 0,
				'modified'              => 1674336738,
			)
		);
	}

	/**
	 * Register ACF blocks with WordPress.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 * @see https://www.advancedcustomfields.com/resources/acf-blocks-with-block-json/
	 * @see https://www.advancedcustomfields.com/resources/whats-new-with-acf-blocks-in-acf-6/#blockjson-support
	 */
	private function register_acf_blocks(): void {
		\register_block_type( GRD_ACF_BLOCKS_DIR . '/build/blocks/gallery' );
	}
}
