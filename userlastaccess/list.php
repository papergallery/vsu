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
 * This is a one-line short description of the file.
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    block_userlastaccess
 * @category   block
 * @copyright  2008 Kim Bloggs
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once('../../config.php');
require_once($CFG->dirroot.'/user/profile/lib.php');
$PAGE->set_url('/blocks/userlastaccess/list.php');
$PAGE->set_pagelayout('standart');
$PAGE->set_title(get_string('userlastaccess', 'block_userlastaccess'));
$PAGE->set_heading(get_string('userlastaccess', 'block_userlastaccess'));
$context = get_context_instance(CONTEXT_COURSE, $SESSION->couseid);
$users = $DB->get_records('user', []);
$i = 1;
foreach($users as $user) {
	$myuser = new stdClass();
	$myuser->id = $user->id;
	profile_load_data($myuser);
	if($myuser->profile_field_fac=='Физический факультет'){
	$reportuser = $reportuser.'<a href="https://edu.vsu.ru/user/profile.php?id='.$user->id.'">'.
		$user->lastname.' '.$user->firstname.' '.
		$user->middlename.'</a>'.', курс '.$myuser->profile_field_year.', студенческий '.
		$myuser->profile_field_login.', последний вход: '.gmdate('Y-m-d H:i', $user->lastaccess).'</br>';
		}
	$i = $i + 1;
}

echo $OUTPUT->header();
echo $reportuser;
echo $OUTPUT->footer();