<?php

defined('MOODLE_INTERNAL') || die();

require('util/carousel.php');

if (isloggedin()) {
    $logintoken = '';
} else {
    $logintoken = s(\core\session\manager::get_login_token());
}

$templatecontext = [
    'output' => $OUTPUT,
    'moodle_url' => $CFG->wwwroot,
    'logintoken' => $logintoken,

    // Carrossel context
    'semitem' => $semitem,
    'itenscarrossel' => $itenscarrossel
];


echo $OUTPUT->render_from_template('theme_ilb/frontpage/frontpage', $templatecontext);
