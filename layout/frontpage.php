<?php

defined('MOODLE_INTERNAL') || die();

require('util/carousel.php');

if (isloggedin()) {
    user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
	require_once($CFG->libdir . '/behat/lib.php');

    
    global $USER,$PAGE;

	
    $user_picture = new user_picture($USER);
    $user_picture->size = 512;
    $userpictureurl = $user_picture->get_url($PAGE);
  	$userprofileurl = $CFG->wwwroot . "/user/profile.php?id=" . $USER->id . "&course=1";
    $regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
  	$hasregionmainsettingsmenu = !empty($regionmainsettingsmenu);
	$username = $USER->username;
	$firstname = $USER->firstname;
	$lastname = $USER->lastname;
    $usercity = $USER->city;
    $usercountry = $USER->country;
	$sessKey = $USER->sesskey;
	$loginChangeNotification = false;
    $logintoken = '';
    $isloggedin = true;
} else {
    $logintoken = s(\core\session\manager::get_login_token());
    $userpicture = '';
    $userpictureurl = '';
    $userprofileurl = '';
    $username = '';
    $firstname = '';
    $lastname = '';
    $usercity = '';
    $usercountry = '';
    $sessKey = '';
    $isloggedin = false;
}

$templatecontext = [
    'output' => $OUTPUT,
    'moodle_url' => $CFG->wwwroot,
    'logintoken' => $logintoken,
    'userpicture' => $user_picture, 
    'userpictureurl' => $userpictureurl, 
    'userprofileurl' => $userprofileurl, 
    'username' => $username, 
    'firstname' => $firstname,
    'lastname' => $lastname, 
    'usercity' => $usercity,
    'usercountry' => $usercountry,
    'sessKey' => $sessKey,
    'isloggedin' => $isloggedin,

    // Carrossel context
    'semitem' => $semitem,
    'itenscarrossel' => $itenscarrossel,
];

echo $OUTPUT->render_from_template('theme_ilb/frontpage/frontpage', $templatecontext);
