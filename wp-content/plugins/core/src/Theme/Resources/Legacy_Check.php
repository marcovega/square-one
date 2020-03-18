<?php

namespace Tribe\Project\Theme\Resources;

class Legacy_Check {

	private $unsupported_browser_path = '';

	public function __construct( $unsupported_browser_path = '/unsupported-browser/' ) {
		$this->unsupported_browser_path = $unsupported_browser_path;
	}

	/**
	 * Redirect old browsers to a unique message page (IE9 and below)
	 *
	 * @action wp_head
	 */
	public function old_browsers() {
		?>

		<script type="text/javascript">
			function is_browser() {
				return (
					navigator.userAgent.indexOf("Chrome") !== - 1 ||
					navigator.userAgent.indexOf("Opera") !== - 1 ||
					navigator.userAgent.indexOf("Firefox") !== - 1 ||
					navigator.userAgent.indexOf("MSIE") !== - 1 ||
					navigator.userAgent.indexOf("Safari") !== - 1 ||
					navigator.userAgent.indexOf("Edge") !== - 1
				);
			}

			function less_than_ie11() {
				return (
					!window.atob || // IE9 and below
					Function('/*@cc_on return document.documentMode===10@*/')() // IE10
				);
			}

			function not_excluded_page() {
				return (
					window.location.href.indexOf("<?php echo $this->unsupported_browser_path; ?>") === - 1 &&
					document.title.toLowerCase().indexOf('page not found') === - 1
				);
			}

			if (is_browser() && less_than_ie11() && not_excluded_page()) {
				window.location = location.protocol + '//' + location.host + '<?php echo $this->unsupported_browser_path; ?>';
			}
		</script>

		<?php
	}

	/**
	 * Adds the rewrite rule for the unsupported-browser permalink.
	 */
	public function add_unsupported_rewrite() {
		add_rewrite_tag('%unsupported%', '([^&]+)');
		$regex = sprintf( '^%s/?', str_replace( '/', '', $this->unsupported_browser_path ) );
		add_rewrite_rule( $regex, 'index.php?unsupported=1', 'top' );
	}

	/**
	 * Loads the unsupported browser template
	 *
	 * @filter template_include
	 *
	 * @param string $template - the template file to load.
	 *
	 * @return string
	 */
	public function load_unsupported_template( $template ) {

		global $wp_query;

		if ( ! array_key_exists( 'unsupported', $wp_query->query ) || '1' != $wp_query->query['unsupported'] ) {
			return $template;
		}

		$new_template = locate_template( 'page-templates/page-unsupported-browser.php' );

		if ( ! empty( $new_template ) ) {
			return $new_template;
		}

		return $template;
	}
}
