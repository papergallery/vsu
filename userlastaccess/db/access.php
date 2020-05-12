 <?php
defined('MOODLE_INTERNAL') || die();

$capabilities = array(

    'block/userlastaccess:edit' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
//            'guest'          => CAP_PROHIBIT,
//			'student'        => CAP_PROHIBIT,
			'teacher'        => CAP_ALLOW,
			'editingteacher' => CAP_ALLOW,
			'coursecreator'  => CAP_ALLOW,
			'manager'        => CAP_ALLOW

        ),
		
    ),

    'block/userlastaccess:view' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
//            'guest'          => CAP_PROHIBIT,
//			'student'        => CAP_PROHIBIT,
			'teacher'        => CAP_ALLOW,
			'editingteacher' => CAP_ALLOW,
			'coursecreator'  => CAP_ALLOW,
			'manager'        => CAP_ALLOW
        ),
		
    ),	

);