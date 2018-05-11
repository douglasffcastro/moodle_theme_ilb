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
 * A one column layout for the ilb theme.
 *
 * @package   theme_ilb
 * @copyright 2016 Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/../config.php');

if (isloggedin()) {
	user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
	require_once($CFG->libdir . '/behat/lib.php');

  $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
	$extraclasses = [];
	if ($navdraweropen) {
	    $extraclasses[] = 'drawer-open-left';
	}
//$bodyattributes = $OUTPUT->body_attributes($extraclasses);
	$blockshtml = $OUTPUT->blocks('side-pre');
	$hasblocks = strpos($blockshtml, 'data-block=') !== false;
	$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();

  //$user_picture = false;
  //if ($user->picture) {
    //$user_picture = get_file_url($USER->id.'/'.$size['large'].'.jpg', null, 'user');
  //}
  global $USER,$PAGE;
  $user_picture=new user_picture($USER);
  $user_picture_url=$user_picture->get_url($PAGE);
  $user_profile_url=$CFG->wwwroot . "/user/profile.php?id=" . $USER->id . "&course=1";


	switch($USER->profile['situacaoaluno'])
	{
		case '1':
			$cpf1 = 'cpf1';
			break;
		case '2':
			$cpf2 = 'cpf2';
			break;
		case '3':
			$cpf3 = 'cpf3';
			break;			
	}

  $templatecontext = [
	    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
	    'output' => $OUTPUT,
	   	'sidepreblocks' => $blockshtml,
	 		'hasblocks' => $hasblocks,
	    'bodyattributes' => $bodyattributes,
	  	'navdraweropen' => $navdraweropen,
	  	'regionmainsettingsmenu' => $regionmainsettingsmenu,
	  	'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
			'username' => $USER->username,
			'firstname' => $USER->firstname,
			'lastname' => $USER->lastname,
			'sessKey' => $USER->sesskey,
			'cpf1' => $cpf1,
			'cpf2' => $cpf2,
			'cpf3' => $cpf3,
			'loginChangeNotification' => false,
			'moodle_url' => $CFG->wwwroot,
			'userpictureurl' => $user_picture_url,
			'userprofileurl' => $user_profile_url,
	];

	$templatecontext['flatnavigation'] = $PAGE->flatnav;
	//	echo $OUTPUT->render_from_template('theme_ilb/frontpage_ilblogado', $templatecontext);
	//echo $OUTPUT->render_from_template('theme_ilb/columns2', $templatecontext);
  echo $OUTPUT->render_from_template('theme_ilb/frontpage_ilb', $templatecontext);

} else {
	$bodyattributes = $OUTPUT->body_attributes([]);

	$templatecontext = [
    	'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
	    'output' => $OUTPUT,
	    'bodyattributes' => $bodyattributes,
	    'moodle_url' => $CFG->wwwroot
	];
	

	
	echo $OUTPUT->render_from_template('theme_ilb/frontpage_ilb', $templatecontext);
}
