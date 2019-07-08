<?php
require_once("$CFG->libdir/formslib.php");

class fstudentreg extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;
        global $USER;

        $mform = $this->_form; // Don't forget the underscore!

        $mform->addElement('header', 'header', 'Create a new course:');

        $mform->addElement('text', 'courseacronym', 'Course acronym');
        $mform->setType('courseacronym', PARAM_TEXT);
        $mform->addRule('courseacronym', 'Please enter a course acronym', 'required');

        $mform->addElement('text', 'noofstudents', 'Number of students:');
        $mform->setType('noofstudents', PARAM_INT);
        $mform->addRule('noofstudents', 'Please enter a valid number of students', 'required');

        $mform->addElement('text', 'studyprogram', 'Study program:');
        $mform->setType('studyprogram', PARAM_TEXT);
        $mform->addRule('studyprogram', 'Please enter a valid study program', 'required');

        /*$mform->addElement('date_selector', 'birthdate', 'Birth date:', array(
            'startyear' => 1990,
            'stopyear'  => 2002,
            'optional'  => false
        ));
        $mform->setType('birthdate', PARAM_TEXT);
        $mform->addRule('birthdate', 'Please enter a valid birthdate', 'rule type', 'nonzero','client', false, false);
        */
        $mform->addElement('text', 'programdirector', 'Program director:');
        $mform->setType('programdirector', PARAM_TEXT);
        $mform->addRule('programdirector', 'Please enter a program director', 'required');


        $mform->addElement('text', 'yeargroup', 'Year group:');
        $mform->setType('yeargroup', PARAM_TEXT);
        $mform->addRule('yeargroup', 'Please enter a year group_', 'required');

        $mform->addElement('select', 'semesterstart', 'Semester start:', array("Summer", "Winter"));
        $mform->setType('semesterstart', select);
        $mform->addRule('semesterstart', 'Please select a semester', 'required');


        $mform->addElement('submit', 'btnSubmit', 'Save');

        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_TEXT);

    }

    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}