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

require('array_sort.php');

$itenscarrossel = array();

$urlimagem1 = $this->page->theme->settings->urlimagem1;
if($urlimagem1 != null ) {
    $urlnoticia1 = $this->page->theme->settings->urlnoticia1;
    $descricao1 = $this->page->theme->settings->descricao1;
    $ordem1 = $this->page->theme->settings->ordem1;

    $item1 = array(
        "urlimagem" => $urlimagem1,
        "urlnoticia" => $urlnoticia1,
        "descricao" => $descricao1,
        "ordem" => $ordem1
    );

    array_push( $itenscarrossel, $item1);
}

$urlimagem2 = $this->page->theme->settings->urlimagem2;
if($urlimagem2 != null ) {
    $urlnoticia2 = $this->page->theme->settings->urlnoticia2;
    $descricao2 = $this->page->theme->settings->descricao2;
    $ordem2 = $this->page->theme->settings->ordem2;

    $item2 = array(
        "urlimagem" => $urlimagem2,
        "urlnoticia" => $urlnoticia2,
        "descricao" => $descricao2,
        "ordem" => $ordem2
    );

    array_push( $itenscarrossel, $item2);
}

$urlimagem3 = $this->page->theme->settings->urlimagem3;
if($urlimagem3 != null ) {
    $urlnoticia3 = $this->page->theme->settings->urlnoticia3;
    $descricao3 = $this->page->theme->settings->descricao3;
    $ordem3 = $this->page->theme->settings->ordem3;

    $item3 = array(
        "urlimagem" => $urlimagem3,
        "urlnoticia" => $urlnoticia3,
        "descricao" => $descricao3,
        "ordem" => $ordem3
    );

    array_push( $itenscarrossel, $item3);
}

$itenscarrossel = array_sort($itenscarrossel, 'ordem');

$primeiroitem = array_shift($itenscarrossel);

$urlimagem1 = $primeiroitem['urlimagem'];
$urlnoticia1 = $primeiroitem['urlnoticia'];
$descricao1 = $primeiroitem['descricao'];

$itenscarrossel != null ? $unicoitem = false : $unicoitem = true;