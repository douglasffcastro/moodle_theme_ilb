<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);

$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
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
    <meta name="description" content="<?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">
	<div id="topo">

		<div id="topoPortal">

			<a href="http://www.senado.gov.br/" title="Volta para a p&aacute;gina inicial." class="logo"><img src="http://www.senado.gov.br/img/logo-senado-pb.gif" alt="Volta para a p&aacute;gina inicial"/></a>

			<div id="menuPortais">

				<ul> 

					<li>

						<div class="topo_portalmenu">

							<img src="http://www.senado.gov.br/img/icoSelPortais.png" alt="Selecione o Portal desejado"/>

						</div>

						<ul>

							<li style="padding-top:15px;"><a href="http://www.senado.gov.br/senado/">O Senado</a></li>

							<li><a href="http://www.senado.gov.br/senadores/">Senadores</a></li>

							<li><a href="http://www.senado.gov.br/atividade/">Atividade Legislativa</a></li>

							<li><a href="http://www.senado.gov.br/legislacao/">Legisla&ccedil;&atilde;o</a></li>

							<li><a href="http://www.senado.gov.br/noticias/">Not&iacute;cias</a></li>

							<li><a href="http://www.senado.gov.br/publicacoes/">Publica&ccedil;&otilde;es</a></li>

							<li><a href="http://www12.senado.gov.br/orcamento">Or&ccedil;amento</a></li>

							<li><a href="http://www.senado.gov.br/transparencia/">Transpar&ecirc;ncia</a></li>

							<li><a href="http://www.senado.gov.br/ecidadania/">e-Cidadania</a></li>

						</ul>

					</li>

				</ul>

			</div>

			<div id="divLinksTopo">

				<img src="http://www.senado.gov.br/img/separador-topo.gif" alt="separador" />

				<a id="btn0800" href="http://www.senado.gov.br/alosenado/" title="Al&ocirc; Senado, a voz do Cidad&atilde;o."><img src="http://www.senado.gov.br/img/btn0800.gif" alt="Alô Senado, a voz do Cidadão." /></a>

				<img src="http://www.senado.gov.br/img/separador-topo.gif" alt="separador" />

			</div>

			<div style="clear:both;" class="noprint">
			</div>

		</div>

	</div>
<!-- START OF HEADER -->
<div id="page-header">
        <div id="page-header-wrapper" class="wrapper clearfix">
                <div class="logo-wrapper">
                    <a href="<?php echo $CFG->wwwroot; ?>" title="<?php print_string('home'); ?>">
                        <img src="<?php echo $OUTPUT->pix_url('logo-saberes', 'theme')?>" class="logo-header">
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
                                <a href="http://www12.senado.gov.br/senado/ilb" target="_blank">
                                        <img src="<?php echo $OUTPUT->pix_url('logo-ilb', 'theme')?>">
                                </a>
                                <a href="http://www.interlegis.leg.br" target="_blank">
                                        <img src="<?php echo $OUTPUT->pix_url('logo-interlegis', 'theme')?>">
                                </a>
                        </div>
                </div>
        </div>

	</div>
</div>

<!-- END OF HEADER -->

<?php if ($hascustommenu) { ?>
<div id="custommenuwrap"><div id="custommenu"><?php echo $custommenu; ?></div></div>
<?php } ?>

<!-- START OF CONTENT -->

<div id="page-content-wrapper" class="wrapper clearfix">




    <div id="page-content">
        <div id="region-main-box">
            <div id="region-post-box">

                <div id="region-main-wrap">
                    <div id="region-main">
                        <div class="region-content">
                            <?php echo $OUTPUT->main_content() ?>
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

<!-- END OF CONTENT -->

<!-- START OF FOOTER -->

    <div id="page-footer">
        <p class="helplink">
        <?php echo page_doc_link(get_string('moodledocslink')) ?>
        </p>
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

<!-- END OF FOOTER -->

</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
