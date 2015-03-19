<?php  /*
 _   _ _____   _____           _                    _____  _____ _____
| | | |_   _| /  __ \         | |                  /  __ \/  ___/  ___|
| | | | | |   | /  \/_   _ ___| |_ ___  _ __ ___   | /  \/\ `--.\ `--.
| | | | | |   | |   | | | / __| __/ _ \| '_ ` _ \  | |     `--. \`--. \
| |_| |_| |_  | \__/\ |_| \__ \ || (_) | | | | | | | \__/\/\__/ /\__/ /
 \___/ \___/   \____/\__,_|___/\__\___/|_| |_| |_|  \____/\____/\____/
 Copyright 2014 dandavis/University of Illinois at Urbana Champaign
 Add custom css code or import whole sheets via https url

 Language File: Customize the user interface by altering the strings below

 *
 * This plugin is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// standard meta:
$string['pluginname'] = 'UI Custom CSS';
$string['uicustomcss'] = 'UI Custom CSS'; // appears in ADD A BLOCK menu

// blocks menu text
$string['uicustomcss:addinstance'] = 'Add a new custom CSS block';	// appears in
$string['uicustomcss:myaddinstance'] = 'Add a new custom CSS block to my.moodle';


// configure form inputs:

// URLs:
$string['label_url'] = 'CSS Stylesheet URL';	//	$string['url_placeholder']  = "(HTTPS URL)";
$string['desc_url'] = 'Enter the http location of an existing stylesheet to import'; // input description
$string['url_placeholder']  = "(HTTPS URL)";	// input placeholder attribute

// CSS Code:
$string['label_css'] = 'CSS Code';	// label of CSS code textarea
$string['desc_css']  = "Enter valid CSS only. Don't enter HTML."; // description  of CSS code textarea

// Custom selector configuration.
$string['blue'] = 'Blue';
$string['darkblue'] = 'Dark Blue';
$string['darkgreen'] = 'Dark Green';
$string['green'] = 'Green';
$string['grey'] = 'Grey';
$string['orange'] = 'Orange';
$string['pink'] = 'Pink';
$string['purple'] = 'Purple';
$string['red'] = 'Red';
$string['white'] = 'White';
$string['yellow'] = 'Yellow';
$string['config_border_color'] = 'Border color';
$string['config_border_corner'] = 'Border corner radius';
$string['config_border_corner_help'] = 'Set the border corner radius as a pixel (px) value. 5px is the default.';
$string['config_border_size'] = 'Border size';
$string['config_border_size_help'] = 'Set the border thickness as a pixel (px) value. 2px is the default.';
$string['config_header_background'] = 'Header background color';
$string['config_header_text_align'] = 'Header text alignment';
$string['header_block_region-center-post'] = 'Block styling for main content area';
$string['header_block_region-post'] = 'Block styling for side column';
