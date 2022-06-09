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
 * Course renderer.
 *
 * @package    theme_noanme
 * @copyright  2016 Frédéric Massart - FMCorz.net
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

use moodle_url;
use core_course_category;
use core_course_list_element;
use html_writer;
use coursecat_helper;
use stdClass;

require_once($CFG->dirroot . '/course/renderer.php');

/**
 * Course renderer class.
 *
 * @package    theme_noanme
 * @copyright  2016 Frédéric Massart - FMCorz.net
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Class course_renderer
 * @package theme_trema
 * @copyright   2019 Trema - {@link https://trema.tech/}
 * @author      Rodrigo Mady
 * @author      Trevor Furtado
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class theme_ilb_core_course_renderer extends \core_course_renderer {

    // Renderiza caixa de informações de curso
    // @param $displayCourseInfo indica se deve exibir informações do curso à direita (true)
    //        ou em botão "Mais Informações" (false)
    public function course_info_box(stdClass $course, $displayCourseInfo = true) {


        if(!$displayCourseInfo){
            $content = '';
            $content .= $this->output->box_start('generalbox info');
            $chelper = new coursecat_helper();
            $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_EXPANDED);
            $content .= $this->coursecat_coursebox($chelper, $course);
            $content .= $this->output->box_end();
            return $content;

        }else{
            $content = '<div class="row">';


            $content .= '<div class="box generalbox info col-sm-3">';

            $chelper = new coursecat_helper();
            $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_EXPANDED);


            $content .= $this->coursecat_coursebox($chelper, $course, '', $displayCourseInfo);
            $content .= '</div>';


            if ($course instanceof stdClass) {
                $course = new core_course_list_element($course);
            }
            $content .= '<div class="col-sm-9">';

            $content .= $chelper->get_course_formatted_summary($course, array('noclean' => true, 'para' => false));
            $content .= '</div>';

            $content .= '</div>';
            return $content;
        }

    }

    /**
     * Renders the list of courses for frontpage and /course
     *
     * If list of courses is specified in $courses; the argument $chelper is only used
     * to retrieve display options and attributes, only methods get_show_courses(),
     * get_courses_display_option() and get_and_erase_attributes() are called.
     *
     * @param coursecat_helper $chelper various display options
     * @param array $courses the list of courses to display
     * @param int|null $totalcount total number of courses (affects display mode if it is AUTO or pagination if applicable),
     *     defaulted to count($courses)
     * @return string
     */
    protected function coursecat_courses(coursecat_helper $chelper, $courses, $totalcount = null) {
        global $CFG;
        if ($totalcount === null) {
            $totalcount = count($courses);
        }
        if (!$totalcount) {
            // Courses count is cached during courses retrieval.
            return '';
        }
        if ($chelper->get_show_courses() == self::COURSECAT_SHOW_COURSES_AUTO) {
            // In 'auto' course display mode we analyse if number of courses is more or less than $CFG->courseswithsummarieslimit.
            if ($totalcount <= $CFG->courseswithsummarieslimit) {
                $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_EXPANDED);
            } else {
                $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_COLLAPSED);
            }
        }
        // Prepare content of paging bar if it is needed.
        $paginationurl = $chelper->get_courses_display_option('paginationurl');
        $paginationallowall = $chelper->get_courses_display_option('paginationallowall');
        if ($totalcount > count($courses)) {
            // There are more results that can fit on one page.
            if ($paginationurl) {
                // The option paginationurl was specified, display pagingbar.
                $perpage = $chelper->get_courses_display_option('limit', $CFG->coursesperpage);
                $page = $chelper->get_courses_display_option('offset') / $perpage;
                $pagingbar = $this->paging_bar($totalcount, $page, $perpage,
                    $paginationurl->out(false, array('perpage' => $perpage)));
                if ($paginationallowall) {
                    $pagingbar .= html_writer::tag('div', html_writer::link($paginationurl->out(false, array('perpage' => 'all')),
                        get_string('showall', '', $totalcount)), array('class' => 'paging paging-showall'));
                }
            } else if ($viewmoreurl = $chelper->get_courses_display_option('viewmoreurl')) {
                // The option for 'View more' link was specified, display more link.
                $viewmoretext = $chelper->get_courses_display_option('viewmoretext', new \lang_string('viewmore'));
                $morelink = html_writer::tag('div', html_writer::link($viewmoreurl, $viewmoretext),
                    array('class' => 'paging paging-morelink'));
            }
        } else if (($totalcount > $CFG->coursesperpage) && $paginationurl && $paginationallowall) {
            // There are more than one page of results and we are in 'view all' mode, suggest to go back to paginated view mode.
            $pagingbar = html_writer::tag(
                'div',
                html_writer::link(
                    $paginationurl->out(
                        false,
                        array('perpage' => $CFG->coursesperpage)
                        ),
                    get_string('showperpage', '', $CFG->coursesperpage)
                    ),
                array('class' => 'paging paging-showperpage')
                );
        }
        // Display list of courses.
        $attributes = $chelper->get_and_erase_attributes('courses');
        $content = html_writer::start_tag('div', $attributes);
        if (!empty($pagingbar)) {
            $content .= $pagingbar;
        }
        $coursecount = 1;
        $content .= html_writer::start_tag('div', array('class' => ' row card-deck my-4'));
        foreach ($courses as $course) {
            $content .= $this->coursecat_coursebox($chelper, $course, 'card mb-3 course-card-view boxCursos tamanhoBoxCursos customPaddingBottom');
            $coursecount ++;
        }
        $content .= html_writer::end_tag('div');
        if (!empty($pagingbar)) {
            $content .= $pagingbar;
        }
        if (!empty($morelink)) {
            $content .= $morelink;
        }
        $content .= html_writer::end_tag('div'); // End courses.

        return $content;
    }
    /**
     * Displays one course in the list of courses.
     *
     * This is an internal function, to display an information about just one course
     * please use {@link core_course_renderer::course_info_box()}
     *
     * @param coursecat_helper $chelper various display options
     * @param core_course_list_element|stdClass $course
     * @param string $additionalclasses additional classes to add to the main <div> tag (usually
     *    depend on the course position in list - first/last/even/odd)
     * @return string
     */

    protected function coursecat_coursebox(coursecat_helper $chelper, $course, $additionalclasses = '', $displayCourseInfo = false) {
        global $CFG;
        if (!isset($this->strings->summary)) {
            $this->strings->summary = get_string('summary');
        }
        if ($chelper->get_show_courses() <= self::COURSECAT_SHOW_COURSES_COUNT) {
            return '';
        }
        if ($course instanceof stdClass) {
            $course = new core_course_list_element($course);
        }
        if($displayCourseInfo){
             $content = html_writer::start_tag('div', array('style' => 'min-width: 100% !important; max-width: 100% !important;'));
         }else {
            $content = html_writer::start_tag('div', array('class' => $additionalclasses));
         }

        $classes = '';
        if ($chelper->get_show_courses() >= self::COURSECAT_SHOW_COURSES_EXPANDED) {
            $nametag = 'h5';
        } else {
            $classes .= ' collapsed';
            $nametag = 'div';
        }
        // End coursebox.
        $content .= html_writer::start_tag('div', array(
            'class' => $classes,
            'data-courseid' => $course->id,
            'data-type' => self::COURSECAT_TYPE_COURSE,
        ));
        $content .= $this->coursecat_coursebox_content($chelper, $course, $displayCourseInfo);
        $content .= html_writer::end_tag('div');

        // End coursebox.
        $content .= html_writer::end_tag('div');

        // End col-md-4.
        return $content;
    }
    /**
     * Returns HTML to display course content (summary, course contacts and optionally category name)
     *
     * This method is called from coursecat_coursebox() and may be re-used in AJAX
     *
     * @param coursecat_helper $chelper various display options
     * @param stdClass|core_course_list_element $course
     * @return string
     */
    protected function coursecat_coursebox_content(coursecat_helper $chelper, $course, $displayCourseInfo = false) {
        if ($course instanceof stdClass) {
            $course = new core_course_list_element($course);
        }
        // Course name.
        $coursename = $chelper->get_course_formatted_name($course);
        $courseurl = new moodle_url('/course/view.php', array('id' => $course->id));
        $coursenamelink = html_writer::link($courseurl,
            $coursename, array('class' => $course->visible ? 'propertiesTextColor' : 'dimmed propertiesTextColor'));
        $content = html_writer::start_tag('a', array ('href' => $courseurl, 'class' => 'course-card-img'));
        $content .= $this->get_course_summary_image($course);
        $content .= html_writer::end_tag('a');
        $content .= html_writer::start_tag('div', array('class' => 'card-body'));
        $content .= "<div class='elegantshd textCardEdited'>". $coursenamelink ."</div>";
        $content .= html_writer::end_tag('div');
        // if ($course->has_course_contacts()) {
        //     $content .= html_writer::start_tag('div', array('class' => 'card-footer teachers'));
        //     $content .= html_writer::start_tag('ul');
        //     foreach ($course->get_course_contacts() as $userid => $coursecontact) {
        //         $name = $coursecontact['rolename'].': '.
        //             html_writer::link(new moodle_url('/user/view.php',
        //                 array('id' => $userid, 'course' => SITEID)),
        //                 $coursecontact['username']);
        //             $content .= html_writer::tag('li', $name);
        //     }
        //     $content .= html_writer::end_tag('ul'); // End teachers.
        //     $content .= html_writer::end_tag('div'); // End teachers.
        // }
        // Display course category if necessary (for example in search results).
        if ($chelper->get_show_courses() == self::COURSECAT_SHOW_COURSES_EXPANDED_WITH_CAT) {
            if ($cat = core_course_category::get($course->category, IGNORE_MISSING)) {
                $content .= html_writer::start_tag('div', array('class' => 'coursecat text-center'));
                $content .= get_string('category').': '.
                    html_writer::link(new moodle_url('/course/index.php', array('categoryid' => $cat->id)),
                        $cat->get_formatted_name(), array('class' => $cat->visible ? '' : 'dimmed'));
                    $content .= html_writer::end_tag('div'); // End coursecat.
            }
        }

        // Display course summary.
            if($displayCourseInfo){
                $content .= html_writer::start_tag('div', array('class' => 'card-see-more text-center', 'style' => 'padding-bottom: 3px !important;'));
                //$content .= html_writer::start_tag('div', array('class' => 'card-see-more text-center'));
            }else{

            }
            if ($icons = enrol_get_course_info_icons($course)) {
                $content .= html_writer::start_tag('div',
                    array('class' => 'btn btn-inscrever sizeBlock bottomAlign',
                          'onclick'=>"window.location.href='" . $courseurl . "';")
                );
                $content .= 'Inscreva-se';
                $content .= html_writer::end_tag('div');
            }else{
                $content .= html_writer::start_tag('div',
                    array('class' => 'btn btn-inscrever sizeBlock disabledBotao bottomAlign')
                );
                $content .= 'Inscreva-se';
                $content .= html_writer::end_tag('div');
            }
            if (!$displayCourseInfo) {
                $content .= html_writer::start_tag('button', array('class' => 'btn btn-mais-info sizeBlock bottomAlign', 'data-toggle' => 'modal', 'data-target' => "#course-popover-{$course->id}", 'data-backdrop' => 'static'));
                $content .= 'Mais informações';
                $content .= html_writer::end_tag('button');
                $content .= html_writer::start_tag('div', array('class' => 'modal fade', 'tab-index' => '-1', 'role' => 'dialog',  'id' => "course-popover-{$course->id}", 'aria-hidden' => 'true'));
                $content .= html_writer::start_tag('div', array('class' => 'modal-dialog modal-dialog-centered maxWidthModal', 'role' => 'document'));
                $content .= html_writer::start_tag('div', array('class' => 'modal-content'));
                $content .= html_writer::start_tag('div', array('class' => 'modal-header'));
                $content .= html_writer::start_tag('h5', array('class' => 'modal-title'));
                $content .= "<div>". $coursenamelink ."</div>";
                $content .= html_writer::end_tag('h5');
                $content .= html_writer::end_tag('div');
                $content .= html_writer::start_tag('div', array('class' => 'modal-body'));
                $content .= html_writer::start_tag('div');
                $content .= $chelper->get_course_formatted_summary($course,
                             array());
                $content .= html_writer::end_tag('div');
                $content .= html_writer::end_tag('div');
                $content .= html_writer::start_tag('div', array('class' => 'modal-footer'));
                $content .= html_writer::start_tag('button', array('class' => 'btn btnFechar', 'data-dismiss' => 'modal'));
                $content .= 'Fechar';
                $content .= html_writer::end_tag('button');
                $content .= html_writer::end_tag('div');
                $content .= html_writer::end_tag('div');
                $content .= html_writer::end_tag('div');
            }
            $content .= html_writer::end_tag('div'); // End summary.

        return $content;
    }
    /** <img src=""
     * Returns the first course's summary issue
     *
     * @param stdClass $course the course object
     * @return string
     */
    protected function get_course_summary_image($course) {
        global $CFG;
        $contentimage = '';
        foreach ($course->get_course_overviewfiles() as $file) {
            $isimage = $file->is_valid_image();
            $url = file_encode_url("$CFG->wwwroot/pluginfile.php",
                '/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
                $file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
                if ($isimage) {
                $contentimage = html_writer::start_tag('img', array('src' => "$url",
                    'class' => 'card-img-top minheight'));
                $contentimage .= html_writer::end_tag('img');
                break;
            }
        }
        if (empty($contentimage)) {
            $pattern = new \core_geopattern();
            $pattern->setColor($this->coursecolor($course->id));
            $pattern->patternbyid($course->id);
            $contentimage = html_writer::start_tag('div', array('style' => "background-image:url('{$pattern->datauri()}')",
            'class' => 'card-img-top minheight'));
            $contentimage .= html_writer::end_tag('div');
        }

        return $contentimage;
    }
    /**
     * Generate a semi-random color based on the courseid number (so it will always return
     * the same color for a course)
     *
     * @param int $courseid
     * @return string $color, hexvalue color code.
     */
    protected function coursecolor($courseid) {
        // The colour palette is hardcoded for now. It would make sense to combine it with theme settings.
        $basecolors = ['#81ecec', '#74b9ff', '#a29bfe', '#dfe6e9', '#00b894', '#0984e3', '#b2bec3',
                        '#fdcb6e', '#fd79a8', '#6c5ce7'];
        $color = $basecolors[$courseid % 10];
        return $color;
    }
}