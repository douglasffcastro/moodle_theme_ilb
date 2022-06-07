<?php

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingilb', 'ILB');
    
    require('settings/carrossel_settings.php');
}