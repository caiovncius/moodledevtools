<?php

require_once("{$CFG->libdir}/completionlib.php");

class completion_cli {

    public static function course_clear($courseid) {

        $course = get_course($courseid);
        (new completion_info($course))->delete_all_completion_data();
        echo "successfully";
    }
}