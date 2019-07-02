<?php

/**
 * Provides the restore activity task class
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/mod/studentregistration/backup/moodle2/restore_studentregistration_stepslib.php');

/**
 * Restore task for the studentregistration activity module
 *
 * Provides all the settings and steps to perform complete restore of the activity.
 *
 * @package   mod_studentregistration
 * @category  backup
 * @copyright 2016 Your Name <your@email.address>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class restore_studentregistration_activity_task extends restore_activity_task {

    /**
     * Define (add) particular settings this activity can have
     */
    protected function define_my_settings() {
        // No particular settings for this activity.
    }

    /**
     * Define (add) particular steps this activity can have
     */
    protected function define_my_steps() {
        // We have just one structure step here.
        $this->add_step(new restore_studentregistration_activity_structure_step('studentregistration_structure', 'studentregistration.xml'));
    }

    /**
     * Define the contents in the activity that must be
     * processed by the link decoder
     */
    static public function define_decode_contents() {
        $contents = array();

        $contents[] = new restore_decode_content('studentregistration', array('intro'), 'studentregistration');

        return $contents;
    }

    /**
     * Define the decoding rules for links belonging
     * to the activity to be executed by the link decoder
     */
    static public function define_decode_rules() {
        $rules = array();

        $rules[] = new restore_decode_rule('studentregistrationVIEWBYID', '/mod/studentregistration/v_LectureHours.php?id=$1', 'course_module');
        $rules[] = new restore_decode_rule('studentregistrationINDEX', '/mod/studentregistration/v_LectureHours_index.php?id=$1', 'course');

        return $rules;

    }

    /**
     * Define the restore log rules that will be applied
     * by the {@link restore_logs_processor} when restoring
     * studentregistration logs. It must return one array
     * of {@link restore_log_rule} objects
     */
    static public function define_restore_log_rules() {
        $rules = array();

        $rules[] = new restore_log_rule('studentregistration', 'add', 'v_LectureHours.php?id={course_module}', '{studentregistration}');
        $rules[] = new restore_log_rule('studentregistration', 'update', 'v_LectureHours.php?id={course_module}', '{studentregistration}');
        $rules[] = new restore_log_rule('studentregistration', 'view', 'v_LectureHours.php?id={course_module}', '{studentregistration}');

        return $rules;
    }

    /**
     * Define the restore log rules that will be applied
     * by the {@link restore_logs_processor} when restoring
     * course logs. It must return one array
     * of {@link restore_log_rule} objects
     *
     * Note this rules are applied when restoring course logs
     * by the restore final task, but are defined here at
     * activity level. All them are rules not linked to any module instance (cmid = 0)
     */
    static public function define_restore_log_rules_for_course() {
        $rules = array();

        $rules[] = new restore_log_rule('studentregistration', 'view all', 'v_LectureHours_index.php?id={course}', null);

        return $rules;
    }
}
