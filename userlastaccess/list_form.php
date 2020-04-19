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

defined('MOODLE_INTERNAL') || die();
require_once("$CFG->libdir/formslib.php");

class userlastaccess_form extends moodleform {
	public function definition() {
		global $CFG;
		
		$mform = $this->_form;
		$mform->addElement('select', 'faculty', "Выберете факультет", array('Факультет'=>'a', 'b'=>'b', 'ff'=>'ff'), $attributes);
		$mform->addElement('static', 'chooseusertype', "Выберете тип пользователя:");
		$radioarray=array();
		$radioarray[] = $mform->createElement('radio', 'position', '', 'Преподаватель', 1);
		$radioarray[] = $mform->createElement('radio', 'position', '', 'Студент', 0);
		$mform->addGroup($radioarray, 'position', '', array(' '), false);
		$this->add_action_buttons($cancel = true, $submitlabel=null);
	}
	
	function validation($data, $files) {
		return array();
	}
}
