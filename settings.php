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
 * @package   theme_ilb
 * @copyright 2016 Ryan Wyllie
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    
    // Habilitar destaque
    $setting = new admin_setting_configcheckbox('theme_ilb/habilitar_destaque',
        'Habilitar destaque',
        'Indica se deve ser exibido destaque na página inicial', 0);
    $settings->add($setting);

    // Imagem destaque
    $setting = new admin_setting_configtext('theme_ilb/imagem_destaque',
        'Imagem de destaque',
        'Imagem a ser exibida como destaque', '', PARAM_TEXT, 50);
    $settings->add($setting);

    // Curso de destaque
    $setting = new admin_setting_configtext('theme_ilb/curso_destaque',
        'Curso de destaque',
        'ID do curso acessado ao clicar na imagem de destaque', '', PARAM_TEXT, 4);
    $settings->add($setting);
}
