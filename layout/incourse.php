<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$courseheader = $coursecontentheader = $coursecontentfooter = $coursefooter = '';
if (empty($PAGE->layout_options['nocourseheaderfooter'])) {
    $courseheader = $OUTPUT->course_header();
    $coursecontentheader = $OUTPUT->course_content_header();
    if (empty($PAGE->layout_options['nocoursefooter'])) {
        $coursecontentfooter = $OUTPUT->course_content_footer();
        $coursefooter = $OUTPUT->course_footer();
    }
}

$bodyclasses = array();
if ($hassidepre && !$hassidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($hassidepost && !$hassidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$hassidepost && !$hassidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">
<?php require_once "topo.php" ?>

<?php if ($hasheading) { ?>
    <div id="page-header">
        <div id="page-header-wrapper" class="wrapper clearfix">
                <div class="course-logo-wrapper">
                    <a href="<?php echo $CFG->wwwroot; ?>" title="<?php print_string('home'); ?>">
                        <img src="<?php echo $OUTPUT->pix_url('logo-saberes', 'theme')?>" class="course-logo-header">
                    </a>
                </div>
                <div class="heading-wrapper">
                        <h1 class="headermain inside"><?php echo $PAGE->heading ?></h1>
                </div>
                <div class="headermenu">
                        <?php
                        echo $OUTPUT->login_info();
                        if (!empty($PAGE->layout_options['langmenu'])) {
                                echo $OUTPUT->lang_menu();
                        }
                        echo $PAGE->headingmenu
                        ?>
                        <div class="header-banners">
                                <a href="http://www.interlegis.leg.br" target="_blank">
                                        <img src="<?php echo $OUTPUT->pix_url('logo-interlegis', 'theme')?>">
                                </a>
                                <a href="http://www12.senado.gov.br/senado/ilb" target="_blank">
                                        <img src="<?php echo $OUTPUT->pix_url('logo-ilb', 'theme')?>">
                                </a>
                        </div>
                </div>
        </div>

    </div>
<?php } ?>

<?php if ($hascustommenu) { ?>
    <div id="custommenuwrap"><div id="custommenu"><?php echo $custommenu; ?></div></div>
<?php } ?>

<?php if (!empty($courseheader)) { ?>
    <div id="course-header"><?php echo $courseheader; ?></div>
<?php } ?>

        <?php if ($hasnavbar) { ?>
            <div class="navbar">
                <div class="wrapper clearfix">
                    <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
                    <div class="navbutton"> <?php echo $PAGE->button; ?></div>
                </div>
            </div>
        <?php } ?>

<!-- END OF HEADER -->
<div id="page-content-wrapper" class="wrapper clearfix">
    <div id="page-content">
        <div id="region-main-box">
            <div id="region-post-box">

                <div id="region-main-wrap">
                    <div id="region-main">
                        <div class="region-content">
                            <?php echo $coursecontentheader; ?>
                            <?php echo $OUTPUT->main_content() ?>
                            <?php echo $coursecontentfooter; ?>
                            <div class="voltar-curso"> <a href="<?php global $DB; echo course_get_url($PAGE->course, $DB->get_field('course_sections', 'section', array('id' => $PAGE->cm->section))); ?>">Voltar ao curso</a></div>

                        </div>
                    </div>
                </div>

                <?php if ($hassidepre) { ?>
                <div id="region-pre" class="block-region">
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    </div>
                </div>
                <?php } ?>

                <?php if ($hassidepost) { ?>
                <div id="region-post" class="block-region">
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

    <?php if (!empty($coursefooter)) { ?>
    <div id="course-footer"><?php echo $coursefooter; ?></div>
    <?php } ?>

<!-- START OF FOOTER -->
    <?php if ($hasfooter) { ?>
    <div id="page-footer">
        <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
        <?php
        echo $OUTPUT->login_info();
       //echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
        <div class="footer-senado">
                <span class="vertical-helper"></span>
                <div class="footer-left">
                </div>
                <div class="footer-center">
                        <span>Senado Federal - Praça dos Três Poderes - Brasília DF - CEP 70165-900</span>
                </div>
                <div class="footer-right">
                <a href="http://www.moodle.org" target="_blank">
                <img src="<?php echo $OUTPUT->pix_url('logo-moodle', 'theme')?>" class="logo-footer-right">
                </a>
                </div>
        </div>
    </div>
    <?php } ?>
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
