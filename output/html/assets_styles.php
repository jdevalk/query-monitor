<?php
/**
 * Enqueued styles output for HTML pages.
 *
 * @package query-monitor
 */

class QM_Output_Html_Assets_Styles extends QM_Output_Html_Assets {

	public function get_type_labels() {
		return array(
			/* translators: %s: Total number of enqueued styles */
			'total'  => _x( 'Total: %s', 'Enqueued styles', 'query-monitor' ),
			'plural' => __( 'Styles', 'query-monitor' ),
			/* translators: %s: Total number of enqueued styles */
			'count'  => _x( 'Styles (%s)', 'Enqueued styles', 'query-monitor' ),
		);
	}

}

function register_qm_output_html_assets_styles( array $output, QM_Collectors $collectors ) {
	$collector = $collectors::get( 'assets_styles' );
	if ( $collector ) {
		$output['assets_styles'] = new QM_Output_Html_Assets_Styles( $collector );
	}
	return $output;
}

add_filter( 'qm/outputter/html', 'register_qm_output_html_assets_styles', 80, 2 );
