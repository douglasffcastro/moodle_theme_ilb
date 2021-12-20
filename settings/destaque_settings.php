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

defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_ilb_courses', 'Cursos em destaque');
  for ($i = 1; $i <= 3; $i++) {
      $setting = new admin_setting_heading('theme_ilb/destaque'.$i, 'Curso '.$i, '');
      $page->add($setting);

      $name = 'theme_ilb/habilitar_destaque'.$i;
      $title = 'Habilitar';
      $description = 'Indica se deve ser exibido o curso em destaque na página inicial.';
      $default = 0;
      $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
      $page->add($setting);

      $name = 'theme_ilb/imagem_destaque'.$i;
      $title = 'Imagem de destaque';
      $description = 'Imagem a ser exibida no item.';
      $default = '';
      $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 20);
      $page->add($setting);

      $name = 'theme_ilb/curso_destaque'.$i;
      $title = 'Curso de destaque';
      $description = 'ID do curso acessado ao clicar na imagem de destaque.';
      $default = '';
      $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 20);
      $page->add($setting);
  }
$settings->add($page);