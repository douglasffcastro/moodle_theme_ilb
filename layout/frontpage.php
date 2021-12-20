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
$habilitar_carrossel1 = $this->page->theme->settings->habilitar_carrossel1;
$imagem_carrossel1 = $this->page->theme->settings->imagem_carrossel1;
$link_carrossel1 = $this->page->theme->settings->link_carrossel1;
$legenda_carrossel1 = $this->page->theme->settings->legenda_carrossel1;

$habilitar_carrossel2 = $this->page->theme->settings->habilitar_carrossel2;
$imagem_carrossel2 = $this->page->theme->settings->imagem_carrossel2;
$link_carrossel2 = $this->page->theme->settings->link_carrossel2;
$legenda_carrossel2 = $this->page->theme->settings->legenda_carrossel2;

$habilitar_carrossel3 = $this->page->theme->settings->habilitar_carrossel3;
$imagem_carrossel3 = $this->page->theme->settings->imagem_carrossel3;
$link_carrossel3 = $this->page->theme->settings->link_carrossel3;
$legenda_carrossel3 = $this->page->theme->settings->legenda_carrossel3;

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
    'habilitar_carrossel1' => $habilitar_carrossel1,
    'imagem_carrossel1' => $imagem_carrossel1,
    'link_carrossel1' => $link_carrossel1,
    'legenda_carrossel1' => $legenda_carrossel1,

    'habilitar_carrossel2' => $habilitar_carrossel2,
    'imagem_carrossel2' => $imagem_carrossel2,
    'link_carrossel2' => $link_carrossel2,
    'legenda_carrossel2' => $legenda_carrossel2,

    'habilitar_carrossel3' => $habilitar_carrossel3,
    'imagem_carrossel3' => $imagem_carrossel3,
    'link_carrossel3' => $link_carrossel3,
    'legenda_carrossel3' => $legenda_carrossel3,

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

