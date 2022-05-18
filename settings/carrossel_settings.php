<?php

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

  $name = 'theme_ilb/ordem1';
  $title = 'Ordem';
  $description = 'Posição do item.';
  $default = 0;
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

  $name = 'theme_ilb/ordem2';
  $title = 'Ordem';
  $description = 'Posição do item.';
  $default = 1;
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

  $name = 'theme_ilb/ordem3';
  $title = 'Ordem';
  $description = 'Posição do item.';
  $default = 2;
  $choices = array(1, 2, 3);
  $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
  $page->add($setting);

$settings->add($page);