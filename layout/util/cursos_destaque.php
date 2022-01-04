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

require_once('array_sort.php');

$cursos_destaque = array();

$url_imagem1 = $this->page->theme->settings->url_imagem1;
if($url_imagem1 != null ) {
    $id_curso1 = $this->page->theme->settings->id_curso1;
    $ordem1 = $this->page->theme->settings->ordem1;

    $curso1 = array(
        "url_imagem" => $url_imagem1,
        "id_curso" => $id_curso1,
        "ordem" => $ordem1
    );

    array_push( $cursos_destaque, $curso1);
}

$url_imagem2 = $this->page->theme->settings->url_imagem2;
if($url_imagem2 != null ) {
    $id_curso2 = $this->page->theme->settings->id_curso2;
    $ordem2 = $this->page->theme->settings->ordem2;

    $curso2 = array(
        "url_imagem" => $url_imagem2,
        "id_curso" => $id_curso2,
        "ordem" => $ordem2
    );

    array_push( $cursos_destaque, $curso2);
}

$url_imagem3 = $this->page->theme->settings->url_imagem3;
if($url_imagem3 != null ) {
    $id_curso3 = $this->page->theme->settings->id_curso3;
    $ordem3 = $this->page->theme->settings->ordem3;

    $curso3 = array(
        "url_imagem" => $url_imagem3,
        "id_curso" => $id_curso3,
        "ordem" => $ordem3
    );

    array_push( $cursos_destaque, $curso3);
}

$cursos_destaque = array_sort($cursos_destaque, 'ordem');

$primeirocurso = array_shift($cursos_destaque);

$url_imagem1 = $primeirocurso['url_imagem'];
$id_curso1 = $primeirocurso['id_curso'];

$cursos_destaque != null ? $unico_curso = false : $unico_curso = true;