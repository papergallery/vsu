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
 * @copyright  2020
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->dirroot.'/user/profile/lib.php');
$context = $SESSION->blockcontext;

if (!has_capability('block/userlastaccess:view', $context)) {
    print_error('nopermissiontoviewforum');
} else {

    header('Content-Description: File Transfer');
    header('Content-Type: application/csv');
    header("Content-Disposition: attachment; filename=page-data-export.csv");
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

    $handle = fopen('php://output', 'w');
    ob_clean();
    $context = get_context_instance(CONTEXT_COURSE, $SESSION->couseid);

    $mform = new userlastaccess_form();

    if ($fromform = $mform->get_data()) {
        $users = $DB->get_records('user', []);
        $reportuser = '';
        if ($fromform->position == 1) {
            $position = 'ППС';
            foreach($users as $user) {
                $myuser = new stdClass();
                $myuser->id = $user->id;
                profile_load_data($myuser);
                if ($myuser->profile_field_position==$position){
                    $reportuser = $reportuser.'<a href="https://edu.vsu.ru/user/profile.php?id='.$user->id.'">'.
                        $user->lastname.' '.$user->firstname.' '.
                        $user->middlename.'</a>'.', код факультета '.$myuser->profile_field_facultyCodes.',
                     последний вход: '.gmdate('Y-m-d H:i', $user->lastaccess).'</br>';
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
                        $user->middlename.'</a>'.', курс '.$myuser->profile_field_year.', группа '
                        . $myuser->profile_field_groupname.', направление '.$myuser->profile_field_naprspec.', 
                    последний вход: '.gmdate('Y-m-d H:i', $user->lastaccess).'</br>';
                }
            }
        }

    } else {

    }
    ob_flush();
    fclose($handle);
}
