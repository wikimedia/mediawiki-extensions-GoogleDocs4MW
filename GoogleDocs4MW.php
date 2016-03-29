<?php
/**
 * GoogleDocs4MW parser extension - adds <googlespreadsheet> tag for displaying
 * Google Docs' spreadsheets
 *
 * @file
 * @ingroup Extensions
 * @version 1.2
 * @author Jack Phoenix <jack@shoutwiki.com>
 * @copyright © 2008-2015 Jack Phoenix
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

// Add extension credits that show up on Special:Version
$wgExtensionCredits['parserhook'][] = array(
	'name' => 'GoogleDocs4MW',
	'version' => '1.2',
	'author' => 'Jack Phoenix',
	'descriptionmsg' => 'googledocs4mw-desc',
	'url' => 'https://www.mediawiki.org/wiki/Extension:GoogleDocs4MW'
);

$wgMessagesDirs['GoogleDocs4MW'] = __DIR__ . '/i18n';

// Set up the parser hook
$wgAutoloadClasses['GoogleDocs4MW'] = __DIR__ . '/GoogleDocs4MW.class.php';
$wgHooks['ParserFirstCallInit'][] = 'GoogleDocs4MW::registerTag';
