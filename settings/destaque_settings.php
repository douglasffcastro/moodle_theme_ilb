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
  // Primeiro curso
  $setting = new admin_setting_heading('theme_ilb/destaque_1', 'Curso', '');
  $page->add($setting);

  $name = 'theme_ilb/url_imagem1';
  $title = 'Imagem de destaque';
  $description = 'Imagem a ser exibida no item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 20);
  $page->add($setting);

  $name = 'theme_ilb/id_curso1';
  $title = 'Curso de destaque';
  $description = 'ID do curso que será acessado ao clicar na imagem de destaque.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 20);
  $page->add($setting);

  $name = 'theme_ilb/ordem_destaque1';
  $title = 'Ordem';
  $description = 'Posição do curso.';
  $default = segundo;
  $choices = array(1, 2, 3);
  $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
  $page->add($setting);

  // Segundo curso
  $setting = new admin_setting_heading('theme_ilb/destaque_2', 'Curso', '');
  $page->add($setting);

  $name = 'theme_ilb/url_imagem2';
  $title = 'Imagem de destaque';
  $description = 'Imagem a ser exibida no item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 20);
  $page->add($setting);

  $name = 'theme_ilb/id_curso2';
  $title = 'Curso de destaque';
  $description = 'ID do curso que será acessado ao clicar na imagem de destaque.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 20);
  $page->add($setting);

  $name = 'theme_ilb/ordem_destaque2';
  $title = 'Ordem';
  $description = 'Posição do curso.';
  $default = segundo;
  $choices = array(1, 2, 3);
  $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
  $page->add($setting);

  // Terceiro curso
  $setting = new admin_setting_heading('theme_ilb/destaque_3', 'Curso', '');
  $page->add($setting);

  $name = 'theme_ilb/url_imagem3';
  $title = 'Imagem de destaque';
  $description = 'Imagem a ser exibida no item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 20);
  $page->add($setting);

  $name = 'theme_ilb/id_curso3';
  $title = 'Curso de destaque';
  $description = 'ID do curso que será acessado ao clicar na imagem de destaque.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 20);
  $page->add($setting);

  $name = 'theme_ilb/ordem_destaque3';
  $title = 'Ordem';
  $description = 'Posição do curso.';
  $default = segundo;
  $choices = array(1, 2, 3);
  $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
  $page->add($setting);
$settings->add($page);