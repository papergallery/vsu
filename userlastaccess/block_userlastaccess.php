<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin version and other meta-data are defined here.
 *
 * @package     block_userlastaccess
 * @copyright   2020 
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_userlastaccess extends block_base {

    public function init() {
        $this->title = get_string('userlastaccess', 'block_userlastaccess');
    }
    
    public function get_content() {
        
		global $COURSE, $SESSION;
		
		if ($this->content != null) {
				return $this->content;
			}
		$context = get_context_instance(CONTEXT_COURSE, 2);
        if (!has_capability('block/userlastaccess:view', $context)) {return 0;}
        $this->content = new stdClass;
 		$this->content->text = '<a href="'.'/blocks/userlastaccess/list.php'.'">Открыть список студентов</a>';
		$SESSION->courseid = $COURSE->id;
		return $this->content;

    }
    
    function instance_allow_config() {
        return false;
    }
}