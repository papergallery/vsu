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

header('Content-Description: File Transfer');
header('Content-Type: application/csv');
header("Content-Disposition: attachment; filename=page-data-export.csv");
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

$handle = fopen('php://output', 'w');
ob_clean();
$users = explode("</br>", $SESSION->csv);
foreach ($users as $user) {
    $data = str_getcsv($user);
    fputcsv($handle, $data);
}

ob_flush();
fclose($handle);

