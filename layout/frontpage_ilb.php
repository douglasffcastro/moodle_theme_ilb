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
	    'projetos_especiais' => $OUTPUT->image_url('projetos_especiais', 'theme'),
	    'conheca-senado' => $OUTPUT->image_url('conheca-senado', 'theme'),
	    'Cursos-on-line-sem-tutor' => $OUTPUT->image_url('Cursos-on-line-sem-tutor', 'theme'),
	    'Cursos-on-line' => $OUTPUT->image_url('Cursos-on-line', 'theme'),
	    'formacao_interna' => $OUTPUT->image_url('formacao_interna', 'theme'),
	    'oficinas-interlegis' => $OUTPUT->image_url('oficinas-interlegis', 'theme'),
	    'pos-graduacao' => $OUTPUT->image_url('pos-graduacao', 'theme'),
	    'video-aula' => $OUTPUT->image_url('video-aula', 'theme'),
	    'icon_ContatoEmail-azul' => $OUTPUT->image_url('icon_ContatoEmail-azul', 'theme'),
	    'icon_ContatoFone-azul' => $OUTPUT->image_url('icon_ContatoFone-azul', 'theme'),
	    'fundo-c' => $OUTPUT->image_url('fundo-c', 'theme'),
	    'fundo-c' => $OUTPUT->image_url('fundo-c', 'theme'),
	    'logo_saberes_xl' => $OUTPUT->image_url('logo_saberes_xl', 'theme'),
	   	'sidepreblocks' => $blockshtml,
	 		'hasblocks' => $hasblocks,
	    'bodyattributes' => $bodyattributes,
	    'CursosOnlineSemTutoria' => $OUTPUT->image_url('Cursos-on-line-sem-tutor', 'theme'),
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
	echo $OUTPUT->render_from_template('theme_ilb/frontpage_ilb', $templatecontext);

} else {
	$bodyattributes = $OUTPUT->body_attributes([]);

	$templatecontext = [
    	'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    	'projetos_especiais' => $OUTPUT->image_url('projetos_especiais', 'theme'),
	    'conheca-senado' => $OUTPUT->image_url('conheca-senado', 'theme'),
	    'Cursos-on-line-sem-tutor' => $OUTPUT->image_url('Cursos-on-line-sem-tutor', 'theme'),
	    'Cursos-on-line' => $OUTPUT->image_url('Cursos-on-line', 'theme'),
	    'formacao_interna' => $OUTPUT->image_url('formacao_interna', 'theme'),
	    'oficinas-interlegis' => $OUTPUT->image_url('oficinas-interlegis', 'theme'),
	    'pos-graduacao' => $OUTPUT->image_url('pos-graduacao', 'theme'),
	    'video-aula' => $OUTPUT->image_url('video-aula', 'theme'),
	    'fundo-c' => $OUTPUT->image_url('fundo-c', 'theme'),
	    'icon_ContatoEmail-azul' => $OUTPUT->image_url('icon_ContatoEmail-azul', 'theme'),
	    'icon_ContatoFone-azul' => $OUTPUT->image_url('icon_ContatoFone-azul', 'theme'),
	    'logo_saberes_xl' => $OUTPUT->image_url('logo_saberes_xl', 'theme'),
	    'output' => $OUTPUT,
	    'bodyattributes' => $bodyattributes,
	    'moodle_url' => $CFG->wwwroot
	];
	

	
	echo $OUTPUT->render_from_template('theme_ilb/frontpage_ilb', $templatecontext);
}
