<?php

defined('MOODLE_INTERNAL') || die();

$templatecontext = [
    'moodle_url' => $CFG->wwwroot,
];


echo $OUTPUT->render_from_template('theme_ilb/head', $templatecontext);
