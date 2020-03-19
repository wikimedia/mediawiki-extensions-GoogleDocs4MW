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
	 * @return $output
	 */
	public static function renderGoogleSpreadsheet( $input, $argv ) {
		$width = isset( $argv['width'] ) ? $argv['width'] : 500;
		$height = isset( $argv['height'] ) ? $argv['height'] : 300;
		$style = isset( $argv['style'] ) ? $argv['style'] : 'width:100%';
		$key = htmlspecialchars( $input, ENT_QUOTES );

		$output = '<iframe class="googlespreadsheetframe" width="' .
				intval( $width ) . '" height="' .
				intval( $height ) . '" style="' .
				htmlspecialchars( $style, ENT_QUOTES ) .
				'" src="https://docs.google.com/spreadsheets/d/' . $key .
				'/htmlembed?widget=true"></iframe>';

		return $output;
	}

}
