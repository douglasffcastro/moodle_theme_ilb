<?php
                                                              
defined('MOODLE_INTERNAL') || die();
                                                                                           
$THEME->name = 'ilb';                                                                                                                                                                                                                                                                                                                          
$THEME->sheets = [];                                                                                                                                                                                                                                                                                                               
$THEME->editor_sheets = [];                                                                                                                                                                                                                                                                                                             
$THEME->parents = ['boost'];                                                                                                                                                                                                                        
$THEME->enable_dock = false;                                                                                                                                                                                                                           
$THEME->rendererfactory = 'theme_overridden_renderer_factory';                                                                                  
$THEME->requiredblocks = '';   
$THEME->usefallback = true;
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;


$THEME->layouts = [
  // The site home page.
  'frontpage' => array(
      'file' => 'frontpage.php',
      'regions' => array('side-pre'),
      'defaultregion' => 'side-pre',
      'options' => array('nonavbar' => true)
  ),
];
