<?php

defined('MOODLE_INTERNAL') || die();

require('array_sort.php');

$itenscarrossel = array();

$urlimagem1 = $this->page->theme->settings->urlimagem1;
if($urlimagem1 != null ) {
    if($this->page->theme->settings->urlnoticia1 == ''){
        $urlnoticia1 = NULL;
    } else {
        $urlnoticia1 = $this->page->theme->settings->urlnoticia1;
    }
    $ordem1 = $this->page->theme->settings->ordem1;
    $ordem1 = (int)$ordem1;

    $item1 = array(
        "urlimagem" => $urlimagem1,
        "urlnoticia" => $urlnoticia1,
        "ordem" => $ordem1
    );

    array_push( $itenscarrossel, $item1);
}

$urlimagem2 = $this->page->theme->settings->urlimagem2;
if($urlimagem2 != null ) {
    if($this->page->theme->settings->urlnoticia2 == ''){
        $urlnoticia2 = NULL;
    } else {
        $urlnoticia2 = $this->page->theme->settings->urlnoticia2;
    }
    $ordem2 = $this->page->theme->settings->ordem2;
    $ordem2 = (int)$ordem2;

    $item2 = array(
        "urlimagem" => $urlimagem2,
        "urlnoticia" => $urlnoticia2,
        "ordem" => $ordem2
    );

    array_push( $itenscarrossel, $item2);
}

$urlimagem3 = $this->page->theme->settings->urlimagem3;
if($urlimagem3 != null ) {
    if($this->page->theme->settings->urlnoticia3 == ''){
        $urlnoticia3 = NULL;
    } else {
        $urlnoticia3 = $this->page->theme->settings->urlnoticia3;
    }
    $ordem3 = $this->page->theme->settings->ordem3;
    $ordem3 = (int)$ordem3;

    $item3 = array(
        "urlimagem" => $urlimagem3,
        "urlnoticia" => $urlnoticia3,
        "ordem" => $ordem3
    );

    array_push( $itenscarrossel, $item3);
}

$itenscarrossel = array_sort($itenscarrossel, 'ordem');

$itenscarrossel != null ? $semitem = false : $semitem = true;
