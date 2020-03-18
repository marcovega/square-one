<?php


namespace Tribe\Project\Theme\Resources;

class Fonts {

	private $fonts = [ ];

	public function __construct( array $fonts = [ ] ) {
		$this->fonts = $fonts;
	}

	/**
	 * Add Typekit to Editor
	 * @filter mce_external_plugins
	 */
	public function add_typekit_to_editor( $plugins ) {
		if ( ! empty( $this->fonts[ 'typekit' ] ) ) {
			$plugins['typekit'] = tribe_assets_url( 'admin/editor/typekit.tinymce.js' );
		}

		return $plugins;
	}
	/**
	 * Localize Typekit TinyMCE
	 * @filter admin_head
	 */
	public function localize_typekit_tinymce() {
		if ( empty( $this->fonts[ 'typekit' ] ) ) {
			return;
		}

		printf( '<script type="text/javascript">var tinymce_typekit_id = \'%s\';</script>', $this->fonts[ 'typekit' ] );
	}

	/**
	 * Add any required fonts
	 * @action wp_head
	 * @action login_head
	 */
	public function load_fonts() {

		if ( empty( $this->fonts[ 'typekit' ] ) && empty( $this->fonts[ 'google' ] ) && empty( $this->fonts[ 'custom' ] ) ) {
			return;
		}
		
		?>

		<script>
			var modern_tribe = window.modern_tribe || {};
			modern_tribe.fonts = {
				state: {
					loading: true,
					active: false
				},
				events: {
					trigger: function ( event_type, event_data, el ) {
						var event;
						try {
							event = new CustomEvent( event_type, { detail: event_data } );
						} catch ( e ) {
							event = document.createEvent( 'CustomEvent' );
							event.initCustomEvent( event_type, true, true, event_data );
						}
						el.dispatchEvent( event );
					}
				}
			};
			var WebFontConfig = {
				<?php if ( ! empty( $this->fonts[ 'typekit' ] ) ) { ?>
				typekit: {
					id: '<?php echo $this->fonts[ 'typekit' ]; ?>'
				},
				<?php } ?>
				<?php if ( ! empty( $this->fonts[ 'google' ] ) ) { ?>
				google: {
					families: <?php echo json_encode( $this->fonts[ 'google' ] ); ?>
				},
				<?php } ?>
				<?php if ( ! empty( $this->fonts[ 'custom' ] ) ) { ?>
				custom: {
					families: <?php echo json_encode( $this->fonts[ 'custom' ] ); ?>
				},
				<?php } ?>
				loading: function () {
					modern_tribe.fonts.state.loading = true;
					modern_tribe.fonts.state.active = false;
					modern_tribe.fonts.events.trigger( 'modern_tribe/fonts_loading', {}, document );
				},
				active: function () {
					modern_tribe.fonts.state.loading = false;
					modern_tribe.fonts.state.active = true;
					modern_tribe.fonts.events.trigger( 'modern_tribe/fonts_loaded', {}, document );
				},
				inactive: function () {
					modern_tribe.fonts.state.loading = false;
					modern_tribe.fonts.state.active = false;
					modern_tribe.fonts.events.trigger( 'modern_tribe/fonts_failed', {}, document );
				}
			};
			(function ( d ) {
				var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
				wf.src = '<?php echo $this->get_webfont_src(); ?>';
				s.parentNode.insertBefore( wf, s );
			})( document );
		</script>

		<?php
	}

	private function get_webfont_src() {
		return trailingslashit( get_stylesheet_directory_uri() ) . 'js/vendor/webfontloader.js';
	}

	/**
	 * @return Fonts
	 */
	public static function instance() {
		$container = tribe_project()->container();

		return $container['theme.resources.fonts'];
	}
}
