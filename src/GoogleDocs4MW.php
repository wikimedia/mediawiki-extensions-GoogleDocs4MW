<?php

/**
 * GoogleDocs4MW parser extension - adds <googlespreadsheet> tag for displaying
 * Google Docs' spreadsheets
 *
 * @file
 * @ingroup Extensions
 * @version 1.2
 * @author Jack Phoenix
 * @copyright © 2008-2019 Jack Phoenix
 * @license GPL-2.0-or-later
 */

class GoogleDocs4MW {

	/**
	 * @param Parser $parser
	 */
	public static function registerTag( $parser ) {
		$parser->setHook( 'googlespreadsheet', [ __CLASS__, 'renderGoogleSpreadsheet' ] );
	}

	/**
	 * The callback function for converting the input to HTML output
	 *
	 * @param string $input
	 * @param array $argv
	 * @return string $output
	 */
	public static function renderGoogleSpreadsheet( $input, $argv ) {
		$width = $argv['width'] ?? 500;
		$height = $argv['height'] ?? 300;
		$style = $argv['style'] ?? 'width:100%';
		$style = Sanitizer::checkCss( $style );

		$src = 'https://docs.google.com/spreadsheets/d/' . $input . '/htmlembed?widget=true';

		return Html::element( 'iframe', [
			'class' => 'googlespreadsheetframe',
			'width' => intval( $width ),
			'height' => intval( $height ),
			'style' => $style,
			'src' => $src,
		] );
	}

}
