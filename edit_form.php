<?php /*
 _   _ _____   _____           _                    _____  _____ _____
| | | |_   _| /  __ \         | |                  /  __ \/  ___/  ___|
| | | | | |   | /  \/_   _ ___| |_ ___  _ __ ___   | /  \/\ `--.\ `--.
| | | | | |   | |   | | | / __| __/ _ \| '_ ` _ \  | |     `--. \`--. \
| |_| |_| |_  | \__/\ |_| \__ \ || (_) | | | | | | | \__/\/\__/ /\__/ /
 \___/ \___/   \____/\__,_|___/\__\___/|_| |_| |_|  \____/\____/\____/
 Copyright 2014 dandavis/University of Illinois at Urbana Champaign
 Add custom css code or import whole sheets via https url
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



class block_uicustomcss_edit_form extends block_edit_form {

    protected function specific_definition($mform) {

        // TODO array of colors should be defined in the block global settings.
        $coloroptions = array(
            'default' => get_string('default'),
            '#fdc53d' => get_string('yellow', 'block_uicustomcss'),
            '#8DC63F' => get_string('green', 'block_uicustomcss'),
            '#009900' => get_string('darkgreen', 'block_uicustomcss'),
            '#ed128e' => get_string('pink', 'block_uicustomcss'),
            '#8e39d1' => get_string('purple', 'block_uicustomcss'),
            '#cc0000' => get_string('red', 'block_uicustomcss'),
            '#00adee' => get_string('blue', 'block_uicustomcss'),
            '#333399' => get_string('darkblue', 'block_uicustomcss'),
            '#FF9900' => get_string('orange', 'block_uicustomcss'),
            '#999999' => get_string('grey', 'block_uicustomcss'),
        );

        // Options for text alignment.
        $alignoptions = array(
            'default' => get_string('default'),
            'left' => get_string('left', 'editor'),
            'center' => get_string('justifycenter', 'editor'),
            'right' => get_string('right', 'editor'),
        );

        // Options for border size range from 0 to 10 pixels.
        $borderoptions = array();
        for ($i = 0; $i <= 10; $i++) {
            $borderoptions[$i] = "{$i}px";
        }

        // Apply separate styling per block region.
        $regions = array(
            'region-center-post',
            'region-post',
        );

        foreach ($regions as $region) {
            $mform->addElement('header', 'header_block_'.$region, get_string('header_block_'.$region, 'block_uicustomcss'));
            //Heading background color.
            $select =& $mform->createElement('select', 'config_header_background_'.$region, get_string('config_header_background', 'block_uicustomcss'));
            foreach ($coloroptions as $value => $text) {
                $select->addOption($text, $value, array('style' => "background: {$value}; color: #fff"));
            }
            $mform->addElement($select);

            // Header text alignment.
            $mform->addElement('select', 'config_header_text_align_'.$region, get_string('config_header_text_align', 'block_uicustomcss'), $alignoptions);

            // Border color.
            $select =& $mform->createElement('select', 'config_border_color_'.$region, get_string('config_border_color', 'block_uicustomcss'));
            foreach ($coloroptions as $value => $text) {
                $select->addOption($text, $value, array('style' => "color: {$value}"));
            }
            $mform->addElement($select);

            //Border size.
            $mform->addElement('select', 'config_border_size_'.$region, get_string('config_border_size', 'block_uicustomcss'), $borderoptions);
            $mform->addHelpButton('config_border_size_'.$region, 'config_border_size', 'block_uicustomcss');
            $mform->setDefault('config_border_size_'.$region, 5);

            //Border corner radius.
            $mform->addElement('select', 'config_border_corner_'.$region, get_string('config_border_corner', 'block_uicustomcss'), $borderoptions);
            $mform->addHelpButton('config_border_corner_'.$region, 'config_border_corner', 'block_uicustomcss');
            $mform->setDefault('config_border_corner_'.$region, 5);
        }

        //Nice to have would be js driven instant preview.

    }// end specific_definition()


}// end block_uicustomcss_edit_form()
