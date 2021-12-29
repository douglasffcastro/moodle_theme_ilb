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

$page = new admin_settingpage('theme_ilb_carrossel', 'Carrossel');

  // Primeiro item
  $setting = new admin_setting_heading('theme_ilb/item1', 'Item', '');
  $page->add($setting);

  $name = 'theme_ilb/urlimagem1';
  $title = 'URL da imagem';
  $description = 'Imagem que será exibida no item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 40);
  $page->add($setting);


  $name = 'theme_ilb/urlnoticia1';
  $title = 'URL da notícia';
  $description = 'Notícia que abrirá quando o usuário clicar no item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 40);
  $page->add($setting);


  $name = 'theme_ilb/descricao1';
  $title = 'Descrição';
  $description = 'Descrição do item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 40);
  $page->add($setting);
  

  $name = 'theme_ilb/ordem1';
  $title = 'Ordem';
  $description = 'Posição do item.';
  $default = primeiro;
  $choices = array(1, 2, 3);
  $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
  $page->add($setting);

  // Segundo item
  $setting = new admin_setting_heading('theme_ilb/item2', 'Item', '');
  $page->add($setting);

  $name = 'theme_ilb/urlimagem2';
  $title = 'URL da imagem';
  $description = 'Imagem que será exibida no item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 40);
  $page->add($setting);


  $name = 'theme_ilb/urlnoticia2';
  $title = 'URL da notícia';
  $description = 'Notícia que abrirá quando o usuário clicar no item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 40);
  $page->add($setting);


  $name = 'theme_ilb/descricao2';
  $title = 'Descrição';
  $description = 'Descrição do item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 40);
  $page->add($setting);

  $name = 'theme_ilb/ordem2';
  $title = 'Ordem';
  $description = 'Posição do item.';
  $default = segundo;
  $choices = array(1, 2, 3);
  $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
  $page->add($setting);

  // Terceiro item
  $setting = new admin_setting_heading('theme_ilb/item3', 'Item', '');
  $page->add($setting);

  $name = 'theme_ilb/urlimagem3';
  $title = 'URL da imagem';
  $description = 'Imagem que será exibida no item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 40);
  $page->add($setting);


  $name = 'theme_ilb/urlnoticia3';
  $title = 'URL da notícia';
  $description = 'Notícia que abrirá quando o usuário clicar no item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 40);
  $page->add($setting);


  $name = 'theme_ilb/descricao3';
  $title = 'Descrição';
  $description = 'Descrição do item.';
  $default = '';
  $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 40);
  $page->add($setting);

  $name = 'theme_ilb/ordem3';
  $title = 'Ordem';
  $description = 'Posição do item.';
  $default = terceiro;
  $choices = array(1, 2, 3);
  $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
  $page->add($setting);

$settings->add($page);


	
