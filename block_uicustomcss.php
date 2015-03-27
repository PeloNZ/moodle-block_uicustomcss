<?php  /*
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



class block_uicustomcss extends block_base {


    public function init() {
        $this->title = get_string('uicustomcss', 'block_uicustomcss');
    }


    public function get_content() {

        // try to re-use cached copy:
        if ($this->content) {
            return $this->content;
        }

        $this->content         =  new stdClass; // make a new content object
        $this->content->text = ""; // make a new blank output string


        if($this->config){ // url and or css code has been entered in config form
            // Build the CSS.
            $this->config->csscode = '';

            // Apply separate styling per block region.
            $regions = array(
                'region-center-post',
                'region-post',
            );

            foreach ($regions as $region) {
                $cssheader = '';
                $cssborder = '';

                // Set the block heading background.
                if ($this->config->{"header_background_$region"} !== 'default') {
                    $cssheader .= "background: {$this->config->{"header_background_$region"}}; color: #fff; border: none; padding-left: 10px; padding-right: 10px; ";
                    // Show the header full width.
                    $cssborder .= "padding: 0; ";
                }

                // Set the block heading text alignment.
                if ($this->config->{"header_text_align_$region"} !== 'default') {
                    $cssheader .= "text-align:{$this->config->{"header_text_align_$region"}}; ";
                }

                // Set the block border color.
                if ($this->config->{"border_color_$region"} !== 'default') {
                    $cssborder .= "border-color:{$this->config->{"border_color_$region"}} !important; ";
                }

                // Set the block border size. 2 is the default value.
                if (!empty($this->config->{"border_size_$region"} && ($this->config->{"border_size_$region"} !== '2'))) {
                    $cssborder .= "border:{$this->config->{"border_size_$region"}}px solid ; ";
                }

                // Set the block border corner radius. 5 is the default value.
                if (!empty($this->config->{"border_corner_$region"} && ($this->config->{"border_corner_$region"} !== '5'))) {
                    $cssborder .= "border-radius:{$this->config->{"border_corner_$region"}}px; ";
                }

                // Add the CSS to the block config.
                if (!empty($cssborder)) {
                    $this->config->csscode .= "#{$region} .block {\r\n$cssborder\r\n}\r\n";
                }
                if (!empty($cssheader)) {
                    $this->config->csscode .= "#{$region} .block .title h2 {\r\n$cssheader\r\n}\r\n";
                }
            }

            // inject a config menu script, some default css to hide un-used css block menu, and the actual css given in the config menu:
            if (!empty($this->config->csscode)) {
                $this->content->text.= ' <script>setTimeout(function(){
                    if(self.id_bui_pagetypepattern && self.id_bui_pagetypepattern.selectedIndex==2 ){
                        self.id_bui_pagetypepattern.selectedIndex=0;
            }}, 40);</script>
                <style>' .
                str_replace ("<", "", $this->config->csscode ) .
                ' #sidebar .block_uicustomcss {display:none; } body.editing #sidebar .block_uicustomcss {display:block; }
            </style>';
            }
        } // end if config?

        $this->content->footer = '';

        return $this->content;
    } // end get_content()

    public function applicable_formats() {
        return array('course-view' => true);
    }

    public function hide_header() {
        if (has_capability('block/uicustomcss:view', $this->context)) {
            return false;
        } else {
            return true;
        }
    }

    public function html_attributes() {
        $attributes = parent::html_attributes(); // Get default values

        // Hide the block from learners.
        if (!has_capability('block/uicustomcss:view', $this->context)) {
            $attributes['class'] .= ' hide';
        }

        return $attributes;
    }

}   // Here's the closing bracket for the class definition
