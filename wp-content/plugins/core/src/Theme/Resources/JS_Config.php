<?php


namespace Tribe\Project\Theme\Resources;

class JS_Config {
	
	private $data;

	public function get_data() {
		if ( !isset( $this->data ) ) {
			$this->data = [
				'images_url'   => trailingslashit( get_stylesheet_directory_uri() ) . 'img/theme',
				'template_url' => trailingslashit( get_template_directory_uri() ),
				'hmr_dev'      => defined( 'HMR_DEV' ) && HMR_DEV === true,
			];
			$this->data = apply_filters( 'core_js_config', $this->data );
		}

		return $this->data;
	}
}
