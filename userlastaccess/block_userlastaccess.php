<?php
class block_userlastaccess extends block_base {

    public function init() {
        $this->title = get_string('userlastaccess', 'block_userlastaccess');
    }
    
    public function get_content() {
        
		global $COURSE, $SESSION;
		
		if ($this->content != null) {
				return $this->content;
			}
		$context = get_context_instance(CONTEXT_COURSE, 2);
        if (!has_capability('block/userlastaccess:view', $context)) {return 0;}
        $this->content = new stdClass;
 		$this->content->text = '<a href="'.'/blocks/userlastaccess/list.php'.'">Открыть список студентов</a>';
		$SESSION->courseid = $COURSE->id;
		return $this->content;

    }
    
    function instance_allow_config() {
        return false;
    }
}
