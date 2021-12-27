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
 * A two column layout for the ilb theme.
 *
 * @package   theme_ilb
 * @copyright 2016 Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

if (isloggedin()) {
    $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
} else {
    $navdraweropen = false;
}

// Carrossel
$urlimagem1 = $this->page->theme->settings->urlimagem1;
$urlnoticia1 = $this->page->theme->settings->urlnoticia1;
$descricao1 = $this->page->theme->settings->descricao1;
$ordem1 = $this->page->theme->settings->ordem1;

$urlimagem2 = $this->page->theme->settings->urlimagem2;
$urlnoticia2 = $this->page->theme->settings->urlnoticia2;
$descricao2 = $this->page->theme->settings->descricao2;
$ordem2 = $this->page->theme->settings->ordem2;

$urlimagem3 = $this->page->theme->settings->urlimagem3;
$urlnoticia3 = $this->page->theme->settings->urlnoticia3;
$descricao3 = $this->page->theme->settings->descricao3;
$ordem3 = $this->page->theme->settings->ordem3;

// Cursos em destaque
$habilitar_destaque1 = $this->page->theme->settings->habilitar_destaque1;
$imagem_destaque1 = $this->page->theme->settings->imagem_destaque1;
$curso_destaque1 = $this->page->theme->settings->curso_destaque1;

$habilitar_destaque2 = $this->page->theme->settings->habilitar_destaque2;
$imagem_destaque2 = $this->page->theme->settings->imagem_destaque2;
$curso_destaque2 = $this->page->theme->settings->curso_destaque2;

$habilitar_destaque3 = $this->page->theme->settings->habilitar_destaque3;
$imagem_destaque3 = $this->page->theme->settings->imagem_destaque3;
$curso_destaque3 = $this->page->theme->settings->curso_destaque3;

$extraclasses = [];
if ($navdraweropen) {
    $extraclasses[] = 'drawer-open-left';
}
$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;
$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'moodle_url' => $CFG->wwwroot,

    // Carrossel context
    'urlimagem1' => $urlimagem1,
    'urlnoticia1' => $urlnoticia1,
    'descricao1' => $descricao1,
    'ordem1' => $ordem1,

    'urlimagem2' => $urlimagem2,
    'urlnoticia2' => $urlnoticia2,
    'descricao2' => $descricao2,
    'ordem2' => $ordem2,

    'urlimagem3' => $urlimagem3,
    'urlnoticia3' => $urlnoticia3,
    'descricao3' => $descricao3,
    'ordem3' => $ordem3,

    // Cursos em destaque context_coursecat::instance($category->id);
    'habilitar_destaque1' => $habilitar_destaque1,
    'imagem_destaque1' => $imagem_destaque1,
    'curso_destaque1' => $curso_destaque1,

    'habilitar_destaque2' => $habilitar_destaque2,
    'imagem_destaque2' => $imagem_destaque2,
    'curso_destaque2' => $curso_destaque2,
    
    'habilitar_destaque3' => $habilitar_destaque3,
    'imagem_destaque3' => $imagem_destaque3,
    'curso_destaque3' => $curso_destaque3
];

$nav = $PAGE->flatnav;
$templatecontext['flatnavigation'] = $nav;
$templatecontext['firstcollectionlabel'] = $nav->get_collectionlabel();
echo $OUTPUT->render_from_template('theme_ilb/frontpage/frontpage_ilb', $templatecontext);

