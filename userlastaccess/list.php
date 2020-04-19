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

require_once('../../config.php');
require_once($CFG->dirroot.'/user/profile/lib.php');
require_once('list_form.php');
$PAGE->set_url('/blocks/userlastaccess/list.php');
$PAGE->set_pagelayout('standart');
$PAGE->set_title(get_string('userlastaccess', 'block_userlastaccess'));
$PAGE->set_heading(get_string('userlastaccess', 'block_userlastaccess'));
$context = get_context_instance(CONTEXT_COURSE, $SESSION->couseid);


$mform = new userlastaccess_form();

if ($mform->is_cancelled()) {
	
} else if ($fromform = $mform->get_data()) {
	$users = $DB->get_records('user', []);
	$reportuser = '';
	if ($fromform->position == 1) {
		$position = 'ППС';
        foreach($users as $user) {
            $myuser = new stdClass();
            $myuser->id = $user->id;
            profile_load_data($myuser);
            if ($myuser->profile_field_stat=='учится' &&
                $myuser->profile_field_position==$position){
                $reportuser = $reportuser.'<a href="https://edu.vsu.ru/user/profile.php?id='.$user->id.'">'.
                    $user->lastname.' '.$user->firstname.' '.
                    $user->middlename.'</a>'.', курс '.$myuser->profile_field_year.', студенческий '.
                    $myuser->profile_field_login.', последний вход: '.gmdate('Y-m-d H:i', $user->lastaccess).'</br>';
            }
        }
	} else {
		$position = 'студент';
        foreach($users as $user) {
            $myuser = new stdClass();
            $myuser->id = $user->id;
            profile_load_data($myuser);
            if ($myuser->profile_field_stat=='учится' &&
                $myuser->profile_field_fac==$fromform->faculty &&
                $myuser->profile_field_position==$position){
                $reportuser = $reportuser.'<a href="https://edu.vsu.ru/user/profile.php?id='.$user->id.'">'.
                    $user->lastname.' '.$user->firstname.' '.
                    $user->middlename.'</a>'.', курс '.$myuser->profile_field_year.', студенческий '.
                    $myuser->profile_field_login.', последний вход: '.gmdate('Y-m-d H:i', $user->lastaccess).'</br>';
            }
        }
	}

} else {
  $mform->display();
}



echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();
echo var_dump($fromform).'</br>';
